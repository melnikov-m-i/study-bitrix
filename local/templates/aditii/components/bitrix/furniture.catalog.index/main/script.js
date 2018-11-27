$(document).ready(function(){
	$('.slider').slick({
		prevArrow: $('.prev-arrow-slider'),
		nextArrow: $('.next-arrow-slider'),
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 640,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
});