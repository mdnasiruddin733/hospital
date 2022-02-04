<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use App\Rules\CurrentPasswordNotMatched;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function index(){
       if(Auth::user()->role=="doctor"){
            return view("doctor.profile");
       }else if(Auth::user()->role=="admin"){
             return view("admin.profile");
       }else if(Auth::user()->role=="patient"){
             return view("patient.profile");
       }
       
   }

   public function store(Request $req){
       if(Auth::user()->role=="admin" || Auth::user()->role=="patient"){
           $this->validate($req,[
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "image"=>"nullable|image|max:20480"]
           );
       }else{
                $this->validate($req,[
                    "name"=>"required",
                    "email"=>"required|email",
                    "phone"=>"required",
                    "whatsapp"=>"required",
                    "meet_link"=>"required|url",
                    "room"=>"required",
                    "day"=>"required",
                    "time"=>"required",
                    "visit_fee"=>"required",
                    "detail"=>"required",
                    "specialization"=>"required",
                    "image"=>"nullable|image"
            ]);
       }
       
       $user=User::findOrFail(Auth::user()->id);
       if($req->image){
           if($user->image!="img/avatar.png"){
              $user->image=upload($req->image,"users",$user->image);
           }
           $user->image=upload($req->image,"users");
       }
       $user->email=$req->email;
       $user->name=$req->name;
       $user->phone=$req->phone;
       $user->save();

       
       if(Auth::user()->role=="doctor"){
            $doctor=Doctor::where("user_id",$user->id)->first();
            $doctor->whatsapp=$req->whatsapp;
            $doctor->meet_link=$req->meet_link;
            $doctor->room=$req->room;
            $doctor->day=$req->day;
            $doctor->time=$req->time;
            $doctor->visit_fee=$req->visit_fee;
            $doctor->detail=$req->detail;
            $doctor->specialization=$req->specialization;
            $doctor->save();
       }
        
        
        return back()->with([
            "type"=>"success",
            "message"=>"Your profile updated successfully"
        ]);
   }


   public function changePassword(){
       return view("doctor.change-password");
   }

   public function resetPassword(Request $req){
        $this->validate($req,
        [
            "current_password"=>["required",new CurrentPasswordNotMatched],
            "password"=>"required|min:6|confirmed"
        ]);

        if($req->password===$req->password_confirmation){
            $user=User::findOrFail(Auth::user()->id);
            $user->password=bcrypt($req->password);
            $user->save();
            return back()->with([
                "type"=>"success",
                "message"=>"Your password is changed successfully"
            ]);
        }

   }
}
