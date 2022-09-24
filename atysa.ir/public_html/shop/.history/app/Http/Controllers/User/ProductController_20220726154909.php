<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function createProduct(){
        $materials = Material::all();
        return view('user.create-product')->with('materials',$materials);
    }
    public function insertProduct(Request $request){
        $plate = new Product();
        $plate->userId = Auth::id();
        $plate->calory = $request->totalCalory;
        $data = array();
        $count = 0;
        foreach($request->materials as $element){
            foreach($element as $item){
                $data[$count]['name'] = $element;
                $count++;
            }
        }
        $plate->materials = $data;
        $plate->name = $request->name;
        $plate->total = $request->total;
        $plate->save();
        return redirect('/user/products');
    }
    public function plates(){
        
    }

}
