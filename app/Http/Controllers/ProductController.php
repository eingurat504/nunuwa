<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;

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

        $product = Product::with('category:id,name')->find($id);

        $reviews = ProductReview::where('product_id', $product->id)->get();
        
        return view('products.show', [
            'product' => $product,
            'reviews' => $reviews
        ]);
    }
}
