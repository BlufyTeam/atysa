<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function single(Request $request){
        $single = User::find($request->id);
        $companies = Company::all();
        return view('admin.user.single')->with('single',$single)->with('companies',$companies);
    }
    public function all(){
        $all = User::all();
        return view('admin.user.all')->with('all',$all);
    }
}
