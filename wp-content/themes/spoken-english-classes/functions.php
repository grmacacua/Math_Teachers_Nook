<?php
/**
 * Spoken English Classes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spoken-english-classes
 * @since spoken-english-classes 1.0
 */

if ( ! function_exists( 'spoken_english_classes_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since spoken-english-classes 1.0
	 *
	 * @return void
	 */
	function spoken_english_classes_support() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}

endif;

add_action( 'after_setup_theme', 'spoken_english_classes_support' );

if ( ! function_exists( 'spoken_english_classes_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since spoken-english-classes 1.0
	 *
	 * @return void
	 */
	function spoken_english_classes_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'spoken-english-classes-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_style( 
			'spoken-english-classes-animate-css', 
			esc_url(get_template_directory_uri()).'/assets/css/animate.css' 
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'spoken-english-classes-style' );

		wp_enqueue_style( 'dashicons' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'spoken_english_classes_styles' );

/* Enqueue Wow Js */
function spoken_english_classes_scripts() {
	wp_enqueue_script( 
		'spoken-english-classes-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', 
		array('jquery') 
	);

	wp_enqueue_script( 
		'spoken-english-classes-custom', esc_url(get_template_directory_uri()) . '/assets/js/custom.js', 
		array('jquery') 
	);
}
add_action( 'wp_enqueue_scripts', 'spoken_english_classes_scripts' );

// Add block patterns
require get_template_directory() . '/inc/block-pattern.php';

// Add block Style
require get_template_directory() . '/inc/block-style.php';

// Get Started
require get_template_directory() . '/get-started/getstart.php';

// Get Notice
require get_template_directory() . '/get-started/notice.php';

// Get Notice
require get_template_directory() . '/inc/customizer.php';