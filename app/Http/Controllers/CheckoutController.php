<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // if cart is empty; redirect to home with flash message

        return view('checkout');
    }

}
