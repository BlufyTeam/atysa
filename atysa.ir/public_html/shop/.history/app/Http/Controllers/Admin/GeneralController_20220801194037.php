<?php

namespace App\Http\Controllers\Admin;

use App\Classes\functions;
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
    public function createBanner(Request $request){
        $banner = new Banner();
        $function = new functions();
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImageWithoutEdit($request->file('file'), 'uploads/banners');
            $banner->image = '/uploads/banners/'.$fileName;
        }
        $banner->url = $request->url;
        $banner->save();
        return redirect('/admin/banner/new');
    }
}
