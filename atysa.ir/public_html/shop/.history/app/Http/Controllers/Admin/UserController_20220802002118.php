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
        User::find($request->id)->delete();
        $request->session()->flash('Deleted', 'کاربر مورد نظر حذف شد.');
        return back();
    }
    public function makeAdmin(Request $request){
        $user = User::find($request->id);
        if($request->type == 1){
            $user->update([
                'type'  => 1
            ]);
        }else{
            $user->update([
                'type'  => 2
            ]);
        }

    }
}
