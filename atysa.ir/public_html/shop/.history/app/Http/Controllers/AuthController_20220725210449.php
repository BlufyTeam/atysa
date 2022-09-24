<?php

namespace App\Http\Controllers;

use App\Classes\functions;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private function convert2english($string) {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    
        $string =  str_replace($persianDecimal, $newNumbers, $string);
        $string =  str_replace($arabicDecimal, $newNumbers, $string);
        $string =  str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }
    public function loginValidation($data){
        return Validator::make($data, [
            'mobile' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5'],
        ],[
            'password.min' => 'طول رمز عبور شما کمتر از 6 کاراکتر است.',
            'password.required' => 'رمز عبور را وارد نکرده اید',
            'mobile.required' => 'شماره موبایل را وارد نکرده اید',
        ]);
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function adminLoginPost(Request $request){
        $validation = $this->loginValidation($request->all());
        if ($validation->fails()) {
            return view('admin.login')->withErrors($validation);
        }else{
            $mobile = $request->mobile;
            $password = Hash::make($request->password);
            $user = User::where('mobile',$mobile)->first();
            if(User::where('mobile',$mobile)->count() == 1){
                $isLogged = Hash::check($request->password, $user->password);
                if($isLogged){
                    Auth::login($user);
                    if($user->type == 1){
                        return redirect('/admin');
                    }elseif($user->type == 2){
                        return redirect('/sale');
                    }elseif($user->type == 3){
                        return redirect('/cook');
                    }elseif($user->type == 6){
                        return redirect('/logistic');
                    }
                }else{
                    return view('admin.login')->with('error','مشخصات ورود صحیح نمی باشد');    
                }
                
            }else{
                return view('admin.login')->with('error','مشخصات ورود صحیح نمی باشد');
            }
            
        }
    }
    public function loginPage(){
        return view('user.login');
    }
    public function login(Request $request){
        if($request->phone == null || !is_numeric($request->phone)){
            return back()->withErrors(['msg'=>'شماره تلفن نامعتبر است']);
        }
        $phone = $this->convert2english($request->phone);
        $function = new functions();
        $key = rand(1000,9999);
        $single = User::where('mobile','like', '%' . $phone. '%')->first();
        if( $single == null){
            $single = new User();
            $single->mobile = $phone;
            $single->save();
        }
        if($request->session()->exists('activationTime')){
            $now = Carbon::now();
            if(gettype($request->session()->get('activationTime')) == 'array'){
                $old = $request->session()->get('activationTime')[0];
            }else{
                $old = $request->session()->get('activationTime');
            }
            
            $diff = $old->diffInSeconds($now);
            if($diff > 180){
                $data = array();
                $data['activationKey'] = $key;
                $request->session()->flush();
                session(['activationTime' => Carbon::now()]);
                $single->update($data, ['upsert' => true]);
                $function->verificationCode($key, $phone);
                return view('user.activate')->with('phone',$phone);
            }else{
                return view('user.activate')->with('phone',$phone);
            }
            
        }else{
            $data = array();
            $data['activationKey'] = $key;
            $single->update($data, ['upsert' => true]);
            $function->verificationCode($key, $request->phone);
            $request->session()->flush();
            session(['activationTime' => Carbon::now()]);
            return view('user.activate')->with('phone',$request->phone);
        }
    }
    public function resendActivation(Request $request){
        if (substr($request->phone, 0, 1) === '0') {
            $phone = $request->phone;
        }else{
            $phone = '0'.$request->phone;
        }
        $function = new functions();
        $key = rand(1000,9999);
        $single = User::where('mobile', $phone)->first();
        $data = array();
        $data['activationKey'] = $key;
        $single->update($data, ['upsert' => true]);
        $function->verificationCode($key, $phone);
        $request->session()->flush();
        $request->session()->push('activationTime',Carbon::now());
    }
    public function loginWithoutPassword(Request $request){
        $single = User::where('mobile', $request->phone)->first();
        if(isset($request->code) ){
            if($request->code == $single->activationKey){
                Auth::login($single);
                if($single->type == 1){
                    return redirect('/admin');
                }elseif($single->type == 4){
                    return redirect('/company');
                }else{
                    return redirect('/user/dashboard');
                }
                
            }
            else{
                return view('user.activate')->with('phone',$request->phone)
                                            ->withErrors(['msg'=>'کد وارد شده صحیح نمی باشد']);
            }
        }else{
            return view('user.activate')->with('phone',$request->phone)->withErrors(['msg','کد وارد شده صحیح نمی باشد']);
        }
    }
    public function logout(){
        if(Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 6 ){
            $url = '/admin-login';
        }
        else{
            $url = '/login';
        }
        Auth::logout();
        
        return redirect($url);
    }
}
