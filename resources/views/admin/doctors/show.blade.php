@extends('layouts.backend')
@section('breadcrumb') {{$doctor->name}} @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h3>Doctor Details</h3>
                </div>
                
                <div class="card-body table-responsive">
                   <table class="table">
                       <tbody>
                            <tr><td><strong>ID:</strong></td><td class="text-left">{{$doctor->id}}</td></tr>
                          <tr><td><strong>Name:</strong></td><td class="text-left">{{$doctor->name}}</td><td rowspan="7"><img src="{{asset($doctor->image)}}" alt="" class="d-block mx-auto" style="width:280px;"></td></tr>
                           <tr><td><strong>Email:</strong></td><td class="text-left"><a href="mailto:{{$doctor->email}}">{{$doctor->email}}</a></td></tr>
                           <tr><td><strong>Phone:</strong></td><td class="text-left">{{$doctor->phone}}</td></tr>
                           <tr><td><strong>Specialization:</strong></td><td class="text-left">{{$doctor->doctor->specialization}}</td></tr>
                           <tr><td><strong>Detail:</strong></td><td class="text-left">{{$doctor->doctor->detail}}</td></tr>
                           <tr><td><strong>Visit Fee:</strong></td><td class="text-left">{{$doctor->doctor->visit_fee}}TK.</td></tr>  
                          <tr><td colspan="2"><a href="{{route('admin.doctors')}}" class="btn btn-primary mr-3">Back</a></tr>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
