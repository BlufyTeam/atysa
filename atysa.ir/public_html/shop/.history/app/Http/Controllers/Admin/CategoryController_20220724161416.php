<?php

namespace App\Http\Controllers\Admin;

use App\Classes\functions;
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
    public function create(Request $request){
        $new = new Category();
        if ($request->hasFile('file')) {
            $function = new functions();
            $fileName = $function->uploadImage($request->file('file'), 'uploads/materials');
            $new->image = $fileName;
        }
        $new->name = $request->name;
        $new->description = $request->description ? $request->description : null;
        
    }
    public function update(Request $request){

    }
}
