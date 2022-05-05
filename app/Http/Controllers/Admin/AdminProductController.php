<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;

class AdminProductController extends Controller
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

        flash($product->name." updated")->success();

        return redirect()->route('products.index');

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

       flash($product->name." registered")->success();

        return redirect()->route('products.index');

    }

    /**
     * Show Attached images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attachedImages(Request $request, $id)
    {
        
        $product= Product::findOrfail($id);

        return view('admin.products.image', [
            'product' => $product,
        ]);
    }

    /**
     * Attach Images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attachImages(Request $request, $id)
    {

        $product = Product::findOrfail($id);

        $dir = 'public/modules/products';
        $name = $request->product_image->getClientOriginalName();
        $image_path = $dir . '/' . $name;

        if (!file_exists($dir)) {
            Storage::makeDirectory($dir);
        }

        Storage::disk('local')->put($image_path, file_get_contents($request->product_image->getRealPath()));

        if (file_exists(public_path() . '/storage/modules/products/' . $product->name)) {
            unlink(public_path() . '/storage/modules/products/' . $product->name);
        }

        $image = new ProductImage();
        $image->product_id = $product->id;
        $image->image_path = $image_path;
        $image->image_name = $name;
        $image->save();

        flash($name." uploaded")->success();

        return redirect()->route('products.index');
    }

}
