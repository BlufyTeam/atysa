<?php

namespace App\Http\Controllers\User;

use App\Classes\functions;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function createProduct(){
        $materials = Material::all();
        return view('user.createplate')->with('materials',$materials);
    }
    public function delete(Request $request){
        $user = User::find(Auth::id());
        $id = $request->productId;
        Product::where('_id',$id)->delete();

        $products = $user->products;
        $func = new functions();
        $products = $func->removeElementWithValue($products, "id", $request->productId);
        $user->update(['products'  => $products]);
        return back();
    }
    public function insertProduct(Request $request){
        $user = User::find(Auth::id());
        $plate = new Product();
        $plate->userId = Auth::id();
        $plate->calory = $request->totalCalory;
        $data = array();
        $count = 0;
        foreach($request->materials as $element){
            $count++;
            foreach($element as $k=>$item){
                $data[$count][$k]['name'] = ;
            }
        }
        $plate->materials = $data;
        $plate->name = $request->plateName;
        $plate->price = $request->totalPrice;
        $plate->userId = Auth::id();
        $plate->save();

        if(isset($user->products)){
            $products = $user->products;
        }else{
            $products = array();
        }
        array_push($products, [
            'id'        => $plate->_id,
            'calory'    => $plate->calory,
            'name'      => $plate->name,
            'price'     => $plate->price,
            'materials' => $plate->materials,
        ]);
        $user->update([
            'products'  => $products
        ]);

        return back();
    }

}
