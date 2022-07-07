<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionGroup;

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
     * Show Options.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $product_options = Option::get();
        return view('admin.options.index', [
            'product_options' => $product_options,
        ]);
    }

    /**
     * Show Option.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($optionId)
    {

        $option = Option::findOrfail($optionId);

        return view('admin.options.show', [
            'option' => $option,
        ]);
    }

    
    /**
     * Show create option .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $groups = OptionGroup::get();

        return view('admin.options.create',[
            'groups' => $groups
        ]);
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
            'group' => 'required',
            'description' => 'required',
        ]);

       $group = OptionGroup::findOrfail($request->group);

       $option = new Option();
       $option->name = $request->name;
       $option->option_group_id = $group->id;
       $option->description = $request->description;
       $option->created_at = date('Y-m-d H:i:s');
       $option->updated_at = date('Y-m-d H:i:s');
       $option->save();

       flash($option->name." registered")->success();

       return redirect()->route('admin.product_options.index');

    }

    /**
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $optionId)
    {

        $product_option = Option::findOrfail($optionId);

        $groups = OptionGroup::get();

        return view('admin.options.edit', [
            'product_option' => $product_option,
            'groups' => $groups
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
            'description' => 'sometimes',
        ]);

        $option = Option::findOrfail($optionId);

        Option::where('id', $option->id)
            ->update([
                'name' => $request->input('name', $option->name),
                'option_group_id' => $request->input('option_group', $option->option_group_id),
                'description' => $request->input('description', $option->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($option->name." updated")->success();

        return redirect()->route('admin.product_options.index');
    }


}
