<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function insert(Request $request){
        $total = 0;
        $products = [];
        $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        foreach($userBasket as $row){
            arra_push($products, [
                'details'   => product::find($row->productId)->toArray(),
                'count'     => $row->count,
                'total'     => $row->price * $row->count
            ]);
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;
        $order = new Order();
        $order->ownerId = Auth::is();
    public function getAll(){
        'productName', 'count', 'productId','userId','ip','price','day',


        'total','shippingFee','productsFee','products','status'//:1-Not Ended,2-Submited,3-Shipped,4-received,5-rejected
        ,'totalQuantity','isPaid','paymentDetails','OwnerId'
    }
    public function delete(Request $request){

    }
}
