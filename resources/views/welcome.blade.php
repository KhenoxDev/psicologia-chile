<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script>
			$(window).on('load', {
				$('#page-wrap').hide();
				setTimeout(() => {
					$('#page-wrap').show();
				}, 2000);
			});
		</script>
    </head>
    <body>
        <div id="app">
			<main-component></main-component>
			{{-- <navbar logo="{{ asset('img/navbar/logo.png') }}"></navbar> --}}
			{{-- <main id="page-wrap">
				<new-navbar></new-navbar>
				<masthead></masthead>
				<whatsapp></whatsapp>
				<div class="bg--white">
					<carousel></carousel>
					<three-steps></three-steps>
					<prevision></prevision>
				</div>
				<div class="bg--gray">
					<specialists></specialists>
				</div>
				<div class="bg--white">
					<featuredplans></featuredplans>
					<featuredprofessionals></featuredprofessionals>
				</div>
				<div class="bg--gray">
					<frequentlyquestions></frequentlyquestions>
				</div>
				<div class="bg--voluntary">
					<voluntary></voluntary>
				</div>
				<div class="bg--white">
					<news></news>
				</div>
				<div class="bg--white">
					<footer-component></footer-component>
				</div>
				<div class="bg--dark">
					<copyright></copyright>
				</div>
			</main> --}}
        </div>
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
