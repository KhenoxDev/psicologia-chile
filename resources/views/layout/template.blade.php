<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app">
		<navbar-component></navbar-component>
		<whatsapp-component></whatsapp-component>

		@yield('content')

		<div class="bg--white">
			<footer-component></footer-component>
		</div>
		<div class="bg--dark">
			<copyright-component></copyright-component>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
