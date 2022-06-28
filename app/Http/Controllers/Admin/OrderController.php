<?php

// https://www.laravelcode.com/post/how-to-make-admin-auth-in-laravel8-with-example

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
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
     * Show orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $orders = Order::with('user')->get();
        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

     /**
     * Show order details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $order = Order::findOrfail($id);

        return view('admin.orders.show', [
            'order' => $order,
        ]);
    }


    /**
     * Show product categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {

        $order = Order::findOrfail($id);

        // $categories = ProductCategory::get();

        return view('admin.orders.edit', [
            'order' => $order,
            // 'categories' => $categories
        ]);
    }

    /**
     * Show update product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {

        $order = Order::findOrfail($id);

       Order::where('id', $order->id)
        ->update([
            'status' => $request->status,
            'total' => $request->price,
            'order_date' => $request->order_date,
            // 'updated_by' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        flash($order->tracking_no." updated")->success();

        return redirect()->route('admin.orders.index');

    }

}
