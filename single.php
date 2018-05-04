<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'single' );

            the_post_navigation();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

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
