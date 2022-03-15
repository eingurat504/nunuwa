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

        $electronics = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.shoes', [
            'electronics' => $electronics,
        ]);
    }

    /**
     * Show Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBags()
    {

        $appliances = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.shoes', [
            'appliances' => $appliances,
        ]);
    }

        /**
     * Show Backpacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAccessories()
    {

        $backpacks = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.clothing.accessories', [
            'backpacks' => $backpacks,
        ]);
    }

    /**
     * Show Healthy items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getJewelery()
    {

        $jeweleries = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.jewelery', [
            'jeweleries' => $jeweleries,
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

        $travels = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.travel', [
            'travels' => $travels,
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
