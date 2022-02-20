<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
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
     * Show product details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProduct($id)
    {

        $product = Product::with('category')->find($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }
}
