<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package remy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

 <header>
     <div class="header">
        <div class="container">
            <nav id="primary-nav" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only"> <?php echo esc_html( 'Toggle Navigation', 'remy' ); ?> </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>


                        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            endif;

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php
            endif; ?>
        </div><!-- .site-branding -->

                </div><!--navbar-header-->

                <div class="navbar-collapse collapse" id = "navbar-collapse" aria-expanded="false">


                    <?php
                      if ( has_nav_menu( 'primary' ) ) {

                        wp_nav_menu( array(
                          'theme_location'  => 'primary',
                          'container'       => 'ul',
                          'menu_class'      => 'nav navbar-nav navbar-right',
                          'menu_id'         => 'menu-main-menu',
                          'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                          'depth'           => 2,
                          'walker'          => new WP_Bootstrap_Navwalker(),
                        ) );

                      } else {

                        wp_nav_menu( array(
                          'theme_location'  => 'primary',
                          'depth'           => 1,
                          'container'       => 'ul',
                          'menu_class'      => 'nav navbar-nav navbar-right',
                          'menu_id'         => 'menu-main-menu',
                          'fallback_cb'     => 'wp_page_menu',
                        ) );

                      }
                    ?>

                </div>
            </nav>
        </div><!--container-->
    </div><!--header-->
 </header>

 <main>

<?php
 $theme_options  = remy_theme_options();

    if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
        do_action( 'remy_action_home_content' );
  }
$bg_image_url = get_header_image();

 if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
        if ( 1 === $theme_options['home_content'] ) {
            do_action( 'remy_page_header' );
        }
    } else {
        do_action( 'remy_page_header' );
    }
?>