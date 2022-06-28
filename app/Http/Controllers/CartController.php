<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
