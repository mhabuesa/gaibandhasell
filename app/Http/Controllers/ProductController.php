<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function add_product(){
        $brands = BrandModel::all();
        $categories = CategoryModel::all();
        return view("backend.product.add_product", compact('brands', 'categories'));
    }

    function all_product(){

        if(Auth::user()->role == 'author'){
            $products = ProductModel::all();
        }
        else{
            // $authId = Auth::user()->id;
            $storeId =  StoreModel::where('seller_id', Auth::user()->id)->first()->id;
            $products = ProductModel::where('store_id', $storeId)->get();
        }


        return view("backend.product.all_product", compact('products'));
    }
    function edit_product($id){
        $brands = BrandModel::all();
        $categories = CategoryModel::all();
        $product = ProductModel::find($id);
        $galleries = GalleryModel::where('product_id', $id)->get();
        return view("backend.product.edit_product", compact('brands', 'categories', 'product', 'galleries'));
    }
    function gall_delete($id){
        $gall = GalleryModel::find($id);
        $gall_img = public_path('uploads/product/gallery/'.$gall->image);
        unlink($gall_img);
        $gall->delete();
        return back()->with('success', 'Gallery Image Delete!');

    }

    function product_store(Request $request){
        $request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'short_desp'=>'required',
            'long_desp'=>'required',
            'addi_info'=>'required',
            'preview'=>'required',
            'gallery'=>'required',
        ]);


        $charRemove = array("@", "!", "#", "(", ")", "*", "/", '"',' ', "'");
        $after_remove_Product_name = Str::lower(str_replace($charRemove , '_',$request->product_name));

        // Filtering and Shorting Product Name
        if(strlen($request->product_name) <= 10){
            $shortProduct_name = $after_remove_Product_name;
        }
        else{
            $shortProduct_name = substr($after_remove_Product_name, 0, 10);
        }

        // Get Store Id
        if(Auth::user()->role == 'author'){
            $store_id = '1';
        }
        else{
            $store_id = StoreModel::where('seller_id', Auth::user()->id)->get()->first()->id;
        }

        // Discount Percentage Calculate
        if($request->discount_type == 'percentage'){
            $after_discount = $request->price - $request->price*$request->discount/100;
        }
        else{
            $after_discount = $request->price - $request->discount;
        }

        // Preview Image Processing
        $preview_image = ImageProcess($request->preview);
        $preview_extension = $request->preview->extension();
        $preview_image_name = $shortProduct_name.random_int(000, 999) .'.'. $preview_extension;
        $preview_image->save(public_path('uploads/product/preview/'.$preview_image_name));

        // Product Slug Create
        $slug = $shortProduct_name.random_int(000, 999);


        // Insert Product Data To Database
        $product_id = ProductModel::insertGetId([
            'product_name'=>$request->product_name,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'discount_type'=>$request->discount_type,
            'discount'=>$request->discount,
            'after_discount'=>$after_discount,
            'tags'=>$request->tags,
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'addi_info'=>$request->addi_info,
            'preview'=>$preview_image_name,
            'slug'=>$slug,
            'store_id'=>$store_id,
            'status'=>'1',
            'created_at'=>Carbon::now(),
        ]);


        // Gallery Image Processing and Insert Data
        $galleries = $request->gallery;

        foreach($galleries as $gallery){

            $gall_image = ImageProcess($gallery);
            $gall_extension = $gallery->extension();
            $gall_name = $shortProduct_name.random_int(000, 999) .'.'. $gall_extension;
            $gall_image->resize(480,480)->save(public_path('uploads/product/gallery/'.$gall_name));

            GalleryModel::create([
                'product_id'=>$product_id,
                'image'=>$gall_name,
            ]);

        }

        return back()->with('success', 'New Product Added!');
    }


    function update_product(Request $request, $id){
        $request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'short_desp'=>'required',
            'long_desp'=>'required',
            'addi_info'=>'required',
        ]);


        $charRemove = array("@", "!", "#", "(", ")", "*", "/", '"',' ', "'");
        $after_remove_Product_name = Str::lower(str_replace($charRemove , '_',$request->product_name));

        // Filtering and Shorting Product Name
        if(strlen($request->product_name) <= 10){
            $shortProduct_name = $after_remove_Product_name;
        }
        else{
            $shortProduct_name = substr($after_remove_Product_name, 0, 10);
        }


        // Discount Percentage Calculate
        if($request->discount_type == 'percentage'){
            $after_discount = $request->price - $request->price*$request->discount/100;
        }
        else{
            $after_discount = $request->price - $request->discount;
        }


        if($request->preview == ''){
            // Insert Product Data To Database
            ProductModel::find($id)->update([
                'product_name'=>$request->product_name,
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'discount_type'=>$request->discount_type,
                'discount'=>$request->discount,
                'after_discount'=>$after_discount,
                'tags'=>$request->tags,
                'short_desp'=>$request->short_desp,
                'long_desp'=>$request->long_desp,
                'addi_info'=>$request->addi_info,
                'created_at'=>Carbon::now(),
            ]);
        }
        else{

            $prev = ProductModel::find($id);
            $prev_img = public_path('uploads/product/preview/'.$prev->preview);
            unlink($prev_img);

            // Preview Image Processing
            $preview_image = ImageProcess($request->preview);
            $preview_extension = $request->preview->extension();
            $preview_image_name = $shortProduct_name.random_int(000, 999) .'.'. $preview_extension;
            $preview_image->save(public_path('uploads/product/preview/'.$preview_image_name));

             // Insert Product Data To Database
             ProductModel::find($id)->update([
                'product_name'=>$request->product_name,
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'discount_type'=>$request->discount_type,
                'discount'=>$request->discount,
                'after_discount'=>$after_discount,
                'tags'=>$request->tags,
                'short_desp'=>$request->short_desp,
                'long_desp'=>$request->long_desp,
                'addi_info'=>$request->addi_info,
                'preview'=>$preview_image_name,
                'created_at'=>Carbon::now(),
            ]);

        }


        if(!empty($request->gallery)){

        // Gallery Image Processing and Insert Data
        $galleries = $request->gallery;
        foreach($galleries as $gallery){

            $gall_image = ImageProcess($gallery);
            $gall_extension = $gallery->extension();
            $gall_name = $shortProduct_name.random_int(000, 999) .'.'. $gall_extension;
            $gall_image->save(public_path('uploads/product/gallery/'.$gall_name));

            GalleryModel::create([
                'product_id'=>$id,
                'image'=>$gall_name,
            ]);

        }
        }

        return back()->with('success', 'Product Update Successfully!');
    }



    function product_delete($id){
        $product = ProductModel::find($id);

        $prev_img = public_path('uploads/product/preview/'.$product->preview);
        unlink($prev_img);

        $galleries = GalleryModel::where('product_id', $id);
        foreach ($galleries as $gallery){
            $gallery_img = public_path('uploads/product/gallery/'.$gallery->image);
            unlink($gallery_img);
        }

        $galleries->delete();
        $product->delete();

        return back()->with('success', 'Product Delete Successfully!');

    }














}
