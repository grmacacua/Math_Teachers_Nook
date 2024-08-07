<?php
/**
 * Education Reform functions and definitions
 * @package Education Reform
 */

if ( ! function_exists( 'education_reform_after_theme_support' ) ) :

	function education_reform_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'education_reform_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

		add_editor_style('/lib/custom/css/editor-style.css');

	}

endif;

add_action( 'after_setup_theme', 'education_reform_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function education_reform_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $education_reform_theme_version = wp_get_theme()->get( 'Version' );
	$education_reform_fonts_url = education_reform_fonts_url();
    if( $education_reform_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'education-reform-google-fonts',
			wptt_get_webfont_url( $education_reform_fonts_url ),
			array(),
			$education_reform_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'education-reform-style', get_stylesheet_uri(), array(), $education_reform_theme_version );

	wp_enqueue_style( 'education-reform-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'education-reform-style',$education_reform_custom_css );

	$education_reform_css = '';

	if ( get_header_image() ) :

		$education_reform_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'education-reform-style', $education_reform_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'education-reform-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $education_reform_default = education_reform_get_default_theme_options();
    $education_reform_pagination_layout = get_theme_mod( 'education_reform_pagination_layout',$education_reform_default['education_reform_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'education_reform_register_styles',200 );

function education_reform_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('education-reform-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'education_reform_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function education_reform_menus() {

	$education_reform_locations = array(
		'education-reform-primary-menu'  => esc_html__( 'Primary Menu', 'education-reform' ),
	);

	register_nav_menus( $education_reform_locations );
}

add_action( 'init', 'education_reform_menus' );

add_filter('loop_shop_columns', 'education_reform_loop_columns');
if (!function_exists('education_reform_loop_columns')) {
	function education_reform_loop_columns() {
		$education_reform_columns = get_theme_mod( 'education_reform_per_columns', 3 );
		return $education_reform_columns;
	}
}

add_filter( 'loop_shop_per_page', 'education_reform_per_page', 20 );
function education_reform_per_page( $education_reform_cols ) {
  	$education_reform_cols = get_theme_mod( 'education_reform_product_per_page', 9 );
	return $education_reform_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'EDUCATION_REFORM_DOCS_PRO' ) ){
define('EDUCATION_REFORM_DOCS_PRO',__('https://www.omegathemes.com/steps/education-reform/','education-reform'));
}
if (! defined( 'EDUCATION_REFORM_BUY_NOW' ) ){
define('EDUCATION_REFORM_BUY_NOW',__('https://www.omegathemes.com/wordpress/education-wordpress-theme/','education-reform'));
}
if (! defined( 'EDUCATION_REFORM_SUPPORT_FREE' ) ){
define('EDUCATION_REFORM_SUPPORT_FREE',__('https://wordpress.org/support/theme/education-reform','education-reform'));
}
if (! defined( 'EDUCATION_REFORM_REVIEW_FREE' ) ){
define('EDUCATION_REFORM_REVIEW_FREE',__('https://wordpress.org/support/theme/education-reform/reviews/#new-post','education-reform'));
}
if (! defined( 'EDUCATION_REFORM_DEMO_PRO' ) ){
define('EDUCATION_REFORM_DEMO_PRO',__('https://www.omegathemes.com/preview/education-reform/','education-reform'));
}
if (! defined( 'EDUCATION_REFORM_LITE_DOCS_PRO' ) ){
define('EDUCATION_REFORM_LITE_DOCS_PRO',__('https://www.omegathemes.com/steps/free-education-reform/','education-reform'));
}

function education_reform_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'education_reform_remove_customize_register', 11 );

// Apply styles based on customizer settings

function education_reform_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $education_reform_footer_widget_background_color = get_theme_mod('education_reform_footer_widget_background_color');
        if ($education_reform_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($education_reform_footer_widget_background_color) . '; }';
        }

        $education_reform_footer_widget_background_image = get_theme_mod('education_reform_footer_widget_background_image');
        if ($education_reform_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($education_reform_footer_widget_background_image) . '); }';
        }
        $education_reform_copyright_font_size = get_theme_mod('education_reform_copyright_font_size');
        if ($education_reform_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($education_reform_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'education_reform_customizer_css');