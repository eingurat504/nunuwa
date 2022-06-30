<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductOption;

class ProductOptionController extends Controller
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

        $product_options = ProductOption::get();
        return view('admin.products.options.index', [
            'product_options' => $product_options,
        ]);
    }
}
