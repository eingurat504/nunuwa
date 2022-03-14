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
     * Show Kitchen Cabinets.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getKitchenCabinates()
    {

        $kitchen_cabinets = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.kitchen', [
            'kitchen_cabinets' => $kitchen_cabinets,
        ]);
    }

    /**
     * Show Kitchen Cabinets.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getDiningSets()
    {

        $kitchen_sets = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.kitchen', [
            'kitchen_sets' => $kitchen_sets,
        ]);
    }
    /**
     * Show Chairs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getChairs()
    {

        $chairs = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.chairs', [
            'chairs' => $chairs,
        ]);
    }

    /**
     * Show Chairs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBeds()
    {

        $chairs = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.bed_room', [
            'chairs' => $chairs,
        ]);
    }

        /**
     * Show Chairs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getDressers()
    {

        $dressers = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.dressers', [
            'dressers' => $dressers,
        ]);
    }

    /**
     * Show Tables.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTables()
    {

        $tables = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.tables', [
            'tables' => $tables,
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
    public function getCoffeTables()
    {

        $coffee_tables = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.furniture.coffee_tables', [
            'coffee_tables' => $coffee_tables,
        ]);
    }

 
}
