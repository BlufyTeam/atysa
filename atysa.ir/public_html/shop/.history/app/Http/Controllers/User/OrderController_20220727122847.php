<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function insert(Request $request){
        dd($request->all());
    }
    public function getAll(){

    }
    public function delete(Request $request){

    }
}
