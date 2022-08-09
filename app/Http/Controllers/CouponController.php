<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Support\Helper;

class CouponController extends Controller
{

      /**
     * Apply Coupon Code.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required',
        ]);

        $coupon_code = Coupon::where('code', $request->coupon_code)->first();

        if(!$coupon_code){
            return redirect()->route('cart.index')->withErrors(['coupon_code' => 'Invalid coupon code']);
        }

        session()->put('coupon',[
            'name' => $coupon_code->code,
            'discount' => $coupon_code->discount(Helper::to_float(Cart::instance('default')->subtotal()))
        ]);

        return redirect()->route('cart.index')->with('success','Coupon code has been applied');

    }

}
