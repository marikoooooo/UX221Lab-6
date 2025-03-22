;(function () {
    'use strict';

    var isMobile = function () {
        let isMobile = false;
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
            isMobile = true;
        }
        return isMobile;
    }

    var loading = function () {
        $(window).on("load", function () {
            $('.loading').delay(666).fadeOut('slow');
            $('body').delay(666);
        });
    }

    var nav = function () {
        var body = $('body');

        var toggle_search = $('.toggle-search');
        toggle_search.click(function (e) {
            e.preventDefault();
            if(body.hasClass('nav-open-js')) {
                body.removeClass('nav-open-js');
            }
            body.toggleClass('search-open-js');
        });

        var close_seach = $('.btn-search-close');
        close_seach.click(function (e) {
            e.preventDefault();
            body.removeClass('search-open-js');
        });

        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                if(body.hasClass('nav-open-js')) {
                    body.removeClass('nav-open-js');
                }
                if(body.hasClass('search-open-js')) {
                    body.removeClass('search-open-js');
                }
            }
        });

        var button_nav = $('.button-nav');
        button_nav.click(function (e) {
            e.preventDefault();
            body.toggleClass('nav-open-js');
        });

        $("html").click(function(e) {
            if ($(e.target).closest('.header__side--inner').length == 0 && $(e.target).closest('.button-nav').length == 0)
                $('body').removeClass('nav-open-js');
        });


        // start for mobile
        var header__navigation = $('.nav__mobile > ul');
        header__navigation.each(function () {
            var button = $(this).find('a');
            button.click(function () {
                setTimeout(function () {
                    $('body').removeClass('nav-open-js');
                    button_nav.removeClass('active');
                },600);
            });
        });
        header__navigation.each(function () {
            var _that = $(this);
            var _sub_menu = _that.find('.sub-menu');
            var a = _that.find('li.menu-item-has-children > a');
            a.after('<a class="menu-btn-more" href="#">+</a>');
            var span = _that.find('li.menu-item-has-children > .menu-btn-more');
            span.click(function (e) {
                e.preventDefault();
                $(this).next().slideToggle();
            });
        });
        $('ul.head__social--list > li:last-child').keydown(function(event) {
            if (event.which == 9) {
                $('body').removeClass('nav-open-js');
            }
        });
        $('.nav__mobile > ul > li > ul > li:last-child').keydown(function(event) {
            if (event.which == 9) {
                $(this).parent().slideToggle();
            }
        });
        $('.nav__mobile > ul > li > ul > li > ul > li:last-child').keydown(function(event) {
            if (event.which == 9) {
                $(this).parent().slideToggle();
            }
        });
        // end for mobile



        var head = $('.head');
        head.css('height', head.height());

        $(window).scroll(function() {
            var scrollTop = $('html').scrollTop();
            if(scrollTop >= 150) {
                $('body').addClass('head__fixed');
            } else {
                $('body').removeClass('head__fixed');
            }
        });

    }

    var lazy = function () {
        $('.lazy').Lazy({
            effect: "fadeIn",
            effectTime: 500
        });
    };

    var masonry = function () {
        var $ = require('jquery');
        var jQueryBridget = require('jquery-bridget');
        var Isotope = require('isotope-layout');
        jQueryBridget( 'isotope', Isotope, $ );

        var $grid = $('.grid');
        $grid.isotope({
            itemSelector: '.grid__item',
            layoutMode: 'masonry'
        });

        $('.filter-button-group').on( 'click', 'button', function() {
            var button = $('.filter-button-group button');
            button.removeClass('active');
            $(this).addClass('active');

            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });

        var testimonials__list = $('.testimonials__list');
        testimonials__list.isotope({
            itemSelector: '.testimonials__item',
            layoutMode: 'masonry'
        });
    }

    var slickCarousel = function() {
        var side_show = MMLB_SCRIPT.HERO_SLIDER_SHOW;
        var side_show_900 = 1;
        if(side_show > 1) {
            side_show_900 = 2
        }
        $('.hero__slider-js').slick({
            centerMode: MMLB_SCRIPT.HERO_SLIDER_CENTER_MODE,
            centerPadding: MMLB_SCRIPT.HERO_SLIDER_CENTER_PADDING,
            slidesToShow: MMLB_SCRIPT.HERO_SLIDER_SHOW,
            nextArrow: '<span class="next medium"><i class="fa-solid fa-arrow-right"></i></span>',
            prevArrow: '<span class="prev medium"><i class="fa-solid fa-arrow-left"></i></span>',
            autoplay: MMLB_SCRIPT.HERO_SLIDER_AUTO_PLAY,
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        arrows: false,
                        centerMode: false,
                        centerPadding: '0',
                        slidesToShow: side_show_900
                    }
                },
                {
                    breakpoint: 570,
                    settings: {
                        arrows: false,
                        centerMode: false,
                        centerPadding: '0',
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('#woo_gallery').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            nextArrow: '<span class="next small"><i class="fa-solid fa-arrow-right"></i></span>',
            prevArrow: '<span class="prev small"><i class="fa-solid fa-arrow-left"></i></span>',
            autoplay: false
        });

        $('.gallery-image').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            lazyLoad: 'ondemand',
            nextArrow: '<span class="next small"><i class="fa-solid fa-arrow-right"></i></span>',
            prevArrow: '<span class="prev small"><i class="fa-solid fa-arrow-left"></i></span>',
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    };

    var searchDesktop = function () {
        $('.head__button-search').click(function(){
            $('body').toggleClass('search-js-open');
        });
    };

    var sidebarScroll = function() {
        $('.sidebar-fixed').theiaStickySidebar({
            additionalMarginTop: 20
        });
    }

    var singlePost = function () {
        $('body').on('click', 'a.single-share__btn-js', function(e) {
            e.preventDefault();
            copy_input( $('#single-share-url') );
            $(this).addClass('active');
        });

        function copy_input( $input ) {
            $input.focus();
            $input.select();
            try {
                var successful = document.execCommand('copy');
            } catch(err) {
                console.error('Unable to copy');
            }
        }
    }

    $(document).ready(function() {
        window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');
        loading();
        nav();
        lazy();
        slickCarousel();
        masonry();
        searchDesktop();
        sidebarScroll();
        singlePost();
    });

}());