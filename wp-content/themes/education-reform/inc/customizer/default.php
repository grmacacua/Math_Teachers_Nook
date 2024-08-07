<?php
/**
 * Default Values.
 *
 * @package Education Reform
 */

if ( ! function_exists( 'education_reform_get_default_theme_options' ) ) :
	function education_reform_get_default_theme_options() {

		$education_reform_defaults = array();
		
		// Options.
        $education_reform_defaults['education_reform_logo_width_range']                                  = 300;
		$education_reform_defaults['education_reform_global_sidebar_layout']					            = 'right-sidebar';
        $education_reform_defaults['education_reform_header_layout_phone_number']       = '+101 888 999 111';
        $education_reform_defaults['education_reform_header_layout_email_address']      = esc_html__( 'mail@example.com', 'education-reform' );
        $education_reform_defaults['education_reform_pagination_layout']         = 'numeric';
        $education_reform_defaults['education_reform_theme_pagination_options_alignment']         = 'Center';
        $education_reform_defaults['education_reform_theme_breadcrumb_options_alignment']         = 'Left';
		$education_reform_defaults['education_reform_footer_column_layout']                         = 3;
        $education_reform_defaults['education_reform_menu_font_size']                 = 15;
        $education_reform_defaults['education_reform_copyright_font_size']                 = 16;
        $education_reform_defaults['education_reform_breadcrumb_font_size']                 = 16;
        $education_reform_defaults['education_reform_excerpt_limit']                 = 10;
        $education_reform_defaults['education_reform_menu_text_transform']                 = 'uppercase';  
        $education_reform_defaults['education_reform_single_page_content_alignment']                 = 'left';
        $education_reform_defaults['education_reform_per_columns']                 = 3;  
        $education_reform_defaults['education_reform_product_per_page']                 = 9;
		$education_reform_defaults['education_reform_footer_copyright_text'] 				     = esc_html__( 'All rights reserved.', 'education-reform' );
        $education_reform_defaults['education_reform_twp_navigation_type']              			 = 'theme-normal-navigation';
        $education_reform_defaults['education_reform_post_author']                		= 1;
        $education_reform_defaults['education_reform_display_archive_post_sticky_post']            = 1;
        $education_reform_defaults['education_reform_display_archive_post_category']            = 1;
        $education_reform_defaults['education_reform_display_archive_post_title']            = 1;
        $education_reform_defaults['education_reform_display_archive_post_content']            = 1;
        $education_reform_defaults['education_reform_display_archive_post_button']            = 1;
        $education_reform_defaults['education_reform_sticky']                 = 0;
        $education_reform_defaults['education_reform_post_date']                		= 1;
        $education_reform_defaults['education_reform_post_category']                	= 1;
        $education_reform_defaults['education_reform_post_tags']                		= 1;
        $education_reform_defaults['education_reform_floating_next_previous_nav']       = 1;
        $education_reform_defaults['education_reform_header_banner']               		= 0;
        $education_reform_defaults['education_reform_display_header_title']             = 1;
        $education_reform_defaults['education_reform_category_section']               	= 0;
        $education_reform_defaults['education_reform_courses_category_section']         = 0;
        $education_reform_defaults['education_reform_cat_main_service_title']                            = esc_html__('Meet Our Teachers','education-reform');
        $education_reform_defaults['education_reform_cat_main_title']                                    = esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.','education-reform');
        $education_reform_defaults['cat_main_courses_title']                            = esc_html__('Lorem Ipsum Simply','education-reform');
        $education_reform_defaults['cat_main_courses_text']                                    = esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.','education-reform');
        $education_reform_defaults['education_reform_background_color']               	= '#fff';
        $education_reform_defaults['education_reform_theme_loader']                 = 0;

		// Pass through filter.
		$education_reform_defaults = apply_filters( 'education_reform_filter_default_theme_options', $education_reform_defaults );

		return $education_reform_defaults;
	}
endif;
