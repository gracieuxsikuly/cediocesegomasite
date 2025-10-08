<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Croisade Eucharistique | Mouvement spirituel des enfants et jeunes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="La Croisade Eucharistique est un mouvement spirituel catholique pour enfants, adolescents, jeunes et adulte, visant à les éduquer dans la foi, la prière, le service, le partage et l’amour de l’Eucharistie. Présente dans plusieurs paroisses et écoles, elle forme des apôtres au service de l’Église et de la société.">
        <meta name="author" content="Croisade Eucharistique, gracieux sikuly" />
        <meta name="keywords" content="Croisade Eucharistique, Mouvement catholique, Eucharistie, Enfants, Jeunes, Foi, Prière, Service, Partage, Amour, Église, Mouvement spirituel, Adoration" />
        <meta name="robots" content="index, follow">
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset_frontend/images/logoce.png') }}">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="{{asset('asset_frontend/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="{{asset('asset_frontend/css/slicknav.min.css')}}" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="{{asset('asset_frontend/css/swiper-bundle.min.css')}}">
	<!-- Font Awesome Icon Css-->
	<link href="{{asset('asset_frontend/css/all.css')}}" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="{{asset('asset_frontend/css/animate.css')}}" rel="stylesheet">
	<!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="{{asset('asset_frontend/css/magnific-popup.css')}}">
	<!-- Mouse Cursor Css File -->
	<link rel="stylesheet" href="{{asset('asset_frontend/css/mousecursor.css')}}">
    <!-- Audio Css File -->
	<link rel="stylesheet" href="{{asset('asset_frontend/css/plyr.css')}}">
	<!-- Main Custom Css -->
	<link href="{{asset('asset_frontend/css/custom.css')}}" rel="stylesheet" media="screen">
    @stack('styles')
</head>
<body>

    <!-- Preloader Start -->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="{{asset('asset_frontend/images/logoce.png')}}" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->

    <!-- Header Start -->
	@include('layouts.partials.headerfrontend')
	<!-- Header End -->

    {{-- content --}}
    {{ $slot ?? '' }}
    {{-- end content --}}

    
    <!-- Footer Start -->
    @include('layouts.partials.footerfrontend')
    <!-- Footer End -->

    <!-- Jquery Library File -->
    <script src="{{asset('asset_frontend/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap js file -->
    <script src="{{asset('asset_frontend/js/bootstrap.min.js')}}"></script>
    <!-- Validator js file -->
    <script src="{{asset('asset_frontend/js/validator.min.js')}}"></script>
    <!-- SlickNav js file -->
    <script src="{{asset('asset_frontend/js/jquery.slicknav.js')}}"></script>
    <!-- Swiper js file -->
    <script src="{{asset('asset_frontend/js/swiper-bundle.min.js')}}"></script>
    <!-- Counter js file -->
    <script src="{{asset('asset_frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('asset_frontend/js/jquery.counterup.min.js')}}"></script>
    <!-- Magnific js file -->
    <script src="{{asset('asset_frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- SmoothScroll -->
    <script src="{{asset('asset_frontend/js/SmoothScroll.js')}}"></script>
    <!-- Parallax js -->
    <script src="{{asset('asset_frontend/js/parallaxie.js')}}"></script>
    <!-- MagicCursor js file -->
    <script src="{{asset('asset_frontend/js/gsap.min.js')}}"></script>
    {{-- <script src="{{asset('asset_frontend/js/magiccursor.js')}}"></script> --}}
    <!-- Text Effect js file -->
    <script src="{{asset('asset_frontend/js/SplitText.js')}}"></script>
    <script src="{{asset('asset_frontend/js/ScrollTrigger.min.js')}}"></script>
    <!-- YTPlayer js File -->
    <script src="{{asset('asset_frontend/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <!-- Audio js File -->
    <script src="{{asset('asset_frontend/js/plyr.js')}}"></script>
    <!-- Wow js file -->
    <script src="{{asset('asset_frontend/js/wow.js')}}"></script>
    <!-- Main Custom js file -->
    <script src="{{asset('asset_frontend/js/function.js')}}"></script>
	<script src="{{asset('asset_frontend/demo.awaikenthemes.com/assets/js/theme-panel.js')}}"></script>
</body>
</html>