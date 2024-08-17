<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkout(){
        $districts = District::all();
        return view('frontend.checkout', [
            'districts'=>$districts,
        ]);
    }

    function get_upazila(Request $request){
       $str = '';
       $all_upazila = Upazila::where('district_id', $request->district_id)->get();
        foreach($all_upazila as $upazila){
            $str .= '<option value="'.$upazila->id.'">'.$upazila->name.'</option>';
        }
        echo $str;
    }
}
