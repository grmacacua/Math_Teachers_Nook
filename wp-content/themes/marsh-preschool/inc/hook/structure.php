<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Marsh Preschool
 */

if ( ! function_exists( 'marsh_preschool_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function marsh_preschool_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'marsh_preschool_action_doctype', 'marsh_preschool_doctype', 10 );


if ( ! function_exists( 'marsh_preschool_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function marsh_preschool_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif;
}
endif;
add_action( 'marsh_preschool_action_head', 'marsh_preschool_head', 10 );

if ( ! function_exists( 'marsh_preschool_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marsh-preschool' ); ?></a><?php
	}
endif;

add_action( 'marsh_preschool_action_before', 'marsh_preschool_page_start', 10 );

if ( ! function_exists( 'marsh_preschool_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_header_start() { ?>
		<header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'marsh_preschool_action_before_header', 'marsh_preschool_header_start' );

if ( ! function_exists( 'marsh_preschool_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'marsh_preschool_action_header', 'marsh_preschool_header_end', 15 );

if ( ! function_exists( 'marsh_preschool_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'marsh_preschool_action_before_content', 'marsh_preschool_content_start', 10 );

if ( ! function_exists( 'marsh_preschool_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div></div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
	}
endif;
add_action( 'marsh_preschool_action_before_footer', 'marsh_preschool_footer_start' );

if ( ! function_exists( 'marsh_preschool_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function marsh_preschool_footer_end() {?>
		</footer><div class="backtotop"><i class="fas fa-caret-up"></i></div><?php
	}
endif;
add_action( 'marsh_preschool_action_after_footer', 'marsh_preschool_footer_end' );
