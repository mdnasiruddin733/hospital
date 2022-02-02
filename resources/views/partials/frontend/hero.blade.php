@if(Request::is('/'))
<div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('frontend')}}/assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>
@else
<div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('frontend')}}/assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        @yield('bredcrumb')
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div>
@endif