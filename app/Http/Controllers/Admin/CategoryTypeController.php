<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryType;
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
     * Show product categories.
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
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $category_type = CategoryType::findOrfail($id);

        return view('admin.categories.types.show', [
            'category_type' => $category_type,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {

        $category = CategoryType::findOrfail($id);

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

        $category = CategoryType::findOrfail($id);

        CategoryType::where('id', $category->id)
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

        $category = new CategoryType();
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

        $category = CategoryType::findOrfail($id);

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

        $category = CategoryType::findOrfail($id);

        CategoryType::where('id', $category->id)
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
        // $this->authorize('delete', [CategoryType::class, $productId]);

        $category = CategoryType::findOrFail($categoryId);

        $category->forceDelete();

        flash('Category has been deleted.')->error()->important();

        return redirect()->route('admin.categories.index');
    }
}
