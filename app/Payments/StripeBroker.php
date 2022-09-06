<?php

namespace App\Payments;

use App\Models\Order;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\HttpFoundation\Response;

class StripeBroker implements Gateway
{
    /**
     * Process payment.
     * Update order payment status, and order status.
     *
     * @param \App\Models\Order $order
     * @param array             $options
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function process(Order $order, array $options = []): Response
    {
        try {
            // https://cartalyst.com/manual/stripe/2.0#charges
            $options = [
                'amount'   => $order->total,
                'currency' => 'USD',
                'description' => "Order #{$order->id}",
                'metadata' => [
                    'sub_total' => floatval($order->sub_total),
                    'tax' => floatval($order->tax),
                    'total' => floatval($order->total),
                    'created_at' => $order->created_at->toDateTimeString(),
                    'items' => $order->products->map(function ($product) {
                        return [
                            'name' => $product->name,
                            'quantity' => $product->pivot->quantity,
                            'unit_price' => floatval($product->pivot->unit_price),
                        ];
                    })->toJson(),
                ],
                'receipt_email' => $options['billing_email'],
                'source' => $options['stripeToken'],
            ];

            $charge = Stripe::charges()->create($options);

            Cart::instance('default')->destroy();

            $order->payment_gateway = 'STRIPE';
            $order->payment_ref = $charge['id'];
            $order->status = 'PROCESSING';
            $order->save();
        } catch (CardErrorException $e) {
            // Cart::instance('default')->destroy();

            $order->payment_gateway = 'STRIPE';
            $order->status = 'FAILED';
            $order->save();

            flash("Failed to process payment: <code/>{$e->getMessage()}</code>")->error()->important();

            return redirect()->back();
        }

        flash('Your order has been received.')->success();

        return redirect()->route('home');
    }
}
