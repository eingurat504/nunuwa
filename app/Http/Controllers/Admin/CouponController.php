<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponCode
;
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

        $coupons = CouponCode::with('types')->get();

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

        $category = CouponCode
        ::findOrfail($productId);

        return view('admin.coupons.show', [
            'category' => $category,
        ]);
    }


    /**
     * Show product coupons.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($productId)
    {

        $category = CouponCode
        ::findOrfail($productId);

        return view('admin.coupons.edit', [
            'category' => $category,
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
            'name' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $category = Coupon
        ::findOrfail($productId);

        CouponCode
        ::where('id', $category->id)
            ->update([
                'name' => $request->input('name', $category->name),
                'description' => $request->input('description', $category->description),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        flash($category->name." updated")->success();

        return redirect()->route('admin.coupons.index');
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new Coupon();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        flash($category->name." registered")->success();

        return redirect()->route('admin.coupons.index');
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
