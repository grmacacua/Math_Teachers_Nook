<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage spoken-english-classes
 * @since spoken-english-classes 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spoken_english_classes_customize_register( $wp_customize ) {
	$wp_customize->add_section( new spoken_english_classes_Upsell_Section($wp_customize,'upsell_section',array(
		'title'            => __( 'Spoken English Classes Pro', 'spoken-english-classes' ),
		'button_text'      => __( 'Upgrade Pro', 'spoken-english-classes' ),
		'url'              => 'https://www.wpradiant.net/products/spoken-english-classes-wordpress-theme/',
		'priority'         => 0,
	)));
}
add_action( 'customize_register', 'spoken_english_classes_customize_register' );

/**
 * Enqueue script for custom customize control.
 */
function spoken_english_classes_custom_control_scripts() {
	wp_enqueue_script( 'spoken-english-classes-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'spoken_english_classes_custom_control_scripts' );