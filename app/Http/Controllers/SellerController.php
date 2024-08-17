<?php

namespace App\Http\Controllers;

use App\Models\StoreModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function sellers(){
        $sellers = User::where('role', 'seller')->get();
        return view("backend.seller.sellers",compact("sellers"));
    }

    function seller_edit($id){
        $seller = User::find($id);
        return view("backend.seller.seller_edit",compact("seller"));
    }


    function seller_update(Request $request, $id){
        $request->validate([
            "name"=> 'required',
            "email"=> 'required',
            "phone"=> 'required',
            "dob"=> 'required',
            "nid"=> 'required',
        ]);
        $seller = User::find($id);

        if($request->photo){

            if($request->email == $seller->email){

                if($request->password == ''){

                    unlink(public_path('uploads/profile/'.$seller->photo));

                    $photo = ImageProcess($request->photo);
                    $photo_extension = $request->photo->extension();
                    $photo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $photo_extension;
                    $photo->resize(420, 420)->save(public_path('uploads/profile/'.$photo_name));

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        "photo"=> $photo_name,
                    ]);
                }
                else{

                    // unlink(public_path('uploads/profile/'.$seller->photo));

                    $photo = ImageProcess($request->photo);
                    $photo_extension = $request->photo->extension();
                    $photo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $photo_extension;
                    $photo->resize(420, 420)->save(public_path('uploads/profile/'.$photo_name));

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        "photo"=> $photo_name,
                       'password'=>bcrypt($request->password),
                    ]);

                }
            }

            else{

                $request->validate([
                    'email'=>'unique:users'
                ]);

               if($request->password == ''){

                    unlink(public_path('uploads/profile/'.$seller->photo));

                    $photo = ImageProcess($request->photo);
                    $photo_extension = $request->photo->extension();
                    $photo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $photo_extension;
                    $photo->resize(420, 420)->save(public_path('uploads/profile/'.$photo_name));

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        "photo"=> $photo_name,
                    ]);
               }
               else{

                    unlink(public_path('uploads/profile/'.$seller->photo));

                    $photo = ImageProcess($request->photo);
                    $photo_extension = $request->photo->extension();
                    $photo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $photo_extension;
                    $photo->resize(420, 420)->save(public_path('uploads/profile/'.$photo_name));

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        "photo"=> $photo_name,
                        'password'=>bcrypt($request->password),
                    ]);
               }
            }
        }


        else{


            if($request->email == $seller->email){

                if($request->password == ''){

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                    ]);
                }
                else{
                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        'password'=>bcrypt($request->password),
                    ]);
                }
            }
            else{

                $request->validate([
                    'email'=>'unique:users'
                ]);

                if($request->password == ''){

                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                    ]);
                }
                else{
                    User::find($id)->update([
                        "name"=> $request->name,
                        "email"=> $request->email,
                        "phone"=> $request->phone,
                        "dob"=> $request->dob,
                        "nid"=> $request->nid,
                        'password'=>bcrypt($request->password),
                    ]);
                }




            }


        }

        return back()->with("success","Seller Update Successful");
    }

    function seller_delete($id){

        $seller = User::find($id);
       if(Auth::user()->id == $id){

            return back()->with('error',"You don't Delete yourself");
       }
       else{
            $store = StoreModel::where('seller_id', $seller->id)->first();
            unlink(public_path('uploads/store/'.$store->logo));
            $store->delete();

            unlink(public_path('uploads/profile/'.$seller->photo));
            $seller->delete();

            return back()->with('success',"Seller Delete Successful");

       }


    }
}
