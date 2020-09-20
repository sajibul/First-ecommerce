<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/price-range.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/animate.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/main.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/responsive.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/toastr.min.css" rel="stylesheet">
  <script src="{{asset('frontend')}}/js/sweetalert2.all.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('frontend')}}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend')}}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="'images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend')}}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend')}}/images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body>
<!--header area-->
@include('Fontend.partials.header')
<!--banner means sliders-->
@if(Request::is('/'))
@include('Fontend.partials.banner')
@endif


  @yield('content')
<!--footer part-->
@include('Fontend.partials.footer')
    <script src="{{asset('frontend')}}/js/jquery.js"></script>
	<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}/js/jquery.scrollUp.min.js"></script>
	<script src="{{asset('frontend')}}/js/price-range.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.prettyPhoto.js"></script>
    <script src="{{asset('frontend')}}/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('js')
    <script src="{{asset('frontend')}}/js/main.js"></script>
</body>
</html>
