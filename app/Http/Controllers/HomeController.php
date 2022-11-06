<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
      
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = ProductCategory::inRandomOrder()->take(4)->get();

        $products = Product::with('category')->inRandomOrder()->take(8)->get();

        $clothings = Product::with('category')->inRandomOrder()->take(8)->get();

        $cookings = Product::with('category')->inRandomOrder()->where('id', 1)->take(8)->get();

        $electronics = Product::with('category')->inRandomOrder()->take(8)->get();

        $furnitures = Product::with('category')->inRandomOrder()->take(8)->get();

        $articles = Article::inRandomOrder()->take(8)->get();

        // $orders = Order::with('products')->get();

        // $products_sold = $orders->products()->where('')->count();

    //    dd($products);

        return view('home', [
            'articles' => $articles,
            'categories' => $categories,
            'products' => $products,
            'cookings' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $products,
        ]);
    }

    /**
     * Show about us.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showArticle($articleId)
    {
        $article = Article::findorfail($articleId);

        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact_us()
    {
        return view('contact_us');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faqs()
    {
        return view('faq');
    }

    
        /**
     * Show terms and conditions.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function terms_n_conditons()
    {
        return view('terms_conditions');
    }

            /**
     * Show about us.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about_us()
    {
        return view('about_us');
    }

}
