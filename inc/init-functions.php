<?php
/**
 * Load files
 *
 * @package remy
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Include default theme options
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Hook for home page content
 */
require get_template_directory() . '/inc/hooks/home-content.php';

/**
 * Hook for page header
 */
require get_template_directory() . '/inc/hooks/page-header.php';

/**
 * Hook for footer social media
 */
require get_template_directory() . '/inc/hooks/social-media.php';

/**
 * bootstrap navigation
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function remy_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'remy_excerpt_more' );

/**
 * Function limit the number of words.
 */
function remy_limit_words($string, $word_limit) {

	$words = explode(' ', $string, ($word_limit + 1));

	if(count($words) > $word_limit) {

		if(count($words) > $word_limit) {

			array_pop($words);

			return implode(' ', $words).'...';
			
		}
	} else {  

		return $string;

	}

}
