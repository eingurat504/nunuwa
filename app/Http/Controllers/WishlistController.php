<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

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

        $wishlists = Wishlist::get();

        return view('wishlist',[
            'wishlists' => $wishlists
        ]);
    }

}
