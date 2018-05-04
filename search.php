<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package remy
 */

get_header(); 

$theme_options  = remy_theme_options();

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
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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

get_footer();
