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


      /**
     * Update Option.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $optionId)
    {

        $this->validate($request, [
            'name' => 'sometimes',
            'option_group_id' => 'sometimes',
        ]);

        $option = Option::findOrfail($optionId);

        Option::where('id', $option->id)
            ->update([
                'name' => $request->input('name', $option->name),
                'option_group_id' => $request->input('option_group', $option->option_group_id),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($option->name." updated")->success();

        return redirect()->route('admin.product_options.index');
    }


}
