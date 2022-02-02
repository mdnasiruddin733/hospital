<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view("admin.settings");
    }

    public function save(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "short_name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "address"=>"required",
            "slogan"=>"required",
            "welcome_text_title"=>"required|max:100",
            "welcome_text_short"=>"required",
            "welcome_text_long"=>"required",
            "logo"=>"nullable|image|max:20480",
            "favicon"=>"nullable|image|max:20480",
            "banner"=>"nullable|image|max:20480",
        ]);
        $settings=Settings::firstOrFail();
        if($req->logo){
            if($settings->logo!="img/logo.png"){
                 $settings->logo=upload($req->logo,"settings",$settings->logo);
            }else{
                $settings->logo=upload($req->logo,"settings");
            }
        }
        if($req->favicon){
            if($settings->favicon!="img/logo.png"){
                 $settings->favicon=upload($req->favicon,"settings",$settings->favicon);
            }else{
                $settings->favicon=upload($req->favicon,"settings");
            }
        }

        if($req->banner){
            if($settings->banner!="img/banner.jpg"){
                 $settings->banner=upload($req->banner,"settings",$settings->banner);
            }else{
                $settings->banner=upload($req->banner,"settings");
            }
        }
        $settings->name=$req->name;
        $settings->short_name=$req->short_name;
        $settings->email=$req->email;
        $settings->phone=$req->phone;
        $settings->address=$req->address;
        $settings->slogan=$req->slogan;
        $settings->welcome_text_title=$req->welcome_text_title;
        $settings->welcome_text_short=$req->welcome_text_short;
        $settings->welcome_text_long=$req->welcome_text_long;

        $settings->save();

        return back()->with([
            "type"=>"success",
            "message"=>"Site settings updated successfully"
        ]);
    }
}
