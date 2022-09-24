<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createplate(Request $request){
        $materials = Material::all();
        return view('user.createPlate')->with('materials',$materials);
    }

}
