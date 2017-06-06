<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon" />
	<!-- Stylesheet -->
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
	@stack('css')
</head>
<body>
	@yield('body')
	<!-- Scripts -->
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	@stack('javascript')
</body>
</html>
