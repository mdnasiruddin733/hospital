<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Notifications\UserDeletedNotification;
use App\Notifications\UserRegisteredNotification;
use App\Providers\UserRegistered;
use Faker\Core\Uuid;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctors(){
        $users=User::latest()->where('role','doctor')->get();
        return view("admin.doctors.index",compact("users"));
    }

    public function createDoctor(){
        return view("admin.doctors.create");
    }

    public function storeDoctor(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
           
        ]);
        $password=randomPassword();
        $user=User::create([
            "name"=>$req->name,
            "role"=>"doctor",
            "email"=>$req->email,
            "phone"=>$req->phone,
            "password"=>bcrypt($password)
        ]);
        $doctor=Doctor::create([
            "user_id"=>$user->id
        ]);
        $data=[
             "email"=>$req->email,
            "password"=>$password,
            "role"=>"patient",
            "url"=>route("login")
        ];
        $user->notify(new UserRegisteredNotification($data));
        return redirect(route("admin.doctors"))->with(["type"=>"success","message"=>"A new doctor is created"]);
    }

    public function showDoctor($id){
        $doctor=User::findOrFail($id);
        return view("admin.doctors.show",compact("doctor"));
    }

    public function deleteDoctor($id){
        
        $doctor=User::findOrFail($id);
        if($doctor->image!="img/avatar.png"){
            unlink($doctor->image);
        }

        $doctor->notify(new UserDeletedNotification());

        $doctor->delete();
        return back()->with([
            "type"=>"success",
            "message"=>"Doctor is deleted successfully"
        ]);
    }
}
