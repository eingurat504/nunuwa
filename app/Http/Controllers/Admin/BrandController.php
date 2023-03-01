<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionGroup;

class BrandController extends Controller
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

        $brands = Brand::get();

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($brandId)
    {

        $brand = Brand::findOrfail($optionbrandId);

        return view('admin.brands.show', [
            'brand' => $brand,
        ]);
    }

    
    /**
     * Show create option .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('admin.brands.create');
    }


    /**
     * Show store option.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

       $brand = new Brand();
       $brand->name = $request->name;
       $brand->description = $request->description;
       $brand->created_at = date('Y-m-d H:i:s');
       $brand->updated_at = date('Y-m-d H:i:s');
       $brand->save();

       flash($brand->name." registered")->success();

        return redirect()->route('admin.brands.index');

    }

    /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $brandId)
    {

        $brand = Brand::findOrfail($brandId);

        return view('admin.brands.edit', [
            'brand' => $brand
        ]);
    }


      /**
     * Update Option.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $optionGroupId)
    {

        $this->validate($request, [
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $brand = OptionGroup::findOrfail($optionGroupId);

        OptionGroup::where('id', $brand->id)
            ->update([
                'name' => $request->input('name', $brand->name),
                'description' => $request->input('description', $brand->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($brand->name." updated")->success();

        return redirect()->route('admin.brands.index');
    }


}
