<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
      
    // }

        /**
     * Show Home Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHomeAppliances()
    {

        $appliances = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.appliances', [
            'appliances' => $appliances,
        ]);
    }

    /**
     * Show Electronics.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getElectronics()
    {

        $electronics = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.electronics.index', [
            'electronics' => $electronics,
        ]);
    }

        /**
     * Show Electronics.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {

        $categories = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.show', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAppliances()
    {

        $appliances = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.appliances', [
            'appliances' => $appliances,
        ]);
    }

        /**
     * Show Backpacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBackPacks()
    {

        $backpacks = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.backpack.index', [
            'backpacks' => $backpacks,
        ]);
    }

    /**
     * Show Healthy items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHealthy()
    {

        $beauties = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.healthy', [
            'beauties' => $beauties,
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
    public function getTravelOutDoor()
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
    public function getSmartPhones()
    {

        $phones = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.phones', [
            'phones' => $phones,
        ]);
    }

    /**
     * Show Phones.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTVAudios()
    {

        $audios = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.tv_audio', [
            'audios' => $audios,
        ]);
    }

    /**
     * Show Instruments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMusicalInstruments()
    {

        $instruments = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.musical', [
            'instruments' => $instruments,
        ]);
    }

    /**
     * Show Shoes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getShoes()
    {

        $shoes = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.shoes', [
            'shoes' => $shoes,
        ]);
    }

        /**
     * Show Shoes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCookingEquipment()
    {

        $cookings = Product::with('category')->inRandomOrder()->take(9)->get();

        return view('category.cooking.index', [
            'cookings' => $cookings,
        ]);
    }
}
