<?php

namespace App\Http\Controllers;

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
        $ownProducts = Product::where('userId',Auth::user()->id)->get();
        return view('home')->with('categories', $categories)
                           ->with('products', $products)
                           ->with('ownProducts', $ownProducts);
    }
    public function takeProductsFromCategory(Request $request){

    }
}
