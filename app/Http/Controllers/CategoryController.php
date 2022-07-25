<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * Show Category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($categoryId)
    {

        $category = ProductCategory::with('types')->findorfail($categoryId);

        $products = Product::where('category_id', $category->id)->inRandomOrder()->take(9)->get();

        return view('category.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }

}
