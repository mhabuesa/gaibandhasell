<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function brands(){
        $brands = BrandModel::all();
        return view("backend.brand.brand", compact("brands"));
    }

    function brand_store(Request $request){
        $request->validate([
            "name"=> "required|unique:brand_models",
            "logo"=>"required|image",
        ]);

        $logo = ImageProcess($request->logo);
        $logo_extension = $request->logo->extension();
        $logo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $logo_extension;
        $logo->save(public_path('uploads/brand/'.$logo_name));

        BrandModel::create([
            'name'=> $request->name,
            'logo'=> $logo_name,
        ]);
        return back()->with('success','Brand Created Successfully');

    }

    function brand_delete($id){
        $brand = BrandModel::find($id);
        unlink(public_path('uploads/brand/'.$brand->logo));
        $brand->delete();
        return back()->with('success','Brand Delete Successfully');
    }


    function brand_edit($id){
        $brand = BrandModel::find($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }


    function brand_update(Request $request, $id){
        $request->validate(["name"=>'required']);

        $brand = BrandModel::find($id);

        if($request->hasFile('logo')){
            // Image Helper
           if($brand->name ==  $request->name){

            unlink(public_path('uploads/brand/'.$brand->logo));
            $logo = ImageProcess($request->logo);
            $logo_extension = $request->logo->extension();
            $logo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $logo_extension;
            $logo->save(public_path('uploads/brand/'.$logo_name));

            BrandModel::find($id)->update([
                'name'=> $request->name,
                'logo'=> $logo_name
            ]);
           }
           else{
            $request->validate(['name'=> 'unique:brand_models']);

            unlink(public_path('uploads/brand/'.$brand->logo));
            $logo = ImageProcess($request->logo);
            $logo_extension = $request->logo->extension();
            $logo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $logo_extension;
            $logo->save(public_path('uploads/brand/'.$logo_name));

            BrandModel::find($id)->update([
                'name'=> $request->name,
                'logo'=> $logo_name
            ]);

           }

        }
        else{
            if($brand->name ==  $request->name){
                BrandModel::find($id)->update([
                    'name'=> $request->name,
                ]);
            }
            else{
                $request->validate(['name'=> 'unique:brand_models']);
                BrandModel::find($id)->update([
                    'name'=> $request->name,
                ]);
            }
        }
            return back()->with('success','Brand Update Successfully');
        }


}
