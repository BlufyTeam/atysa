<?php

namespace App\Http\Controllers\Admin;

use App\Classes\functions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function new(){
        $categories = Category::all();
        return view('admin.plate.new')->with('categories',$categories);;
    }
    public function single(Request $request){
        $single = Product::find($request->id);
        $categories = Category::all();
        return view('admin.plate.single')->with('single',$single)->with('categories',$categories);
    }
    public function all(){
        $all = Product::where('userId',null)->get();
        return view('admin.plate.all')->with('all',$all);
    }
    public function create(Request $request){
        $new = new Product();
        $array = array();
        foreach($request->materials as $row){
            if($row['name'] != null){
                array_push($array, $row);
            }
        }
        $function = new functions();
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/plates');
            $new->image = 'uploads/plates/'.$fileName;
        }
        $new->name = $request->name;
        $new->description = $request->description;
        $new->calory = $request->calory;
        $new->category = $request->category;
        $new->size = $request->size;
        $new->materials = $array;
        $new->price = $request->price;
        $new->save();
        $request->session()->flash('Inserted', 'بشقاب مورد نظر افزوده شد.');
        return redirect('admin/plates/all');
    }
    public function update(Request $request){
        $single = Product::find($request->id);
        $array = array();
        foreach($request->materials as $row){
            if($row['name'] != null){
                array_push($array, $row);
            }
        }
        $data = array();
        $function = new functions();
        $single->image ? $imgUrl = $single->image : $imgUrl = false;
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/plates',$imgUrl);
            $data['image'] = 'uploads/plates'.$fileName;
        }
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['calory'] = $request->calory;
        $data['size'] = $request->size;
        $data['price'] = $request->price;
        $data['materials'] = $array;
        $single->update($data, ['upsert' => true]);
        $request->session()->flash('updated', 'بشقاب مورد نظر ویرایش شد.');
        return redirect('admin/plates/all');
    }
    public function delete(Request $request){
        Product::find($request->id)->delete();
        $request->session()->flash('removed', 'بشقاب مورد نظر حذف شد.');
        return back();
    }
}
