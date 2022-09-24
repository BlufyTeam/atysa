<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function newBanner(){

        return view('admin.material.new');
    }
    public function deleteBanner(Request $request){
        $single = Material::find($request->id);
        return view('admin.material.single')->with('single',$single);
    }
    public function allBanners(){
        $all = Material::all();
        return view('admin.material.all')->with('all',$all);
    }
}
