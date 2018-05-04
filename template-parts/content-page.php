<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package remy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->


		<div class="entry-content">
	    	<div class="row">
	    		<div class="col-xs-12 col-sm-12 col-md-12 main-wrap">
	    		<?php if ( has_post_thumbnail() ) { ?>
	    			<figure>
 			 	    	<?php the_post_thumbnail( 'full' ); ?>
 			 	    </figure>
 			 	<?php } ?>

	      		<?php
				the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'remy' ),
						'after'  => '</div>',
					) );
				?>
				</div>
			</div>
		</div><!--entry-content-->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'remy' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
