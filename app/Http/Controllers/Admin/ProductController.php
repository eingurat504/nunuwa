<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
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

         // $this->middleware('auth:admin');
      
    }

    /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::get();
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

     /**
     * Show product details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $product = Product::findOrfail($id);

        return view('admin.products.show', [
            'product' => $product,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {

        $product = Product::findOrfail($id);

        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }



    /**
     * Show update product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {

        $category = Product::findOrfail($id);

        return view('admin.products.index');
    }


    /**
     * Show create product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('admin.products.create');
    }


    /**
     * Show store product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {


        return view('admin.products.index');
    }
}
