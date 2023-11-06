(() => {
    // TESTIMONIAL SLIDER
    jQuery('.js-testimonial-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        items: 1
    });

    // TESTIMONIAL
    jQuery('.js-testimonial').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        responsive: {
            0 : {
                items: 1,
                stagePadding: 30,
                margin: 10
            },
            768 :  {
                items: 3,
                margin: 20,
                stagePadding: 0
            }
        }
    });
    
    // ANNOUNCEMENTS
    jQuery('.js-text-scroller').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        responsive: {
            0 : {
                items: 2,
                center: true,
                margin: 10
            },
            768 :  {
                items: 3,
                margin: 20
            },
            1024 : {
                items: 4,
                stagePadding: 0,
                margin: 30
            }
        }
    });

    // IMAGE CAROUSEL
    jQuery('.js-image-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        margin: 10,
        responsive: {
            0 : {
                items: 1,
                center: true,
                stagePadding: 50
            },
            768 :  {
                nav: false,
                loop: false,
                items: 2,
                margin: 20
            },
            1024 : {
                nav: false,
                loop: false,
                items: 3,
                stagePadding: 20,
                margin: 20
            }
        }
    });

    // ANNOUNCEMENTS
    jQuery('.js-announcement').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        items: 1
    });

    // STEPS
    if( jQuery(window).width() < 768 ) {
        jQuery('.js-steps').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            autoplay: false,
            autoHeight: true,
            autoplayTimeout: 6000,
            items: 1
        });
        jQuery('.comparison-table__others .other-products').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            autoplay: false,
            autoHeight: true,
            items: 1
        });
    }

    // HERO SLIDER
    jQuery('.js-hero').owlCarousel({
        loop: ( $('.owl-carousel .items').length > 1 ),
        nav: true,
        dots: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 6000,
        items: 1
    });

    // LOGO CAROUSEL
    jQuery('.js-logo-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 6000,
        margin: 20,
        responsive: {
            0 : {
                items: 1,
                center: true,
                stagePadding: 50,
                nav: false
            },
            768 :  {
                items: 3,
                nav: false,
            },
            1024 : {
                loop: false,
                items: 6,
                stagePadding: 0,
                margin: 40,
                nav: false
            }
        }
    });

    jQuery('.js-logo-carousel-label').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 6000,
        margin: 20,
        responsive: {
            0 : {
                items: 1,
                center: true,
                stagePadding: 50,
                nav: false
            },
            768 :  {
                items: 3,
                nav: false,
            },
            1024 : {
                loop: false,
                items: 5,
                stagePadding: 0,
                margin: 40,
                nav: false
            }
        }
    });


    // VIDEO
    jQuery('.video-wrapper svg').click(function(){
        const _parent = jQuery(this).parent();
        const _video = jQuery('video', _parent);

        _parent.addClass('playing');
        _video.trigger('play');

    });

    // COMPARISON MOBILE TOGGLE
    jQuery('.other-choices .js-toggle').click(function(){
        jQuery(this).parent().toggleClass('active');
        jQuery('.other-choices ul').toggleClass('active');
    });

    jQuery('.other-choices ul li').click(function(){
        jQuery('.other-choices').removeClass('active');
        jQuery('.other-choices ul').removeClass('active');

        const _slug = jQuery(this).attr('class');

        jQuery('.other-products__item').removeClass('active');
        jQuery('.other-products__item.' + _slug ).addClass('active');
    });

    jQuery('.js-additional-trigger').click(function(){
        jQuery('.module--additional').toggleClass('active');
    });

    // Mobile Menu
    const _mobileMenu = jQuery('.mobile-navigation');
    jQuery('.js-mobile-open').click(function(){
        _mobileMenu.addClass('open');
    });

    jQuery('.js-mobile-close').click(function(){
        _mobileMenu.removeClass('open');
    });

    const _faqs = document.querySelectorAll('.faq-list');
    if( _faqs ) {
        _faqs.forEach( _faq => {
            const _question = _faq.querySelectorAll('.faq-question');

            _question.forEach( _toggle => {
                _toggle.addEventListener('click', e => {
                    e.preventDefault();
                    const _target = e.currentTarget;
                    const _parent = _target.parentNode;

                    _parent.classList.toggle('active');
                });
            });
        });
    }

    jQuery('.js-variations').click(function(){
        jQuery('.js-variations').removeClass('active');
        jQuery(this).addClass('active');

        const _slug = jQuery(this).data('slug');
        jQuery('.variation--buttons').removeClass('active');
        jQuery( '.' + _slug ).addClass('active');
    });

    jQuery(window).scroll(function(){
        if( scrollY > 120 ) {
            jQuery('.site-header').addClass('is-sticky');
        } else {
            jQuery('.site-header').removeClass('is-sticky');
        }
    });

    jQuery('.footer-navigation li.menu-item-has-children').append('<span class="trigger"></span>');
    jQuery('.footer-navigation li.menu-item-has-children .trigger').click(function(){
        jQuery(this).parent().toggleClass('active');
    });

    // PRICE SWITCHER
    jQuery('.cart .variations select').on('change', function(){
        const _varPrice = jQuery('.woocommerce-variation-price').html();

        console.log( _varPrice );

        setTimeout( () => {
            jQuery('.woocommerce-page div.product .product-info__title--header .price').html( _varPrice );
        }, 500); 
    });

    // LAZY LOAD IMAGES
    const _images = document.querySelectorAll('img');

	[].forEach.call( _images, image => {
        let _exp    = image.getAttribute('loading');
        let _source = image.getAttribute('data-src');

        if( !_exp && !image.parentNode.classList.contains('wp-block-image') ) {
            image.setAttribute('src', _source);
        }

        image.onload = () => {

            image.removeAttribute('data-src');

        }

	});

    jQuery(document).ready(function($){

        function contains(selector, text) {
          var elements = document.querySelectorAll(selector);
          return Array.prototype.filter.call(elements, function(element){
            if( RegExp(text).test(element.textContent) ){
                element.classList.add("found")
            }else{
                element.classList.remove("found")
            }
          });
        }

        var url_string = location.href; 
        var url = new URL(url_string);
        let searchParams = new URLSearchParams(url.search);

        contains('.group-wrapper', searchParams.get('search'))
        console.log(searchParams.get('search'))
        if(searchParams.get('search') != null){
            jQuery('.accordion-group-right').addClass('result')
            jQuery('.accordion-group-left .navigation').css('display', 'none')
            // jQuery('.accordion-group-left .search-reset').css('display', 'block')
        }else{
            // jQuery('.accordion-group-left .search-reset').css('display', 'none')
        }

        // For safari Autoplay
        jQuery('video').attr('playsinline', '')

        // ACOORDION FUNCTION
        $('.accordion-wrapper').each(function(){
            $(this).click(function(){
                $(this).toggleClass('active');
                $(this).children('.accordion-content').toggleClass('active');
                $(this).siblings('.accordion-wrapper').removeClass('active');
                $(this).siblings('.accordion-wrapper').children('.accordion-content').removeClass('active');;
            });
        });

        //Accordion Group Navigation active state
        jQuery('.accordion-group-left .button-wrapper a').on('click', function(){
            var attr = jQuery(this).attr('data-target')
            jQuery(this).addClass('active')
            jQuery('a:not([data-target="'+attr+'"])').removeClass('active')
        })
    
        //Accordion Group
        $('.js-navigation-carousel').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 6000,
            margin: 20,
            items: 1,
            center: false,
            stagePadding: 50,
            autoWidth: true,
            responsive: {
                0 : {
                    items: 1,
                },
                767 :  {
                    items: 3,
                },
            }
        });
    
        //Featured On
        $('.js-logo-group').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 6000,
            margin: 20,
            center: false,
            stagePadding: 50,
            responsive: {
                0 : {
                    items: 1,
                },
                767 :  {
                    items: 3,
                },
                1024 :  {
                    items: 5,
                },
            }
        });
    
        // ACCORDION STICKY SIDEBAR NAVIGATION
        // .accordion-group-left .navigation
        $(function() {
            var navigation_top = $('.accordion-group-left').offset().top - 90;
            var navigation_bottom = $('.accordion-group-left').offset().top + $('.accordion-group-left').height() - ($('.accordion-group-left .navigation').height() + 100);
            var scroll_top = $('html').scrollTop();
            var navigation_width = $('.accordion-group-left').width();
    
            $('.accordion-group-left .navigation').css({ 'max-width':navigation_width });
    
            $(window).resize(function(){
                navigation_width = $('.accordion-group-left').width();
    
                $('.accordion-group-left .navigation').css({ 'max-width':navigation_width });
            });
    
            $(window).on('scroll', function(){
                navigation_bottom = $('.accordion-group-left').offset().top + $('.accordion-group-left').height() - ($('.accordion-group-left .navigation').height() + 200);
                scroll_top = $('html').scrollTop();
    
                if(scroll_top > navigation_top && scroll_top < navigation_bottom) {
                    $('.accordion-group-left .navigation').css({ 'position':'fixed', 'top':90, 'bottom':'unset'});
                } else if(scroll_top > navigation_top && scroll_top > navigation_bottom) {
                    $('.accordion-group-left .navigation').css({ 'position':'absolute', 'top':'unset', 'bottom':'100px' });
                } else {
                    $('.accordion-group-left .navigation').css({ 'position':'relative', 'top':0, 'bottom':'unset' });
                }
            });
        });
    
        $(window).resize(function(){
            $('.blog-categories').children('.category-list').removeClass('expand');
        });
    
        $('.blog-categories').click(function(){
            $(this).children('.category-list').toggleClass('expand');
        });

        jQuery('#filter').on('change', function() {
            this.form.submit();
        });
    
    });

})();