<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = ProductCategory::inRandomOrder()->take(4)->get();

        $products = Product::inRandomOrder()->take(8)->get();

        $clothings = Product::inRandomOrder()->take(8)->get();

        $cookings = Product::inRandomOrder()->where('id', 1)->take(8)->get();

        $electronics = Product::inRandomOrder()->take(8)->get();

        $furnitures = Product::inRandomOrder()->take(8)->get();

        return view('home', [
            'categories' => $categories,
            'products' => $products,
            'cookings' => $categories,
            'electonics' => $products,
            'furnitures' => $categories,
            'clothings' => $products,
        ]);
    }
}
