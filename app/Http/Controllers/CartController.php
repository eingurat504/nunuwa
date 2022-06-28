<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

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
