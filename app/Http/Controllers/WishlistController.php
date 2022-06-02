<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
      
    // }

    /**
     * Show wish list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showWishlist()
    {

        return view('wishlist');
    }

}
