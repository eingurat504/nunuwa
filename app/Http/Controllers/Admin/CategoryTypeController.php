<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\ProductCategory;
use App\Models\ProductImage;

class CategoryTypeController extends Controller
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
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $category_types = CategoryType::get();

        return view('admin.categories.types.index', [
            'category_types' => $category_types,
        ]);
    }


    /**
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $category_type = CategoryType::with('category')->findOrfail($id);

        return view('admin.categories.types.show', [
            'category_type' => $category_type,
        ]);
    }


    /**
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {

        $type = CategoryType::findOrfail($id);

        $categories = ProductCategory::get();

        return view('admin.categories.types.edit', [
            'type' => $type,
            'categories' => $categories,
        ]);
    }

    /**
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'nullable|exists:product_categories,id',
            'name' => 'nullable',
            'description' => 'nullable',
        ]);

        $type = CategoryType::findOrfail($id);

        CategoryType::where('id', $type->id)
            ->update([
                'name' => $request->input('name', $type->name),
                'category_id' => $request->input('category_id', $type->category_id),
                'description' => $request->input('description', $type->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($type->name." updated")->success();

        return redirect()->route('admin.category_types.index');
    }


    /**
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $categories = ProductCategory::get();

        return view('admin.categories.types.create',[
            'categories' => $categories
        ]);
    }


    /**
     * Show product category_types.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $type = new CategoryType();
        $type->name = $request->name;
        $type->category_id = $request->category;
        $type->description = $request->description;
        $type->created_at = date('Y-m-d H:i:s');
        $type->updated_at = date('Y-m-d H:i:s');
        $type->save();

        flash($type->name." registered")->success();

        return redirect()->route('admin.category_types.index');
    }

      /**
     * Show Attached images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attachedImages(Request $request, $id)
    {

        $category = CategoryType::findOrfail($id);

        return view('admin.categories.types.image', [
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

        $category = CategoryType::findOrfail($id);

        CategoryType::where('id', $category->id)
            ->update([
                'name' => $request->input('name', $category->name),
                // 'description' => $request->input('description', $category->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($category->name." photos uploaded")->success();

        return redirect()->route('admin.category_types.index');
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
        // $this->authorize('delete', [CategoryType::class, $productId]);

        $category = CategoryType::findOrFail($categoryId);

        $category->forceDelete();

        flash('Category has been deleted.')->error()->important();

        return redirect()->route('admin.category_types.index');
    }
}
