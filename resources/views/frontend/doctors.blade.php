@extends("layouts.frontend")
@section("breadcrumb","Doctors")
@section("breadcrumb-title","Our Doctors")
@section("content")
<div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
          <div class="row justify-content-center">
            @foreach($doctors as $doctor)
            <div class="col-md-6 col-lg-4 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{$doctor->image}}" alt="Doctor's image">
                  <div class="meta text-center">
                    <p class="text-xl text-white mb-0">{{$doctor->name}}</p>
                    <span class="text-sm  text-white mb-2">{{$doctor->doctor->specialization}}</span>
                    <a href="tel:{{$doctor->phone}}"><span class="mai-call"></span></a>
                    <a href="https://wa.me/{{$doctor->doctor->whatsapp}}"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body text-center">
                  <a href="{{route('frontend.doctor.details',$doctor->id)}}" class="btn btn-primary btn-block">See Details</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>
@endsection