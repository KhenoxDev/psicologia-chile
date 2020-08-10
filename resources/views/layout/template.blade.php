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
		<navbar-component current="{{ Route::currentRouteName() }}"></navbar-component>
		<whatsapp-component></whatsapp-component>

		@yield('content')

		<footer-component></footer-component>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
