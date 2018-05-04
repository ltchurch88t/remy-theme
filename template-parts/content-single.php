<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package remy
 */

$theme_options  = remy_theme_options();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
		<?php if( 1 === $theme_options['enable_post_date'] || 1 === $theme_options['enable_post_author'] ) { ?>
		<div class="entry-meta">
			<?php remy_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
			}
		endif; ?>
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

    <?php if( 1 === $theme_options['enable_post_meta'] ) { ?>

	<footer class="entry-footer">
		<?php remy_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
