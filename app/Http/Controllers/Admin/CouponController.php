<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
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
    public function show($productId)
    {

        $coupon = Coupon::findOrfail($productId);

        return view('admin.coupons.show', [
            'coupon' => $coupon,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($productId)
    {

        $coupon = Coupon::findOrfail($productId);

        return view('admin.coupons.edit', [
            'coupon' => $coupon,
        ]);
    }



    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $productId)
    {

        $this->validate($request, [
            'code' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $coupon = Coupon::findOrfail($productId);

        Coupon::where('id', $coupon->id)
            ->update([
                'code' => $request->input('code', $coupon->code),
                'type' => $request->input('type', $coupon->type),
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
        return view('admin.coupons.create');
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
        ]);

        $coupon_code = new Coupon();
        $coupon_code->code = $request->code;
        $coupon_code->type = $request->type;
        $coupon_code->value = $request->value;
        $coupon_code->save();

        flash($coupon_code->code." registered")->success();

        return redirect()->route('admin.coupon_codes.index');
    }

        /**
     * Remove the specified product from storage.
     *
     * @param int $productId
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
