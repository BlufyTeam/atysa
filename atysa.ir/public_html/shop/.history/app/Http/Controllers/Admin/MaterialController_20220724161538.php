<?php

namespace App\Http\Controllers\Admin;

use App\Classes\functions;
use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function new(){

        return view('admin.material.new');
    }
    public function single(Request $request){
        $single = Material::find($request->id);
        return view('admin.material.single')->with('single',$single);
    }
    public function all(){
        $all = Material::all();
        return view('admin.material.all')->with('all',$all);
    }
    public function create(Request $request){
        $new = new Material();
        $array = array();
        foreach($request->materialChild as $row){
            if($row['name'] != null){
                array_push($array, $row);
            }
        }
        $function = new functions();
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/materials');
            $new->image = $fileName;
        }
        $new->name = $request->name;
        $new->countOfSelection = $request->countOfSelection;
        $new->materialChilds = $array;
        $new->save();
        $request->session()->flash('Inserted', 'مواد اولیه مورد نظر افزوده شد.');
        return redirect('admin/materials/all');
    }
    public function update(Request $request){
        $single = Material::find($request->id);
        $array = array();
        foreach($request->materialChild as $row){
            if($row['name'] != null){
                array_push($array, $row);
            }
        }
        $data = array();
        $function = new functions();
        $single->image ? $imgUrl = $single->image : $imgUrl = false;
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/materials',$imgUrl);
            $data['image'] = $fileName;
        }
        $data['name'] = $request->name;
        $data['countOfSelection'] = $request->countOfSelection;
        $data['materialChilds'] = $array;
        $single->update($data, ['upsert' => true]);
        $request->session()->flash('Updated', 'مواد اولیه مورد نظر ویرایش شد.');
        return redirect('admin/materials/all');
    }
    public function delete(Request $request){
        $single = Material::find($request->id)->delete();
        $request->session()->flash('Deleted', 'مواد اولیه مورد نظر حذف شد.');
        return back();
    }
}
