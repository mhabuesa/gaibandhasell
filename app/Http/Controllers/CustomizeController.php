<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\ContactInfoModel;
use App\Models\HeaderShortTextModel;
use App\Models\LogoModel;
use Illuminate\Http\Request;

class CustomizeController extends Controller
{
    public function shortText(){
        $texts = HeaderShortTextModel::all();
        return view('backend.customize.short_text', [
            'texts'=>$texts,
        ]);
    }
    function shortText_store(Request $request){
        $request->validate([
            'text'=>'required'
        ]);

        HeaderShortTextModel::create([
            'text'=>$request->text,
            'link'=>$request->link,
        ]);
        return back()->with('success', 'Data Submitted Successfully');
    }

    function shortText_update(Request $request, $id){
        $request->validate([
            'text'=>'required'
        ]);

        HeaderShortTextModel::find($id)->update([
            'text'=>$request->text,
            'link'=>$request->link,
        ]);
        return back()->with('success', 'Data Update Successfully');
    }

    function shortText_status($id){
        $status = HeaderShortTextModel::find($id);

        if($status->status == 1){
            $status->update([
                'status'=>'0'
            ]);
        }
        else{

            $status->update([
                'status'=>'1'
            ]);
        }
        return back()->with('success', 'Status Update Successfully');
    }

    function shortText_delete($id){
        HeaderShortTextModel::find($id)->delete();
        return back()->with('success', 'Status Delete Successfully');
    }

    // Logo
    function logo(){
        $logo = LogoModel::find(1);
        return view('backend.customize.logo', [
            'logo'=>$logo,
        ]);
    }

    function mainLogo_update(Request $request){
        $request->validate([
            'main_logo'=>'required'
        ]);
        $logo = LogoModel::find(1);

        $current_img = public_path('uploads/logo/'.$logo->main_logo);
        unlink($current_img);

        $logo = $request->main_logo;
        $image = ImageProcess($logo);
        $extension = $logo->extension();
        $image_name = 'main_logo'.'.'. $extension;
        $image->save(public_path('uploads/logo/'.$image_name));

        LogoModel::find(1)->update([
            'main_logo'=>$image_name,
        ]);
        return back()->with('success', 'Main Logo Update Successfully');
    }
    function footerLogo_update(Request $request){
        $request->validate([
            'footer_logo'=>'required'
        ]);
        $logo = LogoModel::find(1);

        $current_img = public_path('uploads/logo/'.$logo->footer_logo);
        unlink($current_img);

        $logo = $request->footer_logo;
        $image = ImageProcess($logo);
        $extension = $logo->extension();
        $image_name = 'footer_logo'.'.'. $extension;
        $image->save(public_path('uploads/logo/'.$image_name));

        LogoModel::find(1)->update([
            'footer_logo'=>$image_name,
        ]);
        return back()->with('success', 'Footer Logo Update Successfully');
    }





    function contactInfo(){
        $info = ContactInfoModel::find(1);
        return view('backend.customize.contact_info', compact('info'));
    }
    function contactInfo_update(Request $request){
        $request->validate([
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'about_us'=>'required',
        ]);
        ContactInfoModel::find(1)->update([
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'about_us'=>$request->about_us,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'linkedin'=>$request->linkedin,
        ]);
        return back()->with('success', 'Info Update Successfully');
    }

    function banner(){
        $banners = BannerModel::all();
        return view('backend.customize.banner', compact('banners'));
    }
    function banner_store(Request $request){
        $request->validate([
            'sub_title'=>'required|max:30',
            'title'=>'required|max:35',
            'text'=>'max:50',
            'sub_text'=>'max:50',
            'link'=>'required',
            'image'=>'required|image|dimensions:width=1920,height=637',
        ]);

        $img = $request->image;
        $image = ImageProcess($img);
        $extension = $img->extension();
        $image_name = 'banner'.'_'.random_int(000,999).'.'. $extension;
        $image->resize(1920,637)->save(public_path('uploads/banner/'.$image_name));

        BannerModel::create([
            'sub_title'=>$request->sub_title,
            'title'=>$request->title,
            'text'=>$request->text,
            'sub_text'=>$request->sub_text,
            'link'=>$request->link,
            'image'=>$image_name,
        ]);

        return back()->with('success', 'Banner Insert Successfully');
    }

    function banner_edit($id){
        $banner = BannerModel::find($id);
        return view('backend.customize.banner_edit', compact('banner'));
    }
    function banner_update(Request $request, $id){
        $banner = BannerModel::find($id);
        $request->validate([
            'sub_title'=>'required|max:30',
            'title'=>'required|max:35',
            'text'=>'max:50',
            'sub_text'=>'max:50',
            'link'=>'required',
            'image'=>'image',
        ]);

        if($request->image){
            $current_img = public_path('uploads/banner/'.$banner->image);
            unlink($current_img);

            $img = $request->image;
            $image = ImageProcess($img);
            $extension = $img->extension();
            $image_name = 'banner'.'_'.random_int(000,999).'.'. $extension;
            $image->resize(1920,637)->save(public_path('uploads/banner/'.$image_name));

            BannerModel::find($id)->update([
                'sub_title'=>$request->sub_title,
                'title'=>$request->title,
                'text'=>$request->text,
                'sub_text'=>$request->sub_text,
                'link'=>$request->link,
                'image'=>$image_name,
            ]);
        }
        else{
            BannerModel::find($id)->update([
                'sub_title'=>$request->sub_title,
                'title'=>$request->title,
                'text'=>$request->text,
                'sub_text'=>$request->sub_text,
                'link'=>$request->link,
            ]);

        }
        return back()->with('success', 'Banner Update Successfully');
    }

    function banner_status($id){
        $allBanner = BannerModel::where('status', '1')->get();
        $banner = BannerModel::find($id);


            if($banner->status == 1){
                if($allBanner->count() <= 1){
                    return back()->with('error', 'Minimum 1 Banner Mandatory');
                }
                else{
                    BannerModel::find($id)->update([
                        'status'=>'0'
                    ]);
                }
            }
            else{
                BannerModel::find($id)->update([
                    'status'=>'1'
                ]);
            }
            return back()->with('success', 'Banner Status Changed');

    }

    function banner_delete($id){
        $allBanner = BannerModel::all();
        if($allBanner->count() <= 1){
            return back()->with('error', 'Minimum 1 Banner Mandatory');
        }
        else{
            $banner = BannerModel::find($id);
            $current_img = public_path('uploads/banner/'.$banner->image);
            unlink($current_img);
            $banner->delete();

            return back()->with('success', 'Banner Delete Successfully');

        }
        die();

    }
}
