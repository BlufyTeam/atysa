<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function insert(Request $request){
        $total = 0;
        $products = [];
        $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        foreach($userBasket as $row){
            array_push($products, [
                'details'   => Product::find($row->productId)->toArray(),
                'count'     => $row->count,
                'total'     => $row->price * $row->count,
                'day'       => $row->day,
            ]);
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;

        $order = new Order();
        $order->ownerId = Auth::id();
        $order->products = $products;
        $order->total = $final;
        $order->shippingFee = $shipping;
        $order->ProductFee = $total;
        $order->status = 2;
        $order->isPaid = false;
        $order->save();
        Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->delete();
        return view('success');
    }
    public function all(){
        $orders = Order::where('ownerId', Auth::id())->get();
        return view('user.orders')->with('orders',$orders);
    }
    public function delete(Request $request){

    }
}
