<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassMail;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthFrontendController extends Controller
{
    function signin(){
        if (Auth::guard('customer')->check()) {
            return redirect()->route('index');
        }

        return view('frontend.auth.signin');
    }
    function signup(){
        if (Auth::guard('customer')->check()) {
            return redirect()->route('index');
        }
        return view('frontend.auth.signup');
    }

    function customer_register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customer_models',
            'password'=>'required|min:8',
            'password_confirmation'=>['required', 'same:password'],
        ]);

        $customer = CustomerModel::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        Auth::guard('customer')->login($customer);
        return redirect()->route('index');
    }

    function sign_out(){
        Auth::guard("customer")->logout();
        return redirect()->route("index");
    }

    function customer_signin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);


        $data = CustomerModel::where('email',$request->email)->first();

        if(CustomerModel::where('email',$request->email)->exists()){
            if(Auth::guard('customer')->attempt(['email'=>$request->email,  'password'=>$request->password])){

                if (isset($request->remember) && !empty($request->remember)) {
                    setcookie('email', $request->email, time() + 3600, "/", "", false, true);
                    setcookie('password', $request->password, time() + 3600, "/", "", false, true);
                }
                else{
                    setcookie('email', "", time() - 3600, "/", "", false, true);
                    setcookie('password', "", time() - 3600, "/", "", false, true);
                }
                return redirect()->route('index')->with('logged_in', 'You Are Logged In');
            }

            else{
                return back()->with('password', 'Invalid Password');
            }
        }

        else{
            return back()->with('email', 'Email Does Not Exists');
        }
    }

    function forgetPass(){
        return view('frontend.auth.forget');
    }

    function forgetPass_mail(Request $request){
        $email = $request->email;
        if(CustomerModel::where('email', $email)->exists()){
            $code = random_int('000000', '999999');
            $id = uniqid();

            $customer = CustomerModel::where("email",$email)->first();
            $customer->update([
                "forget_pass_code"=> $code,
                "forget_pass_id"=> $id,
            ]);
            Mail::to($request->email)->send(new ForgetPassMail($customer));

            return back()->with('success', 'Please Check your email');
        }
        else{
            return back()->with('email', 'Email Does Not Exists');
        }
    }

    function pass_change($uniqid){
        $data = CustomerModel::where("forget_pass_id",$uniqid)->first();
        if($data){
            return view('frontend.auth.change_pass',compact("uniqid", "data"));
        }
        else{
            return redirect()->route("signup");
        }
    }

    function pass_update(Request $request, $uniqid){
        $request->validate([
            'password'=>'required|min:8',
            'password_confirmation'=>['required', 'same:password'],
        ]);

        $data = CustomerModel::where("forget_pass_id",$uniqid)->first();
        $data->update([
            'password'=> bcrypt($request->password),
        ]);
        $data->update([
            'forget_pass_id'=> null,
        ]);

        return redirect()->route('index')->with('success', 'Your Password Changed');

    }



}
