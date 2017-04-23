( function( $ ) {

	// $(".menu-toggle").pageslide();

	$('#main-nav-alt, #main-nav').dropmenu();
		
	$('.slider').flexslider({
		animation: "slide",
		slideshowSpeed: 9000,
	});

	$('.carousel').flexslider({
		animation: "slide",
		animationLoop: false,
		itemWidth: 210,
		itemMargin: 5,
		minItems: 2,
		maxItems: 4
	});

	$(".fancybox").fancybox();


	$('.tab-content').flexslider({
		animation: "fade",
		manualControls: ".tab-titles li",
		animationSpeed: 500,
		// controlNav: false,
		directionNav: false,
		slideshow: false
	});

	
} )( jQuery );
