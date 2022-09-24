<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function new(){

        return view('admin.plate.new');
    }
    public function single(Request $request){
        $single = Product::find($request->id);
        return view('admin.plate.single')->with('single',$single);
    }
    public function all(){
        $all = Product::where('userId',null)->get();
        return view('admin.plate.all')->with('all',$all);
    }
    public function delete(){}
    public function create(){}
    public function update(){}
}
