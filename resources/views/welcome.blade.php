<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
			<navbar logo="{{ asset('img/navbar/logo.png') }}"></navbar>
			<main id="page-wrap">
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
				</div>
				<div class="bg--gray">
					<frequentlyquestions></frequentlyquestions>
				</div>
				<div class="bg--voluntary">
					<voluntary></voluntary>
				</div>
				<div class="bg--white">
					<footer-component></footer-component>
				</div>
				<div class="bg--dark">
					<copyright></copyright>
				</div>
			</main>
        </div>
		<script src="{{ asset('js/app.js') }}"></script>

		<!-- Carousel Prevision -->
		<script>
			$('#recipeCarousel').carousel({
				interval: 9999999
				})

				$('.carousel .carousel-item').each(function(){
					var minPerSlide = 3;
					var next = $(this).next();
					if (!next.length) {
					next = $(this).siblings(':first');
					}
					next.children(':first-child').clone().appendTo($(this));

					for (var i=0;i<minPerSlide;i++) {
						next=next.next();
						if (!next.length) {
							next = $(this).siblings(':first');
						}

						next.children(':first-child').clone().appendTo($(this));
					}
				});
		</script>

		<!-- Carousel Frequently Questions -->
		<script>
			$('#recipeCarouselFAQ').carousel({
				interval: 9999999
				})

				$('.carousel .carousel-item').each(function(){
					var minPerSlide = 3;
					var next = $(this).next();
					if (!next.length) {
					next = $(this).siblings(':first');
					}
					next.children(':first-child').clone().appendTo($(this));

					for (var i=0;i<minPerSlide;i++) {
						next=next.next();
						if (!next.length) {
							next = $(this).siblings(':first');
						}

						next.children(':first-child').clone().appendTo($(this));
					}
				});
		</script>


    </body>
</html>
