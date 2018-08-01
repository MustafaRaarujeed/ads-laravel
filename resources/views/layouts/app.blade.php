<!DOCTYPE html>
<html>
<head>
	<title>Raar Ads | @yield('title')</title>
	{{-- Styles --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
		  integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/raar_css.css') }}">
	@yield('customeCss')
</head>
<body>
	<div id="app">
		@include('layouts.navbar')
		<div class="container">
			@yield('body')
		</div>
	</div>
	{{-- Scripts --}}
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	@yield('custome_script_back')
</body>
</html>