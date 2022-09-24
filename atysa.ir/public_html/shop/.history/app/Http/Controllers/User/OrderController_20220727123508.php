<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function insert(Request $request){
        $total = 0;
        $products = [];
        $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        foreach($userBasket as $row){
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;
    }
    public function getAll(){

    }
    public function delete(Request $request){

    }
}
