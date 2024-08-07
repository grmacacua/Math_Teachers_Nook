<?php
if ( ! function_exists( 'hello_education_child_options' ) ) {
	function hello_education_child_options($wp_customize){

        /** remove parent settings */
        $wp_customize->remove_control('educenter_top_header');
        $wp_customize->get_section('educenter_header_quickinfo')->panel = "educenter_header_general_settings";
        $wp_customize->get_section('educenter_social_link_activate_settings')->panel = "educenter_header_general_settings";

		$course_term = get_terms(
			apply_filters(
				'hello_education_display_cate_filter', array(
					'taxonomy' => 'course_category',
					'parent'   => 0
				)
			)
		);
		$course_cat = array();
		foreach( $course_term as $category ) {
			if(!is_object($category)) continue;
			$course_cat[$category->term_id] = $category->name;
		}
		unset($course_term);


		global $wp_customize;

    /**
     * List All Pages
    */
    $slider_pages = array();
    $slider_pages_obj = get_pages();
    $slider_pages[''] = esc_html__('Select Page','hello-education');
    foreach ($slider_pages_obj as $page) {
      $slider_pages[$page->ID] = $page->post_title;
    }

    /**
     * Slider Feature Services Settings
    */
    $wp_customize->add_section( 'hello_education_features_services_area_options', array(
      'title'    => esc_html__('Slider Services Settings', 'hello-education'),
      'priority' => 4,
    ));

        $wp_customize->add_setting( 'hello_education_feature_services_area_settings', array(
            'sanitize_callback' => 'educenter_sanitize_repeater',
            'default' => json_encode( array(
            array(
                  'fservices_icon' => 'fa fa-desktop',
                  'fservices_page' => '',
                )
            ) )        
        ));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'hello_education_feature_services_area_settings', array(
            'label'   => esc_html__('Features Services Settings Area','hello-education'),
            'section' => 'hello_education_features_services_area_options',
            'box_label' => esc_html__('Features Services','hello-education'),
            'add_label' => esc_html__('Add New Services','hello-education'),
        ),
        array(
            'fservices_icon' => array(
                'type'      => 'icon',
                'label'     => esc_html__( 'Select Services Icon', 'hello-education' ),
                'default'   => 'fa fa-desktop'
            ),
            'fservices_page' => array(
                'type'      => 'select',
                'label'     => esc_html__( 'Select Services Page', 'hello-education' ),
                'options'   => $slider_pages
            )      
        )));




		$wp_customize->add_setting( 'educenter_course_area_settings', array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		if(class_exists('Educenter_Customize_Control_Checkbox_Multiple')){
			$wp_customize->add_control( new Educenter_Customize_Control_Checkbox_Multiple( $wp_customize, 'educenter_course_area_settings', array(
				'label' => esc_html__( 'Course Cateogry', 'hello-education' ),
				'section' => 'educenter_courses_settings',
				'settings' => 'educenter_course_area_settings',
				'choices' => $course_cat
			) ) );

			unset($course_cat);
		}

		$wp_customize->add_setting( 'educenter_course_area_number_of_course', array(
			'default'			=> '8',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('educenter_course_area_number_of_course', array(
			'section'    => 'educenter_courses_settings',
			'label'      => esc_html__('No of course', 'hello-education'),
			'type'       => 'number'  
		));


		/**
		 * Services Settings Area
		*/

        $slider_pages_obj = new WP_Query(
            array(
                'post_type'      => 'lp_course',
                'posts_per_page' => - 1,
            )
        );
        
        $course_pages = array();
        if( is_object($slider_pages_obj) && isset($slider_pages_obj->posts) ){
            foreach ($slider_pages_obj->posts as $page) {
                $course_pages[$page->ID] = $page->post_title;
            }
        }
        wp_reset_query(  );
		$wp_customize->add_setting( 'educenter_services_area_settings', array(
			'sanitize_callback' => 'educenter_sanitize_repeater',
            'transport' => 'postMessage',
			'default' => json_encode( array(
				array(
					'services_icon' => 'fa fa-desktop',
					'services_page' => '' 
					)
				) )        
		));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_services_area_settings', array(
            'label'   => esc_html__('Course Settings Area','hello-education'),
            'section' => 'educenter_services_settings',
            'settings' => 'educenter_services_area_settings',
            'box_label' => esc_html__('Course','hello-education'),
            'add_label' => esc_html__('Add New','hello-education'),
        ),
        array(
            'services_icon' => array(
                'type'      => 'icon',
                'label'     => esc_html__( 'Select Icon', 'hello-education' ),
                'default'   => 'fa fa-desktop'
            ),
            'services_page' => array(
                'type'      => 'select',
                'label'     => esc_html__( 'Select Course', 'hello-education' ),
                'options'   => $course_pages
            )          
        )));

        $wp_customize->selective_refresh->add_partial( 'educenter_services_area_settings', array(
            'settings'        => array( 'educenter_services_area_settings' ),
            'selector'        => '#edu-services-section',
            'container_inclusive'  => true,
            'render_callback' => function() {
                do_action( 'educenter_courses');
            }
        ) );
	
	}
}
add_action( 'customize_register' , 'hello_education_child_options', 11 );