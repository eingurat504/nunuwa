<?php

namespace App\Http\Controllers\Category;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClothingController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show Electronics.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getShoes()
    {

        $shoes = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.shoes', [
            'shoes' => $shoes,
        ]);
    }

    /**
     * Show Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBags()
    {

        $bags = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.bags', [
            'bags' => $bags,
        ]);
    }

        /**
     * Show Backpacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAccessories()
    {

        $accessories = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.accessories', [
            'accessories' => $accessories,
        ]);
    }

    /**
     * Show Healthy items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getJewelery()
    {

        $jewleries = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.jewlery', [
            'jewleries' => $jewleries,
        ]);
    }

    /**
     * Show Clothing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getClothing()
    {

        $clothings = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.index', [
            'clothings' => $clothings,
        ]);
    }

    /**
     * Show Furnitures.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getFurniture()
    {

        $furnitures = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.index', [
            'furnitures' => $furnitures,
        ]);
    }

        /**
     * Show Travel and Outdoors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBestsellers()
    {

        $sellers = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.best_sellers', [
            'sellers' => $tsellersravels,
        ]);
    }

    /**
     * Show Smart Phones.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTrending()
    {

        $trends = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.trending', [
            'trends' => $trends,
        ]);
    }

 
}
