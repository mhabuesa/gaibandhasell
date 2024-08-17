<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SizeModel;

class AttributeController extends Controller
{
    public function attributes(){

        $categories = CategoryModel::all();
        $sizes = SizeModel::all();
        $colors = ColorModel::all();
        return view("backend.attribute.attribute", compact("sizes","colors","categories"));
    }

    function size_store(Request $request){
        $request->validate([
            'size'=>'required',
            'category_id'=>'required',
        ]);

        $sizes = $request->size;
        $category_id = $request->category_id;

        foreach($sizes as $key=> $size){
            SizeModel::create([
                'category_id'=>$category_id,
                'size'=>$sizes[$key],
            ]);
        }

        return back()->with('success','Size Store Successfully');
    }

    function size_update(Request $request, $id){
        $size = SizeModel::find($id);

        if($request->size == ''){
            return back()->with('error','Size Field is Required');
        }
        else{

            if($size->size == $request->size){
                return back()->with('success','Size Update Successfully');
            }
            else{
                $request->validate(['size'=>'unique:size_models']);
                SizeModel::where('id', $id)->update(['size'=> $request->size]);
                return back()->with('success','Size Update Successfully');
            }

        }

    }

    function size_delete($id){
        SizeModel::where('id', $id)->delete();
        return back()->with('success','Size Deleted Successfully');
    }

    function color_store(Request $request){
        $request->validate([
            'color_name'=>'required|unique:color_models',
            'color_code'=>'required|unique:color_models',
        ]);

        ColorModel::create([
            'color_name'=> $request->color_name,
            'color_code'=> $request->color_code,
        ]);
        return back()->with('success','Color Store Successfully');
    }

    function color_update(Request $request, $id){
        $color = ColorModel::find($id);

        if($color->color_name == $request->color_name){
            if($color->color_code == $request->color_code){
                ColorModel::where('id', $id)->update([
                    'color_name'=> $request->color_name,
                    'color_code'=> $request->color_code,
                ]);
                return back()->with('success','Color Update Successfully');
            }

            else{
                $request->validate([
                    'color_code'=>'required|unique:color_models',
                ]);
                ColorModel::where('id', $id)->update([
                    'color_name'=> $request->color_name,
                    'color_code'=> $request->color_code,
                ]);
                return back()->with('success','Color Update Successfully');
            }
        }
        else{

            if($color->color_code == $request->color_code){
                $request->validate([
                    'color_name'=>'required|unique:color_models',
                ]);
                ColorModel::where('id', $id)->update([
                    'color_name'=> $request->color_name,
                    'color_code'=> $request->color_code,
                ]);
                return back()->with('success','Color Update Successfully');
            }
            else{
                $request->validate([
                    'color_name'=>'required|unique:color_models',
                    'color_code'=>'required|unique:color_models',
                ]);
                ColorModel::where('id', $id)->update([
                    'color_name'=> $request->color_name,
                    'color_code'=> $request->color_code,
                ]);
                return back()->with('success','Color Update Successfully');
            }

        }



    }

    function color_delete($id){
        ColorModel::where('id', $id)->delete();
        return back()->with('success','Color Delete Successfully');
    }

}
