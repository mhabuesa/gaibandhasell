<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    function users(){
        $users = User::where('role', 'author')->get();
        return view('backend.user.users',compact('users'));
    }

    function add_user(){
        return view('backend.user.add_user');
    }

    function user_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'role'=>'author',
        ]);

        return redirect()->route('users')->with('success','User Created Successfully');
    }

    function user_edit($id){
        $user = User::find($id);
        return view('backend.user.edit_user',compact('user'));
    }

    function user_update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
        ]);

        $user = User::find($id);

        if($request->email == $user->email){
            if($request->password == ''){
                User::find($id)->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                ]);
            }
            else{
                User::find($id)->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> bcrypt($request->password),
                ]);
            }

        }

        else{
            $request->validate(['email'=>'unique:users']);
            if($request->password == ''){
                User::find($id)->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                ]);
            }
            else{
                User::find($id)->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> bcrypt($request->password),
                ]);
            }
        }
        return back()->with('success','User Update Successfully');
    }
}
