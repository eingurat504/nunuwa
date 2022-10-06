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
    public function show($articleId)
    {

        $article = Article::findOrfail($articleId);

        return view('admin.articles.show', [
            'article' => $article,
        ]);
    }


    /**
     * Show edit product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($articleId)
    {

        $article = Article::findOrfail($articleId);

        return view('admin.articles.edit', [
            'article' => $article,
        ]);
    }



    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $articleId)
    {

        $this->validate($request, [
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $article = Article::findOrfail($articleId);

        Article::where('id', $article->id)
            ->update([
                'title' => $request->input('name', $article->name),
                'description' => $request->input('description', $article->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($article->title." updated")->success();

        return redirect()->route('admin.articles.index');
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

        $article = new Article();
        $article->title = $request->name;
        $article->description = $request->description;
        $article->save();

        flash($article->title." registered")->success();

        return redirect()->route('admin.articles.index');
    }


        /**
     * Remove the specified product from storage.
     *
     * @param int $articleId
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($articleId)
    {
        // $this->authorize('delete', [ProductCategory::class, $articleId]);

        $article = Article::findOrFail($articleId);

        $article->forceDelete();

        flash('Article has been deleted.')->error()->important();

        return redirect()->route('admin.articles.index');
    }
}
