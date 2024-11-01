(function(){
    'use strict';
    jQuery(document).ready(function($) {
        $('.xl-product').owlCarousel({
            loop: false,
            margin: 10,
            dots: true,
            autoplay: false,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                920: {
                    items: 3
                },
                1120: {
                    items: 4
                }
            }
        });



        $('.xl-product-container span.amount').addClass('xl-price');
        $(".xl-cart a.button").unwrap();
        $(".xl-caption  a.button").wrap("<div class='xl-btn'></div>");
        $(".amount.xl-price").wrap("<span class='xl-price-area'></span>");
        
    });
})();