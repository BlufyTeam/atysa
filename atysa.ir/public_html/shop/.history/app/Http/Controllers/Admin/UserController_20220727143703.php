<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function single(Request $request){
        $single = User::find($request->id);
        return view('admin.user.single')->with('single',$single);
    }
    public function all(){
        $all = User::all();
        return view('admin.user.all')->with('all',$all);
    }
    public function delete(Request $request){
        $single = User::find($request->id)->delete();
        $request->session()->flash('Deleted', 'کاربر مورد نظر حذف شد.');
        return back();
    }
}
