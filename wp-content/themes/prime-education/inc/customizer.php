<?php
/**
 * Prime Education Theme Customizer.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package prime_education
 */

if( ! function_exists( 'prime_education_customize_register' ) ):  
/**
 * Add postMessage support for site title and description for the Theme Customizer.F
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function prime_education_customize_register( $wp_customize ) {
    require get_parent_theme_file_path('/inc/controls/changeable-icon.php');
    

    if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
        $wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'prime-education' );
    }
	
    /* Option list of all post */	
    $prime_education_options_posts = array();
    $prime_education_options_posts_obj = get_posts('posts_per_page=-1');
    $prime_education_options_posts[''] = esc_html__( 'Choose Post', 'prime-education' );
    foreach ( $prime_education_options_posts_obj as $prime_education_posts ) {
    	$prime_education_options_posts[$prime_education_posts->ID] = $prime_education_posts->post_title;
    }
    
    /* Option list of all categories */
    $prime_education_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $prime_education_option_categories = array();
    $prime_education_category_lists = get_categories( $prime_education_args );
    $prime_education_option_categories[''] = esc_html__( 'Choose Category', 'prime-education' );
    foreach( $prime_education_category_lists as $prime_education_category ){
        $prime_education_option_categories[$prime_education_category->term_id] = $prime_education_category->name;
    }
    
    /** Default Settings */    
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Default Settings', 'prime-education' ),
            'description' => esc_html__( 'Default section provided by wordpress customizer.', 'prime-education' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel                  = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel                         = 'wp_default_panel';
    $wp_customize->get_section( 'header_image' )->panel                   = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel               = 'wp_default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel              = 'wp_default_panel';
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    /** Default Settings Ends */
    
    /** Site Title control */
    $wp_customize->add_setting( 
        'header_site_title', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'header_site_title',
        array(
            'label'       => __( 'Show / Hide Site Title', 'prime-education' ),
            'section'     => 'title_tagline',
            'type'        => 'checkbox',
        )
    );

    /** Tagline control */
    $wp_customize->add_setting( 
        'header_tagline', 
        array(
            'default'           => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'header_tagline',
        array(
            'label'       => __( 'Show / Hide Tagline', 'prime-education' ),
            'section'     => 'title_tagline',
            'type'        => 'checkbox',
        )
    );

    $wp_customize->add_setting('logo_width', array(
        'sanitize_callback' => 'absint', 
    ));

    // Add a control for logo width
    $wp_customize->add_control('logo_width', array(
        'label' => __('Logo Width', 'prime-education'),
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array(
            'min' => '50', 
            'max' => '500', 
            'step' => '5', 
    ),
        'default' => '100', 
    ));

    $wp_customize->add_setting( 'prime_education_site_title_size', array(
        'default'           => 30, // Default font size in pixels
        'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
    ) );

    // Add control for site title size
    $wp_customize->add_control( 'prime_education_site_title_size', array(
        'type'        => 'number',
        'section'     => 'title_tagline', // You can change this section to your preferred section
        'label'       => __( 'Site Title Font Size (px)', 'prime-education' ),
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 100,
            'step' => 1,
        ),
    ) );
    /** Post Settings */
    $wp_customize->add_section(
        'prime_education_post_settings',
        array(
            'title' => esc_html__( 'Post Settings', 'prime-education' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
        )
    );

    /** Post Heading control */
    $wp_customize->add_setting( 
        'prime_education_post_heading_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_post_heading_setting',
        array(
            'label'       => __( 'Show / Hide Post Heading', 'prime-education' ),
            'section'     => 'prime_education_post_settings',
            'type'        => 'checkbox',
        )
    );

    /** Post Meta control */
    $wp_customize->add_setting( 
        'prime_education_post_meta_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_post_meta_setting',
        array(
            'label'       => __( 'Show / Hide Post Meta', 'prime-education' ),
            'section'     => 'prime_education_post_settings',
            'type'        => 'checkbox',
        )
    );

    /** Post Image control */
    $wp_customize->add_setting( 
        'prime_education_post_image_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_post_image_setting',
        array(
            'label'       => __( 'Show / Hide Post Image', 'prime-education' ),
            'section'     => 'prime_education_post_settings',
            'type'        => 'checkbox',
        )
    );

    /** Post Content control */
    $wp_customize->add_setting( 
        'prime_education_post_content_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_post_content_setting',
        array(
            'label'       => __( 'Show / Hide Post Content', 'prime-education' ),
            'section'     => 'prime_education_post_settings',
            'type'        => 'checkbox',
        )
    );
    /** Post ReadMore control */
     $wp_customize->add_setting( 'prime_education_read_more_setting`', array(
        'default'           => true,
        'sanitize_callback' => 'prime_education_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'prime_education_read_more_setting`', array(
        'type'        => 'checkbox',
        'section'     => 'prime_education_post_settings', 
        'label'       => __( 'Display Read More Button', 'prime-education' ),
    ) );

    /** Post Header Image control */

    $wp_customize->add_setting( 'prime_education_default_image' , array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for the default image
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'prime_education_default_image_control', array(
        'label'      => __( 'Header Image', 'prime-education' ),
        'section'    => 'prime_education_post_settings',
        'settings'   => 'prime_education_default_image',
    )));

    /** Post Settings Ends */

     /** Single Post Settings */
    $wp_customize->add_section(
        'prime_education_single_post_settings',
        array(
            'title' => esc_html__( 'Single Post Settings', 'prime-education' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
        )
    );

    /** Single Post Meta control */
    $wp_customize->add_setting( 
        'prime_education_single_post_meta_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_single_post_meta_setting',
        array(
            'label'       => __( 'Show / Hide Single Post Meta', 'prime-education' ),
            'section'     => 'prime_education_single_post_settings',
            'type'        => 'checkbox',
        )
    );

    /** Single Post Content control */
    $wp_customize->add_setting( 
        'prime_education_single_post_content_setting', 
        array(
            'default'           => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_single_post_content_setting',
        array(
            'label'       => __( 'Show / Hide Single Post Content', 'prime-education' ),
            'section'     => 'prime_education_single_post_settings',
            'type'        => 'checkbox',
        )
    );

    /** Single Post Settings Ends */

    /** General Settings */
    $wp_customize->add_section(
        'prime_education_general_settings',
        array(
            'title' => esc_html__( 'General Settings', 'prime-education' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );

    /** Scroll to top control */
    $wp_customize->add_setting( 
        'prime_education_footer_scroll_to_top', 
        array(
            'default' => 1,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_footer_scroll_to_top',
        array(
            'label'       => __( 'Show Scroll To Top', 'prime-education' ),
            'section'     => 'prime_education_general_settings',
            'type'        => 'checkbox',
        )
    );

     $wp_customize->add_setting('prime_education_scroll_icon',array(
        'default'   => 'fas fa-arrow-up',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_scroll_icon',array(
        'label' => __('Scroll Top Icon','prime-education'),
        'transport' => 'refresh',
        'section'   => 'prime_education_general_settings',
        'type'      => 'icon'
    )));

    /** Preloader control */
    $wp_customize->add_setting( 
        'prime_education_header_preloader', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_header_preloader',
        array(
            'label'       => __( 'Show Preloader', 'prime-education' ),
            'section'     => 'prime_education_general_settings',
            'type'        => 'checkbox',
        )
    );

    $wp_customize->add_setting('prime_education_loader_layout_setting', array(
        'default' => 'load',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for loader layout
    $wp_customize->add_control('prime_education_loader_layout_control', array(
        'label' => __('Preloader Layout', 'prime-education'),
        'section' => 'prime_education_general_settings',
        'settings' => 'prime_education_loader_layout_setting',
        'type' => 'select',
        'choices' => array(
            'load' => __('Preloader 1', 'prime-education'),
            'load-one' => __('Preloader 2', 'prime-education'),
            'ctn-preloader' => __('Preloader 3', 'prime-education'),
        ),
    ));
    /** Sticky Header control */
    $wp_customize->add_setting( 
        'prime_education_sticky_header', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_sticky_header',
        array(
            'label'       => __( 'Show Sticky Header', 'prime-education' ),
            'section'     => 'prime_education_general_settings',
            'type'        => 'checkbox',
        )
    );

    // Add Setting for Menu Font Weight
    $wp_customize->add_setting( 'menu_font_weight', array(
        'default'           => '700',
        'sanitize_callback' => 'prime_education_sanitize_font_weight',
    ) );

    // Add Control for Menu Font Weight
    $wp_customize->add_control( 'menu_font_weight', array(
        'label'    => __( 'Menu Font Weight', 'prime-education' ),
        'section'  => 'prime_education_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '100' => __( '100 - Thin', 'prime-education' ),
            '200' => __( '200 - Extra Light', 'prime-education' ),
            '300' => __( '300 - Light', 'prime-education' ),
            '400' => __( '400 - Normal', 'prime-education' ),
            '500' => __( '500 - Medium', 'prime-education' ),
            '600' => __( '600 - Semi Bold', 'prime-education' ),
            '700' => __( '700 - Bold', 'prime-education' ),
            '800' => __( '800 - Extra Bold', 'prime-education' ),
            '900' => __( '900 - Black', 'prime-education' ),
        ),
    ) );

    // Add Setting for Menu Text Transform
    $wp_customize->add_setting( 'menu_text_transform', array(
        'default'           => 'uppercase',
        'sanitize_callback' => 'prime_education_sanitize_text_transform',
    ) );

    // Add Control for Menu Text Transform
    $wp_customize->add_control( 'menu_text_transform', array(
        'label'    => __( 'Menu Text Transform', 'prime-education' ),
        'section'  => 'prime_education_general_settings',
        'type'     => 'select',
        'choices'  => array(
            'none'       => __( 'None', 'prime-education' ),
            'capitalize' => __( 'Capitalize', 'prime-education' ),
            'uppercase'  => __( 'Uppercase', 'prime-education' ),
            'lowercase'  => __( 'Lowercase', 'prime-education' ),
        ),
    ) );

    /** Header Section Settings */
    $wp_customize->add_section(
        'prime_education_header_section_settings',
        array(
            'title' => esc_html__( 'Header Section Settings', 'prime-education' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );

    /** Header Section control */
    $wp_customize->add_setting( 
        'prime_education_header_setting', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_header_setting',
        array(
            'label'       => __( 'Show Header', 'prime-education' ),
            'section'     => 'prime_education_header_section_settings',
            'type'        => 'checkbox',
        )
    );

     /** Email */
    $wp_customize->add_setting(
        'prime_education_header_email',
        array( 
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_header_email',
        array(
            'label' => esc_html__( 'Add Email', 'prime-education' ),
            'section' => 'prime_education_header_section_settings',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('prime_education_mail_icon',array(
        'default'   => 'fas fa-envelope',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_mail_icon',array(
        'label' => __('Mail Icon','prime-education'),
        'transport' => 'refresh',
        'section'   => 'prime_education_header_section_settings',
        'type'      => 'icon'
    )));

    /**  TIMING */
    $wp_customize->add_setting(
        'prime_education_header_location',
        array( 
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_header_location',
        array(
            'label' => esc_html__( 'Add Timming', 'prime-education' ),
            'section' => 'prime_education_header_section_settings',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('prime_education_marker_icon',array(
        'default'   => 'far fa-clock',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_marker_icon',array(
        'label' => __('Timming Icon','prime-education'),
        'transport' => 'refresh',
        'section'   => 'prime_education_header_section_settings',
        'type'      => 'icon'
    )));


    /** Phone */
    $wp_customize->add_setting(
        'prime_education_header_phone',
        array( 
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_header_phone',
        array(
            'label' => esc_html__( 'Add Phone', 'prime-education' ),
            'section' => 'prime_education_header_section_settings',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting('prime_education_phone_icon',array(
        'default'   => 'fas fa-phone-volume',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_phone_icon',array(
        'label' => __('Phone Icon','prime-education'),
        'transport' => 'refresh',
        'section'   => 'prime_education_header_section_settings',
        'type'      => 'icon'
    )));

    $wp_customize->add_setting( 
        'prime_education_show_hide_search', 
        array(
            'default' => false ,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_show_hide_search',
        array(
            'label'       => __( 'Show Search Icon', 'prime-education' ),
            'section'     => 'prime_education_header_section_settings',
            'type'        => 'checkbox',
        )
    );
    $wp_customize->add_setting('prime_education_search_icon',array(
        'default'   => 'fas fa-search',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_search_icon',array(
        'label' => __('Search Icon','prime-education'),
        'transport' => 'refresh',
        'section'   => 'prime_education_header_section_settings',
        'type'      => 'icon'
    )));

    /** Header Section Settings End */

    /** Socail Section Settings */
    $wp_customize->add_section(
        'prime_education_social_section_settings',
        array(
            'title' => esc_html__( 'Social Media Section Settings', 'prime-education' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );

    /** Socail Section control */
    $wp_customize->add_setting( 
        'prime_education_social_icon_setting', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_social_icon_setting',
        array(
            'label'       => __( 'Show Social Icon', 'prime-education' ),
            'section'     => 'prime_education_social_section_settings',
            'type'        => 'checkbox',
        )
    );

    /**  Social Link 1 */
    $wp_customize->add_setting(
        'prime_education_social_link_1',
        array( 
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_social_link_1',
        array(
            'label' => esc_html__( 'Add Facebook Link', 'prime-education' ),
            'section' => 'prime_education_social_section_settings',
            'type' => 'url',
        )
    );

    /**  Social Link 2 */
    $wp_customize->add_setting(
        'prime_education_social_link_2',
        array( 
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_social_link_2',
        array(
            'label' => esc_html__( 'Add Twitter Link', 'prime-education' ),
            'section' => 'prime_education_social_section_settings',
            'type' => 'url',
        )
    );

    /**  Social Link 3 */
    $wp_customize->add_setting(
        'prime_education_social_link_3',
        array( 
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_social_link_3',
        array(
            'label' => esc_html__( 'Add Instagram Link', 'prime-education' ),
            'section' => 'prime_education_social_section_settings',
            'type' => 'url',
        )
    );

    /**  Social Link 4 */
    $wp_customize->add_setting(
        'prime_education_social_link_4',
        array( 
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_social_link_4',
        array(
            'label' => esc_html__( 'Add Pintrest Link', 'prime-education' ),
            'section' => 'prime_education_social_section_settings',
            'type' => 'url',
        )
    );

    /** Socail Section Settings End */

    /** Home Page Settings */
    $wp_customize->add_panel( 
        'prime_education_home_page_settings',
         array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'title' => esc_html__( 'Home Page Settings', 'prime-education' ),
            'description' => esc_html__( 'Customize Home Page Settings', 'prime-education' ),
        ) 
    );

    /** Slider Section Settings */
    $wp_customize->add_section(
        'prime_education_slider_section_settings',
        array(
            'title' => esc_html__( 'Slider Section Settings', 'prime-education' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'prime_education_home_page_settings',
        )
    );

    /** Slider Section control */
    $wp_customize->add_setting( 
        'prime_education_slider_setting', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_slider_setting',
        array(
            'label'       => __( 'Show Slider', 'prime-education' ),
            'section'     => 'prime_education_slider_section_settings',
            'type'        => 'checkbox',
        )
    );
    
    $categories = get_categories();
        $cat_posts = array();
            $i = 0;
            $cat_posts[]='Select';
        foreach($categories as $category){
            if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_posts[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
        'prime_education_blog_slide_category',
        array(
            'default'   => 'select',
            'sanitize_callback' => 'prime_education_sanitize_choices',
        )
    );
    $wp_customize->add_control(
        'prime_education_blog_slide_category',
        array(
            'type'    => 'select',
            'choices' => $cat_posts,
            'label' => __('Select Category to display Latest Post','prime-education'),
            'section' => 'prime_education_slider_section_settings',
        )
    );

    /** Classes Section Settings */
    $wp_customize->add_section(
        'prime_education_classes_section_settings',
        array(
            'title' => esc_html__( 'Category Section Settings', 'prime-education' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'prime_education_home_page_settings',
        )
    );

    /** Classes Section control */
    $wp_customize->add_setting( 
        'prime_education_classes_setting', 
        array(
            'default' => false,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_classes_setting',
        array(
            'label'       => __( 'Show Category Section', 'prime-education' ),
            'section'     => 'prime_education_classes_section_settings',
            'type'        => 'checkbox',
        )
    );

    // Section Title
    $wp_customize->add_setting(
        'prime_education_section_title', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',    
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'prime_education_section_title', 
        array(
            'label'       => __('Section Title', 'prime-education'),
            'section'     => 'prime_education_classes_section_settings',
            'settings'    => 'prime_education_section_title',
            'type'        => 'text'
        )
    );

    for ($i=1; $i <= 6; $i++) {

     $wp_customize->add_setting('prime_education_category_icon'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Prime_Education_Changeable_Icon(
        $wp_customize,'prime_education_category_icon'.$i,array(
        'label' => __('Category Icon','prime-education').$i,
        'transport' => 'refresh',
        'section'   => 'prime_education_classes_section_settings',
        'type'      => 'icon'
    )));

    // Section Title
    $wp_customize->add_setting(
        'prime_education_section_category_title'.$i, 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',    
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'prime_education_section_category_title'.$i, 
        array(
            'label'       => __('Category Title', 'prime-education').$i,
            'section'     => 'prime_education_classes_section_settings',
            'settings'    => 'prime_education_section_category_title'.$i,
            'type'        => 'text'
        )
    );

    $wp_customize->add_setting(
        'prime_education_section_category_title_url'.$i,
        array( 
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh'
        )
    );
    
    $wp_customize->add_control(
        'prime_education_section_category_title_url'.$i,
        array(
            'label' => esc_html__( 'Add Category Title URL', 'prime-education' ).$i,
            'section' => 'prime_education_classes_section_settings',
            'type' => 'url',
        )
    );

}


    
    /** Home Page Settings Ends */
    
    /** Footer Section */
    $wp_customize->add_section(
        'prime_education_footer_section',
        array(
            'title' => __( 'Footer Settings', 'prime-education' ),
            'priority' => 70,
        )
    );

    /** Footer Copyright control */
    $wp_customize->add_setting( 
        'prime_education_footer_setting', 
        array(
            'default' => true,
            'sanitize_callback' => 'prime_education_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control(
        'prime_education_footer_setting',
        array(
            'label'       => __( 'Show Footer Copyright', 'prime-education' ),
            'section'     => 'prime_education_footer_section',
            'type'        => 'checkbox',
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'prime_education_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'prime_education_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'prime-education' ),
            'section' => 'prime_education_footer_section',
            'type' => 'text',
        )
    );  
$wp_customize->add_setting('footer_background_image',
        array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_control(
         new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_background_image',
            array(
                'label' => esc_html__('Footer Background Image', 'prime-education'),
                'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'prime-education'), 1024, 800),
                'section' => 'prime_education_footer_section',
                'width' => 1024,
                'height' => 800,
                'flex_width' => true,
                'flex_height' => true,
                'priority' => 100,
            )
        )
    );

    /* Footer Background Color*/
    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_color',
            array(
                'label' => __('Footer Widget Area Background Color', 'prime-education'),
                'section' => 'prime_education_footer_section',
                'type' => 'color',
            )
        )
    );

    // 404 PAGE SETTINGS
    $wp_customize->add_section(
        'prime_education_404_section',
        array(
            'title' => __( '404 Page Settings', 'prime-education' ),
            'priority' => 70,
        )
    );
   
    $wp_customize->add_setting('404_page_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw', // Sanitize as URL
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, '404_page_image', array(
        'label' => __('404 Page Image', 'prime-education'),
        'section' => 'prime_education_404_section',
        'settings' => '404_page_image',
    )));

    $wp_customize->add_setting('404_pagefirst_header', array(
        'default' => __('404', 'prime-education'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text field
    ));

    $wp_customize->add_control('404_pagefirst_header', array(
        'type' => 'text',
        'label' => __('Heading', 'prime-education'),
        'section' => 'prime_education_404_section',
    ));

    // Setting for 404 page header
    $wp_customize->add_setting('404_page_header', array(
        'default' => __('Sorry, that page can\'t be found!', 'prime-education'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text field
    ));

    $wp_customize->add_control('404_page_header', array(
        'type' => 'text',
        'label' => __('Heading', 'prime-education'),
        'section' => 'prime_education_404_section',
    ));
    function prime_education_sanitize_choices( $input, $setting ) {
        global $wp_customize; 
        $control = $wp_customize->get_control( $setting->id ); 
        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }

}
add_action( 'customize_register', 'prime_education_customize_register' );
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function prime_education_customize_preview_js() {
    // Use minified libraries if SCRIPT_DEBUG is false
    $prime_education_build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $prime_education_suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'prime_education_customizer', get_template_directory_uri() . '/js' . $prime_education_build . '/customizer' . $prime_education_suffix . '.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'prime_education_customize_preview_js' );