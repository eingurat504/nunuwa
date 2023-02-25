<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Order;
use App\Models\ProductCategory;

class ProductController extends Controller
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
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProducts()
    {

        $products = Product::with('category:id,name')->get();

        // $reviews = ProductReview::where('product_id', $product->id)->get();
  
        return view('products.index', [
            'products' => $products
        ]);
    }


      /**
     * Show product details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProduct($id)
    {

        $product = Product::with('category:id,name')->findorfail($id);

        $reviews = ProductReview::where('product_id', $product->id)->get();

        $related_products = Product::with('category:id,name')
                            ->where('category_id',$product->category->id)
                            ->where('id','!=',$product->id)
                            ->get();

        // maximum stock available 
        $max_products_available = $product->stock;

        $orders = Order::with('products')->get();

        $products_sold = $orders->products()->where('product_id', $id)->count();


        $categories = ProductCategory::get();
     
        return view('products.show', [
            'product' => $product,
            'products_sold' => $products_sold,
            'max_products_available' => $max_products_available,
            'reviews' => count($reviews),
            'related_products' => $related_products,
            'categories' => $categories
        ]);
    }
}
