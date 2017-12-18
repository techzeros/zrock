<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  Page Title  --}}
	<title>{{ config('app.name', 'NanoCoins') }} | @yield('title')</title>

    {{--  Meta Tags  --}}
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="NanoCoins Cryptocurrency Platform" name="description" />
	<meta content="NanoCoins, Currency, Cryptocurrency, blockchain, bitcoin, litcoin, Naira" name="keywords" />
    <meta content="NanoCoins Dev Team" name="author" />
	
	{{--  ================== BEGIN BASE CSS STYLE ==================  --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('portal/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/css/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal/css/theme/default.css') }}" rel="stylesheet" id="theme" />
	{{--  ================== END BASE CSS STYLE ==================  --}}
	
	{{--  ================== BEGIN PAGE LEVEL CSS STYLE ==================  --}}
    <link href="{{ asset('portal/plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('portal/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('portal/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('portal/plugins/morris/morris.css') }}" rel="stylesheet" />
	{{--  ================== END PAGE LEVEL CSS STYLE ==================  --}}
	
    {{--  User Defined Styles  --}}
    @yield('custom_styles')

	{{--  ================== BEGIN BASE JS ==================  --}}
	<script src="{{ asset('portal/plugins/pace/pace.min.js') }}"></script>
	{{--  ================== END BASE JS ==================  --}}

</head>
<body>
	{{--  begin #page-loader  --}}
	<div id="page-loader">
	    <div class="material-loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
            <div class="message">Loading...</div>
        </div>
	</div>
	{{--  end #page-loader  --}}