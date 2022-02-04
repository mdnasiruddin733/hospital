  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">{{settings()->address}}</p>
          <a href="mailto:{{settings()->email}}" class="footer-link">{{settings()->email}}</a>,
          <a href="tel:{{settings()->phone}}" class="footer-link">{{settings()->phone}}</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            @foreach(medias() as $media)
            <a href="{{$media->link}}" target="_blank"><span class="{{$media->icon}}"></span></a>
            @endforeach
            
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; {{date('Y')}} <a href="{{url('/')}}" target="_blank">{{settings()->short_name}}</a>. All right reserved</p>
    </div>
  </footer>