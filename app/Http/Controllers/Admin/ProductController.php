<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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

        $products = Product::with(['category','images'])->get();
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

        $product_image = ProductImage::where('product_id', $id)->first();

        return view('admin.products.show', [
            'product' => $product,
            'product_image' =>  $product_image
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

        $brands = Brand::get();

        return view('admin.products.edit', [
            'product' => $product,
            'brands' => $brands,
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

        return redirect()->route('admin.products.index');

    }


    /**
     * Show create product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $categories = ProductCategory::get();

        $brands = Brand::get();

        return view('admin.products.create',[
            'categories' => $categories,
            'brands' => $brands
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
       $product->sale_price = $request->sale_price;
       $product->regular_price = $request->regular_price;
       $product->category_id = $request->category;
       $product->brand_id = $request->brand;
       $product->stock = $request->stock;
       $product->sku = 50;
       $product->description = $request->description;
       $product->created_at = date('Y-m-d H:i:s');
       $product->updated_at = date('Y-m-d H:i:s');
       $product->save();

       flash($product->name." registered")->success();

        return redirect()->route('admin.products.index');

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

        $dir = 'public/category/products';
        $name = $request->product_images->getClientOriginalName();
        $image_path = $dir . '/' . $name;

        if (!file_exists($dir)) {
            Storage::makeDirectory($dir);
        }

        Storage::disk('local')->put($image_path, file_get_contents($request->product_images->getRealPath()));

        if (file_exists(public_path() . '/storage/category/products/' . $product->name)) {
            unlink(public_path() . '/storage/category/products/' . $product->name);
        }

        $image = new ProductImage();
        $image->product_id = $product->id;
        $image->image_path = $image_path;
        $image->image_name = $name;
        $image->save();

        flash($name." uploaded")->success();

        return redirect()->route('admin.products.index');
    }

        /**
     * Remove the specified product from storage.
     *
     * @param int $productId
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        // $this->authorize('delete', [Product::class, $productId]);

        $product = Product::findOrFail($productId);

        $product->forceDelete();

        flash('Product has been deleted.')->error()->important();

        return redirect()->route('admin.products.index');
    }


}
