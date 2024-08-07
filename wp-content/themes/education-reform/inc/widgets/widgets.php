<?php
/**
* Widget Functions.
*
* @package Education Reform
*/

function education_reform_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'education-reform'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'education-reform'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $education_reform_default = education_reform_get_default_theme_options();
    $education_reform_education_reform_footer_column_layout = absint( get_theme_mod( 'education_reform_footer_column_layout',$education_reform_default['education_reform_footer_column_layout'] ) );

    for( $i = 0; $i < $education_reform_education_reform_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','education-reform'); }
    	if( $i == 1 ){ $count = esc_html__('Two','education-reform'); }
    	if( $i == 2 ){ $count = esc_html__('Three','education-reform'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'education-reform').$count,
	        'id' => 'education-reform-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'education-reform'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'education_reform_widgets_init');