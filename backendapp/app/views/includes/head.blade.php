<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>SenseLife | @yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="Achyut Paudel" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/css/animate.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/css/style.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/css/style-responsive.min.css') }}}" rel="stylesheet" />
	<link href="{{{ asset('assets/css/theme/default.css') }}}" rel="stylesheet" id="theme" />
	<link href="{{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}}" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->
	@yield('page-css')

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{{ asset('assets/plugins/pace/pace.min.js') }}}"></script>
<!-- ================== END BASE JS ================== -->

</head>
