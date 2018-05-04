<?php 
/**
 * Sanitization
 *
 * @package remy
 */

/**=========== Select/radio santitization ===========**/

if ( ! function_exists( 'remy_sanitize_select' ) ) :

    function remy_sanitize_select( $input, $setting ) {
      
        $input = esc_attr( $input );
      
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;


/**=========== Checkbox santitization ===========**/

if ( ! function_exists( 'remy_sanitize_checkbox' ) ) :

    function remy_sanitize_checkbox( $input ) {

        if ( $input == 1 ) {

            return 1;

        } else {

            return '';

        }
    }

endif;


/**=========== Integer number sanitization ===========**/

if ( ! function_exists( 'remy_sanitize_number' ) ) :

    function remy_sanitize_number( $input, $setting ) {

        $input = absint( $input );

        return ( $input ? $input : $setting->default );

    }

endif;


/**=========== Active callback for slider ===========**/

if ( ! function_exists( 'remy_main_slider' ) ) :

    function remy_main_slider( $control ) { 

        if( 1 == $control->manager->get_setting( 'remy[slider_enable]' )->value() ){

            return true;

        } else {

            return false;

        }
    }
 
endif;


/**=========== Active callback for type of slider ===========**/

if ( ! function_exists( 'remy_slider_category' ) ) :

    function remy_slider_category( $control ) { 

        if( 'slider' == $control->manager->get_setting( 'remy[main_slider_type]' )->value() && 1 == $control->manager->get_setting( 'remy[slider_enable]' )->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;


/**=========== Active callback for type of banner ===========**/

if ( ! function_exists( 'remy_banner_category' ) ) :

    function remy_banner_category( $control ) { 
        
        if( 'banner-image' == $control->manager->get_setting( 'remy[main_slider_type]' )->value() && 1 == $control->manager->get_setting( 'remy[slider_enable]' )->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;
