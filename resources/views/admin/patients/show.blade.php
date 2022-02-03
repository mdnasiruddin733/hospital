@extends('layouts.backend')
@section('breadcrumb') {{$patient->name}} @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h3>Patient Details</h3>
                </div>
                
                <div class="card-body table-responsive">
                   <table class="table">
                       <tbody>
                            <tr><td><strong>ID:</strong></td><td class="text-left">{{$patient->id}}</td></tr>
                          <tr><td><strong>Name:</strong></td><td class="text-left">{{$patient->name}}</td><td rowspan="7"><img src="{{asset($patient->image)}}" alt="" class="d-block mx-auto" style="width:280px;"></td></tr>
                           <tr><td><strong>Email:</strong></td><td class="text-left"><a href="mailto:{{$patient->email}}">{{$patient->email}}</a></td></tr>
                           <tr><td><strong>Phone:</strong></td><td class="text-left">{{$patient->phone}}</td></tr>
                          <tr><td colspan="2"><a href="{{route('admin.patients')}}" class="btn btn-primary mr-3">Back</a></tr>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
