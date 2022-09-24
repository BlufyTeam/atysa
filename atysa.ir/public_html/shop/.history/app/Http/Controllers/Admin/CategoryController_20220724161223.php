<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function new(){

        return view('admin.category.new');
    }
    public function single(Request $request){
        $single = Category::find($request->id);
        return view('admin.category.single')->with('single',$single);
    }
    public function all(){
        $all = Category::where('userId',null)->get();
        return view('admin.category.all')->with('all',$all);
    }
    public function delete(Request $request){

    }
    public function create(){}
    public function update(){}
}
