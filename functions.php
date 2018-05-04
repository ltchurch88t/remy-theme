<?php
/**
 * Remy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package remy
 */

if ( ! function_exists( 'remy_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function remy_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Remy, use a find and replace
         * to change 'remy' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'remy', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'remy-blog', '370', '256', true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'remy' ),
            'footer' => esc_html__( 'Footer', 'remy' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'remy_custom_background_args', array(
            'default-color' => 'f6f6f6',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'remy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function remy_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'remy_content_width', 640 );
}
add_action( 'after_setup_theme', 'remy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function remy_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'remy' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'remy' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'remy_widgets_init' );


if ( ! function_exists( 'remy_fonts_url' ) ) {
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function remy_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Titillium Web, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Cabin', 'remy' ) ) {
            $fonts[] = 'Cabin:400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Source Sans Pro', 'remy' ) ) {
            $fonts[] = 'Source Sans Pro:400,600,700,900';
        }       

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}


/**
 * Enqueue scripts and styles.
 */
function remy_scripts() {

    $theme_options = remy_theme_options();

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

    wp_enqueue_style( 'remy-fonts', remy_fonts_url() );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );

    wp_enqueue_style( 'remy-style', get_stylesheet_uri() );

    wp_enqueue_style( 'remy-media', get_template_directory_uri() . '/assets/css/media.css' );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '3.3.7', true );

    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '2.2.1', true );

    wp_enqueue_script( 'remy-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );

    if( 1 === $theme_options['sticky_header'] ){
        wp_enqueue_script( 'remy-sticky-header', get_template_directory_uri() . '/assets/js/sticky-header.js', array('jquery'), '20160916', true );
    }

    wp_enqueue_script( 'remy-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'remy-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'remy_scripts' );


/**
 * Load Remy Functions.
 */
require get_template_directory() . '/inc/init-functions.php';