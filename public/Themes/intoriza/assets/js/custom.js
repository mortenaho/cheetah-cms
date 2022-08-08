/* =====================================
All JavaScript fuctions Start
======================================*/

/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /*

	> Top Search bar Show Hide function by = custom.js
	> On scroll content animated function by = Viewportchecker.js
	> Video responsive function by = custom.js
	> magnificPopup function	by = magnific-popup.js
	> magnificPopup for video function	by = magnific-popup.js
	> Vertically center Bootstrap modal popup function by = custom.js
	> Main menu sticky on top  when scroll down function by = custom.js
	> page scroll top on button click function by = custom.js
	> input type file function by = custom.js
	> input Placeholder in IE9 function by = custom.js
	> footer fixed on bottom function by = custom.js
	> accordion active calss function by = custom.js
    > Nav submenu show hide on mobile by = custom.js
	> Vertical Nav submenu show hide on mobile by = custom.js
	> Home Carousel_1 Full Screen with no margin function by = owl.carousel.js
	> related with content function by = owl.carousel.js
	> Fade slider for home function by = owl.carousel.js
	> home_carousel_1 Full Screen with no margin function by = owl.carousel.js
	> home_carousel_2 Full Screen with no margin function by = owl.carousel.js
	> home_projects_filter Full Screen with no margin function by = owl.carousel.js
	> Home page testimonial function by = owl.carousel.js
    > home_client_carouse function by = owl.carousel.js
	> work carousel  function by = owl.carousel.js
    > Hover Tab  function
    > Top cart list Show Hide function by = custom.js =================== //

    > Fade slider for home function by = owl.carousel.js ========================== //

    > Portfolio Carousel no margin function by = owl.carousel.js ========================== //


 */

/*--------------------------------------------------------------------------------------------
	window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /*
	 > equal each box
	 > text animation function
	 > masonry function function by = isotope.pkgd.min.js
	 > page loader function by = custom.js
 */

/*--------------------------------------------------------------------------------------------
	Window Scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /*
 	 > Window on scroll header color fill
 */

/*--------------------------------------------------------------------------------------------
	Window Resize ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

(function ($) {

    'use strict';
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/


//  > Top Search bar Show Hide function by = custom.js =================== //
	 function site_search(){
			jQuery('a[href="#search"]').on('click', function(event) {
			jQuery('#search').addClass('open');
			jQuery('#search > form > input[type="search"]').focus();
		});

		jQuery('#search, #search button.close').on('click keyup', function(event) {
			if (event.target === this || event.target.className === 'close') {
				jQuery(this).removeClass('open');
			}
		});
	 }

// > Video responsive function by = custom.js ========================= //
	function video_responsive(){
		jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
		jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
	}

// > magnificPopup function	by = magnific-popup.js =========================== //
	function magnific_popup(){
        jQuery('.mfp-gallery').magnificPopup({
          delegate: '.mfp-link',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          }
       });
	}

// > magnificPopup for video function	by = magnific-popup.js ===================== //
	function magnific_video(){
		jQuery('.mfp-video').magnificPopup({
			type: 'iframe',
		});
	}

	// data_tooltip function by = custom.js
		function data_tooltip(){
			jQuery('[data-toggle="tooltip"]').tooltip();
		}
// Vertically center Bootstrap modal popup function by = custom.js ==============//
	function popup_vertical_center(){
		jQuery(function() {
			function reposition() {
				var modal = jQuery(this),
				dialog = modal.find('.modal-dialog');
				modal.css('display', 'block');
				// Dividing by two centers the modal exactly, but dividing by three
				// or four works better for larger screens.
				dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
			}
			// Reposition when a modal is shown
			jQuery('.modal').on('show.bs.modal', reposition);
			// Reposition when the window is resized
			jQuery(window).on('resize', function() {
				jQuery('.modal:visible').each(reposition);
			});
		});
	}

// > Main menu sticky on top  when scroll down function by = custom.js ========== //
	function sticky_header(){
		if(jQuery('.sticky-header').length){
			var sticky = new Waypoint.Sticky({
			  element: jQuery('.sticky-header')
			})
		}
	}

// > page scroll top on button click function by = custom.js ===================== //
	function scroll_top(){
		jQuery("button.scroltop").on('click', function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		});

		jQuery(window).on("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery("button.scroltop").fadeIn(1000);
			} else {
				jQuery("button.scroltop").fadeOut(1000);
			}
		});
	}


// > footer fixed on bottom function by = custom.js ======================== //
	function footer_fixed() {
	  jQuery('.site-footer').css('display', 'block');
	  jQuery('.site-footer').css('height', 'auto');
	  var footerHeight = jQuery('.site-footer').outerHeight();
	  jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);
	  jQuery('.site-footer').css('height', footerHeight);
	}

// > accordion active calss function by = custom.js ========================= //
	function accordion_active() {
		$('.acod-head a').on('click', function() {
			$('.acod-head').removeClass('acc-actives');
			$(this).parents('.acod-head').addClass('acc-actives');
			$('.acod-title').removeClass('acc-actives'); //just to make a visual sense
			$(this).parent().addClass('acc-actives'); //just to make a visual sense
			($(this).parents('.acod-head').attr('class'));
		 });
	}

// > Nav submenu show hide on mobile by = custom.js
	 function mobile_nav(){
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class='glyphicon glyphicon-plus submenu-toogle'></div>").insertAfter(".has-child > a");
		jQuery('.has-child a+.submenu-toogle').on('click',function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});

	 }

// > Home Page Blog Full Screen with no margin function by = owl.carousel.js ========================== //

	function blog_carousel_3(){
	jQuery('.blog-carousel-3').owlCarousel({
        loop:true,
		margin:30,
		autoplay:false,
		center: false,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			767:{
				items:1
			},
			1000:{
				items:3
			}
		}
	});
	}
// > home_projects_filter Full Screen with no margin function by = owl.carousel.js ========================== //

	function home_projects_filter(){
	jQuery('.owl-carousel-filter').owlCarousel({
        loop:true,
		margin:30,
		autoplay:false,
		center: true,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			767:{
				items:1
			},
			1000:{
				items:2
			}
		}
	});
	}



// > home_projects_filter Full Screen with no margin function by = owl.carousel.js ========================== //
	function home_projects_filter2(){

		var owl = jQuery('.owl-carousel-filter2').owlCarousel({
        loop:true,
		margin:30,
		autoplay:false,
		center: false,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			767:{
				items:1
			},
			1000:{
				items:3
			}
		}
		})

		/* Filter Nav */

		jQuery('.btn-filter-wrap2').on('click', '.btn-filter', function(e) {
			var filter_data = jQuery(this).data('filter');

			/* return if current */
			if(jQuery(this).hasClass('btn-active')) return;

			/* active current */
			jQuery(this).addClass('btn-active').siblings().removeClass('btn-active');

			/* Filter */
			owl.owlFilter(filter_data, function(_owl) {
				jQuery(_owl).find('.item').each(owlAnimateFilter);
			});
		})



	}


	function home_projects_filter3(){
	jQuery('.owl-carousel-filter3').owlCarousel({
        loop:true,
		margin:30,
		autoplay:false,
		center: false,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			767:{
				items:2
			},
			991:{
				items:3
			},
			1366:{
				items:4
			}
		}
	});
	}





// Home page testimonial function by = owl.carousel.js ========================== //
	function testimonial_home(){
	jQuery('.testimonial-home').owlCarousel({
		loop:true,
		autoplay:false,
		margin:30,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			991:{
				items:1
			}
		}
	});
	}

//  home_client_carouse function by = owl.carousel.js ========================== //
	function home_client_carousel(){
	jQuery('.home-client-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:2
			},
			480:{
				items:3
			},
			767:{
				items:4
			},
			1000:{
				items:5
			}
		}
	});
	}


//  home_client_carouse function by = owl.carousel.js ========================== //
	function home_client_carousel_2(){
	jQuery('.home-client-carousel-2').owlCarousel({
		loop:true,
		margin:10,
		autoplay:true,
		nav:false,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:2
			},
			480:{
				items:3
			},
			767:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});
	}


// > Home Carousel_1 Full Screen with no margin function by = owl.carousel.js ========================== //
	function home_carousel_1(){
	jQuery('.home-carousel-1').owlCarousel({
        loop:true,
		margin:0,
		autoplay:true,
		autoplayTimeout:3000,
		//center: true,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			767:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	}
// > work carousel  function by = owl.carousel.js ========================== //
	function work_carousel(){
	jQuery('.work-carousel').owlCarousel({
        loop:true,
		autoplay:false,
		center: true,
		items:3,
		margin:10,
		nav:true,
		dots: false,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		responsive:{
			0:{
				items:1
			},
			991:{
				items:2
			}

		}
	});
	}


	function contact_slide(){
	jQuery('.contact-slide-show').on('click', function () {
		jQuery('.contact-slide-hide').animate({'right': '0px'});
	});
	jQuery('.contact_close').on('click', function () {
		jQuery('.contact-slide-hide').animate({'right': '-540px'});
	});
	};

// Fade slider for home function by = owl.carousel.js ========================== //
	function aboutus_carousel(){
	jQuery('.about-us-carousel').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		margin:30,
		nav:true,
		navText: ['<i class="flaticon-back"></i> Prev', 'Next <i class="flaticon-next"></i>'],
		items:1,
		dots: false,
	});
	}

// > Top cart list Show Hide function by = custom.js =================== //

	 function cart_block(){
		jQuery('.cart-btn').on('click', function () {
		jQuery( ".cart-dropdown-item-wraper" ).slideToggle( "slow" );
	  });
	 }



// > Login Signup Form function by = custom.js ========== //
	function login_signup_form(){
	   $(".input input , .input textarea").focus(function() {

		  $(this).parent(".input").each(function() {
			 $("label", this).css({
				"line-height": "18px",
				"font-size": "14px",
				"font-weight": "600",
				"top": "0px"
			 })
			 $(".spin", this).css({
				"width": "100%"
			 })
		  });
	   }).blur(function() {
		  $(".spin").css({
			 "width": "0px"
		  })
		  if ($(this).val() == "") {
			 $(this).parent(".input").each(function() {
				$("label", this).css({
				   "line-height": "60px",
				   "font-size": "14px",
				   "font-weight": "600",
				   "top": "10px"
				})
			 });

		  }
	   });
	}
/*--------------------------------------------------------------------------------------------
	Window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
// > equal each box function by  = custom.js =========================== //
	function equalheight(container) {
		var currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array(),
			$el, topPosition = 0,
			currentDiv = 0;

		jQuery(container).each(function() {
			$el = jQuery(this);
			jQuery($el).height('auto');
			var topPostion = $el.position().top;
			if (currentRowStart != topPostion) {
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {

				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}

			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}




// > masonry function function by = isotope.pkgd.min.js ========================= //
	function masonryBox() {
        if ( jQuery().isotope ) {
            var $container = jQuery('.portfolio-wrap');
                $container.isotope({
                    itemSelector: '.masonry-item',
                    transitionDuration: '1s',
					originLeft: true,
					stamp: '.stamp',

                });

            jQuery('.masonry-filter li').on('click',function() {
                var selector = jQuery(this).find("a").attr('data-filter');
                jQuery('.masonry-filter li').removeClass('active');
                jQuery(this).addClass('active');
                $container.isotope({ filter: selector });
                return false;
            });
    	};
	}

// > background image parallax function by = stellar.js ==================== //
	function bg_image_stellar(){
		jQuery(function(){
				jQuery.stellar({
					horizontalScrolling: false,
					verticalOffset:100
				});
			});
	}

// > page loader function by = custom.js ========================= //
	function page_loader() {
		$('.loading-area').fadeOut(1000)
	};

/*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

    function color_fill_header() {
        var scroll = $(window).scrollTop();
        if(scroll >= 100) {
            $(".is-fixed").addClass("color-fill");
        } else {
            $(".is-fixed").removeClass("color-fill");
        }
    };

/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
	jQuery(document).ready(function() {
		//social_slide(),
		// > Top Search bar Show Hide function by = custom.js
		site_search(),
		// > Login Signup Form function by = custom.js ========== //
        login_signup_form()
		// > Top Social bar Show Hide function by = custom.js
		data_tooltip(),
		contact_slide()
		// > Video responsive function by = custom.js
		video_responsive(),
		// > magnificPopup function	by = magnific-popup.js
		magnific_popup(),
		// > magnificPopup for video function	by = magnific-popup.js
		magnific_video(),
		// > Vertically center Bootstrap modal popup function by = custom.js
		popup_vertical_center();
		// > Main menu sticky on top  when scroll down function by = custom.js
		sticky_header(),
		// > page scroll top on button click function by = custom.js
		scroll_top(),
		// > footer fixed on bottom function by = custom.js
		footer_fixed(),
		// > accordion active calss function by = custom.js ========================= //
		accordion_active(),
		// > Nav submenu on off function by = custome.js ===================//
		mobile_nav(),
		//  home_projects_filter() Full Screen with no margin function by = owl.carousel.js ==========================  //
		home_projects_filter(),
		//  home_projects_filter() Full Screen with no margin function by = owl.carousel.js ==========================  //
		home_projects_filter2(),
		//  home_projects_filter() Full Screen with no margin function by = owl.carousel.js ==========================  //
		home_projects_filter3(),
		// Home page testimonial function by = owl.carousel.js ========================== //
		testimonial_home(),
		//  Client logo Carousel function by = owl.carousel.js ========================== //
		home_client_carousel(),
		//  Client logo Carousel function by = owl.carousel.js ========================== //
		home_client_carousel_2(),

		//Home Carousel_1 Full Screen with no margin function by = owl.carousel.js ========================== //
		home_carousel_1(),

		aboutus_carousel(),
        // Top cart list Show Hide function by = custom.js =================== //
        cart_block(),
		// > Home Page Blog Full Screen with no margin function by = owl.carousel.js ========================== //
        blog_carousel_3()
	});

/*--------------------------------------------------------------------------------------------
	Window Load START
---------------------------------------------------------------------------------------------*/
	jQuery(window).on('load', function () {
		// > equal each box function by  = custom.js
		equalheight(".equal-wraper .equal-col"),
		// > masonry function function by = isotope.pkgd.min.js
		masonryBox(),
		// > background image parallax function by = stellar.js
		bg_image_stellar(),
		// > page loader function by = custom.js
		page_loader(),
		// > work carousel  function by = owl.carousel.js
		work_carousel()

});

 /*===========================
	Window Scroll ALL FUNCTION START
===========================*/

	jQuery(window).on('scroll', function () {
	// > Window on scroll header color fill
		color_fill_header()
	});

/*===========================
	Window Resize ALL FUNCTION START
===========================*/

	jQuery(window).on('resize', function () {
	// > footer fixed on bottom function by = custom.js
	 	footer_fixed(),
	    equalheight(".equal-wraper .equal-col")
	});

/*===========================
	Document on  Submit FUNCTION START
===========================*/

	// > Contact form function by = custom.js
	// jQuery(document).on('submit', 'form.cons-contact-form', function(e){
	// 	e.preventDefault();
	// 	var form = jQuery(this);
	// 	/* sending message */
	// 	jQuery.ajax({
	// 		url: 'http://thewebmax.com/intoriza/form-handler.php',
	// 		data: form.serialize() + "&action=contactform",
	// 		type: 'POST',
	// 		dataType: 'JSON',
	// 		beforeSend: function() {
	// 			jQuery('.loading-area').show();
	// 		},
    //
	// 		success:function(data){
	// 			jQuery('.loading-area').hide();
	// 			if(data['success']){
	// 			jQuery("<div class='alert alert-success'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');
	// 			jQuery('.alert-success').delay(2000).fadeOut(500);
	// 			}else{
	// 			jQuery("<div class='alert alert-danger'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');
	// 			}
	// 		}
	// 	});
	// 	//jQuery('.cons-contact-form').trigger("reset");
	// 	return false;
	// });

/*===========================
	Document on  Submit FUNCTION END
===========================*/


})(window.jQuery);
