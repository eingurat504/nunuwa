<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionGroup;

class OptionGroupController extends Controller
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

        $option_groups = OptionGroup::get();

        return view('admin.groups.index', [
            'option_groups' => $option_groups,
        ]);
    }

    /**
     * Show product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($optionGroupId)
    {

        $option_group = OptionGroup::findOrfail($optionGroupId);

        return view('admin.groups.show', [
            'option_group' => $option_group,
        ]);
    }

    
    /**
     * Show create option .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('admin.groups.create');
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
            'description' => 'sometimes',
        ]);

       $option_group = new OptionGroup();
       $option_group->name = $request->name;
    //    $option_group->description = $request->description;
       $option_group->created_at = date('Y-m-d H:i:s');
       $option_group->updated_at = date('Y-m-d H:i:s');
       $option_group->save();

       flash($option_group->name." registered")->success();

        return redirect()->route('admin.option_groups.index');

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

        return view('admin.groups.edit', [
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
        ]);

        $option = Option::findOrfail($optionId);

        Option::where('id', $option->id)
            ->update([
                'name' => $request->input('name', $option->name),
                'option_group_id' => $request->input('option_group', $option->option_group_id),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($option->name." updated")->success();

        return redirect()->route('admin.option_groups.index');
    }


}
