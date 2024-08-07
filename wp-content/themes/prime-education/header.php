<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prime_education
 */
$prime_education_prelaoder = get_theme_mod( 'prime_education_header_preloader', false  );
$prime_education_loader_layout = get_theme_mod('prime_education_loader_layout_setting', 'load');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

    <?php 
		if ($prime_education_prelaoder && $prime_education_loader_layout !== 'none') { ?>
	<div class="preloader">
		<?php if ($prime_education_loader_layout === 'both' || $prime_education_loader_layout === 'load') { ?>
        <div class="load">
            <div class="loader"></div>
        </div>
    <?php } ?>
	<?php if ($prime_education_loader_layout === 'both' || $prime_education_loader_layout === 'load-one') { ?>
			<div class="load-one">
                <hr/><hr/><hr/><hr/>
            </div>
    <?php } ?>
 	<?php if ($prime_education_loader_layout === 'both' || $prime_education_loader_layout === 'ctn-preloader') { ?>
	    <div id="preloader">
	            <div id="ctn-preloader" class="ctn-preloader">
	                <div class="animation-preloader">
	                    
	                    <!-- Spinner -->
	                    <div class="spinner"></div>
	                    
	                    <!-- Start: Text Loading -->
	                    <div class="txt-loading">
                        <span data-text-preloader="P" class="letters-loading">P</span>
                        <span data-text-preloader="R" class="letters-loading">R</span>
                        <span data-text-preloader="I" class="letters-loading">I</span>
                        <span data-text-preloader="M" class="letters-loading">M</span>
                        <span data-text-preloader="E" class="letters-loading">E</span>
                        <span data-text-preloader="" class="letters-loading">&nbsp</span>
                        <span data-text-preloader="E" class="letters-loading">E</span>
                        <span data-text-preloader="D" class="letters-loading">D</span>
                        <span data-text-preloader="U" class="letters-loading">U</span>
                        <span data-text-preloader="C" class="letters-loading">C</span>
                        <span data-text-preloader="A" class="letters-loading">A</span>
                        <span data-text-preloader="T" class="letters-loading">T</span>
                        <span data-text-preloader="I" class="letters-loading">I</span>
                        <span data-text-preloader="O" class="letters-loading">O</span>
                        <span data-text-preloader="N" class="letters-loading">N</span>
	                        
	                    </div>
	                    <!-- End: Text Loading -->

	                </div>

	                <!-- Start: Preloader sides - Model 1 -->
	                <div class="loader-section section-left"></div>
	                <div class="loader-section section-right"></div>
	                <!-- End: Preloader sides - Model 1 -->

	            </div>
	        </div>
	        <?php } ?>
	    </div>
	<?php } ?>


    
    <div class="mobile-nav">
		<button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
			<span class="toggle-bar"></span>
			<span class="toggle-bar"></span>
			<span class="toggle-bar"></span>
		</button>
		<div class="mobile-nav-wrap">
			<nav class="main-navigation" id="mobile-navigation"  role="navigation">
				<div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
		            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
		            <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'prime-education' ); ?>">
		                <?php
		                    wp_nav_menu( array(
		                        'theme_location' => 'primary',
		                        'menu_id'        => 'mobile-primary-menu',
		                        'menu_class'     => 'nav-menu main-menu-modal',
		                    ) );
		                ?>
		            </div>
		        </div>
			</nav>
		</div>
	</div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#acc-content"><?php esc_html_e( 'Skip to content (Press Enter)', 'prime-education' ); ?></a>
		
		<?php
		/**
		 * prime_education_top_header
		 * 
		 * @hooked prime_education_top_header - 20
		*/
		do_action( 'prime_education_top_header' );

		/**
		 * prime_education Header
		 * 
		 * @hooked prime_education_header - 20
		*/
		do_action( 'prime_education_header' );
		
		echo '<div id="acc-content"><!-- done for accessiblity purpose -->';

		?>
		  <header class="empty-thumbnail" style="background-size: 100% 100%;background-image: url('<?php 
			    if ( has_post_thumbnail() ) {
			        echo esc_url( get_the_post_thumbnail_url() );
			    } else {
			        echo esc_url( get_theme_mod( 'prime_education_default_image' ) );
			    }
			?>');">
			    <div class="entry-content">
			        <?php custom_blog_banner_title(); ?>
			    </div>
		</header>

		<?php
		   

		echo '<div class="single-header-img">';
			    if (!is_single()) {
			        echo '<a href="' . esc_url(get_the_permalink()) . '" class="post-thumbnail">';
			    } else {
			        echo '<div class="post-thumbnail">';
			    }
			   
			    if (!is_single()) {
			        echo '</a>';
			    } else {
			        echo '</div>';
			    }
			echo '<div class="single-header-heading">';
			    
			echo '</div>';
			echo '</div>';
			echo '<div class="wrapper">';
			echo '<div class="container home-container">';
			echo '<div id="content" class="site-content">';

			if( is_search() ){ echo '<div class="row">'; }