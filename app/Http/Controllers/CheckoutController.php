<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ...
    }

    /**
     * Show checkout view..
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function showCheckout()
    {

        return view('checkout');
    }

     /**
     * Checkout items.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'nullable|exists:users,id',
            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_email' => 'required|email',
            'billing_phone' => 'required', // tel
            'billing_company' => 'nullable',
            'billing_country' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_postalcode' => 'nullable|numeric',
            'billing_address_1' => 'required',
            'billing_address_2' => 'nullable',
            'instructions' => 'nullable',
            // 'payment_gateway' => 'required|in:COD,PAYPAL,STRIPE,MTN-MOMO',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id ?? null;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_email = $request->billing_email;
        $order->billing_phone = $request->billing_phone;
        $order->billing_company = $request->billing_company;
        $order->billing_country = $request->billing_country;
        $order->billing_state = $request->billing_state;
        $order->billing_city = $request->billing_city;
        $order->billing_postalcode = $request->billing_postalcode;
        $order->billing_address_1 = $request->billing_address_1;
        $order->billing_address_2 = $request->billing_address_2;
        $order->instructions = $request->instructions;
        $order->order_date = date('Y-m-d H:i:s');
        $order->tracking_no = date('Y-m-d H:i:s').'123443';
        $order->status = 'PENDING';
        $order->sub_total = Helper::to_float(Cart::instance('default')->subtotal());
        $order->tax = Helper::to_float(Cart::instance('default')->tax());
        $order->total = Helper::to_float(Cart::instance('default')->total());
        $order->save();

        $products = Cart::instance('default')->content()->values()->reduce(function ($carry, $item) {
            $carry[$item->id] = [
                'quantity' => $item->qty,
                'unit_price' => Helper::to_float($item->model->price),
            ];

            return $carry;
        });

        $order->products()->attach($products);
        
        flash($order->tracking_no." order processing")->success();

        return redirect()->route('checkout.index');

    }

}
