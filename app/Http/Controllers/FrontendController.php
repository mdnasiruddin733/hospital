<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\PatientNotFoundForAppointment;
use Illuminate\Support\Facades\Auth;
class FrontendController extends Controller
{
  public function index(){
    $doctors=User::latest()->where("role","doctor")->get();
      return view("frontend.index",compact('doctors'));
  }

  public function about(){
    $doctors=User::latest()->where("role","doctor")->get();
      return view("frontend.about",compact("doctors"));
  }

  public function doctors(){
     $doctors=User::latest()->where("role","doctor")->get();
      return view("frontend.doctors",compact("doctors"));
  }
   public function news(){
      return view("frontend.news");
  }
   public function contact(){
      return view("frontend.contact");
  }

  public function doctorDetails($id){
    $doctor=User::where("role","doctor")->findOrFail($id);
    return view("frontend.doctor-details",compact('doctor'));
  }

  public function appoint($id){
    $doctor=User::where("role","doctor")->findOrFail($id);
    $appointment=Appointment::where("doctor_id",$id)->where("patient_id",Auth::user()->id)->first();
    if(!is_null($appointment)){
      return back()->with([
        "type"=>"error",
        "message"=>"You already have an appointment with this doctor"
      ]);
    }
    Appointment::create([
      "doctor_id"=>$id,
      "patient_id"=>Auth::user()->id
    ]);
    return back()->with([
        "type"=>"success",
        "message"=>"Appointment created successfully"
      ]);
  }

  public function appointments(){
    $appointments=Appointment::latest()->where('doctor_id',Auth::user()->id)->get();
    return view("doctor.appointments",compact('appointments'));
  }

  public function deleteAppointment($id){
    $appointment=Appointment::findOrFail($id);
    $prescription=Prescription::where("doctor_id",$appointment->doctor_id)->where("patient_id",$appointment->patient_id)->first();
    
    if(!is_null($prescription)){
      $prescription->delete();
    }
    
    $appointment->delete();
    return back()->with([
        "type"=>"success",
        "message"=>"Appointment deleted successfully"
      ]);
  }


  public function changeAppointmentStatus($id){
    $appointment=Appointment::findOrFail($id);
    if($appointment->status=="Pending"){
      $appointment->status="Completed";
    }else{
      $appointment->status="Pending";
    }
    $appointment->save();
    return back();
  }

  public function prescriptions(){
    $prescriptions=Prescription::latest()->where("doctor_id",Auth::user()->id)->get();
    return view("doctor.prescriptions.index",compact('prescriptions'));
  }

  public function createPrescription(){
    return view("doctor.prescriptions.create");
  }

  public function storePrescription(Request $req){
    $this->validate($req,[
      "patient_id"=>["required", new PatientNotFoundForAppointment],
      "disease"=>"required",
      "symptoms"=>"required",
      "medicine"=>"required",
      "procedure"=>"required",
    ]);
    $prescription=new Prescription();
    $prescription->doctor_id=Auth::user()->id;
    $prescription->patient_id=$req->patient_id;
    $prescription->disease=$req->disease;
    $prescription->symptoms=$req->symptoms;
    $prescription->medicine=$req->medicine;
    $prescription->procedure=$req->procedure;
    $prescription->save();
    return redirect(route("doctor.prescriptions"))->with([
        "type"=>"success",
        "message"=>"Prescription created successfully"
      ]);
  }

  public function editPrescription($id){
    $prescription=Prescription::findOrFail($id);
    return view("doctor.prescriptions.edit",compact('prescription'));
  }

  public function updatePrescription(Request $req){
     $this->validate($req,[
       "id"=>"required",
      "patient_id"=>["required", new PatientNotFoundForAppointment],
      "disease"=>"required",
      "symptoms"=>"required",
      "medicine"=>"required",
      "procedure"=>"required",
    ]);
    $prescription=Prescription::findOrFail($req->id);
    $prescription->doctor_id=Auth::user()->id;
    $prescription->patient_id=$req->patient_id;
    $prescription->disease=$req->disease;
    $prescription->symptoms=$req->symptoms;
    $prescription->medicine=$req->medicine;
    $prescription->procedure=$req->procedure;
    $prescription->save();
    return redirect(route("doctor.prescriptions"))->with([
        "type"=>"success",
        "message"=>"Prescription updated successfully"
      ]);
  }
}
