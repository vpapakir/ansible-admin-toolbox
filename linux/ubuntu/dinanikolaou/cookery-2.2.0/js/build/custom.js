jQuery(document).ready(function($) {

    var slider_auto, slider_loop, rtl, header_layout, winWidth;

    if (cookery_data.auto == '1') {
        slider_auto = true;
    } else {
        slider_auto = false;
    }

    if (cookery_data.loop == '1') {
        slider_loop = true;
    } else {
        slider_loop = false;
    }

    if (cookery_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }

    //sticky t bar toggle
    $(".sticky-t-bar .close").click(function() {
        $(".sticky-bar-content").slideToggle();
        $(".sticky-t-bar").toggleClass("active");
    });

    //header search form toggle 
    $('.header-search .search-toggle').click(function() {
        $(this).siblings('.header-search-wrap').fadeIn();
        $('.header-search-wrap form .search-field').focus();
    });

    $('.header-search .close').click(function() {
        $(this).parents('.header-search-wrap').fadeOut();
    });

    $('.header-search-wrap').keyup(function(e) {
        if (e.key == 'Escape') {
            $('.header-search .header-search-wrap').fadeOut();
        }
    });

    $('.header-search .header-search-inner .search-form').click(function(e) {
        e.stopPropagation();
    });

    $('.header-search .header-search-inner').click(function(e) {
        $(this).parents('.header-search-wrap').fadeOut();
    });

    //add submenu toggle btn
    $('.nav-menu li.menu-item-has-children').find('> a').after('<span class="submenu-toggle"><i class="fas fa-chevron-down"></i></span>');

    //add tabindex for submenu toggle button
    $('.site-header:not(.style-four) .nav-menu li button').attr('tabindex', -1);

    $('.menu-item-has-children .submenu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
    });

    //toggle main navigation
    $('.main-navigation .toggle-btn').click(function() {
        $(this).parents('.main-navigation').addClass('menu-toggled');
        $(this).siblings('.main-menu-modal').animate({
            width: 'toggle',
        });
    });

    $('.main-navigation .close').click(function() {
        $(this).parents('.main-navigation').removeClass('menu-toggled');
        $(this).parents('.main-menu-modal').animate({
            width: 'toggle',
        });
    });

    $(window).keyup(function(event) {
        if (event.key == 'Escape') {
            $('.main-navigation').removeClass('menu-toggled');
        }
    });

    //mobile menu toggle
    $('.mobile-header .toggle-btn').click(function() {
        $(this).parents('.mobile-header').toggleClass('menu-active');
        $('.mobile-header-popup').fadeToggle();
        if ($('.mobile-header').hasClass('menu-active')) {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', 'visible');
        }
    });

    //mobile menu top space
    $(window).on('resize load scroll', function() {
        var adminBarHeight = $('#wpadminbar').outerHeight();
        var stickyBarHeight = $('.sticky-t-bar').outerHeight();
        var mblHeaderHeight = $('.mobile-header').outerHeight();
        var mblAddedHeight1 = parseInt(mblHeaderHeight) + parseInt(stickyBarHeight) + parseInt(adminBarHeight);
        var mblAddedHeight2 = parseInt(mblHeaderHeight) + parseInt(stickyBarHeight);
        var mblAddedHeight3 = parseInt(mblHeaderHeight) + parseInt(adminBarHeight);

        if ($('.admin-bar').length && $('.sticky-t-bar').length) {
            $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight1);
            $('.sticky-t-bar .close').click(function() {

                if ($('.sticky-t-bar').hasClass('active')) {
                    $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight1);
                } else {
                    $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight1 - stickyBarHeight);
                }

            });
        } else if ($('.admin-bar').length == 0 && $('.sticky-t-bar').length) {
            $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight2);

            $('.sticky-t-bar .close').click(function() {

                if ($('.sticky-t-bar').hasClass('active')) {
                    $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight2);
                } else {
                    $('.mobile-header .mobile-header-popup').css('top', mblHeaderHeight);
                }

            });

        } else if ($('.admin-bar').length && $('.sticky-t-bar').length == 0) {
            $('.mobile-header .mobile-header-popup').css('top', mblAddedHeight3);

        } else {
            $('.mobile-header .mobile-header-popup').css('top', mblHeaderHeight);
        }

        $(window).scroll(function() {
            if ($('.mobile-header').hasClass('stick')) {
                $('.mobile-header .mbl-menu-wrap').css('top', mblHeaderHeight);
            }
        });

        //sticky floated meta
        var stickyHeaderHeight = ($(window).width() > 1024) ? $('.sticky-header').outerHeight() : $('.mobile-header').outerHeight();
        var stickyCombineH = parseInt(stickyHeaderHeight) + parseInt(adminBarHeight);

        if (cookery_data.sticky == 1 && $('#wpadminbar').length) {
            $('.single .site-main article .floated-meta-inner').css('top', stickyCombineH + 20);
        } else if (cookery_data.sticky == 1) {
            $('.single .site-main article .floated-meta-inner').css('top', stickyHeaderHeight + 20);
        } else if ($('#wpadminbar').length) {
            $('.single .site-main article .floated-meta-inner').css('top', adminBarHeight + 20);
        } else {
            $('.single .site-main article .floated-meta-inner').css('top', 20);
        }
    });

    //add layout class to mobile header
    if ($('.site-header').hasClass('style-three')) {
        $('.mobile-header').addClass('header-three');
    } else if ($('.site-header').hasClass('style-six')) {
        $('.mobile-header').addClass('header-six');
    } else {
        $('.mobile-header').removeClass('header-three');
        $('.mobile-header').removeClass('header-six');
    }

    //move site branding inside main navigation
    $('.hide-element').removeClass('hide-element');

    $(window).on('resize load', function() {

        //push social share from bottom
        $('.site-main article .entry-content').each(function() {
            var articalContentH = $(this).outerHeight();
            $(this).siblings('.entry-header').children('.floated-meta').css('bottom', articalContentH);
        });

    });

    //move floated meta into entry content for recipe one
    $('.single-recipe-one .site-main article .floated-meta').prependTo('.single-recipe-one .site-main article .dr-entry-content');

    //header four secondary menu toggle
    if ($('.site-header').hasClass('style-four')) {
        $('.header-top .secondary-menu > div').prepend('<button class="close"></button>');

        $('.site-header.style-four .header-top .secondary-menu > div').css('width', 0);
        $('.header-top .secondary-menu .toggle-btn').on('click', function(e) {
            e.stopPropagation();
            $(this).parents('.secondary-menu').addClass('menu-active');
            $(this).siblings('div').animate({
                width: 320,
            });
        });

        $('.header-top .secondary-menu .close').on('click', function(e) {

            $(this).parent('div').animate({
                width: 0,
            });
            $(this).parents('.secondary-menu').removeClass('menu-active');
        });

        $('.site-header.style-four .secondary-menu > div').click(function(e) {
            e.stopPropagation();
        });

        $(window).click(function(e) {

            $('.site-header.style-four .secondary-menu > div').animate({
                width: 0,
            });
            $('.site-header.style-four .secondary-menu').removeClass('menu-active');
        });

        // $('.site-header.style-four .header-top .secondary-menu .nav-menu li .submenu-toggle').click(function() {
        //     $(this).toggleClass('active');
        //     $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
        // });
    }

    //header five menu toggle
    if ($('.site-header').hasClass('style-five')) {
        $('body').addClass('header-five');

        $(window).on('load resize', function() {
            var stickyBarheight = $('.sticky-t-bar').outerHeight();
            var headerHeight = $('.header-main').outerHeight();
            var combineHeight = parseInt(headerHeight) + parseInt(stickyBarheight);

            if ($('.sticky-t-bar').length) {
                $('.site-header.style-five .header-bottom').css('top', combineHeight);

                $('.sticky-t-bar .close').click(function() {

                    if ($('.sticky-t-bar').hasClass('active')) {
                        $('.site-header.style-five .header-bottom').css('top', combineHeight);
                    } else {
                        $('.site-header.style-five .header-bottom').css('top', headerHeight);
                    }

                });

            } else {
                $('.site-header.style-five .header-bottom').css('top', headerHeight);
            }

        });

        $('.site-header.style-five .header-main .toggle-btn').click(function() {
            $('body').addClass('menu-active');
            $(this).siblings('.header-bottom').fadeIn();
        });

        $('.site-header.style-five .header-bottom .close').click(function() {
            $('body').removeClass('menu-active');
            $(this).parents('.header-bottom').fadeOut();
        });
    }

    //sticky header
    if ($('.sticky-header').length) {
        $(window).scroll(function() {
            var siblingDivOffset = $('.site-header + div, .site-header + section').offset().top;
            if ($(window).scrollTop() > siblingDivOffset) {
                $('.sticky-header').addClass('stick');
            } else {
                $('.sticky-header').removeClass('stick');
            }
        });
    }

    //add class when to mobile header sticky enabled
    if (cookery_data.sticky == '1') {
        $('.mobile-header').addClass('sticky-enabled');
    } else {
        $('.mobile-header').removeClass('sticky-enabled');
    }

    //back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });

    $('.back-to-top').on('click', function() {
        $('body,html').animate({
            scrollTop: 0,
        }, 600);
    });

    //for accessibility
    $('.nav-menu li a, .nav-menu ul li button').focus(function() {
        $(this).parents('li').addClass('hover');
    }).blur(function() {
        $(this).parents('li').removeClass('hover');
    });

    //slider one
    if ($('.banner-slider.style-one .item-wrapper .item').length > 4) {
        sliderLoop1 = true;
    } else {
        sliderLoop1 = false;
    }
    $('.banner-slider.style-one .item-wrapper').owlCarousel({
        items: 4,
        autoplay: slider_auto,
        loop: sliderLoop1,
        nav: true,
        dots: false,
        rewind: false,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        rtl: rtl,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });

    //slider two & featured recipe two & three
    if ($('.banner-slider.style-two .item-wrapper .item').length > 4 || $('.featured-recipe-section.style-two .section-grid .section-block').length > 4 || $('.featured-recipe-section.style-three .section-grid .section-block').length > 4) {
        sliderLoop2 = true;
    } else {
        sliderLoop2 = false;
    }
    $('.banner-slider.style-two .item-wrapper, .featured-recipe-section.style-two .section-grid, .featured-recipe-section.style-three .section-grid').owlCarousel({
        items: 4,
        autoplay: slider_auto,
        loop: sliderLoop2,
        nav: true,
        dots: false,
        rewind: false,
        margin: 30,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        rtl: rtl,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });

    //slider three
    if ($('.banner-slider.style-three .item-wrapper .item').length > 3) {
        sliderLoop3 = true;
    } else {
        sliderLoop3 = false;
    }
    $('.banner-slider.style-three .item-wrapper').owlCarousel({
        items: 3,
        autoplay: slider_auto,
        loop: sliderLoop3,
        nav: true,
        dots: false,
        rewind: false,
        margin: 45,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        rtl: rtl,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            }
        }
    });

    //slider four
    $('.banner-slider.style-four .item-wrapper').owlCarousel({
        items: 1,
        autoplay: slider_auto,
        loop: false,
        nav: false,
        dots: true,
        rewind: false,
        autoplaySpeed: 800,
        rtl: rtl,
        autoplayTimeout: cookery_data.speed,
    });

    //slider five
    $('.banner-slider.style-five .item-wrapper').owlCarousel({
        items: 1,
        autoplay: slider_auto,
        loop: true,
        nav: true,
        dots: false,
        margin: 100,
        rtl: rtl,
        stagePadding: 155,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                margin: 10,
                stagePadding: 20,
            },
            768: {
                margin: 15,
                stagePadding: 30,
            },
            1025: {
                margin: 40,
                stagePadding: 100,
            },
            1271: {
                margin: 60,
                stagePadding: 125,
            },
            1367: {
                margin: 80,
                stagePadding: 140,
            },
            1481: {
                margin: 100,
                stagePadding: 155,
            }
        }
    });

    //slider six
    if ($('.banner-slider.style-six .item-wrapper .item').length > 6) {
        sliderLoop4 = true;
    } else {
        sliderLoop4 = false;
    }
    $('.banner-slider.style-six .item-wrapper').owlCarousel({
        items: 6,
        autoplay: slider_auto,
        loop: sliderLoop4,
        nav: true,
        dots: false,
        rewind: false,
        margin: 2,
        rtl: rtl,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1367: {
                items: 5,
            },
            1481: {
                items: 6,
            }
        }
    });

    //slider seven & eight
    if ($('.banner-slider.style-seven .item').length > 1 || $('.banner-slider.style-eight .item').length > 1) {
        sliderLoop5 = true;
    } else {
        sliderLoop5 = false;
    }
    $('.banner-slider.style-seven .item-wrapper, .banner-slider.style-eight .item-wrapper').owlCarousel({
        items: 1,
        autoplay: slider_auto,
        loop: sliderLoop5,
        nav: true,
        dots: false,
        rtl: rtl,
        autoplaySpeed: 800,
        autoplayTimeout: cookery_data.speed,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
    });

    //change newsletter input submit into button submit
    $('.blossomthemes-email-newsletter-wrapper form input[type="submit"]').each(function() {

        var submitClass = $(this).attr('class');
        var submitName = $(this).attr('name');
        var submitValue = $(this).attr('value');

        $(this).replaceWith('<button type="submit" class="' + submitClass + '" name="' + submitName + '">' + submitValue + '</button>');

    });

    //promo section slider
    $('.promo-section .bttk-itw-holder').addClass('owl-carousel');
    if ($('.promo-section .bttk-itw-holder li').length > 3) {
        itemLoop1 = true;
    } else {
        itemLoop1 = false;
    }
    $('.promo-section .widget_bttk_image_text_widget .bttk-itw-holder').owlCarousel({
        items: 3,
        autoplay: false,
        loop: itemLoop1,
        nav: true,
        dots: false,
        margin: 60,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {
            0: {
                items: 1,
                margin: 30,
            },
            768: {
                items: 2,
                margin: 30,
            },
            1025: {
                items: 3,
                margin: 30,
            },
            1200: {
                margin: 60,
            }
        }
    });

    // show/hide social share
    $('.cookery-theme:not(.delicious-recipe-activated) .post-share a.meta-title').click(function(e) {
        e.stopPropagation();
        $(this).siblings('.social-networks').slideToggle();
    });

    $('.cookery-theme:not(.delicious-recipe-activated) .post-share').click(function (e) {
        e.stopPropagation();
    });

    // $("body, html").click(function () {
    //     $(".post-share .social-networks").slideUp();
    // });

    // call lightgallery in video section
    // $('.video-section #lightgallery').lightGallery({
    //     controls: false,
    //     thumbnail: false,
    //     zoom: false,
    //     share: false,
    //     pager: false,
    //     videoMaxWidth: '100%',
    //     getCaptionFromTitleOrAlt: false,
    // });

    //featured recipe section
    if ($('.featured-recipe-section .section-grid .section-block').length > 5) {
        itemLoop2 = true;
    } else {
        itemLoop2 = false;
    }
    $('.featured-recipe-section.style-one .section-grid').owlCarousel({
        items: 5,
        autoplay: true,
        loop: itemLoop2,
        nav: true,
        dots: false,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1366: {
                items: 5,
            }
        }
    });

    //featured recipe four
    if ($('.featured-recipe-section.style-four .section-grid .section-block').length > 5) {
        sliderLoop6 = true;
    } else {
        sliderLoop6 = false;
    }
    $('.featured-recipe-section.style-four .section-grid').owlCarousel({
        items: 5,
        autoplay: true,
        loop: sliderLoop6,
        nav: true,
        dots: false,
        rewind: false,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1367: {
                items: 5,
            }

        }
    });

    //featured recipe five
    $('.featured-recipe-section.style-five .section-grid').owlCarousel({
        items: 1,
        autoplay: true,
        loop: false,
        nav: false,
        dots: true,
        rewind: false,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        responsive: {

            0: {
                dots: true,
                thumbs: false,
            },
            768: {
                dots: false,
                thumbs: true,
            },
        }
    });

    //recipe index slider
    $('.recipe-index-section .section-grid .owl-carousel').owlCarousel({
        items: 4,
        autoplay: false,
        loop: false,
        margin: 40,
        nav: true,
        dots: false,
        rewind: false,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(17.729 11.628) rotate(180)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1.5"/></g></svg>'
        ],
        responsive: {

            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1025: {
                items: 3,
            },
            1200: {
                items: 4,
            }

        }
    });

    //pull recipe category title left
    $('.dr-category a').each(function() {
        var recipeCatWidth = $(this).width();
        var recipeCatTitleWidth = $(this).children('.cat-name').outerWidth();
        var catPullValue = (parseInt(recipeCatTitleWidth) - parseInt(recipeCatWidth)) / 2;
        if ($('body').hasClass('rtl')) {
            $(this).children('.cat-name').css({
                'left': 'auto',
                'right': -catPullValue,
            });
        } else {
            $(this).children('.cat-name').css('left', -catPullValue);
        }
    });

    //wrap client section widget title text
    $('.client-section .widget .widget-title, .elem-client-section .elementor-widget-heading .elementor-heading-title').wrapInner('<span></span>');

    //advance search 
    if ($('.site-banner').hasClass('static-search')) {
        $('.static-search .item .search-form-wrap label .search-field').keyup(function() {

            if ($(this).val().length) {
                $(this).parents('.search-form-wrap').addClass('active');
            }

        });

        $(window).load(function() {

            if ($('.static-search .item .search-form-wrap label .search-field').val().length) {
                $('.search-form-wrap').addClass('active');
            }

        });

        $('.static-search .item .search-form-wrap .clear-field').on('click', function() {
            $(this).siblings('form').children('input[type="search"]').val('');
            $(this).parents('.search-form-wrap').removeClass('active');
        });
    }

    //change sticky position of sticky item
    $(window).on('resize load', function() {
        function pos_to_neg(num) {
            return -Math.abs(num);
        }
        var lastScrollTop = 0;
        var winHeight = $(window).outerHeight();
        var stickItemHeight = $('.list-sticky-with-square-img .site-main .single-item').outerHeight();
        var stickItemHeight2 = $('.list-sticky-with-tall-img .site-main .single-item').outerHeight();
        var subVal = parseInt(stickItemHeight) - parseInt(winHeight);
        var subVal2 = parseInt(stickItemHeight2) - parseInt(winHeight);
        $(window).scroll(function(event) {
            var st = $(this).scrollTop();
            if (st > lastScrollTop) {
                $('.list-sticky-with-square-img .site-main .single-item').css('top', pos_to_neg(subVal));
                $('.list-sticky-with-tall-img .site-main .single-item').css('top', pos_to_neg(subVal2));
            } else {
                $('.list-sticky-with-square-img .site-main .single-item').css('top', 0);
                $('.list-sticky-with-tall-img .site-main .single-item').css('top', 0);
            }
            lastScrollTop = st;
        });

    });

    //js for masonry grid
    $('.masonry-grid .site-main, .masonry-grid-with-boxshadow .site-main, .error404 .additional-post .section-grid').imagesLoaded(function() {

        $('.masonry-grid .site-main, .masonry-grid-with-boxshadow .site-main, .error404 .additional-post .section-grid').masonry({
            itemSelector: 'article',
        });

    });

    //Gutenberg alignfull js
    $(window).on('load resize', function() {
        var gbWindowWidth = $(window).width();
        var gbContainerWidth = $('.cookery-has-blocks .site-content > .container').width();
        var gbContentWidth = $('.cookery-has-blocks .site-main .entry-content').width();
        var gbMarginFull = (parseInt(gbContainerWidth) - parseInt(gbWindowWidth)) / 2;
        var gbMarginCenter = (parseInt(gbContentWidth) - parseInt(gbWindowWidth)) / 2;

        $(".cookery-has-blocks.full-width .site-main .entry-content .alignfull").css({ "max-width": gbWindowWidth, "width": gbWindowWidth, "margin-left": gbMarginFull });

        $(".cookery-has-blocks.full-width.centered .site-main .entry-content .alignfull").css({ "max-width": gbWindowWidth, "width": gbWindowWidth, "margin-left": gbMarginCenter });

    });

    /** Lightbox */
    if (cookery_data.lightbox == '1') {
        $('.entry-content').find('.gallery-columns-1').find('.gallery-icon > a').attr('data-fancybox', 'group1');
        $('.entry-content').find('.gallery-columns-2').find('.gallery-icon > a').attr('data-fancybox', 'group2');
        $('.entry-content').find('.gallery-columns-3').find('.gallery-icon > a').attr('data-fancybox', 'group3');
        $('.entry-content').find('.gallery-columns-4').find('.gallery-icon > a').attr('data-fancybox', 'group4');
        $('.entry-content').find('.gallery-columns-5').find('.gallery-icon > a').attr('data-fancybox', 'group5');
        $('.entry-content').find('.gallery-columns-6').find('.gallery-icon > a').attr('data-fancybox', 'group6');
        $('.entry-content').find('.gallery-columns-7').find('.gallery-icon > a').attr('data-fancybox', 'group7');
        $('.entry-content').find('.gallery-columns-8').find('.gallery-icon > a').attr('data-fancybox', 'group8');
        $('.entry-content').find('.gallery-columns-9').find('.gallery-icon > a').attr('data-fancybox', 'group9');
        $('.video-section .video-play-icon').attr('data-fancybox', 'group10');

        $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif'],[data-fancybox],.video-section .video-play-icon").fancybox({
            buttons: [
                "zoom",
                //"share",
                "slideShow",
                "fullScreen",
                //"download",
                //"thumbs",
                "close"
            ]
        });
    }

    /**
     * First Letter of word to Drop Cap
     * https://stackoverflow.com/questions/5458605/first-word-selector 
     * https://paulund.co.uk/capitalize-first-letter-string-javascript
     */
    $.fn.wrapStart = function(numWords) {
        var node = this.contents().filter(function() {
                return this.nodeType == 3;
            }).first(),
            text = node.text(),
            first = text.split(" ", numWords).join(" ");
        firstLetter = first.charAt(0);
        finale = '<span class="dropcap">' + firstLetter + '</span>' + first.slice(1);

        if (!node.length)
            return;

        node[0].nodeValue = text.slice(first.length);
        node.before(finale);
    };
    if (($('.post-template-default').length > 0 || ($('.page-template-default').length > 0 && $('.home').length == 0 && !($("body").hasClass("elementor-editor-active")))) && cookery_data.drop_cap == 1) {
        $('.entry-content p').wrapStart(1);
    }
});