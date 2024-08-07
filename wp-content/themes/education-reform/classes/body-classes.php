<?php
/**
* Body Classes.
* @package Education Reform
*/
 
 if (!function_exists('education_reform_body_classes')) :

    function education_reform_body_classes($classes) {

        $education_reform_default = education_reform_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $education_reform_education_reform_global_sidebar_layout = esc_html( get_theme_mod( 'education_reform_global_sidebar_layout',$education_reform_default['education_reform_global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $education_reform_post_sidebar = esc_html( get_post_meta( $post->ID, 'education_reform_post_sidebar_option', true ) );
                if (empty($education_reform_post_sidebar) || ($education_reform_post_sidebar == 'global-sidebar')) {
                    $classes[] = esc_attr( $education_reform_education_reform_global_sidebar_layout );
                } else{
                    $classes[] = esc_attr( $education_reform_post_sidebar );
                }
            }else{
                $classes[] = esc_attr( $education_reform_education_reform_global_sidebar_layout );
            }
            
        }
        
        return $classes;
    }

endif;

add_filter('body_class', 'education_reform_body_classes');