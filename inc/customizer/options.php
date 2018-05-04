<?php
/**
 * Theme Options.
 *
 * @package remy
 */

$default = remy_default_theme_options();

/**=========== Option Panel ===========**/
$wp_customize->add_panel(
    'remy_basic_panel', 
    array(
        'title'             => __( 'Theme Options', 'remy' ),
        'priority'          => 200, 
    )
);

/**=========== Header Setting - start ===========**/
$wp_customize->add_section(
    'remy_header', 
    array(    
        'title'             => __( 'Header', 'remy' ),
        'panel'             => 'remy_basic_panel', 
    )
);  

/*----------- Sticky header -----------*/
$wp_customize->add_setting(
    'remy[sticky_header]',
    array(
        'default'           => $default['sticky_header'],       
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[sticky_header]', 
    array(
        'label'             => __( 'Enable sticky header', 'remy' ),
        'section'           => 'remy_header',   
        'settings'          => 'remy[sticky_header]',     
        'type'              => 'checkbox',
    )
);
/**=========== Header Setting - end ===========**/


/**=========== Slider Settings - start ===========**/
$wp_customize->add_section(
    'remy_slider', 
    array(    
        'title'             => __( 'Slider', 'remy' ),
        'panel'             => 'remy_basic_panel'    
    )
);    

/*----------- Enable/Disable Slider -----------*/
$wp_customize->add_setting(
    'remy[slider_enable]',
    array(
        'default'           => $default['slider_enable'],       
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[slider_enable]', 
    array(
        'label'             => __( 'Enable slider OR banner image', 'remy' ),
        'section'           => 'remy_slider',   
        'settings'          => 'remy[slider_enable]',     
        'type'              => 'checkbox'
    )
);  

/*----------- Show/Hide slider excerpt -----------*/
$wp_customize->add_setting(
    'remy[slider_excerpt_enable]', 
    array(
        'default'           => $default['slider_excerpt_enable'],       
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[slider_excerpt_enable]', 
    array(
        'label'             => __( 'Display excerpt', 'remy' ),
        'section'           => 'remy_slider',   
        'settings'          => 'remy[slider_excerpt_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'remy_main_slider',
    )
);

/*----------- Show/Hide slider button -----------*/
$wp_customize->add_setting(
    'remy[slider_btn_enable]', 
    array(
        'default'           => $default['slider_btn_enable'],       
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[slider_btn_enable]', 
    array(
        'label'             => __( 'Display read button', 'remy' ),
        'section'           => 'remy_slider',   
        'settings'          => 'remy[slider_btn_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'remy_main_slider',
    )
);

/*----------- Slider type -----------*/
$wp_customize->add_setting(
    'remy[main_slider_type]', 
    array(
        'default'           => $default['main_slider_type'],        
        'sanitize_callback' => 'remy_sanitize_select'
    )
);

$wp_customize->add_control(
    'remy[main_slider_type]', 
    array(      
        'label'             => __( 'Select slider type', 'remy' ),
        'section'           => 'remy_slider',
        'settings'          => 'remy[main_slider_type]',
        'type'              => 'radio',
        'choices'           => array(
            'slider'        => __( 'Slider', 'remy' ),
            'banner-image'  => __( 'Banner image', 'remy' ),              
        ),
        'active_callback'   => 'remy_main_slider',
    )
);  

/*----------- Slider category -----------*/
$wp_customize->add_setting(
    'remy[slider_cat]', 
    array(
        'default'           => $default['slider_cat'],        
        'sanitize_callback' => 'remy_sanitize_number'
    )
);

$wp_customize->add_control(
    new Remy_Customize_Category_Control(
        $wp_customize,
        'remy[slider_cat]',
        array(
            'label'         => __( 'Category for slider', 'remy'  ),
            'description'   => __( 'Posts of selected category will be used as sliders', 'remy'  ),
            'settings'      => 'remy[slider_cat]',
            'section'       => 'remy_slider',
            'active_callback'   => 'remy_slider_category',        
        )
    )
);

/*----------- Banner image -----------*/
$wp_customize->add_setting(
    'remy[banner_image]', 
    array(
        'default'           => $default['banner_image'],             
        'sanitize_callback' => 'remy_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'remy[banner_image]', 
    array(
        'label'             => __( 'Banner image', 'remy' ),   
        'description'       => __( 'Enter the ID of post to use as a banner image.', 'remy'  ), 
        'settings'          => 'remy[banner_image]',
        'section'           => 'remy_slider',
        'type'              => 'text',
        'active_callback'   => 'remy_banner_category',         
    )
);
/**=========== Slider Settings - end ===========**/


/**=========== Home Section - start ===========**/
$wp_customize->add_section(
    'remy_home', 
    array(    
        'title'       => __( 'Home Sections', 'remy' ),
        'panel'       => 'remy_basic_panel'    
    )
);

/**=========== Show home page content ===========**/
$wp_customize->add_setting(
    'remy[home_content]', 
    array(
        'default'           => $default['home_content'],       
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[home_content]', 
    array(
        'label'       => __( 'Show home content', 'remy' ),
        'description' => __( 'Check this box to show page content in home page', 'remy' ),
        'section'     => 'remy_home',   
        'settings'    => 'remy[home_content]',      
        'type'        => 'checkbox'
    )
);


// About us
$wp_customize->add_setting(
    'remy[about_us]', 
    array(
        'default'           => $default['about_us'],             
        'sanitize_callback' => 'remy_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'remy[about_us]', 
    array(
        'label'             => __( 'About us', 'remy' ),   
        'description'       => __( 'Leave blank to hide this section', 'remy'  ), 
        'settings'          => 'remy[about_us]',
        'section'           => 'remy_home',
        'type'              => 'dropdown-pages',         
    )
);


// Our services
$wp_customize->add_setting(
    'remy[our_services]', 
    array(
        'default'           => $default['our_services'],      
        'sanitize_callback' => 'remy_sanitize_number'
        )
    );  

$wp_customize->add_control(
    new Remy_Customize_Category_Control(
        $wp_customize,
        'remy[our_services]',
        array(
            'label'       => __( 'Our services', 'remy' ),
            'description' => __( 'Leave blank to hide this section.', 'remy' ),
            'settings'    => 'remy[our_services]',
            'section'     => 'remy_home',                    
            )
        )
    );

// Testimonial
$wp_customize->add_setting(
    'remy[our_blog]', 
    array(
        'default'           => $default['our_blog'],      
        'sanitize_callback' => 'remy_sanitize_number'
        )
    );  

$wp_customize->add_control(
    new Remy_Customize_Category_Control(
        $wp_customize,
        'remy[our_blog]',
        array(
            'label'       => __( 'Our blog', 'remy' ),
            'description' => __( 'Leave blank to hide this section.', 'remy' ),
            'settings'    => 'remy[our_blog]',
            'section'     => 'remy_home',                    
            )
        )
    );


/**=========== Home Section - end ===========**/


/**=========== Social Media Options - start ===========**/
$wp_customize->add_section(
    'remy_social', 
    array(    
        'title'       => __( 'Social Media', 'remy' ),
        'panel'       => 'remy_basic_panel'    
        ));

/*----------- Social link text field -----------*/
$social_options = array('facebook', 'twitter', 'google_plus', 'instagram', 'linkedin', 'pinterest', 'youtube', 'vimeo', 'flickr', 'behance', 'dribbble', 'tumblr', 'github' );

foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));

    $label = '';

    switch ($social) {

        case 'facebook':
        $label = __('Facebook', 'remy' );
        break;

        case 'twitter':
        $label = __( 'Twitter', 'remy'  );
        break;

        case 'google_plus':
        $label = __( 'Google Plus', 'remy'  );
        break;

        case 'instagram':
        $label = __( 'Instagram', 'remy'  );
        break;

        case 'linkedin':
        $label = __( 'LinkedIn', 'remy'  );
        break;

        case 'pinterest':
        $label = __( 'Pinterest', 'remy'  );
        break;

        case 'youtube':
        $label = __( 'Youtube', 'remy'  );
        break;

        case 'vimeo':
        $label = __( 'vimeo', 'remy'  );
        break;

        case 'flickr':
        $label = __( 'Flickr', 'remy'  );
        break;

        case 'behance':
        $label = __( 'Behance', 'remy'  );
        break;

        case 'dribbble':
        $label = __( 'Dribbble', 'remy'  );
        break;

        case 'tumblr':
        $label = __( 'Tumblr', 'remy'  );
        break;

        case 'github':
        $label = __( 'Github', 'remy'  );
        break;

    }
    
    $wp_customize->add_setting( 'remy['.$social.']', array(
        'sanitize_callback'     => 'esc_url_raw',
        'sanitize_js_callback'  =>  'esc_url_raw'
        ));

    $wp_customize->add_control( 'remy['.$social.']', array(
        'label'     => $label,
        'type'      => 'text',
        'section'   => 'remy_social',
        'settings'  => 'remy['.$social.']'
        ));
}
/**=========== Social Media Options - end ===========**/


/**=========== General setting - start ===========**/
$wp_customize->add_section(
    'remy_general', 
    array(    
        'title'       => __('General Setting', 'remy' ),
        'panel'       => 'remy_basic_panel'    
    )
);

/**=========== Page layout ===========**/
$wp_customize->add_setting( 
    'remy[sidebar]',
    array(
        'default'           => $default['sidebar'],
        'sanitize_callback' => 'remy_sanitize_select',
    )
);
$wp_customize->add_control( 'remy[sidebar]',
    array(
        'label'       => esc_html__( 'Page layout', 'remy'  ),
        'section'     => 'remy_general',   
        'settings'    => 'remy[sidebar]',
        'type'        => 'radio',
        'choices'     => array(
            'right'     => esc_html__( 'Right sidebar', 'remy'  ),
            'left'      => esc_html__( 'Left sidebar', 'remy'  ),
            'no_side'   => esc_html__( 'No sidebar', 'remy'  ),
            )
    )
);

/**=========== Enable/Disable - post date ===========**/
$wp_customize->add_setting(
    'remy[enable_post_date]', 
    array(
        'default'           => $default['enable_post_date'],     
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[enable_post_date]', 
    array(
        'label'       => __('Enable post date', 'remy' ),    
        'settings'    => 'remy[enable_post_date]',
        'section'     => 'remy_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post author ===========**/
$wp_customize->add_setting(
    'remy[enable_post_author]', 
    array(
        'default'           => $default['enable_post_author'],     
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[enable_post_author]', 
    array(
        'label'       => __('Enable post author', 'remy' ),    
        'settings'    => 'remy[enable_post_author]',
        'section'     => 'remy_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post meta ===========**/
$wp_customize->add_setting(
    'remy[enable_post_meta]', 
    array(
        'default'           => $default['enable_post_meta'],     
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[enable_post_meta]', 
    array(
        'label'       => __('Enable post meta', 'remy' ),    
        'settings'    => 'remy[enable_post_meta]',
        'section'     => 'remy_general',
        'type'        => 'checkbox',
    )
);

/**=========== General setting - end ===========**/


/**=========== Footer Options - start ===========**/
$wp_customize->add_section(
    'remy_footer', 
    array(    
        'title'       => __( 'Footer', 'remy' ),
        'panel'       => 'remy_basic_panel'    
    )
); 

/**=========== Enable/Disable - social media ===========**/ 
$wp_customize->add_setting(
    'remy[enable_social_media]', 
    array(
        'default'           => $default['enable_social_media'],     
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[enable_social_media]', 
    array(
        'label'       => __( 'Enable social media', 'remy' ),    
        'settings'    => 'remy[enable_social_media]',
        'section'     => 'remy_footer',
        'type'        => 'checkbox',
    )
);     

/**=========== Copyright text ===========**/
$wp_customize->add_setting(
    'remy[copyright_text]', 
    array(
      'default'           => $default['copyright_text'],  
      'sanitize_callback' => 'sanitize_textarea_field',
    )
);

$wp_customize->add_control(
    'remy[copyright_text]', 
        array(
        'label'       => __( 'Copyright text', 'remy' ),    
        'settings'    => 'remy[copyright_text]',
        'section'     => 'remy_footer',
        'type'        => 'textarea'
    )
);

/**=========== Enable/Disable - scroll to top ===========**/
$wp_customize->add_setting(
    'remy[enable_scroll_top]', 
    array(
        'default'           => $default['enable_scroll_top'],     
        'sanitize_callback' => 'remy_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'remy[enable_scroll_top]', 
    array(
        'label'       => __( 'Enable scroll to top', 'remy' ),    
        'settings'    => 'remy[enable_scroll_top]',
        'section'     => 'remy_footer',
        'type'        => 'checkbox'
    )
);
/**=========== Footer Options - end ===========**/
