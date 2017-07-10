(function($){
	$(document).ready(function(){
		var $benefit_container = $('.benefit-container'),
			$body = $('html,body');

		$('.scroll-arrow').on('click', function(e){
			// If the user tries scrolling on their own, cancel our animation
			$body.on('scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove', stop_body_animation);
			$body.animate({
				scrollTop: $benefit_container.position().top
			}, 600, function(){
				$body.off('scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove', stop_body_animation);
			});
		});

		function stop_body_animation() {
			$body.stop();
		}
	});
})(jQuery);