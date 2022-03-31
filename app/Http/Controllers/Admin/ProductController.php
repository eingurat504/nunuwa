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

        $products = Product::with('category')->get();
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

        $categories = ProductCategory::get();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Show update product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrfail($id);

       Product::where('id', $product->id)
        ->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            // 'updated_by' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('product.index');

    }


    /**
     * Show create product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $categories = ProductCategory::get();

        return view('admin.products.create',[
            'categories' => $categories
        ]);
    }


    /**
     * Show store product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

       $category = ProductCategory::find($request->category);

       $product = new Product();
       $product->name = $request->name;
       $product->price = $request->price;
       $product->category_id = $request->category;
       $product->stock = 50;
       $product->sku = 50;
       $product->description = $request->description;
       $product->created_at = date('Y-m-d H:i:s');
       $product->updated_at = date('Y-m-d H:i:s');
       $product->save();

        return redirect()->route('product.index');

    }
}
