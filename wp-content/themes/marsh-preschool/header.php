<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marsh Preschool
 */
/**
* Hook - marsh_preschool_action_doctype.
*
* @hooked marsh_preschool_doctype -  10
*/
do_action( 'marsh_preschool_action_doctype' );
?>
<head>
<?php
/**
* Hook - marsh_preschool_action_head.
*
* @hooked marsh_preschool_head -  10
*/
do_action( 'marsh_preschool_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - marsh_preschool_action_before.
*
* @hooked marsh_preschool_page_start - 10
*/
do_action( 'marsh_preschool_action_before' );

/**
*
* @hooked marsh_preschool_header_start - 10
*/
do_action( 'marsh_preschool_action_before_header' );

/**
*
*@hooked marsh_preschool_site_branding - 10
*@hooked marsh_preschool_header_end - 15 
*/
do_action('marsh_preschool_action_header');

/**
*
* @hooked marsh_preschool_content_start - 10
*/
do_action( 'marsh_preschool_action_before_content' );

/**
 * Banner start
 * 
 * @hooked marsh_preschool_banner_header - 10
*/
do_action( 'marsh_preschool_banner_header' );  
