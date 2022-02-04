@extends("layouts.frontend")
@section("breadcrumb","Contact")
@section("breadcrumb-title","Contact Us")
@section("styles")
<style>
    iframe{
        width:100%;
    }
</style>
@endsection
@section("content")
<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Get in Touch</h1>
      <form class="contact-form mt-5" method="post" action="{{route("frontend.mail")}}">
          @csrf
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            <label for="fullName">Name</label>
            <input type="text" name="name" id="fullName" class="form-control" placeholder="Full name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
            <label for="emailAddress">Email</label>
            <input type="text" name="email" id="emailAddress" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn" style="visibility: visible; animation-name: zoomIn;">Send Message</button>
      </form>
    </div>
</div>

<div class="maps-container wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
   {!! settings()->map !!}
</div>
@endsection