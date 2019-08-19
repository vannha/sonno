(function($) {
    'use strict';
    /*
    Header
    =========================== */
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 46 && $(window).width() <= 600) {
            $('.admin-bar .navbar-fixed-top').css('top','0 !important');
        }
        if (scrollTop != 0) {
            $(".navbar").addClass("top-nav-collapse");
            return false;
        } else {
            $(".navbar").removeClass("top-nav-collapse");
            return false;
        }
        

    });
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        var widths = $(window).width();
        if (scrollTop > 46 &&  widths <= 600) {
            $('.admin-bar .navbar-fixed-top').addClass('top-none');
        }else if(scrollTop <= 46 &&  widths <= 600){
            $('.admin-bar .navbar-fixed-top').removeClass('top-none');
        }
    });
    /*
	Dropdown
	=========================== */
	$('ul.navbar-nav li.dropdown').on("mouseenter", function() {
		$(this).addClass('selected');$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
		return false;
	})
	$('ul.navbar-nav li.dropdown').on("mouseleave", function() {
		$(this).removeClass('selected');$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
			return false;
	});	
	

	$(".dropdown-menu > li > a.trigger").on("click",function(e){
		var current=$(this).next();
		var grandparent=$(this).parent().parent();
		if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
			$(this).toggleClass('right-caret left-caret');
		grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
		grandparent.find(".sub-menu:visible").not(current).hide();
		current.toggle();
		e.stopPropagation();
	});
	$(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
		var root=$(this).closest('.dropdown');
		root.find('.left-caret').toggleClass('right-caret left-caret');
		root.find('.sub-menu:visible').hide();
	});
    /*
	Img Hover Effect
	=========================== */
    function hover_effect() {
        $('.img-hover').each(function() {
            var img_height = $(this).height();
            $('.dh-overlay', this).css('height', img_height + 'px');
        });
        return false;
    }
    $(window).load(hover_effect);
    $(window).resize(hover_effect);

    /*
    Video play
    =========================== */
    $("#ytplayer").css({
        'opacity': '0',
        'filter': 'alpha(opacity=0)'
    });
    $(".start-video").on("click", function() {
        $('#ytplayer').fadeTo(900, 1);
        $(".video-image").fadeOut(800);
        return false;
    });
    $(document).on('click', '.start-video', function() {
        $(this).fadeOut(800);
        player.playVideo();
        return false;
    });

    /*
	Input Form
	=========================== */
    $('.input-form').each(function() {
        $(this).on('focusin', function() {
            $('.icon-form', this).addClass('active');
            return false;
        });
        $(this).on('focusout', function() {
            $('.icon-form', this).removeClass('active');
            return false;
        });
    });

})(jQuery);

;
(function($) {
    "use strict";


    // Client Option
    var client = $("#client");
    client.owlCarousel({
        items: 5,
        itemsMobile: [480, 1],
        pagination: false
    });
    $(".next-client").on("click", function() {
        client.trigger('owl.next');
        return false;
    });
    $(".prev-client").on("click", function() {
        client.trigger('owl.prev');
        return false;
    });


    // Testimonial
    $("#testimonail").owlCarousel({
        autoPlay: 6000,
        items: 3,
        itemsDesktop: [1199, 3],
        itemsTablet: [1024, 2],
        itemsMobile: [480, 1]
    });
    // Team Option
    var team = $("#team-list");
    team.owlCarousel({
        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [979, 2],
        itemsMobile: [480, 1],
        pagination: false
    });
    $(".next-team").on("click", function() {
        team.trigger('owl.next');
        return false;
    });
    $(".prev-team").on("click", function() {
        team.trigger('owl.prev');
        return false;
    });

    // BLog Option
    var post = $("#post");
    post.owlCarousel({
        items: 2,
        itemsDesktop: [1024, 2],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: false
    });
    $(".next-blog").on("click", function() {
        post.trigger('owl.next');
        return false;
    });
    $(".prev-blog").on("click", function() {
        post.trigger('owl.prev');
        return false;
    });


    // Parallax Option
    $('.parallax').each(function() {
        var get_bg = $(this).data('background');
        var get_speed = $(this).data('speed');
        $(this).css('background-image', 'url(' + get_bg + ')');
        $(this).parallax("50%", get_speed);
    });


    // TabSlider Option
    $('#tab-slider').jwgSlider('both', 400);
    // Navigation Active
    $('.tabbed_navigation').find('li').each(function() {
        $(this).on('click', function() {
            $('.tabbed_navigation').find('li').removeClass('active');
            $(this).addClass('active');
            return false;
        });
        return false;
    });


    $(".dh-overlay:first a[data-pretty^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'pp_default',
        slideshow: 3000,
        autoplay_slideshow: false
    });
    $(".dh-overlay:gt(0) a[data-pretty^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });

    $(".video-zoomer:first a[data-pretty^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'pp_default',
        slideshow: 3000,
        autoplay_slideshow: false
    });
    $(".video-zoomer:gt(0) a[data-pretty^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });

    $('.img-hover').directionalHover();


    $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed: 9000,
        directionNav: false,
    });

    $().UItoTop({
        easingType: 'easeOutQuart'
    });

    $('.twitter-feed').list_ticker({
        speed: 5000,
        effect: 'fade'
    });


    $('.comment:not(.depth-1)').each(function() {
        var $this = $(this);
        var $parent = $this.parents('.depth-1');
        var elm = $parent.find(' > .media-body > .reply')
        elm.after($this);

    });
    /*
    Header
    =========================== */
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop != 0) {
            $(".navbar").addClass("top-nav-collapse");
            return false;
        } else {
            $(".navbar").removeClass("top-nav-collapse");
            return false;
        }
    });

    /*
	Img Hover Effect
	=========================== */
    function hover_effect() {
        $('.img-hover').each(function() {
            var img_height = $(this).height();
            $('.dh-overlay', this).css('height', img_height + 'px');
        });
        return false;
    }
    $(window).load(hover_effect);
    $(window).resize(hover_effect);

    /*
    Video play
    =========================== */
    $(document).ready(function() {
        $('.start-video').on('click', function(ev) {
            $(this).addClass('hide-div');
            $(".video-image").addClass('hide-div');
            $("#ytplayer")[0].src += "&autoplay=1";
            ev.preventDefault();
        });
    });

    /*
	Input Form
	=========================== */
    $('.input-form').each(function() {
        $(this).on('focusin', function() {
            $('.icon-form', this).addClass('active');
            return false;
        });
        $(this).on('focusout', function() {
            $('.icon-form', this).removeClass('active');
            return false;
        });
    });

    /*
	Scrollspy
	=========================== */
    $(window).on('load', function() {
        // Scrollspy Option
        var $body = $('body'),
            $navtop = $('nav.navbar'),
            $offset_section = 89,
            offset = $navtop.outerHeight();

        $body.css('padding-top', offset);
        $body.scrollspy({
            target: '.navbar',
            offset: offset
        });

        // Update Offset
        function scrollAnimate() {
            var $window_width = $(window).width();
            if ($window_width < 641) {
                $offset_section = 74;
            } else if ($window_width > 767 && $window_width < 1025) {
                $offset_section = 177;
            } else if ($window_width < 1200) {
                $offset_section = 89;
            }
        }

        // Animation Scrollspy
        scrollAnimate();
        $('.internal > a').on('click', function(event) {
            event.preventDefault();
            var $anchor = $(this),
                $section = $($anchor.attr('href')).offset().top,
                $position = $section - $offset_section;

            $('html, body').stop().animate({
                scrollTop: $position
            }, 1500, 'easeInOutExpo');
            return false;
        });

        // Activated Navigation
        function fixSpy() {
            var data = $body.data('bs.scrollspy');
            if (data) {
                offset = $navtop.outerHeight();
                $body.css('padding-top', offset);
                data.options.offset = offset;
                $body.data('bs.scrollspy', data);
                $body.scrollspy('refresh');
            }
        }

        // Call function on resize
        var resizeTimer;
        $(this).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(fixSpy, 200);
            scrollAnimate();
            return false;
        });
        return false;
    });
    /* ================================================
    Nav in mobile
    ================================================ */
    if ( $(window).width() <= 767 ) {
    $('#navbar .dropdown > a').after('<span class="sonno-toggle"><span class="sonno-toggle-inner"></span></span>');
    $('#navbar .dropdown-menu > li > .dropdown-menu').before('<span class="sonno-toggle"><span class="sonno-toggle-inner"></span></span>');
    $('.sonno-toggle').on('click', function(){
        var toclass = 'menu-active';
        $(this).children().toggleClass(toclass);
        $(this).parent().toggleClass(toclass);
    });
    }
    
})(jQuery);