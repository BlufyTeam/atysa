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

}
