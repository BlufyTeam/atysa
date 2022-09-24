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
    public function updateBasket(Request $request){
        $product = Product::find($request->productId);
        $basket = new Basket();
        $basket->count = 1;
        $basket->ip = $request->ip();
        $basket->productName = $product->name;
        $basket->productId = $request->productId;
        $basket->price = $product->price;
        $basket->price = $request->day;

    }
}
