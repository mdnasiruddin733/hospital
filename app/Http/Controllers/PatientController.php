<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserDeletedNotification;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Http\Request;
use App\Providers\UserRegistered;
class PatientController extends Controller
{
    public function patients(){
        $users=User::latest()->where('role','patient')->get();
        return view("admin.patients.index",compact("users"));
    }

    public function createPatient(){
        return view("admin.patients.create");
    }

    public function storePatient(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
           
        ]);
        $password=randomPassword();
        $user=User::create([
            "name"=>$req->name,
            "role"=>"patient",
            "email"=>$req->email,
            "phone"=>$req->phone,
            "password"=>bcrypt($password)
        ]);
 
        $data=[
             "email"=>$req->email,
            "password"=>$password,
            "role"=>"patient",
            "url"=>route("login")
        ];
        $user->notify(new UserRegisteredNotification($data));
        return redirect(route("admin.patients"))->with(["type"=>"success","message"=>"A new patient is created"]);
    }

    public function showPatient($id){
        $patient=User::findOrFail($id);
        return view("admin.patients.show",compact("patient"));
    }

    public function deletePatient($id){
        
        $patient=User::findOrFail($id);
        if($patient->image!="img/avatar.png"){
            unlink($patient->image);
        }

        $patient->notify(new UserDeletedNotification());

        $patient->delete();
        return back()->with([
            "type"=>"success",
            "message"=>"Patient is deleted successfully"
        ]);
    }
}
