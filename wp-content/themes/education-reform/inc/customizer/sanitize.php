<?php
/**
* Custom Functions.
*
* @package Education Reform
*/

if( !function_exists( 'education_reform_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function education_reform_sanitize_sidebar_option( $education_reform_input ){
        $education_reform_education_reform_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $education_reform_input,$education_reform_education_reform_metabox_options ) ){
            return $education_reform_input;

        }
        return;
    }

endif;

if ( ! function_exists( 'education_reform_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function education_reform_sanitize_checkbox( $education_reform_checked ) {

		return ( ( isset( $education_reform_checked ) && true === $education_reform_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'education_reform_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function education_reform_sanitize_select( $education_reform_input, $education_reform_setting ) {
        $education_reform_input = sanitize_text_field( $education_reform_input );
        $choices = $education_reform_setting->manager->get_control( $education_reform_setting->id )->choices;
        return ( array_key_exists( $education_reform_input, $choices ) ? $education_reform_input : $education_reform_setting->default );
    }

endif;