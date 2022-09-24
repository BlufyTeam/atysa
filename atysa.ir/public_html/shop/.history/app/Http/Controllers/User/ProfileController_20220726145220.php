<?php

namespace App\Http\Controllers\user;

use App\Classes\functions;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $user = User::find(Auth::id());
        // dd($user);
        return view('user.dashboard');
    }
    public function updateProfile(Request $request){
        $user = User::find(Auth::id());
        $function = new functions();
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/avatar');
            $user->avatar = 'uploads/avatar/'.$fileName;
        }
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->update();
        return back();
    }
    public function insertAddress(Request $request){
        $user = User::find(Auth::id());
        if(isset($user->addresses)){
            $add = $user->addresses;
        }else{
            $add = array();
        }
        $user->update(['addresses' => $add]);
        return back();
    }
}
