<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package prime_education
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function prime_education_body_classes( $classes ) {
  global $prime_education_post;
  
    if( !is_page_template( 'template-home.php' ) ){
        $classes[] = 'inner';
        // Adds a class of group-blog to blogs with more than 1 published author.
    }

    if ( is_multi_author() ) {
        $classes[] = 'group-blog ';
    }

    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }
    

    if( prime_education_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }    

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_page() ) {
        $classes[] = 'hfeed ';
    }
  
    if( is_404() ||  is_search() ){
        $classes[] = 'full-width';
    }
  
    if( ! is_active_sidebar( 'right-sidebar' ) ) {
        $classes[] = 'full-width'; 
    }

    return $classes;
}
add_filter( 'body_class', 'prime_education_body_classes' );

 /**
 * 
 * @link http://www.altafweb.com/2011/12/remove-specific-tag-from-php-string.html
 */
function prime_education_strip_single( $tag, $string ){
    $string=preg_replace('/<'.$tag.'[^>]*>/i', '', $string);
    $string=preg_replace('/<\/'.$tag.'>/i', '', $string);
    return $string;
}

if ( ! function_exists( 'prime_education_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function prime_education_excerpt_more($more) {
  return is_admin() ? $more : ' &hellip; ';
}
endif;
add_filter( 'excerpt_more', 'prime_education_excerpt_more' );


if( ! function_exists( 'prime_education_footer_credit' ) ):
/**
 * Footer Credits
*/
function prime_education_footer_credit(){
    $prime_education_footer_setting = get_theme_mod( 'prime_education_footer_setting', true );
    if ( $prime_education_footer_setting ){ 
        $prime_education_copyright_text = get_theme_mod( 'prime_education_footer_copyright_text' );

        $prime_education_text  = '<div class="site-info"><div class="container"><span class="copyright">';
        if( $prime_education_copyright_text ){
            $prime_education_text .= wp_kses_post( $prime_education_copyright_text ); 
        }else{
            $prime_education_text .= esc_html__( '&copy; ', 'prime-education' ) . date_i18n( esc_html__( 'Y', 'prime-education' ) ); 
            $prime_education_text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>'. esc_html__( '. All Rights Reserved.', 'prime-education' );
        }
        $prime_education_text .= '</span>';
        $prime_education_text .= '<span class="by"> <a href="' . esc_url( 'https://www.themeignite.com/products/free-education-wordpress-theme/' ) .'" rel="nofollow" target="_blank">' . PRIME_EDUCATION_THEME_NAME . '</a> '. esc_html__( 'By ', 'prime-education' ) . '<a href="' . esc_url( 'https://themeignite.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Themeignite', 'prime-education' ) . '</a>.';
        $prime_education_text .= sprintf( esc_html__( ' Powered By %s', 'prime-education' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'prime-education' ) ) .'" target="_blank">WordPress</a>.' );
        if ( function_exists( 'the_privacy_policy_link' ) ) {
            $prime_education_text .= get_the_privacy_policy_link();
        }
        $prime_education_text .= '</span></div></div>';
        echo apply_filters( 'prime_education_footer_text', $prime_education_text );
    } 
}
add_action( 'prime_education_footer', 'prime_education_footer_credit' );
endif;

/**
 * Is Woocommerce activated
*/
if ( ! function_exists( 'prime_education_woocommerce_activated' ) ) {
  function prime_education_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

if( ! function_exists( 'prime_education_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function prime_education_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $prime_education_commenter = wp_get_current_commenter();
 
    // core functionality
    $req      = get_option( 'require_name_email' );
    $prime_education_aria_req = ( $req ? " aria-required='true'" : '' );
    $prime_education_required = ( $req ? " required" : '' );
    $prime_education_author   = ( $req ? __( 'Name*', 'prime-education' ) : __( 'Name', 'prime-education' ) );
    $prime_education_email    = ( $req ? __( 'Email*', 'prime-education' ) : __( 'Email', 'prime-education' ) );
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label class="screen-reader-text" for="author">' . esc_html__( 'Name', 'prime-education' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr( $prime_education_author ) . '" type="text" value="' . esc_attr( $prime_education_commenter['comment_author'] ) . '" size="30"' . $prime_education_aria_req . $prime_education_required . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label class="screen-reader-text" for="email">' . esc_html__( 'Email', 'prime-education' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr( $prime_education_email ) . '" type="text" value="' . esc_attr(  $prime_education_commenter['comment_author_email'] ) . '" size="30"' . $prime_education_aria_req . $prime_education_required. ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label class="screen-reader-text" for="url">' . esc_html__( 'Website', 'prime-education' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'prime-education' ) . '" type="text" value="' . esc_attr( $prime_education_commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'prime_education_change_comment_form_default_fields' );

if( ! function_exists( 'prime_education_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function prime_education_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">' . esc_html__( 'Comment', 'prime-education' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'prime-education' ) . '" cols="45" rows="8" aria-required="true" required></textarea></p>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'prime_education_change_comment_form_defaults' );

if( ! function_exists( 'prime_education_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function prime_education_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
    /**
     * Triggered after the opening <body> tag.
    */
    do_action( 'wp_body_open' );
}
endif;

if ( ! function_exists( 'prime_education_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function prime_education_get_fallback_svg( $prime_education_post_thumbnail ) {
    if( ! $prime_education_post_thumbnail ){
        return;
    }
    
    $prime_education_image_size = prime_education_get_image_sizes( $prime_education_post_thumbnail );
     
    if( $prime_education_image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $prime_education_image_size['width'] ); ?> <?php echo esc_attr( $prime_education_image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $prime_education_image_size['width'] ); ?>" height="<?php echo esc_attr( $prime_education_image_size['height'] ); ?>" style="fill:#dedddd;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

function prime_education_enqueue_google_fonts() {

    require get_template_directory() . '/inc/wptt-webfont-loader.php';

    wp_enqueue_style(
            'google-fonts-montserrat',
        wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap' ),
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'google-fonts-open-sans',
        wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' ),
        array(),
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'prime_education_enqueue_google_fonts' );


if( ! function_exists( 'prime_education_site_branding' ) ) :
/**
 * Site Branding
*/
function prime_education_site_branding(){
    $prime_education_logo_site_title = get_theme_mod( 'header_site_title', 1 );
    $prime_education_tagline = get_theme_mod( 'header_tagline', false );
    $prime_education_logo_width = get_theme_mod('logo_width', 100); // Retrieve the logo width setting

    ?>
    <div class="site-branding" style="max-width: <?php echo esc_attr(get_theme_mod('logo_width', '-1'))?>px;">
        <?php 
        // Check if custom logo is set and display it
        if (function_exists('has_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        }
        if ($prime_education_logo_site_title):
             if (is_front_page()): ?>
            <h1 class="site-title" style="font-size: <?php echo esc_attr(get_theme_mod('prime_education_site_title_size', '30')); ?>px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
          </h1>
            <?php else: ?>
                <p class="site-title" itemprop="name">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                </p>
            <?php endif; ?>
        <?php endif; 
    
        if ($prime_education_tagline) :
            $prime_education_description = get_bloginfo('description', 'display');
            if ($prime_education_description || is_customize_preview()) :
        ?>
                <p class="site-description" itemprop="description"><?php echo $prime_education_description; ?></p>
            <?php endif;
        endif;
        ?>
    </div>
    <?php
}
endif;
if( ! function_exists( 'prime_education_navigation' ) ) :
/**
 * Site Navigation
*/
function prime_education_navigation(){
    ?>
    <nav class="main-navigation" id="site-navigation"  role="navigation">
        <?php 
        wp_nav_menu( array( 
            'theme_location' => 'primary', 
            'menu_id' => 'primary-menu' 
        ) ); 
        ?>
    </nav>
    <?php
}
endif;


if( ! function_exists( 'prime_education_top_header' ) ) :
/**
 * Header Start
*/
function prime_education_top_header(){
    $prime_education_header_setting     = get_theme_mod( 'prime_education_header_setting', false );
    $prime_education_location     = get_theme_mod( 'prime_education_header_location' );
    $prime_education_phone        = get_theme_mod( 'prime_education_header_phone' );
    $prime_education_email        = get_theme_mod( 'prime_education_header_email' );
    $prime_education_social_icon  = get_theme_mod( 'prime_education_social_icon_setting', false);
    ?>
    <?php if ( $prime_education_header_setting ){?>
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-lg-9 align-self-center topbar_details">
                       <div class="row m-0">
                           <div class="col-lg-6 col-md-4 text-lg-center email">
                              <?php if ( $prime_education_email ){?>
                            <span><a href="mailto:<?php echo esc_attr($prime_education_email);?>"><i class="<?php echo esc_attr(get_theme_mod('prime_education_mail_icon','fas fa-envelope')); ?>"></i> <?php echo esc_html($prime_education_email);?></a></span>
                        <?php } ?>  
                           </div>
                           <div class="col-lg-3 col-md-4 time">
                            <?php if ( $prime_education_location ){?>
                                <span>
                                    <i class="<?php echo esc_attr(get_theme_mod('prime_education_marker_icon','far fa-clock')); ?>"></i>
                                    <?php echo esc_html( $prime_education_location );?>
                                </span>
                            <?php } ?>  
                           </div>
                           <div class="col-lg-3 col-md-4">
                             <?php if ( $prime_education_social_icon ){?>
                            <div class="social-links">
                              <?php 
                                $prime_education_social_link1 = get_theme_mod( 'prime_education_social_link_1' );
                                $prime_education_social_link2 = get_theme_mod( 'prime_education_social_link_2' );
                                $prime_education_social_link3 = get_theme_mod( 'prime_education_social_link_3' );
                                $prime_education_social_link4 = get_theme_mod( 'prime_education_social_link_4' );

                                if ( ! empty( $prime_education_social_link1 ) ) {
                                  echo '<a class="social1" href="' . esc_url( $prime_education_social_link1 ) . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                                }
                                if ( ! empty( $prime_education_social_link2 ) ) {
                                  echo '<a class="social2" href="' . esc_url( $prime_education_social_link2 ) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
                                } 
                                if ( ! empty( $prime_education_social_link3 ) ) {
                                  echo '<a class="social3" href="' . esc_url( $prime_education_social_link3 ) . '" target="_blank"><i class="fab fa-instagram"></i></a>';
                                }
                                if ( ! empty( $prime_education_social_link4 ) ) {
                                  echo '<a class="social4" href="' . esc_url( $prime_education_social_link4 ) . '" target="_blank"><i class="fab fa-pinterest-p"></i></a>';
                                }
                              ?>
                            </div>
                        <?php } ?>  
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-3 align-self-center text-lg-center topbar_detail">
                        <?php if ( $prime_education_phone ){?>
                            <span><a href="tel:<?php echo esc_attr($prime_education_phone);?>"><i class="<?php echo esc_attr(get_theme_mod('prime_education_phone_icon','fas fa-phone-volume')); ?>"></i>
                            <?php echo esc_html( $prime_education_phone);?></span></a></span>
                        <?php } ?>
                   </div> 
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
}
endif;
add_action( 'prime_education_top_header', 'prime_education_top_header', 20 );


if( ! function_exists( 'prime_education_header' ) ) :
/**
 * Header Start
*/
function prime_education_header(){
      $prime_education_header_image = get_header_image();
      $prime_education_sticky_header = get_theme_mod('prime_education_sticky_header');
    ?>
    <div id="page-site-header" style="background-image: url('<?php echo esc_url( $prime_education_header_image ); ?>');">
        <header id="masthead" data-sticky="<?php echo $prime_education_sticky_header; ?>" class="site-header header-inner" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 align-self-center">
                        <?php prime_education_site_branding(); ?>
                    </div>
                    <div class="col-lg-8 col-md-2 align-self-center">
                        <?php prime_education_navigation(); ?>
                    </div>
                    <?php if( get_theme_mod('prime_education_show_hide_search',false) != ''){ ?>
                        <div class="col-lg-1 col-md-4 align-self-center">
                            <div class="search-body text-center align-self-center text-md-end">
                                <button type="button" class="search-show"><i class="<?php echo esc_attr(get_theme_mod('prime_education_search_icon','fas fa-search')); ?>"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="searchform-inner">
                        <?php get_search_form(); ?>
                        <button type="button" class="close"aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>  
                    </div>
                </div>
            </div>
        </header>
    </div>
    <?php
}
endif;
add_action( 'prime_education_header', 'prime_education_header', 20 );
