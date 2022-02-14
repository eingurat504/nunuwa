<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * Show Home Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHomeAppliances()
    {

        // $categories = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.appliances', [
            // 'categories' => $categories,
        ]);
    }

    /**
     * Show Electronics.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getElectronics()
    {

        // $categories = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.electronics', [
            // 'categories' => $categories,
        ]);
    }

    /**
     * Show Appliances.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAppliances()
    {

        $appliances = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.appliances', [
            // 'appliances' => $appliances,
        ]);
    }

        /**
     * Show Backpacks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBackPacks()
    {

        $appliances = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.backpack', [
            // 'appliances' => $appliances,
        ]);
    }

    /**
     * Show Healthy items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHealthy()
    {

        $healthy = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.healthy', [
            // 'healthy' => $healthy,
        ]);
    }

    /**
     * Show Clothing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getClothing()
    {

        $clothings = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.clothing', [
            // 'clothings' => $clothings,
        ]);
    }

    /**
     * Show Furnitures.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getFurniture()
    {

        $furnitues = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.furniture', [
            // 'furnitues' => $furnitues,
        ]);
    }

    /**
     * Show Smart Phones.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSmartPhones()
    {

        $phones = ProductCategory::inRandomOrder()->take(4)->get();

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

        // $audios = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.tv_audio', [
            // 'audios' => $audios,
        ]);
    }

    /**
     * Show Instruments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMusicalInstruments()
    {

        // $instruments = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.musical', [
            // 'instruments' => $instruments,
        ]);
    }

    /**
     * Show Shoes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getShoes()
    {

        // $shoes = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.shoes', [
            // 'shoes' => $shoes,
        ]);
    }

        /**
     * Show Shoes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCookingEquipment()
    {

        // $shoes = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.cooking.index', [
            // 'shoes' => $shoes,
        ]);
    }
}
