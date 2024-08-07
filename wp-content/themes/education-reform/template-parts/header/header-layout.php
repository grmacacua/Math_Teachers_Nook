<?php
/**
 * Header Layout
 * @package Education Reform
 */

$education_reform_default = education_reform_get_default_theme_options();

$education_reform_header_layout_phone_number = esc_html( get_theme_mod( 'education_reform_header_layout_phone_number',
$education_reform_default['education_reform_header_layout_phone_number'] ) );
$education_reform_header_layout_email_address = esc_html( get_theme_mod( 'education_reform_header_layout_email_address',
$education_reform_default['education_reform_header_layout_email_address'] ) );
$education_reform_header_layout_button_login_link = esc_html( get_theme_mod( 'education_reform_header_layout_button_login_link' ) );
$education_reform_header_layout_button_register_link = esc_html( get_theme_mod( 'education_reform_header_layout_button_register_link' ) );
$education_reform_sticky = get_theme_mod('education_reform_sticky');
$education_reform_data_sticky = "false";
if ($education_reform_sticky) {
$education_reform_data_sticky = "true";
}
global $wp_customize;

?>

<section id="top-header">
    <div class="wrapper header-wrapper">
        <div class="theme-header-areas header-areas-left">
        </div>
        <div class="theme-header-areas header-areas-right">
            <?php if( $education_reform_header_layout_phone_number ){ ?>
                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg><span><a href="tel:<?php echo esc_attr( $education_reform_header_layout_phone_number ); ?>"><?php echo esc_html( $education_reform_header_layout_phone_number ); ?></a></span></span>
            <?php } ?>
            <?php if( $education_reform_header_layout_email_address ){ ?>
                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg><span><a href="mailto:<?php echo esc_attr( $education_reform_header_layout_email_address ); ?>"><?php echo esc_html( $education_reform_header_layout_email_address ); ?></a></span></span>
            <?php } ?>
            <?php if( $education_reform_header_layout_button_login_link ){ ?>
                <a href="<?php echo esc_url( $education_reform_header_layout_button_login_link ); ?>"><?php esc_html_e('Login','education-reform'); ?> </a> | 
            <?php } ?>
            <?php if( $education_reform_header_layout_button_register_link ){ ?>
                <a href="<?php echo esc_url( $education_reform_header_layout_button_register_link ); ?>"> <?php esc_html_e('Register','education-reform'); ?></a>
            <?php } ?>
        </div>
    </div>
</section>
<header id="site-header" class="site-header-layout header-layout" role="banner">
    <div class="header-navbar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($education_reform_data_sticky); ?>">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left">
                <div class="header-titles">
                    <?php
                    education_reform_site_logo();
                    education_reform_site_description();
                    ?>
                </div>
            </div>
            <div class="theme-header-areas header-areas-right">
                <div class="site-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'education-reform'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('education-reform-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'education-reform-primary-menu',
                                    )
                                );
                            } else {
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker' => new education_reform_Walker_Page(),
                                    )
                                );
                            } ?>
                        </ul>
                    </nav>
                </div>
                <div class="navbar-controls twp-hide-js">
                    <button type="button" class="navbar-control navbar-control-offcanvas">
                        <span class="navbar-control-trigger" tabindex="-1">
                            <?php education_reform_the_theme_svg('menu'); ?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>