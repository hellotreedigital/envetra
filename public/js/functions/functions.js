	(function ($) {
	    "use strict";

	    $(document).ready(function () {

	        $('.services-all').on('shown.bs.collapse', function () {

	            var panel = $(this).find('.in');

	            var body = panel.offset().top - 45;

	            $('html, body').animate({
	                scrollTop: body
	            }, 1000);

	        });



	        $.fn.scrollView = function () {
	            return this.each(function () {
	                $('html, body').animate({
	                    scrollTop: $(this).offset().top - 150
	                }, 1000);
	            });
	        }


	        $('.close-section').click(function (e) {
	            e.preventDefault();
	            $('.in').collapse('hide');
	            $('html, body').animate({
	                scrollTop: $('.section-bgimg-6').offset().top
	            }, 1000);
	        });

	        /*scroll to top*/
	        $(window).scroll(function () {
	            if ($(this).scrollTop() > 100) {
	                $('.scrollup').fadeIn();
	            } else {
	                $('.scrollup').fadeOut();
	            }
	        });

	        $('.scrollup').on("click", function () {
	            $("html, body").animate({
	                scrollTop: 0
	            }, 500);
	            return false;

					});
					
					$('.service-toggle').on('click', function(){
						$('.in').collapse('hide');
					});
			});

			$(window).on('load',function () {
				$('.preloader').fadeOut('slow');
			});

	})(jQuery);