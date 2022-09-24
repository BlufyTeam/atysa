<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function newBanner(){

        return view('admin.banner.new');
    }
    public function deleteBanner(Request $request){
        Banner::find($request->id)->delete();
        return back();
    }
    public function allBanners(){
        $all = Banner::all();
        return view('admin.banner.all')->with('all',$all);
    }
}
