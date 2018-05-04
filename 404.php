<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package remy
 */

get_header(); ?>

    <div class="wrapper">
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">

                <div id= "primary" class="col-xs-12 col-sm-8 col-md-8 content-area">
                    <main id="main" class="site-main">


            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'remy' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'remy' ); ?></p>

                    <div class="widget widget_categories">
                        <h3 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'remy' ); ?></h3>
                        <ul>
                        <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                        ?>
                        </ul>
                    </div><!-- .widget -->


                    <?php

                        /* translators: %1$s: smiley */
                        $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'remy' ), convert_smilies( ':)' ) ) . '</p>';
                        the_widget( 'WP_Widget_Archives', 'dropdown=1', "before_title=<h3 class='widget-title'>$archive_content" );

                        the_widget( 'WP_Widget_Tag_Cloud' );
                    ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        
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