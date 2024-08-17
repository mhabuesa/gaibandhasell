<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfileController extends Controller
{
    function customer_dashboard(){
        return view('frontend.customerPages.dashboard');
    }
    function customer_wishlist(){
        return view('frontend.customerPages.wish_list');
    }
    function customer_order(){
        return view('frontend.customerPages.order');
    }
    function customer_setting(){
        return view('frontend.customerPages.setting');
    }
    function customer_profile(){
        return view('frontend.customerPages.profile');
    }


    function customer_photo_update(Request $request){
        $request->validate([
            'photo'=>'required|image'
        ]);

        $photo = $request->photo;

        $image = ImageProcess($photo);
        $extension = $photo->extension();
        $name = str_replace(' ', '', Auth::guard('customer')->user()->name).random_int(000,999);
        $image_name = $name .'.'. $extension;
        $image->resize(400,400)->save(public_path('uploads/profile/customer/'.$image_name));

        CustomerModel::find(Auth::guard('customer')->user()->id)->update([
            'photo'=>$image_name,
        ]);

        return back()->with('success', 'Profile Photo Update Successful');

    }

    function customer_info_update(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        CustomerModel::find(Auth::guard('customer')->user()->id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
        return back()->with('success', 'Profile Info Update Successful');

    }

    function customer_security_update(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required',
            'password_confirmation'=>['required', 'same:password'],
        ]);

        $current_pass = $request->current_password;
        $pass = $request->password;
        $auth = Auth::guard('customer')->user();

            if (!Hash::check($current_pass, $auth->password)){
                return back()->with('error', 'Current Password Is Wrong');
            }
            else{

                CustomerModel::find($auth->id)->update([
                    'password'=>bcrypt($pass),
                ]);
            }

        return back()->with('success', ' Password Updated Successfully');
    }
}
