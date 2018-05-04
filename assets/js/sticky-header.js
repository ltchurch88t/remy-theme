jQuery(document).ready(function ($) {
    //Sticky header 
    jQuery(window).scroll(function($) {            

    var header_ht = jQuery( '.header' ).height();

    if (jQuery(this).scrollTop() > header_ht){          

        jQuery('.header').addClass('fixed');             

    }else{          

        jQuery('.header').removeClass('fixed');  
        
    }  
    
});     
});
