<!DOCTYPE html>
<html>
<head>
	<title>Raar Ads | @yield('title')</title>
	{{-- Styles --}}
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	@yield('customeCss')
</head>
<body>
	<div class="container">
		@yield('body')
	</div>
</body>
</html>