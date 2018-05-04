jQuery(document).ready(function(){
jQuery('#owl-carousel-banner').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    singleItem: true,
    lazyLoad: true,
    autoplay: true,
    items: 4,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
jQuery('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
jQuery('.owl-next').html('<i class="fa fa-chevron-right"></i>'); 
});
