@extends("layouts.frontend")
@section("breadcrumb","Doctors")
@section("breadcrumb-title","Our Doctors")
@section("content")
<div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-2">
             <div class="mb-4">
                 <img src="{{asset($doctor->image)}}" alt="" style="width:315px;height:300px;">
             </div>

             @auth
             <a href="{{route('frontend.appoint',$doctor->id)}}" class="btn btn-primary">Book Appointment</a>
             <a href="{{$doctor->doctor->meet_link}}" class="btn btn-primary">Meet Doctor</a>
             @else 
                <a href="{{route('login')}}" class="btn btn-success">Login first to book an appointment</a>
             @endauth
        </div>
        <div class="col-lg-6 mb-2">
            <table class="table">
                <tr>
                    <th>Name:</th>
                    <td>{{$doctor->name}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><a href="mailto:{{$doctor->email}}">{{$doctor->email}}</a></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{$doctor->phone}}</td>
                </tr>
                <tr>
                    <th>Specialization:</th>
                    <td>{{$doctor->doctor->specialization}}</td>
                </tr>
                <tr>
                    <th>Visit Fee:</th>
                    <td>{{$doctor->doctor->visit_fee}}TK.</td>
                </tr>
                <tr>
                    <th>Day:</th>
                    <td>{{$doctor->doctor->day}}</td>
                </tr>
                <tr>
                    <th>Time:</th>
                    <td>{{$doctor->doctor->time}}</td>
                </tr>
                <tr>
                    <th>Room:</th>
                    <td>{{$doctor->doctor->room}}</td>
                </tr>
                <tr>
                    <th>Details:</th>
                    <td>{!! $doctor->doctor->detail !!}</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
</div>
@endsection