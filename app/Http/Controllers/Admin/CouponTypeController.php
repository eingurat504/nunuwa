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
    public function show($couponTypeId)
    {

        $coupon = CouponType::findOrfail($couponTypeId);

        return view('admin.coupon.types.show', [
            'coupon' => $coupon,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($couponTypeId)
    {

        $coupon = CouponType::findOrfail($couponTypeId);

        return view('admin.coupon.types.edit', [
            'coupon' => $coupon,
        ]);
    }



    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $couponTypeId)
    {

        $this->validate($request, [
            'code' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $coupon = Coupon::findOrfail($couponTypeId);

        CouponType::where('id', $coupon->id)
            ->update([
                'code' => $request->input('code', $coupon->code),
                'type' => $request->input('type', $coupon->type),
                'value' => $request->input('value', $coupon->value),
                'expires_at' => $request->input('expires_at', $coupon->expires_at),
                'usable_times' => $request->input('usable_times', $coupon->usable_times),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($coupon->code." updated")->success();

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

        flash($type->code." registered")->success();

        return redirect()->route('admin.coupon_types.index');
    }

        /**
     * Remove the specified product from storage.
     *
     * @param int $couponTypeId
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {

        $category = Coupon
        ::findOrFail($categoryId);

        $category->forceDelete();

        flash('Category has been deleted.')->error()->important();

        return redirect()->route('admin.coupons.index');
    }
}
