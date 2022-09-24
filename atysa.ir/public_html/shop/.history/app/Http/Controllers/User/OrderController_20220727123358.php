<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function insert(Request $request){
        $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
    }
    public function getAll(){

    }
    public function delete(Request $request){

    }
}
