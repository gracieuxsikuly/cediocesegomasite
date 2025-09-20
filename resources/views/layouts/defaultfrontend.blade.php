<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	<!-- Meta Tags -->	
	<title>CAAH ASBL | Conseil d’Alerte et Actions Humanitaires</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Le Conseil d’Alerte et Actions Humanitaires (CAAH ASBL) est une organisation nationale intervenant dans les domaines multisectoriels : sécurité alimentaire, santé et nutrition, VBG, protection, WASH, développement et progrès culturel. Siège social : Rutshuru, bureau provisoire : Kiwanja, quartier Buturande.">
        <meta name="author" content="gracieux sikuly" />
        <meta name="keywords" content="CAAH, Conseil d’Alerte et Actions Humanitaires, ONG, ASBL, Humanitaire, Sécurité alimentaire, Santé, Nutrition, Protection, VBG, WASH, Développement, Culture, Rutshuru, Kiwanja" />
        <meta name="robots" content="index, follow">		
	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="{{asset('assets_frontend/img/favicon.png')}}">	
	<!-- Apple Touch Icons -->
	<link rel="apple-touch-icon" href="{{asset('assets_frontend/img/apple-touch-icon.png')}}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets_frontend/img/apple-touch-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets_frontend/img/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets_frontend/img/apple-touch-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets_frontend/img/apple-touch-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets_frontend/img/apple-touch-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets_frontend/img/apple-touch-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets_frontend/img/apple-touch-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets_frontend/img/apple-touch-icon-180x180.png')}}">

	<!-- Stylesheets Start -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700%7cRaleway:400,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet"> 
	<link rel="stylesheet" href="{{asset('assets_frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/progress-circle.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/meanmenu.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets_frontend/css/jquery-ui.css')}}">
	@livewireStyles()


</head>
<body>
 <!-- Live Chat Start -->
<script src="../../../../code.tidio.co_443/rdu58dqsiymikhfizchesvzwvkx6zp4f.js" async></script>
<!-- Live Chat End -->      
	<!-- Preloader Start -->
	<div id="preloader">
		<div id="preloader-status"></div>
	</div>
	<!-- Preloader End -->
	<!-- Header Start -->
	<header>
		@include('layouts.partials.headerfrontend')
	</header>
	<!-- Header End -->		
        {{ $slot ?? '' }}
	<!-- Footer Section Start -->
            @include('layouts.partials.footerfront')
	<!-- Footer Section End -->
	<!-- Scripts Js Start -->
    <script src="{{asset('assets_frontend/js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery-ui.js')}}"></script>
	<script src="{{asset('assets_frontend/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/owl.animate.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/modernizr.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/waypoints.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery.meanmenu.min.js')}}"></script>
	<script src="{{asset('assets_frontend/js/jquery.countdown.js')}}"></script>
	<script src="{{asset('assets_frontend/js/custom.js')}}"></script>
	<!-- Scripts Js End -->	
	@livewireScripts
	@stack('scripts')
</body>
</html>