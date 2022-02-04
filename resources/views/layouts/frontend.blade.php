<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/maicons.css">

  <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.css">

  <link rel="stylesheet" href="{{asset('frontend')}}/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{asset('frontend')}}/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@yield("styles")
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>
    @include('partials.frontend.header')
    @include('partials.frontend.hero')

    @yield("content")

    @include("partials.frontend.bottom-banner")
    @include("partials.frontend.footer")

<script src="{{asset('frontend')}}/assets/js/jquery-3.5.1.min.js"></script>

<script src="{{asset('frontend')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('frontend')}}/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="{{asset('frontend')}}/assets/vendor/wow/wow.min.js"></script>

<script src="{{asset('frontend')}}/assets/js/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@if(Session::has('message'))
	<script>
		var toast=toastr["{{Session::get('type')}}"]("{{Session::get('message')}}")
		toast.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "slideIn",
			"hideMethod": "slideOut"
			}

	</script>
	@endif
  
</body>
</html>