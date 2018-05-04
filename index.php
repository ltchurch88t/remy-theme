<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package remy
 */

get_header(); 

$theme_options  = remy_theme_options();

	if ((( get_option( 'show_on_front' ) == 'posts' ) && ( 1 == $theme_options['home_content']) ) || (is_home()) ) {
?>

<div class="wrapper">
 	<div id="content" class="site-content">
 		<div class="container">
 			<div class="row">

 				<?php if( 'left' == $theme_options['sidebar'] ) { ?>

                    <div id="primary" class="col-xs-12 col-sm-8 col-md-8 content-area left-sidebar">

                    <?php } elseif( 'no_side' == $theme_options['sidebar'] ) { ?>

                    <div id="primary" class="col-xs-12 col-sm-12 col-md-12 content-area">
					
					<?php } else { ?>

					<div id="primary" class="col-xs-12 col-sm-8 col-md-8 content-area">

                <?php } ?>

 				<main id="main" class="site-main">
	

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();

?>

	</div><!--row-->
 	</div><!--container-->
 	</div><!--site-content-->	
 	</div><!--wrapper-->


<?php
}
get_footer();
