<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
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

        $articles = Article::get();

        return view('admin.articles.index', [
            'articles' => $articles,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($productId)
    {

        $category = ProductCategory::findOrfail($productId);

        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($productId)
    {

        $category = ProductCategory::findOrfail($productId);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }



    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $productId)
    {

        $this->validate($request, [
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $category = ProductCategory::findOrfail($productId);

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
        return view('admin.articles.create');
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        flash($category->name." registered")->success();

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
