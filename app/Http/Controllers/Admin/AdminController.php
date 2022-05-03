<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         $this->middleware('auth:admin');
      
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {

        $categories = Product::with('category')->inRandomOrder()->take(4)->get();

        $products = Product::with('category')->inRandomOrder()->take(8)->get();

        $clothings = Product::with('category')->inRandomOrder()->take(8)->get();

        $cookings = Product::with('category')->inRandomOrder()->where('id', 1)->take(8)->get();

        $electronics = Product::with('category')->inRandomOrder()->take(8)->get();

        $furnitures = Product::with('category')->inRandomOrder()->take(8)->get();

        return view('admin.index', [
            'categories' => $categories,
            'products' => $products,
            'cookings' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $products,
        ]);
    }
}
