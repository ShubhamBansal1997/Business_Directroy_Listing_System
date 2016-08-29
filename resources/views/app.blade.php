 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    
    <title>@yield('head_title', getcong('site_name'))</title>
    <meta name="description" content="@yield('head_description', getcong('site_description'))" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
    <meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
    <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
    <meta property="og:url" content="@yield('head_url', url('/'))" />
 
    
 
    <link href="{{ URL::asset('site_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/css/bootstrap-select.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,500,600,700,800,300,200' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800,600italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('site_assets/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" type="image/x-icon">
</head>
<body>

    @include("_particles.header")
 
    @yield("content")

    @include("_particles.footer")

 
 @if(!classActivePathSite('submit_listing'))<!-- Page Plugins -->
<script src="{{ URL::asset('site_assets/js/jquery.min.js') }}"></script>
@endif

<script src="{{ URL::asset('site_assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/nav.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('site_assets/js/bootstrap-select.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/owl.carousel.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('site_assets/js/thumbnail-slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('site_assets/js/slider.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('site_assets/js/testimonial.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/jquery.sticky.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/header-sticky.js') }}"></script>

@if(!classActivePathSite('submit_listing'))<!-- Page Plugins -->
<script src="{{ URL::asset('site_assets/js/fileinput.min.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/superlist.js') }}"></script>
@endif

<!--<script src="{{ URL::asset('site_assets/js/fileinput.min.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/jquery.colorbox-min.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/superlist.js') }}"></script>-->
</body>
</html>