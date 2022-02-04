@if(Request::is('/'))
<div class="page-hero bg-image overlay-dark" style="background-image: url({{settings()->banner}});">
    <div class="hero-section">
      <div class="container text-center wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>
@else
<div class="page-banner overlay-dark bg-image" style="background-image: url({{settings()->banner}});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">@yield('breadcrumb-title')</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div>
@endif