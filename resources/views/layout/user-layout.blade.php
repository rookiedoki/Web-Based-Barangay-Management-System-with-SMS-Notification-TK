<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Unique</title>
<link rel="icon" href="favicon.png" type="image/png">
<link href="{{url('assets/css/User/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('assets/css/User/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('assets/css/User/font-awesome.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('assets/css/User/animation.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{url('assets/css/residents.css')}}">
<link rel="stylesheet" href="{{url('assets/css/user.css')}}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="{{url('assets/images/imgUser/logo.png')}}" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			  <li><a href="#aboutUs" class="scroll-link">About Us</a></li>
			  <li><a href="#service" class="scroll-link">Services</a></li>
			  <li><a href="#Portfolio" class="scroll-link">Portfolio</a></li>
			  <li><a href="#clients" class="scroll-link">Clients</a></li>
			  <li><a href="#team" class="scroll-link">Team</a></li>
			  <li><a href="#contact" class="scroll-link">Contact</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{auth()->user()->adminResidents->resident_image ? asset ('storage/' .auth()->user()->adminResidents->resident_image ) : asset('/storage/no/-image.png')}}" alt=""  class="imagePrevieww">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activities</a>
            <form class="inline" action="/logout" method="POST">
              @csrf
            <button class="dropdown-item" type="submit">Logout</button>
            </form>
          </div>
        </li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section-->

<!--Hero_Section-->
<section  id="service">
    <div class="container">
      <div class="service_wrapper">

        @yield('content')

      </div>
    </div>
  </section>
<!--Footer-->
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2014,    Template by <a href="http://webthemez.com">WebThemez.com</a>. </span> </div>
  </div>
</footer>

<script type="text/javascript" src="{{url('assets/js/User/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/jquery.nav.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/User/wow.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

{{-- <script type="text/javascript" src="{{url('assets/js/User/custom.js')}}"></script> --}}

</body>
</html>
