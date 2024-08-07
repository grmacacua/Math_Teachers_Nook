<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage spoken-english-classes
 * @since spoken-english-classes 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since spoken-english-classes 1.0
	 *
	 * @return void
	 */
	function spoken_english_classes_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'spoken-english-classes-border',
				'label' => esc_html__( 'Borders', 'spoken-english-classes' ),
			)
		);

		
	}
	add_action( 'init', 'spoken_english_classes_register_block_styles' );
}