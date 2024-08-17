<?php

namespace App\Http\Controllers;

use App\Models\StoreModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StoreController extends Controller
{
    protected $manager;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->manager = new ImageManager(new Driver());
    }

    public function stores(){
        $stores = StoreModel::all();
        return view('backend.store.store', compact('stores'));
    }
    public function add_store(){
        $users = User::all();
        return view('backend.store.add_store', compact('users'));
    }

    public function store_add(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:users',
            'dob'=>'required',
            'nid'=>'required',
            'photo'=>'required',
            'password'=>'required',
            'store_name'=>'required',
            'address'=>'required',
        ]);

        $clean_storeName = preg_replace('/[^A-Za-z0-9\- ]/', '', $request->store_name);
        $replace = str_replace(' ', '', $clean_storeName);
        $slug = $replace .random_int(00, 99);

        $photo_extension = $request->photo->extension();
        $photo_name = str_replace(' ', '_', $request->name). random_int('0000','9999') .'.'. $photo_extension;
        $photo = $this->manager->read($request->photo);
        $photo->resize(420, 420)->save(public_path('uploads/profile/'.$photo_name));


        if($request->logo == ''){
            $sellerId = User::insertGetId([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'dob'=>$request->dob,
                'nid'=>$request->nid,
                'photo'=>$photo_name,
                'password'=>bcrypt($request->password),
                'role'=>'seller',
                'created_at'=>Carbon::now(),
            ]);
            StoreModel::create([
                'store_name'=> $request->store_name,
                'seller_id'=> $sellerId,
                'address'=> $request->address,
                'phone'=>$request->store_phone,
                'email'=>$request->store_email,
                'facebook'=> $request->facebook,
                'slug'=>$slug,
            ]);
        }

        else{

            $logo_extension = $request->logo->extension();
            $logo_name = $replace. random_int('0000','9999') .'.'. $logo_extension;
            $logo = $this->manager->read($request->logo);
            $logo->resize(320, 320)->save(public_path('uploads/store/'.$logo_name));


            $sellerId = User::insertGetId([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'dob'=>$request->dob,
                'nid'=>$request->nid,
                'photo'=>$photo_name,
                'password'=>bcrypt($request->password),
                'role'=>'seller',
                'created_at'=>Carbon::now(),
            ]);
            StoreModel::create([
                'logo'=> $logo_name,
                'store_name'=> $request->store_name,
                'seller_id'=> $sellerId,
                'address'=> $request->address,
                'phone'=>$request->store_phone,
                'email'=>$request->store_email,
                'facebook'=> $request->facebook,
                'slug'=>$slug,
            ]);


        }

          return back()->with('success','Store Created Successfully');
    }

    public function store_status($id){
        $status = StoreModel::where('id', $id)->first()->status;

        if($status == 1){
            StoreModel::where('id', $id)->update(['status'=> 0]);
            return back()->with('success','Store Disable');
        }

        else{
            StoreModel::where('id', $id)->update(['status'=> 1]);
            return back()->with('success','Store Enable');
        }
    }


    public function delete_store($id)
    {
        $store = StoreModel::find($id);
        $seller = User::where('id', $store->seller_id)->first();

        if($store->logo == null){

            unlink(public_path('uploads/profile/'.$seller->photo));
            $seller->delete();
            $store->delete();
        }
        else{
            unlink(public_path('uploads/profile/'.$seller->photo));
            $seller->delete();

            unlink(public_path('uploads/store/'.$store->logo));
            $store->delete();
        }

        return back()->with('success','Store Deleted Successfully');

    }


    public function store_details($id){
        $store = StoreModel::find($id);
        return view('backend.store.store_details',compact('store'));
    }

    public function store_edit($id){
        $store = StoreModel::find($id);

        return view('backend.store.store_edit',compact('store'));
    }

    public function stores_update(Request $request, $id){

        $request->validate([
            'store_name'=>'required',
            'address'=>'required',
        ]);

        $clean_storeName = preg_replace('/[^A-Za-z0-9\- ]/', '', $request->store_name);
        $replace = str_replace(' ', '', $clean_storeName);
        $slug = $replace .random_int(00, 99);


        $store = StoreModel::find($id);

        if($request->hasFile('logo')){

            if($store->logo == null){

                $logo_extension = $request->logo->extension();
                $logo_name = $replace. random_int('0000','9999') .'.'. $logo_extension;
                $logo = $this->manager->read($request->logo);
                $logo->resize(320, 320)->save(public_path('uploads/store/'.$logo_name));

                $store->update([
                    'logo'=>$logo_name,
                    'store_name'=> $request->store_name,
                    'address'=> $request->address,
                    'phone'=>$request->store_phone,
                    'email'=>$request->store_email,
                    'facebook'=> $request->facebook,
                    'slug'=>$slug,
                ]);

            }

            else{

                unlink(public_path('uploads/store/'.$store->logo));

                $clean_storeName = preg_replace('/[^A-Za-z0-9\- ]/', '', $request->store_name);
                $replace = str_replace(' ', '', $clean_storeName);

                $logo_extension = $request->logo->extension();
                $logo_name = $replace. random_int('0000','9999') .'.'. $logo_extension;
                $logo = $this->manager->read($request->logo);
                $logo->resize(320, 320)->save(public_path('uploads/store/'.$logo_name));

                $store->update([
                    'logo'=>$logo_name,
                    'store_name'=> $request->store_name,
                    'address'=> $request->address,
                    'phone'=>$request->store_phone,
                    'email'=>$request->store_email,
                    'facebook'=> $request->facebook,
                    'slug'=>$slug,
                ]);
            }


        }
        else{
            $store->update([
                'store_name'=> $request->store_name,
                    'address'=> $request->address,
                    'phone'=>$request->store_phone,
                    'email'=>$request->store_email,
                    'facebook'=> $request->facebook,
                    'slug'=>$slug,
            ]);
        }

        return back()->with('success','Store Updated Successfully');
    }
}
