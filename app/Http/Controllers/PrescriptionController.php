<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prescription;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Models\Appointment;
class PrescriptionController extends Controller
{
    public function index(){
        $prescriptions=Prescription::where("patient_id",Auth::user()->id)->get();
        return view("patient.prescriptions.index",compact("prescriptions"));
    }

    public function show($id){
        $prescription=Prescription::findOrFail($id);
        return view("patient.prescriptions.show",compact('prescription'));
    }

    public function download($id){
        
        $prescription=Prescription::findOrFail($id);
        $data=[
            "hospital_name"=>settings()->name,
            "hospital_logo"=>public_path()."/".settings()->logo,
            "hospital_email"=>settings()->email,
            "hospital_phone"=>settings()->phone,
            "hospital_address"=>settings()->address,

            "patient_name"=>getPatientFromAppointment($prescription->patient_id)->name,
            "disease"=>$prescription->disease,
            "symptoms"=>$prescription->symptoms,
            "medicine"=>$prescription->medicine,
            "procedure"=>$prescription->procedure,
            "doctor_name"=>getPatientFromAppointment($prescription->doctor_id)->name,
            "date"=>$prescription->created_at->format("d/m/Y")
        ];
        $pdf=Pdf::loadView("patient.prescriptions.pdf",$data);
        return $pdf->download("prescription.pdf");
    }

    public function appointments(){
         $appointments=Appointment::latest()->where('patient_id',Auth::user()->id)->get();
         return view("patient.appointments",compact('appointments'));
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
}
