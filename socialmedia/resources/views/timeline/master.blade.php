<!DOCTYPE html>
<html lang="en">
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    
	  <title>
      @yield('title', 'My Profile | Create Personal Information')
    </title>

    <!-- Stylesheets -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
        <link href="{{asset('assets/css/emoji.css')}}" rel="stylesheet">
        <!--Google Webfont-->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fav.png')}}"/>
	</head>
  <body>

    <!-- Header-->
	  <header id="header">
      @include('template.navbar')
    </header>
    <!--Header End-->

    <div class="container">
      @yield('content')
    </div>
    
    <br><br><br>
    @include('template.footer')
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <!-- Scripts -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>

    @stack('scripts')
  </body>
</html>