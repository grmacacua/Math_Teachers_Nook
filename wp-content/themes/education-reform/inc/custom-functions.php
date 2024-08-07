<?php
/**
 * Custom Functions.
 *
 * @package Education Reform
 */

if( !function_exists( 'education_reform_fonts_url' ) ) :

    //Google Fonts URL
    function education_reform_fonts_url(){

        $font_families = array(
            'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
            'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900',
        );

        $education_reform_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($education_reform_fonts_url);

    }

endif;

if ( ! function_exists( 'education_reform_sub_menu_toggle_button' ) ) :

    function education_reform_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'education-reform-primary-menu' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'education-reform' ) . '</span>' . education_reform_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $args->theme_location == 'education-reform-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = education_reform_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'education_reform_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'education_reform_the_theme_svg' ) ):
    
    function education_reform_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return education_reform_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in education_reform_get_theme_svg();.

        }else{

            echo education_reform_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in education_reform_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'education_reform_get_theme_svg' ) ):

    function education_reform_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            education_reform_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if( !function_exists( 'education_reform_post_category_list' ) ) :

    // Post Category List.
    function education_reform_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','education-reform' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('education_reform_single_post_navigation') ):

    function education_reform_single_post_navigation(){

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $education_reform_twp_navigation_type == '' || $education_reform_twp_navigation_type == 'global-layout' ){
            $education_reform_twp_navigation_type = get_theme_mod('education_reform_twp_navigation_type', $education_reform_default['education_reform_twp_navigation_type']);
        }

        if( $education_reform_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $education_reform_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . education_reform_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'education-reform') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . education_reform_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'education-reform') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){

                    $next_post_id = $next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'education_reform_navigation_action','education_reform_single_post_navigation',30 );

add_action( 'education_reform_before_footer_content_action','education_reform_content_offcanvas',30 );

if( !function_exists('education_reform_content_offcanvas') ):

    // Offcanvas Contents
    function education_reform_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'education-reform'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'education-reform'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('education-reform-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'education-reform-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new education_reform_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

if( !function_exists('education_reform_footer_content_widget') ):

    function education_reform_footer_content_widget(){

        $education_reform_default = education_reform_get_default_theme_options();
        
            $education_reform_education_reform_footer_column_layout = absint(get_theme_mod('education_reform_footer_column_layout', $education_reform_default['education_reform_footer_column_layout']));
            $education_reform_footer_sidebar_class = 12;
            if($education_reform_education_reform_footer_column_layout == 2) {
                $education_reform_footer_sidebar_class = 6;
            }
            if($education_reform_education_reform_footer_column_layout == 3) {
                $education_reform_footer_sidebar_class = 4;
            }
            ?>
           
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">

                        <?php for ($i=0; $i < $education_reform_education_reform_footer_column_layout; $i++) {
                            ?>
                            <div class="column <?php echo 'column-' . absint($education_reform_footer_sidebar_class); ?> column-sm-12">
                                <?php dynamic_sidebar('education-reform-footer-widget-' . $i); ?>
                            </div>
                       <?php } ?>

                    </div>
                </div>
            </div>

        <?php

    }

endif;

add_action( 'education_reform_footer_content_action','education_reform_footer_content_widget',10 );

if( !function_exists('education_reform_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function education_reform_footer_content_info(){

        $education_reform_default = education_reform_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">

                            <div class="footer-copyright">

                                <?php
                                $education_reform_footer_copyright_text = wp_kses_post( get_theme_mod( 'education_reform_footer_copyright_text', $education_reform_default['education_reform_footer_copyright_text'] ) );
                                    echo esc_html( $education_reform_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'education-reform') . '<a href="' . esc_url('https://omegathemes.com/wordpress/free-education-wordpress-theme/') . '" title="' . esc_attr__('Education Reform ', 'education-reform') . '" target="_blank"><span>' . esc_html__('Education Reform ', 'education-reform') . '</span></a>' . esc_html__('By ', 'education-reform') . '  <span>' . esc_html__('OMEGA ', 'education-reform') . '</span>';
                                    echo esc_html__('Powered by ', 'education-reform') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'education-reform') . '" target="_blank"><span>' . esc_html__('WordPress.', 'education-reform') . '</span></a>';
                                 ?>

                            </div>
                        </div>
                    </div>

                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php
                                printf( esc_html__( 'To the Top %s', 'education-reform' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                            <span class="to-the-top-short">
                                <?php
                                printf( esc_html__( 'Up %s', 'education-reform' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                        </a>

                    </div>


                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'education_reform_footer_content_action','education_reform_footer_content_info',20 );


if( !function_exists( 'education_reform_main_slider' ) ) :

    function education_reform_main_slider(){

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_header_banner = get_theme_mod( 'education_reform_header_banner', $education_reform_default['education_reform_header_banner'] );
        $education_reform_header_banner_cat = get_theme_mod( 'education_reform_header_banner_cat' );

        if( $education_reform_header_banner ){

            $rtl = '';
            if( is_rtl() ){
                $rtl = 'dir="rtl"';
            }

          $banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $education_reform_header_banner_cat ) ) );

          if( $banner_query->have_posts() ): ?>

            <div class="theme-custom-block theme-banner-block">
                <div class="swiper-container theme-main-carousel swiper-container" <?php echo $rtl; ?>>

                    <div class="swiper-wrapper">

                      <?php
                      while( $banner_query->have_posts() ):
                        $banner_query->the_post();
                        $education_reform_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $education_reform_featured_image = isset( $education_reform_featured_image[0] ) ? $education_reform_featured_image[0] : ''; ?>

                          <div class="swiper-slide main-carousel-item">
                             
                                  <div class="theme-article-post">
                                  <div class="entry-thumbnail">
                                      <div class="data-bg data-bg-large" data-background="<?php echo esc_url($education_reform_featured_image); ?>">
                                          <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                      </div>
                                      <?php education_reform_post_format_icon(); ?>
                                  </div>
                            
                                  <div class="main-carousel-caption">
                                      <div class="post-content ">

                                          <header class="entry-header">
                                                <h2 class="entry-title entry-title-big">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                </h2>
                                          </header>


                                          <div class="entry-content">
                                              <?php
                                              if (has_excerpt()) {

                                                  the_excerpt();

                                              } else {

                                                  echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                              } ?>
                                          </div>

                                          <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                              <?php echo esc_html__('Know More', 'education-reform'); ?>
                                          </a>

                                      </div>
                                  </div>
                                  </div>


                          </div>

                      <?php endwhile; ?>

                    </div>

                    <div class="swiper-pagination"></div>                  

                </div>
            </div>

          <?php
          wp_reset_postdata();
          endif;

        }

    }

endif;


if( !function_exists('education_reform_courses_category_carousel') ):

    // Single Posts Related Posts.
    function education_reform_courses_category_carousel(){
        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_courses_category_section = absint( get_theme_mod( 'education_reform_courses_category_section',$education_reform_default['education_reform_courses_category_section'] ) );

        if( $education_reform_courses_category_section ){
            $rtl = '';
            if( is_rtl() ){
                $rtl = 'dir="rtl"';
            } ?>

            <div class="theme-custom-block courses-categories-block">

                <div class="wrapper-fluid">
                    <div class="courses-block">
                        <div class="course-heading-block">
                            <?php $cat_main_courses_title = esc_html( get_theme_mod( 'cat_main_courses_title',$education_reform_default['cat_main_courses_title'] ) );
                                if( $cat_main_courses_title ){ ?>
                                <h2 class="entry-title"><?php echo esc_html( $cat_main_courses_title ); ?></h2>
                            <?php } ?>
                            <?php $education_reform_cat_main_courses_text = esc_html( get_theme_mod( 'cat_main_courses_text',$education_reform_default['cat_main_courses_text'] ) );
                                if( $education_reform_cat_main_courses_text ){ ?>
                                <p><?php echo esc_html( $education_reform_cat_main_courses_text ); ?></p>
                            <?php } ?>
                        </div>
                        <div class="course-content-block">
                            <div class="swiper-container theme-main-carousel theme-categories-carousel" <?php echo $rtl; ?>>
                                <div class="swiper-wrapper">

                                    <?php
                                    for ($x = 1; $x <= 8; $x++) {

                                        $c_category = get_theme_mod('education_reform_courses_category_cat_' . $x);

                                        if ($c_category) {

                                            $cat_obj = get_category_by_slug($c_category);
                                            $cat_name = isset( $cat_obj->name ) ? $cat_obj->name : '';
                                            $cat_id = isset( $cat_obj->term_id ) ? $cat_obj->term_id : '';
                                            $cat_link = get_category_link($cat_id); 
                                            $term_image_url = get_term_meta( $cat_id, 'term_image', true ); ?>

                                            <div class="swiper-slide be-category-item">

                                               <div class="theme-article-post theme-transform-zoom courses-inner-block <?php echo esc_attr(('courses-inner-block').$x) ?>">
                                                    <?php
                                                    if ($term_image_url) { ?>
                                                        <div class="post-thumb-categories">
                                                            <div class="data-bg data-bg-medium" data-background="<?php echo esc_url($term_image_url); ?>">
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <?php
                                                    if ($cat_name) { ?>
                                                        <h3 class="category-title">
                                                            <a href="<?php echo esc_url($cat_link); ?>" tabindex="0">
                                                                <?php echo esc_html($cat_name); ?>
                                                            </a>
                                                        </h3>
                                                    <?php } ?>

                                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?> </p>
                                                </div>

                                            </div>

                                            <?php
                                        }

                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }

endif;

if (!function_exists('education_reform_post_format_icon')):

    // Post Format Icon.
    function education_reform_post_format_icon() {

        $format = get_post_format(get_the_ID()) ?: 'standard';
        $icon = '';
        $title = '';
        if( $format == 'video' ){
            $icon = education_reform_get_theme_svg( 'video' );
            $title = esc_html__('Video','education-reform');
        }elseif( $format == 'audio' ){
            $icon = education_reform_get_theme_svg( 'audio' );
            $title = esc_html__('Audio','education-reform');
        }elseif( $format == 'gallery' ){
            $icon = education_reform_get_theme_svg( 'gallery' );
            $title = esc_html__('Gallery','education-reform');
        }elseif( $format == 'quote' ){
            $icon = education_reform_get_theme_svg( 'quote' );
            $title = esc_html__('Quote','education-reform');
        }elseif( $format == 'image' ){
            $icon = education_reform_get_theme_svg( 'image' );
            $title = esc_html__('Image','education-reform');
        }
        
        if (!empty($icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo education_reform_svg_escape($icon); ?></span>
                <?php if( $title ){ echo '<span class="post-format-label">'.esc_html( $title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'education_reform_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function education_reform_svg_escape( $input ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $svg ) {
            return false;
        }

        return $svg;

    }

endif;

if( !function_exists( 'education_reform_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function education_reform_sanitize_sidebar_option_meta( $input ){

        $education_reform_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$education_reform_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'education_reform_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function education_reform_sanitize_pagination_meta( $input ){

        $education_reform_education_reform_metabox_options = array( 'Center','Right','Left');
        if( in_array( $input,$education_reform_education_reform_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('education_reform_category_carousel') ):

    // Single Posts Related Posts.
    function education_reform_category_carousel(){

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_category_section = absint( get_theme_mod( 'education_reform_category_section',$education_reform_default['education_reform_category_section'] ) );

        if( $education_reform_category_section ){
            $rtl = '';
            if( is_rtl() ){
                $rtl = 'dir="rtl"';
            } ?>
            <div class="theme-custom-block featured-categories-block">
                <div class="wrapper-fluid">
                    <?php $education_reform_cat_main_service_title = esc_html( get_theme_mod( 'education_reform_cat_main_service_title',$education_reform_default['education_reform_cat_main_service_title'] ) );
                        if( $education_reform_cat_main_service_title ){ ?>
                        <h2 class="entry-title"><?php echo esc_html( $education_reform_cat_main_service_title ); ?></h2>
                    <?php } ?>
                    <?php $education_reform_cat_main_title = esc_html( get_theme_mod( 'education_reform_cat_main_title',$education_reform_default['education_reform_cat_main_title'] ) );
                        if( $education_reform_cat_main_title ){ ?>
                        <p><?php echo esc_html( $education_reform_cat_main_title ); ?></p>
                    <?php } ?>

                    <div class="swiper-container theme-main-carousel theme-categories-carousel" <?php echo $rtl; ?>>
                        <div class="swiper-wrapper">

                            <?php
                            for ($x = 1; $x <= 8; $x++) {

                                $c_category = get_theme_mod('education_reform_category_cat_' . $x);

                                if ($c_category) {

                                    $cat_obj = get_category_by_slug($c_category);
                                    $cat_name = isset( $cat_obj->name ) ? $cat_obj->name : '';
                                    $cat_id = isset( $cat_obj->term_id ) ? $cat_obj->term_id : '';
                                    $cat_link = get_category_link($cat_id);
                                    $term_image_url = get_term_meta( $cat_id, 'term_image', true ); ?>

                                    <div class="swiper-slide be-category-item">
                                       <div class="theme-article-post theme-transform-zoom">
                                            <div class="post-thumb-categories">
                                                <div class="data-bg data-bg-medium" data-background="<?php echo esc_url($term_image_url); ?>">
                                                    <a class="theme-image-responsive" href="<?php echo esc_url($cat_link); ?>" tabindex="0"></a>
                                                </div>
                                            </div>
                                            <div class="article-content">
                                                <?php
                                                if ($cat_name) { ?>
                                                    <h3 class="category-title">
                                                        <a href="<?php echo esc_url($cat_link); ?>" tabindex="0">
                                                            <?php echo esc_html($cat_name); ?>
                                                        </a>
                                                    </h3>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                        <div class="swiper-control swiper-control_center">
                            <div class="theme-carousel-control">
                            <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0282" height="9" viewBox="0 0 45.0282 9.0371"><polyline points="4.825 0.354 0.707 4.471 4.92 8.684"></polyline><line x1="0.9028" y1="4.513" x2="45.0278" y2="4.5405"></line></svg>
                            </div>
                            <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0277" height="9" viewBox="0 0 45.0277 9.0373"><polyline points="40.108 8.684 44.321 4.471 40.203 0.354"></polyline><line x1="0.0003" y1="4.5409" x2="44.1253" y2="4.5134"></line></svg>
                            </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        <?php
        }

    }
endif;

if( !function_exists( 'education_reform_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function education_reform_sanitize_menu_transform( $input ){

        $education_reform_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $input,$education_reform_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'education_reform_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function education_reform_sanitize_page_content_alignment( $input ){

        $education_reform_metabox_options = array( 'left','center','right');
        if( in_array( $input,$education_reform_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;