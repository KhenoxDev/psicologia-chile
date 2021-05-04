/*!
 * Start Bootstrap - Freelancer v6.0.4 (https://startbootstrap.com/themes/freelancer)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
 */
global.$ = global.jQuery = require('jquery');
$(function () {
	"use strict";
	var nav_offset_top = $('header').height() + 10;
	var nav_offset_top_2 = $('header').height() + 10;

	function navbarFixed() {
		if ($('.header_area').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll >= nav_offset_top) {
					$(".header_area").addClass("navbar_fixed");
					$(".float").css("display", "block");
					$("#btnBackTop").addClass('show');
					$("#btnWhatsapp").addClass('show');
				} else {
					$(".header_area").removeClass("navbar_fixed");
					$(".float").css("display", "none");
					$("#btnBackTop").removeClass('show');
					$("#btnWhatsapp").removeClass('show');
				}
			});
		};
	};

	function socialFixed() {
		if ($('.header_area').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll >= nav_offset_top_2) {
					$(".float").css("display", "block");
				} else {
					$(".float").css("display", "none");
				}
			});
		};
	}

	navbarFixed();
	socialFixed();

	$('#btnBackTop').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, '300');
	});
});
