  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span>{{settings()->phone}}</a>
              <span class="divider">|</span>
              <a href="mailto:{{settings()->email}}"><span class="mai-mail text-primary"></span>{{settings()->email}}</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              @foreach(medias() as $media)
              <a href="{{$media->link}}"><span class="{{$media->icon}}"></span></a>
              @endforeach
              
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">{{settings()->short_name}}</span></a>

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
            <li class="nav-item {{linkActive('frontend.index')}}">
              <a class="nav-link" href="{{route('frontend.index')}}">Home</a>
            </li>
            <li class="nav-item  {{linkActive('frontend.about')}}">
              <a class="nav-link" href="{{route('frontend.about')}}">About Us</a>
            </li>
            <li class="nav-item  {{linkActive('frontend.doctors')}}">
              <a class="nav-link" href="{{route('frontend.doctors')}}">Doctors</a>
            </li>
            <li class="nav-item  {{linkActive('frontend.news')}}">
              <a class="nav-link" href="{{route('frontend.news')}}">News</a>
            </li>
            <li class="nav-item  {{linkActive('frontend.contact')}}">
              <a class="nav-link" href="{{route('frontend.contact')}}">Contact</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            @endguest
            @auth
             <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Dashboard</a>
            </li>
            @endauth


          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>