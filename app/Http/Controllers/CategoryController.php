<?php

namespace App\Http\Controllers;

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
    public function getClothings()
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
    public function getFurnitures()
    {

        $furnitues = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.furnitues', [
            // 'furnitues' => $furnitues,
        ]);
    }

    /**
     * Show Phones.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getPhones()
    {

        // $phones = ProductCategory::inRandomOrder()->take(4)->get();

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

        // $instruments = ProductCategory::inRandomOrder()->take(4)->get();

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

        // $shoes = ProductCategory::inRandomOrder()->take(4)->get();

        return view('category.shoes', [
            'shoes' => $shoes,
        ]);
    }
}
