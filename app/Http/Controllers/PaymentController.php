<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Rules\PatientNotFound;
use Illuminate\Http\Request;
use App\Models\User;
class PaymentController extends Controller
{
    public function index(){
        $payments=Payment::latest()->get();
        return view("payments.index",compact('payments'));
    }

    public function create(){
        return view("payments.create");
    }

    public function store(Request $req){
        $this->validate($req,
        [
            "patient_id"=>["required", new PatientNotFound],
            "amount"=>"required",
            "status"=>"required",
            "details"=>"nullable|max:100"
        ]);
        $patient=User::find($req->patient_id);
        $payment=new Payment();
        $payment->patient_id=$patient->id;
        $payment->patient_name=$patient->name;
        $payment->patient_email=$patient->email;
        $payment->patient_phone=$patient->phone;
        $payment->amount=$req->amount;
        $payment->details=$req->details;
        $payment->status=$req->status;
        $payment->save();
        return redirect(route("backend.payments"))->with(
            ["type"=>"success",
            "message"=>"Payment created successfully"]
        );
        
    }

    public function edit($id){
        $payment=Payment::findOrFail($id);
        return view("payments.edit",compact('payment'));
    }

    public function update(Request $req){
        $this->validate($req,
        [
            "id"=>"required",
            "patient_id"=>["required", new PatientNotFound],
            "amount"=>"required",
            "status"=>"required",
            "details"=>"nullable|max:100"
        ]);
        $patient=User::find($req->patient_id);
        $payment=Payment::findOrFail($req->id);
        $payment->patient_id=$patient->id;
        $payment->patient_name=$patient->name;
        $payment->patient_email=$patient->email;
        $payment->patient_phone=$patient->phone;
        $payment->amount=$req->amount;
        $payment->status=$req->status;
        $payment->details=$req->details;
        $payment->save();
        return redirect(route("backend.payments"))->with(
            ["type"=>"success",
            "message"=>"Payment updated successfully"]
        );
        
    }


    public function delete($id){
         $payment=Payment::findOrFail($id);
         $payment->delete();
          return redirect(route("backend.payments"))->with(
            ["type"=>"success",
            "message"=>"Payment deleted successfully"]
        );
    }

    public function showMyPayments(){
        $payments=Payment::where("patient_id",Auth::user()->id)->get();
        return view("payments.patient-view",compact('payments'));
    }

    public function pay($id){
        $payment=Payment::where("id",$id)->where("patient_id",Auth::user()->id)->firstOrFail();
        $payment->status="Completed";
        $payment->save();
        return redirect(route("patient.my-payments"))->with(
            ["type"=>"success",
            "message"=>"Payment completed successfully"]
        );
    }
}
