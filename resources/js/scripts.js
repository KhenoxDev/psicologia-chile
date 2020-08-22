/*!
 * Start Bootstrap - Freelancer v6.0.4 (https://startbootstrap.com/themes/freelancer)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
 */
global.$ = global.jQuery = require('jquery');
$(function () {
	"use strict";
	var nav_offset_top = $('header').height() + 10;

	function navbarFixed() {
		if ($('.header_area').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll >= nav_offset_top) {
					$(".header_area").addClass("navbar_fixed");
					$("#btnBackTop").addClass('show');
				} else {
					$(".header_area").removeClass("navbar_fixed");
					$("#btnBackTop").removeClass('show');
				}
			});
		};
	};
	navbarFixed();

	$('#btnBackTop').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, '300');
	});
});
