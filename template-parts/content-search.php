<?php
/**
 * Template part for displaying results in search pages
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
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

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

        <?php if( 'no_side' == $theme_options['sidebar'] ) { ?>

        <?php
          	if ( has_post_thumbnail() ) {
          	?>
            <div class="col-xs-12 col-sm-4 col-md-4 main-wrap">
              <figure>
               <a href="<?php the_permalink(); ?>">
               	<?php the_post_thumbnail( 'remy-blog' ); ?>
           </a>
             </figure>
            </div><!--sec-img-->
            
           <div class="col-xs-12 col-sm-8 col-md-8 main-wrap">
           <?php } else { ?>
			<div class="col-xs-12 col-sm-12 col-md-12 main-wrap">
           <?php } ?>
            <p> <?php the_excerpt(); ?> </p>

            <a href="<?php the_permalink(); ?>">
				<?php echo esc_html( 'Continue reading', 'remy' ); ?>
			</a>


          <?php } else { ?>

          <?php
          	if ( has_post_thumbnail() ) {
          	?>
            <div class="col-xs-12 col-sm-6 col-md-6 main-wrap">
              <figure>
               <a href="<?php the_permalink(); ?>">
               	<?php the_post_thumbnail( 'remy-blog' ); ?>
           </a>
             </figure>
            </div><!--sec-img-->
            
           <div class="col-xs-12 col-sm-6 col-md-6 main-wrap">
           <?php } else { ?>
			<div class="col-xs-12 col-sm-12 col-md-12 main-wrap">
           <?php } ?>
            <p> <?php the_excerpt(); ?> </p>

            <a href="<?php the_permalink(); ?>">
				<?php echo esc_html( 'Continue reading', 'remy' ); ?>
			</a>

			<?php } ?>

          </div><!--sec-img-->
        </div><!--row-->
      </div><!--entry-content-->

    <?php if( 1 === $theme_options['enable_post_meta'] ) { ?>

	<footer class="entry-footer">
		<?php remy_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php } ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
