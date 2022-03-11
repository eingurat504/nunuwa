<?php

namespace App\Http\Controllers\Category;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FurnitureController extends Controller
{

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
    public function getBedRooms()
    {

        $electronics = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.bed_room', [
            'electronics' => $electronics,
        ]);
    }

    /**
     * Show Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getKitchen()
    {

        $appliances = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.kitchen', [
            'appliances' => $appliances,
        ]);
    }

    /**
     * Show Backpacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getChairs()
    {

        $backpacks = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.chairs', [
            'backpacks' => $backpacks,
        ]);
    }

    /**
     * Show Healthy items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTables()
    {

        $beauties = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.tables', [
            'beauties' => $beauties,
        ]);
    }

    /**
     * Show Clothing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get()
    {

        $clothings = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.index', [
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
    public function getBestSellers()
    {

        $travels = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.travel', [
            'travels' => $travels,
        ]);
    }

    /**
     * Show Carbinates.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCabinates()
    {

        $phones = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.cabinates', [
            'phones' => $phones,
        ]);
    }

 
}
