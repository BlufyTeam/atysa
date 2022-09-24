<?php

namespace App\Http\Controllers\Admin;

use App\Classes\functions;
use App\Http\Controllers\Controller;
use App\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function new(){

        return view('admin.plate.new');
    }
    public function single(Request $request){
        $single = Plate::find($request->id);
        return view('admin.plate.single')->with('single',$single);
    }
    public function all(){
        $all = Plate::where('userId',null)->get();
        return view('admin.plate.all')->with('all',$all);
    }
    public function create(Request $request){
        $new = new Plate();
        $array = array();
        foreach($request->materials as $row){
            if($row['name'] != null){
                array_push($array, $row);
            }
        }
        $function = new functions();
        if ($request->hasFile('file')) {

            $fileName = $function->uploadImage($request->file('file'), 'uploads/plates');
            $new->image = 'uploads/plates'.$fileName;
        }
        $new->name = $request->name;
        $new->description = $request->description;
        $new->calory = $request->calory;
        $new->size = $request->size;
        $new->materials = $array;
        $new->save();
        $request->session()->flash('Inserted', 'بشقاب مورد نظر افزوده شد.');
        return redirect('admin/plates/all');
    }
    public function update(Request $request){
        $single = Plate::find($request->id);
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
        $data['materials'] = $array;
        $single->update($data, ['upsert' => true]);
        $request->session()->flash('updated', 'بشقاب مورد نظر ویرایش شد.');
        return redirect('admin/plates/all');
    }
    public function delete(Request $request){
        $single = Plate::find($request->id)->delete();
        $request->session()->flash('removed', 'بشقاب مورد نظر حذف شد.');
        return back();
    }
}
