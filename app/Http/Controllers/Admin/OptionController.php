<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         $this->middleware('auth:admin');
      
    }

    /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $product_options = Option::get();
        return view('admin.products.options.index', [
            'product_options' => $product_options,
        ]);
    }


       /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $optionId)
    {

        $product_option = Option::findOrfail($optionId);

        return view('admin.products.options.edit', [
            'product_option' => $product_option,
        ]);
    }
}
