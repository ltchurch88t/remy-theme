<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package remy
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$theme_options  = remy_theme_options();

if( 'no_side' == $theme_options['sidebar'] ) {
	return;
}

?>

<aside id="secondary" class="col-xs-12 col-sm-4 col-md-4 widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
