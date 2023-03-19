<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponType;
use App\Models\ProductImage;

class CouponTypeController extends Controller
{
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
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $types = CouponType::get();

        return view('admin.coupons.types.index', [
            'types' => $types,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($typeId)
    {

        $coupon = CouponType::findOrfail($typeId);

        return view('admin.coupons.types.show', [
            'coupon' => $coupon,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($typeId)
    {

        $type = CouponType::findOrfail($typeId);

        return view('admin.coupons.types.edit', [
            'type' => $type,
        ]);
    }



    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $typeId)
    {

        $this->validate($request, [
            'code' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $type = CouponType::findOrfail($typeId);

        CouponType::where('id', $type->id)
            ->update([
                'name' => $request->input('name', $type->name),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($type->name." updated")->success();

        return redirect()->route('admin.coupon_types.index');
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.coupons.types.create');
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $type = new CouponType();
        $type->name = $request->name;
        $type->save();

        flash($type->name." registered")->success();

        return redirect()->route('admin.coupon_types.index');
    }

        /**
     * Remove the specified product from storage.
     *
     * @param int $typeId
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeId)
    {

        $type = CouponType
        ::findOrFail($typeId);

        $type->forceDelete();

        flash('Coupon type has been deleted.')->error()->important();

        return redirect()->route('admin.coupon_types.index');
    }
}
