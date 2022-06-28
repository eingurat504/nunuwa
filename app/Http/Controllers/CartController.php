<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
      
    // }

    /**
     * Show shopping cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCart()
    {
        return view('cart');
    }


        /**
     * Add product to cart.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        Cart::instance('default')
        ->add($request->id, $request->name, $request->input('quantity', 1), $request->price)
        ->associate(Product::class);

        flash("{$request->name} added to cart.")->success();

        return redirect()->route('cart.index');

    }

    /**
     * Update the specified product from cart.
     *
     * @param string  $rowId
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $rowId)
    {
        $item = Cart::instance('default')->get($rowId);

        if (! $item) {
            return response(['Item not found'], 404);
        }

        $this->validate($request, [
            'quantity' => 'required|integer|between:1,10',
        ]);

        Cart::instance('default')->update($rowId, $request->quantity);

        flash("{$item->name} qty updated.")->info();

        if (! $request->expectsJson()) {
            return redirect()->route('cart.index');
        }

        return response($item);
    }

    /**
     * Remove the specified product from cart.
     *
     * @param string $rowId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($rowId)
    {
        Cart::instance('default')->remove($rowId);

        flash('Item removed from cart.')->warning();

        return redirect()->route('cart.index');
    }

        /**
     * Empty shopping cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset()
    {
        Cart::instance('default')->destroy();

        flash('Emptied cart.')->error()->important();

        return redirect()->route('cart.index');
    }

}
