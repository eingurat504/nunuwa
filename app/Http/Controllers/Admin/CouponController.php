<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponType;
use App\Models\ProductImage;

class CouponController extends Controller
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

        $coupons = Coupon::get();

        return view('admin.coupons.index', [
            'coupons' => $coupons,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($couponId)
    {

        $coupon = Coupon::findOrfail($couponId);

        return view('admin.coupons.show', [
            'coupon' => $coupon,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($couponId)
    {

        $coupon = Coupon::findOrfail($couponId);

        return view('admin.coupons.edit', [
            'coupon' => $coupon,
        ]);
    }



    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $couponId)
    {

        $this->validate($request, [
            'code' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $coupon = Coupon::findOrfail($couponId);

        Coupon::where('id', $coupon->id)
            ->update([
                'code' => $request->input('code', $coupon->code),
                'type' => $request->input('type', $coupon->type),
                'value' => $request->input('value', $coupon->value),
                'expires_at' => $request->input('expires_at', $coupon->expires_at),
                'usable_times' => $request->input('usable_times', $coupon->usable_times),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($coupon->code." updated")->success();

        return redirect()->route('admin.coupon_codes.index');
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $types = CouponType::get();

        return view('admin.coupons.create',[
            'types' => $types
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'percent_off' => 'required',
            'expires_at' => 'required',
            'usable_times' => 'required|integer',
        ]);

        $coupon_code = new Coupon();
        $coupon_code->code = $request->code;
        $coupon_code->type = $request->type;
        $coupon_code->type_id = $request->type;
        $coupon_code->value = $request->value;
        $coupon_code->percent_off = $request->percent_off;
        $coupon_code->expires_at = $request->expires_at;
        $coupon_code->usable_times = $request->usable_times;
        $coupon_code->save();

        flash($coupon_code->code." registered")->success();

        return redirect()->route('admin.coupon_codes.index');
    }

        /**
     * Remove the specified product from storage.
     *
     * @param int $couponId
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
