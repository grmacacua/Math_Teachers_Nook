<?php
/**
 * Describe child theme functions
 *
 * @package Educenter
 * @subpackage Hello Education
 * 
 */

 if ( ! function_exists( 'hello_education_commerce_setup' ) ) :

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Hello Education, use a find and replace
     * to change 'hello-education' to the name of your theme in all the template files.
    */
    load_theme_textdomain( 'hello-education', get_template_directory() . '/languages' );

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function hello_education_commerce_setup() {
        // Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        
        $hello_education_commerce_theme_info = wp_get_theme();
        $GLOBALS['hello_education_commerce_version'] = $hello_education_commerce_theme_info->get( 'Version' );
    }
endif;
add_action( 'after_setup_theme', 'hello_education_commerce_setup' );


/**
 * Enqueue child theme styles and scripts
*/
function hello_education_commerce_scripts() {
    
    global $hello_education_commerce_version;

    wp_dequeue_style( 'educenter-style' );

    wp_dequeue_style( 'educenter-responsive' );
    
	wp_register_style( 'educenter-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'style.css', array('educenter-responsive'), esc_attr( $hello_education_commerce_version ) );
    if(class_exists('LearnPress')){
        wp_enqueue_style( 'hello-education-style', get_stylesheet_uri(), array('educenter-parent-style', 'learnpress'), esc_attr( $hello_education_commerce_version ) );
    }else{
        wp_enqueue_style( 'hello-education-style', get_stylesheet_uri(), array('educenter-parent-style'), esc_attr( $hello_education_commerce_version ) );
    }


    wp_enqueue_style( 'educenter-parent-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

    if ( has_header_image() ) {
		$custom_css = '.ed-breadcrumb, .lp-archive-courses .course-summary .course-summary-content .course-detail-info{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; background-size: cover; }';
		wp_add_inline_style( 'hello-education-style', $custom_css );
	}
	wp_enqueue_script( 'hello-education-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'jquery-ui-accordion'), esc_attr( $hello_education_commerce_version ), true );
}
add_action( 'wp_enqueue_scripts', 'hello_education_commerce_scripts', 20 );

/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 *
 */
function hello_education_commerce_customize_scripts(){
	wp_enqueue_script('hello-education-customizer', get_stylesheet_directory_uri() . '/js/admin.js', array('jquery', 'customize-controls'), true);
}
add_action('customize_controls_enqueue_scripts', 'hello_education_commerce_customize_scripts');

require_once (get_stylesheet_directory(  ). '/inc/init.php');

/** register sidbar */
if( !function_exists('hello_education_register_sidebar')){
	function hello_education_register_sidebar(){
		if ( class_exists( 'LearnPress' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Sidebar Courses', 'hello-education' ),
					'id'            => 'sidebar_courses',
					'description'   => esc_html__( 'Sidebar Courses', 'hello-education' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);
		}
	}
}
add_action( 'widgets_init', 'hello_education_register_sidebar' );

// The filter callback function.
function hell_education_primar_color( $color ) {
    return "#10c45c";
}
add_filter( 'educenter_primary_color', 'hell_education_primar_color', 10, 1 );

add_filter('educenter_starter_content_theme_mods', function( $modes ){
    return $modes['educenter_slider_options'] = 'disable';
});