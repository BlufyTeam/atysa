<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createplate(){
        $materials = Material::all();
        return view('user.createProduct')->with('materials',$materials);
    }
    public function insertPlate(Request $request){
        $plate = new Plate();
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
        $plate->name = $request->plateName;
        $plate->save();
        return redirect('/user/all-plates');
    }

}
