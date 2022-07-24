<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductImage;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     https://www.codermen.com/how-to-make-multi-auth-in-laravel-8/
     */
    public function __construct()
    {

         $this->middleware('auth:admin');
      
    }

    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = ProductCategory::get();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $category = ProductCategory::findOrfail($id);

        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {

        $category = ProductCategory::findOrfail($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }



    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {

        $category = ProductCategory::findOrfail($id);

        ProductCategory::where('id', $category->id)
            ->update([
                'name' => $request->input('name', $category->name),
                'description' => $request->input('description', $category->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($category->name." updated")->success();

        return redirect()->route('admin.categories.index');
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('admin.categories.create');
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        flash($category->name." registered")->success();

        return redirect()->route('admin.categories.index');
    }

      /**
     * Show Attached images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attachedImages(Request $request, $id)
    {

        $category = ProductCategory::findOrfail($id);

        return view('admin.categories.image', [
            'category' => $category,
        ]);
    }

    /**
     * Attach Images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attachImages(Request $request, $categoryId)
    {

        $category = ProductCategory::findOrfail($id);

        ProductCategory::where('id', $category->id)
            ->update([
                'name' => $request->input('name', $category->name),
                // 'description' => $request->input('description', $category->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($category->name." photos uploaded")->success();

        return redirect()->route('admin.categories.index');
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
    public function destroy($categoryId)
    {
        // $this->authorize('delete', [ProductCategory::class, $productId]);

        $category = ProductCategory::findOrFail($categoryId);

        $category->forceDelete();

        flash('Category has been deleted.')->error()->important();

        return redirect()->route('admin.categories.index');
    }
}
