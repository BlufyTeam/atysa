<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('userId',null)->get();
        if(Auth::guest()){
            $ownProducts = [];
        }else{
            $ownProducts = Product::where('userId',Auth::user()->id)->get();
        }
        return view('home')->with('categories', $categories)
                           ->with('products', $products)
                           ->with('ownProducts', $ownProducts);
    }
    public function takeProductsFromCategory(Request $request){
        $products = Product::where('category',$request->categoryName)->get();
        return view('partials.products')->with('products', $products);
    }
    public function getMyProducts(Request $request){
        $products = Product::where('userId',Auth::id())->get();
        return view('partials.products')->with('products', $products);
    }
    public function updateBasket(Request $request){
        
        $product = Product::find($request->productId);
        $basket = new Basket();
        $basket->count = 1;
        $basket->ip = $request->ip();
        $basket->productName = $product->name;
        $basket->productId = $request->productId;
        $basket->price = $product->price;
        if($request->day){
            $date = \Morilog\Jalali\CalendarUtils::convertNumbers($request->day, true);
            $dateTime = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/m/d', $date)->format('Y-m-d');
            $basket->day = $dateTime;
            $basket->type = 'ارسال طبق برنامه';
        }else{
            $basket->type = 'ارسال به روز';
        }
        

        if(Auth::check()){
            $basket->userId = Auth::id();
        }
        $basket->save();
        if(Auth::check()){
            $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        }else{
            $userBasket = Basket::where('ip', $request->ip())->get();
        }
        $total = 0;
        foreach($userBasket as $row){
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;
        return view('partials.total')->with('total', $total)
                                     ->with('final', $final)
                                     ->with('shipping', $shipping)
                                     ->with('userBasket', $userBasket);

    }
    public function showBasket(Request $request){
        if(Auth::check()){
            $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        }else{
            $userBasket = Basket::where('ip', $request->ip())->get();
        }
        $total = 0;
        foreach($userBasket as $row){
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;
        return view('partials.total')->with('total', $total)
                                     ->with('final', $final)
                                     ->with('shipping', $shipping)
                                     ->with('userBasket', $userBasket);
    }
    public function updateCount(Request $request){
        $basket = Basket::find($request->productId);
        if($request->type == 'minus' && $basket->count == 1){
            Basket::where('_id',$request->productId)->delete();
        }else{
            if($request->type == 'minus'){
                $basket->count = $basket->count-1;
            }else{
                $basket->count = $basket->count+1;
            }
            $basket->update();
        }
        if(Auth::check()){
            $userBasket = Basket::where('userId',Auth::id())->orWhere('ip', $request->ip())->get();
        }else{
            $userBasket = Basket::where('ip', $request->ip())->get();
        }
        $total = 0;
        foreach($userBasket as $row){
            $total += $row->price * $row->count;
        }
        $final = $total + 10000;
        $shipping = 10000;
        return view('partials.total')->with('total', $total)
                                     ->with('final', $final)
                                     ->with('shipping', $shipping)
                                     ->with('userBasket', $userBasket);
    }
    public function home(Request $request){
        return view('default')
    }
}
