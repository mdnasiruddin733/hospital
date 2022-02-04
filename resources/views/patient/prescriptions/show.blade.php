@extends('layouts.backend')
@section('breadcrumb') Prescription @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h3>Prescription Details</h3>
                </div>
                
                <div class="card-body table-responsive">
                   <table class="table">
                       <tbody>
                         <tr><td><strong>Doctor ID:</strong></td><td class="text-left">{{$prescription->doctor_id}}</td></tr>
                         @php $doctor=getDoctorFromAppointment($prescription->doctor_id); @endphp
                          <tr><td><strong>Doctor Name:</strong></td><td class="text-left">{{$doctor->name}}</td><td rowspan="7"><img src="{{asset($doctor->image)}}" alt="" class="d-block mx-auto" style="width:280px;height:280px;"></td></tr>
                           <tr><td><strong>Doctor Email:</strong></td><td class="text-left"><a href="mailto:{{$doctor->email}}">{{$doctor->email}}</a></td></tr>
                           <tr><td><strong>Doctor Phone:</strong></td><td class="text-left"><a href="tel:{{$doctor->phone}}">{{$doctor->phone}}</a></td></tr>
                           <tr><td><strong>Your Symptoms:</strong></td><td class="text-left">{{$prescription->symptoms}}</td></tr>
                           <tr><td><strong>Your Disease:</strong></td><td class="text-left">{{$prescription->disease}}</td></tr>
                           <tr><td><strong>Your Medicine:</strong></td><td class="text-left">{{$prescription->medicine}}</td></tr>
                           <tr><td><strong>Procedure to take medicine:</strong></td><td class="text-left">{!! $prescription->procedure !!}</td></tr>
                            <tr><td colspan="2">
                              <a href="{{route('patient.prescriptions')}}" class="btn btn-primary mr-3">Back</a>
                              <a href="{{route('patient.prescription.download',$prescription->id)}}" class="btn btn-primary mr-3">Download Prescription</a>
                            </tr>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
