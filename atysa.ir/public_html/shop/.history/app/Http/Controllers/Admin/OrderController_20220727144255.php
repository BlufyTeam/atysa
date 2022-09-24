<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(Request $request){
        $orders = Order::all();
        return view('admin.orders.all');
    }
}
