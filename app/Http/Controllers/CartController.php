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
    public function __construct()
    {
      
    }

    /**
     * Show shopping cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCart()
    {

        return view('cart');
    }




}
