<?php

namespace App\Http\Controllers;

use App\Models\ColorModel;
use App\Models\InventoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function inventory($id){
        $product = ProductModel::find($id);
        $colors = ColorModel::all();
        $inventories = InventoryModel::where('product_id', $id)->get();
        return view('backend.product.inventory',[
            'product'=>$product,
            'colors'=>$colors,
            'inventories'=>$inventories,
        ]);
        return view('backend.product.inventory');
    }


    function inventory_store(Request $request, $id){
        $request->validate([
            'color_id'=>'required',
            'size_id'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'quantity'=>'required',
        ]);

        $colors = $request->color_id;
        $sizes = $request->size_id;
        $price = $request->price;
        $discount = $request->discount;
        $quantities = $request->quantity;



        if(InventoryModel::where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){

            foreach( $colors as $key=> $color){
                InventoryModel::where('product_id', $id)->where('color_id', $colors[$key])->where('size_id', $sizes[$key])->increment('quantity', $quantities[$key]);
            }
        }
        else{
            foreach( $colors as $key=> $color){
                $after_discount = $price[$key] - $price[$key]*$discount[$key]/100;
                InventoryModel::create([
                    'product_id'=>$id,
                    'color_id'=>$colors[$key],
                    'size_id'=>$sizes[$key],
                    'price'=>$price[$key],
                    'discount'=>$discount[$key],
                    'after_discount'=>$after_discount,
                    'quantity'=>$quantities[$key],
                ]);
            }
        }


        return back()->with('success','Inventory Stored Successfully');
    }

    function inventory_delete($id){
        InventoryModel::find($id)->delete();
        return back()->with('success', 'Inventory Deleted Successfully');
    }


}
