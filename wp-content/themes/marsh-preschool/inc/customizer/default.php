<?php
/**
 * Default theme options.
 *
 * @package Marsh Preschool
 */

if ( ! function_exists( 'marsh_preschool_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function marsh_preschool_get_default_theme_options() {

	$defaults = array();

	// Front Page Header Image
	$defaults['disable_frontpage_header_image']  = true;

	//General Section
	$defaults['readmore_text']					= esc_html__('Read More','marsh-preschool');
	$defaults['your_latest_posts_title']		= esc_html__('Blog','marsh-preschool');
	$defaults['excerpt_length']					= 15;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'no-sidebar';
	$defaults['layout_options_page']			= 'no-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'marsh-preschool' );

	// Pass through filter.
	$defaults = apply_filters( 'marsh_preschool_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'marsh_preschool_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function marsh_preschool_get_option( $key ) {

		$default_options = marsh_preschool_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;