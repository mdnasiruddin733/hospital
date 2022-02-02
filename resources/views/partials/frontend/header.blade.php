
  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="tel:{{siteData()->site_phone}}"><span class="mai-call text-primary"></span>{{siteData()->site_phone}}</a>
              <span class="divider">|</span>
              <a href="mailto:{{siteData()->site_email}}"><span class="mai-mail text-primary"></span>{{siteData()->site_email}}</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">{{siteData()->site_name}}</span></a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item @yield('home')">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item @yield('about-us')">
              <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
            </li>
            <li class="nav-item @yield('doctors')">
              <a class="nav-link" href="{{url('/doctor')}}">Doctors</a>
            </li>
            <li class="nav-item @yield('news')">
              <a class="nav-link" href="{{url("/news")}}">News</a>
            </li>
            <li class="nav-item @yield('contact')">
              <a class="nav-link" href="{{url("/contact-us")}}">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{url('/login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{url('/register')}}">Register</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>








