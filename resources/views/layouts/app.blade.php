<!DOCTYPE html>
<html>
<head>
	<title>Raar Ads | @yield('title')</title>
	{{-- Styles --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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