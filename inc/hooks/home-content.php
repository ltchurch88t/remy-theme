<?php
/**
 * The home content hook for our theme.
 *
 * This is the template that displays home page contents of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package remy
 */

if ( ! function_exists( 'remy_home_content' ) ) :

  function remy_home_content(){

    ?>
        <?php
          do_action( 'remy_banner_content' );
          do_action( 'remy_about_content' );
          do_action( 'remy_menu_content' );
          do_action( 'remy_blog_content' );
        ?>
      <?php
  }

endif;

add_action( 'remy_action_home_content', 'remy_home_content', 10 );


/**
 * For banner section
 */

if ( ! function_exists( 'remy_banner_content_section' ) ) :

  function remy_banner_content_section(){

    $theme_options  = remy_theme_options();

    $enable_btn       = $theme_options['slider_btn_enable'];

    $enable_excerpt          = $theme_options['slider_excerpt_enable'];

    if( 'slider' === $theme_options['main_slider_type'] && ( 1 === $theme_options['slider_enable']) ){ 

      if(!empty( $theme_options['slider_cat'] )){

        $slider_args = array( 
                        'cat'             => absint( $theme_options['slider_cat'] ), 
                        'post_status'     => 'publish', 
                        'posts_per_page'  => 5 
                      );

      } else{

        $slider_args = array( 'post_status' => 'publish', 'posts_per_page' => 5 );

      }
       

      $slider_query = new WP_Query( $slider_args ); 

      if ( $slider_query->have_posts() ) {

   ?>

    <div class="banner">
  <div id="owl-carousel-banner" class="owl-carousel owl-theme">

    <?php 
          while ( $slider_query->have_posts() ) : $slider_query->the_post(); 

          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>


          <?php if ( !empty( $image_url ) ) { ?>
            <div class="item">
          <?php } else { ?>
            <div class="item slider-bg-img">
          <?php } ?>

      <figure>
        <?php if ( !empty( $image_url ) ) { ?>
          <img src="<?php echo esc_url($image_url[0]); ?>">
        <?php } ?>

         <div class="overlay"></div>
      </figure>
    <div class="sec-header  text-center">
     <div class="container">
    <h1> <?php the_title(); ?> </h1>

    <?php if( 1 == $enable_excerpt ){ ?>

      <span> <?php echo esc_html( remy_limit_words( get_the_excerpt(), 22 ) ); ?> </span>

      <?php } ?>


       <?php if( 1 == $enable_btn ){ ?>
          <button type="btn btn-primary" value="submit">
            <a href="<?php the_permalink(); ?>"> <?php echo esc_html( 'Read More', 'remy' ) ?> </a>
          </button>
        <?php } ?>

    </div><!--container-->
    </div><!--header-->
   </div><!--item-->

    <?php endwhile; ?>

  
  </div><!--owl-carousel-->
 </div><!--banner-->

 <?php 

  wp_reset_postdata(); 
     } else {
      do_action( 'remy_page_header' );
     }

      } elseif( 'banner-image' === $theme_options['main_slider_type'] && ( 1 === $theme_options['slider_enable']) ) { 

        $banner_args = array( 
                        'p'             => absint( $theme_options['banner_image'] ), 
                        'post_status'     => 'publish', 
                        'posts_per_page'  => 1 
                      );

      if(empty( $banner_args )) {

        $banner_args = array( 'post_status' => 'publish', 'posts_per_page' => 1 );

      }
       

      $banner_query = new WP_Query( $banner_args );

      if ( $banner_query->have_posts() ) {


    while ( $banner_query->have_posts() ) : $banner_query->the_post(); 

          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>


                    <?php if ( !empty( $image_url ) ) { ?>
            <div class="banner banner-img">
          <?php } else { ?>
            <div class="banner slider-bg-img">
          <?php } ?>


      <figure>
        <?php if ( !empty( $image_url ) ) { ?>
        <img src="<?php echo esc_url($image_url[0]); ?>">
        <?php } ?>
            <div class="overlay">
            </div><!--ovlerlay -->
          </figure>

          <div class="sec-header  text-center">
          <div class="container">
            
            <h1> <?php the_title(); ?> </h1>
             
             <?php if( 1 == $enable_excerpt ){ ?>

              <span> <?php echo esc_html( remy_limit_words( get_the_excerpt(), 22 ) ); ?> </span>

              <?php } ?>

            <?php if( 1 == $enable_btn ){ ?>
              <button type="btn btn-primary" value="submit">
                <a href="<?php the_permalink(); ?>"> <?php echo esc_html( 'Read More', 'remy' ) ?> </a>
              </button>
            <?php } ?>

        </div><!--container-->  
      </div>
    </div><!--banner-->


 <?php 

  endwhile;
        wp_reset_postdata(); 
      } else {
        do_action( 'remy_page_header' );
      }

      } else { 


        do_action( 'remy_page_header' );


       } ?>
   

  <?php
    }

endif;

add_action( 'remy_banner_content', 'remy_banner_content_section', 10 );



/**
 * For about section
 */

if ( ! function_exists( 'remy_about_content_section' ) ) :

  function remy_about_content_section(){

    $theme_options  = remy_theme_options();

    $about_us         = $theme_options['about_us'];

    if( !empty( $about_us )){

      $about_args = array( 
        'page_id'         => absint( $about_us ), 
        'post_status'     => 'publish',
      );

      $about_query = new WP_Query( $about_args ); 

      if ( $about_query->have_posts() ) :

        while ( $about_query->have_posts() ) : $about_query->the_post();

   ?>

    <div class="about">
    <div class="container">
      <div class="row">

        <?php if ( has_post_thumbnail() ) {
          $abt_col_cls = 'col-sm-6 col-md-6 sec-about';
        } else {
          $abt_col_cls = 'col-sm-12 col-md-12 sec-about';
        }
        ?>

        <div class="col-xs-12 <?php echo esc_attr( $abt_col_cls ); ?>">
          <div class="content-head text-center">
            <h1> <?php the_title() ?> </h1>
            <p> <?php the_excerpt(); ?> </p>
            <a href="<?php the_permalink(); ?>" class="read-more"> <?php echo esc_html( 'Read More', 'remy' ) ?> </a>
          </div><!--content-head-->
        </div><!--sec-about-->

        <?php if ( has_post_thumbnail() ) {  ?>

        <div class="col-xs-12 <?php echo esc_attr( $abt_col_cls ); ?>">
          <figure>
              <?php 
                  if ( has_post_thumbnail() ) { 
                    the_post_thumbnail( 'full' ); 
                  } ?>
          </figure>
        </div><!--sec-about-->

        <?php } ?>


      </div><!--row-->
    </div><!--container-->
  </div><!--about-->


   

  <?php

  endwhile;

        wp_reset_postdata();

        endif;
      }

    }

endif;

add_action( 'remy_about_content', 'remy_about_content_section', 10 );



/**
 * For about section
 */

if ( ! function_exists( 'remy_menu_content_section' ) ) :

  function remy_menu_content_section(){

    $theme_options  = remy_theme_options();

    $our_services   = $theme_options['our_services'];

    if( !empty( $our_services ) ){

   ?>

  <div id="items">
    <div class="content-dishes text-center">
      <h1> <?php echo esc_html(get_the_category_by_ID( absint( $our_services ) )); ?> </h1>
      <div class="sec-dishes">
        <div class="container">

          <?php
          $services_args = array( 
                'cat'             => absint( $our_services ), 
                'post_status'     => 'publish', 
                'posts_per_page'  => 3,
              );
          
          $services_query = new WP_Query( $services_args ); 

          if ( $services_query->have_posts() ) :
        ?>


        <div class="row">

          <?php while ( $services_query->have_posts() ) : $services_query->the_post();

            $service_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
          ?>

          <div class="col-xs-12 col-sm-4 col-md-4 list-dishes">
            <div class="item-category">
              <figure>
                <?php
                  if(has_post_thumbnail()) {
                    the_post_thumbnail( 'remy-blog' );
                  } else {
                ?>
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/no-image.gif" alt="no image">
                <?php
                  }
                ?>
              </figure>
              <div class="text-category">
                <h3> <?php the_title(); ?> </h3>
                <p> <?php echo esc_html( remy_limit_words( get_the_excerpt(), 22 ) ); ?> </p>
                <a href="<?php the_permalink(); ?>" class="read-more"> <?php echo esc_html( 'Read More', 'remy' ) ?> </a>
              </div><!--text-category-->
            </div>
          </div><!--list-dishes-->

          <?php 
            endwhile;
          ?>



        </div><!--row-->

        <?php
            wp_reset_postdata(); 
          endif;
        ?>

        </div><!--container-->
      </div><!--sec-dishes-->
    </div><!--content-head-->
    <div class="overlay">
    </div>
  </div><!--items-->
   

  <?php
      }

    }

endif;

add_action( 'remy_menu_content', 'remy_menu_content_section', 10 );



/**
 * For about section
 */

if ( ! function_exists( 'remy_blog_content_section' ) ) :

  function remy_blog_content_section(){
  
  $theme_options  = remy_theme_options();

    $our_blog   = $theme_options['our_blog'];

    if( !empty( $our_blog ) ){

   ?>

  <div class="menu">
     <div class="container">
          <div class="content-head text-center">
              <h1> <?php echo esc_html(get_the_category_by_ID( absint( $our_blog ) )); ?> </h1>
          </div><!--content-head-->
          <div class="sec-blog">

            <?php
          $blog_args = array( 
                'cat'             => absint( $our_blog ), 
                'post_status'     => 'publish', 
                'posts_per_page'  => 3,
              );
          
          $blog_query = new WP_Query( $blog_args ); 

          if ( $blog_query->have_posts() ) :
        ?>


          <div class="row">

             <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
          ?>



            <div class="col-xs-12 col-sm-4 col-md-4 blog-post">
              <figure>
                <?php
                  if(has_post_thumbnail()) {
                    the_post_thumbnail( 'remy-blog' );
                  } else {
                ?>
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/no-image.gif" alt="no image">
                <?php
                  }
                  
                if( 1 === $theme_options['enable_post_date'] || 1 === $theme_options['enable_post_author'] ) { ?>

                <figcaption>
                  <?php remy_posted_on(); ?>
                </figcaption>

                <?php } ?>

                <div class="overlay">
                </div><!--overlay-->
              </figure>
              <div class="blog-text">
                 <h4> <?php the_title(); ?> </h4>
                 <p> <?php echo esc_html( remy_limit_words( get_the_excerpt(), 22 ) ); ?> </p>
                 <a href="<?php the_permalink(); ?>" class="read-more"> <?php echo esc_html( 'Read More', 'remy' ) ?> </a>
              </div><!--blog-text-->
            </div><!--blog-post-->

              <?php 
            endwhile;
          ?>

          </div><!--row-->

          <?php
            wp_reset_postdata(); 
          endif;
        ?>

          </div><!--sec-blog-->
     </div><!--container-->
  </div><!--menu-->
  <div class="clearfix"></div>
   

  <?php

      }

    }

endif;

add_action( 'remy_blog_content', 'remy_blog_content_section', 10 );
