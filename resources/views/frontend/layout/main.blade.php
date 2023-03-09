<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title',"{{env('APP_NAME')}}")</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <meta http-equiv="X-UA-Compatible" content="id=edge"> --}}
<!--===============================================================================================-->	
	{{-- <meta property="og:title" content="@yield('ogtitle')">
	<meta property="og:description" content="@yield('description')">
	<meta property="og:image" content="@yield('image')">
	<meta property="og:keywords" content="@yield('keywords')"> --}}
	<!-- For Google -->
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<meta name="author" content="" />
	<meta name="copyright" content="" />
	<meta name="application-name" content="" />

	<!-- For Facebook -->
	<meta property="og:title" content="@yield('og_title')" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="@yield('og_image')" />
	<meta property="og:url" content="{{url('')}}" />
	<meta property="og:description" content="@yield('og_description')" />

	<!-- For Twitter -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="@yield('twitter_title')" />
	<meta name="twitter:description" content="@yield('twitter_description')" />
	<meta name="twitter:image" content="@yield('twitter_image')" />
<!--===============================================================================================-->	
	<link rel="icon" type="{{url('')}}/frontend/image/png" href="{{url('')}}/frontend/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('')}}/frontend/css/main.css">
<!--===============================================================================================-->
{{-- font khmer  --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300&display=swap" rel="stylesheet">

</head>
<body class="animsition">

    @include('frontend.layout.inc.header')
    @yield('contents')
    @include('frontend.layout.inc.footer')

<!--===============================================================================================-->	
    <script src="{{url('')}}/frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="{{url('')}}/frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="{{url('')}}/frontend/vendor/bootstrap/js/popper.js"></script>
    <script src="{{url('')}}/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="{{url('')}}/frontend/js/main.js"></script>
    
</body>
</html>