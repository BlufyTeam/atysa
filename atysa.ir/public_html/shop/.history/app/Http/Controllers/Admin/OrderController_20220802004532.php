<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(Request $request){
        $orders = Order::all();
        return view('admin.orders.all')->with('orders',$orders);
    }
    public function single(Request $request){
        $order = Order::find($request->id);
        return view('admin.orders.single')->with('order',$order);
    }
}
