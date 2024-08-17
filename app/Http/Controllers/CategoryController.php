<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{

    function category(){
        $categories = CategoryModel::all();
        return view("backend.category.category",compact("categories"));
    }


    function category_store(Request $request){
        $request->validate([
            "name"=> "required|unique:category_models",
            "icon"=>"required|image"
        ]);
        $photo = $request->file("icon");
        // Image Helper
        $icon = ImageProcess($photo);
        $icon_extension = $photo->extension();
        $icon_name = str_replace(' ', '_', $request->name). random_int('00','99') .'.'. $icon_extension;
        $icon->resize(130, 130)->save(public_path('uploads/category/'.$icon_name));

        $lower = strtolower($request->name);
        $slug = str_replace(' ', '_', $lower);

        CategoryModel::create([
            'name'=> $request->name,
            'icon'=> $icon_name,
            'slug'=> $slug,
        ]);
        return redirect()->route('category')->with('success','Category Created Successfully');

    }

    function category_status($id){
        $catStatus = CategoryModel::find($id)->status;
        if($catStatus == 0 ){
            CategoryModel::find($id)->update([
                'status'=>1
            ]);
        }
        else{
            CategoryModel::find($id)->update([
                'status'=>0
            ]);
        }

        return back()->with('success', 'Category Status Changed');
    }

    function category_edit($id){
        $category = CategoryModel::find($id);
        return view('backend.category.category_edit',compact('category'));
    }

    function category_update(Request $request, $id){
        $request->validate(["name"=>'required']);

        $category = CategoryModel::find($id);

        if($request->hasFile('icon')){
            $photo = $request->file("icon");
            // Image Helper
            $icon = ImageProcess($photo);
           if($category->name ==  $request->name){
            unlink(public_path('uploads/category/'.$category->icon));

            $icon_extension = $photo->extension();
            $icon_name = str_replace(' ', '_', $request->name). random_int('00','99') .'.'. $icon_extension;
            $icon->resize(130, 130)->save(public_path('uploads/category/'.$icon_name));

            CategoryModel::find($id)->update([
                'name'=> $request->name,
                'icon'=> $icon_name
            ]);
           }
           else{
            $request->validate(['name'=> 'unique:category_models']);

            unlink(public_path('uploads/category/'.$category->icon));
            $icon_extension = $request->icon->extension();
            $icon_name = str_replace(' ', '_', $request->name). random_int('00','99') .'.'. $icon_extension;
            $icon->resize(130, 130)->save(public_path('uploads/category/'.$icon_name));

            CategoryModel::find($id)->update([
                'name'=> $request->name,
                'icon'=> $icon_name
            ]);

           }

        }
        else{
            if($category->name ==  $request->name){
                CategoryModel::find($id)->update([
                    'name'=> $request->name,
                ]);
            }
            else{
                $request->validate(['name'=> 'unique:category_models']);
                CategoryModel::find($id)->update([
                    'name'=> $request->name,
                ]);
            }
        }
        return back()->with('success','Category Update Successfully');
        }

    function category_delete($id){
        $category = CategoryModel::find($id);
        unlink(public_path('uploads/category/'.$category->icon));
        $category->delete();
        return back()->with('success','Category Deleted Successfully');
    }


}
