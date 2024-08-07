<?php 

/*---------------------------Width -------------------*/

$education_insight_custom_style= "";

$education_insight_theme_width = get_theme_mod( 'education_insight_width_options','full_width');

if($education_insight_theme_width == 'full_width'){

$education_insight_custom_style .='body{';

	$education_insight_custom_style .='max-width: 100%;';

$education_insight_custom_style .='}';

}else if($education_insight_theme_width == 'container'){

$education_insight_custom_style .='body{';

	$education_insight_custom_style .='max-width: 1330px; width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:600px){';

$education_insight_custom_style .='body{';

    $education_insight_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$education_insight_custom_style .='} }';


}else if($education_insight_theme_width == 'container_fluid'){

$education_insight_custom_style .='body{';

	$education_insight_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:600px){';

$education_insight_custom_style .='body{';

    $education_insight_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$education_insight_custom_style .='} }';
}
//--------------------sticky header----------------------
if (false === get_option('education_insight_sticky_header')) {
    add_option('education_insight_sticky_header', 'off');
}

// Define the custom CSS based on the 'education_insight_sticky_header' option

if (get_option('education_insight_sticky_header', 'off') !== 'on') {
    $education_insight_custom_style .= '.fixed_header.fixed {';
    $education_insight_custom_style .= 'position: static;';
    $education_insight_custom_style .= '}';
}

if (get_option('education_insight_sticky_header', 'off') !== 'off') {
    $education_insight_custom_style .= '.fixed_header.fixed {';
    $education_insight_custom_style .= 'position: fixed; box-shadow: 0px 3px 10px 2px #eee;';
    $education_insight_custom_style .= '}';

    $education_insight_custom_style .= '.page-template-custom-home-page .wrap_figure.fixed {';
    $education_insight_custom_style .= 'background: #e5eaec;';
    $education_insight_custom_style .= '}';

    $education_insight_custom_style .= '.page-template-custom-home-page .fixed .logo{';
    $education_insight_custom_style .= 'background: #e5eaec;';
    $education_insight_custom_style .= '}';

    $education_insight_custom_style .= '.admin-bar .fixed {';
    $education_insight_custom_style .= ' margin-top: 32px;';
    $education_insight_custom_style .= '}';
}
/*---------------------------Scroll-top-position -------------------*/

$education_insight_scroll_options = get_theme_mod( 'education_insight_scroll_options','right_align');

if($education_insight_scroll_options == 'right_align'){

$education_insight_custom_style .='.scroll-top button{';

	$education_insight_custom_style .='';

$education_insight_custom_style .='}';

}else if($education_insight_scroll_options == 'center_align'){

$education_insight_custom_style .='.scroll-top button{';

	$education_insight_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$education_insight_custom_style .='}';

}else if($education_insight_scroll_options == 'left_align'){

$education_insight_custom_style .='.scroll-top button{';

	$education_insight_custom_style .='right: auto; left:5%; margin: 0 auto';

$education_insight_custom_style .='}';
}

	/*---------------------------text-transform-------------------*/

$education_insight_text_transform = get_theme_mod( 'education_insight_menu_text_transform','CAPITALISE');
if($education_insight_text_transform == 'CAPITALISE'){

$education_insight_custom_style .='nav#top_gb_menu ul li a{';

	$education_insight_custom_style .='text-transform: capitalize ; font-size: 14px;';

$education_insight_custom_style .='}';

}else if($education_insight_text_transform == 'UPPERCASE'){

$education_insight_custom_style .='nav#top_gb_menu ul li a{';

	$education_insight_custom_style .='text-transform: uppercase ; font-size: 14px;';

$education_insight_custom_style .='}';

}else if($education_insight_text_transform == 'LOWERCASE'){

$education_insight_custom_style .='nav#top_gb_menu ul li a{';

	$education_insight_custom_style .='text-transform: lowercase ; font-size: 14px;';

$education_insight_custom_style .='}';
}

	/*-------------------------Slider-content-alignment-------------------*/

$education_insight_slider_content_alignment = get_theme_mod( 'education_insight_slider_content_alignment','CENTER-ALIGN');

if($education_insight_slider_content_alignment == 'LEFT-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

	$education_insight_custom_style .='text-align:left; right: 50%; left: 15%;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:1199px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 40%; left: 15%';
    
$education_insight_custom_style .='} }';

$education_insight_custom_style .='@media screen and (max-width:991px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 30%; left: 15%';
    
$education_insight_custom_style .='} }';


}else if($education_insight_slider_content_alignment == 'CENTER-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

$education_insight_custom_style .='text-align:center; right: 50%; left: 15%;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:1199px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 40%; left: 15%';
    
$education_insight_custom_style .='} }';

$education_insight_custom_style .='@media screen and (max-width:991px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 30%; left: 15%';
    
$education_insight_custom_style .='} }';


}else if($education_insight_slider_content_alignment == 'RIGHT-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

$education_insight_custom_style .='text-align:right; right: 50%; left: 15%;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:1199px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 40%; left: 15%';
    
$education_insight_custom_style .='} }';

$education_insight_custom_style .='@media screen and (max-width:991px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 30%; left: 15%';
    
$education_insight_custom_style .='} }';

}
//---------------------------------Logo-Max-height------------------------------	
$education_insight_logo_max_height = get_theme_mod('education_insight_logo_max_height','50');

if($education_insight_logo_max_height != false){

$education_insight_custom_style .='.custom-logo-link img{';

$education_insight_custom_style .='max-width: '.esc_html($education_insight_logo_max_height).'px;';

$education_insight_custom_style .='}';
}
//related products
if( get_option( 'education_insight_related_product',true) != 'on') {

$education_insight_custom_style .='.related.products{';

	$education_insight_custom_style .='display: none;';
	
$education_insight_custom_style .='}';
}

if( get_option( 'education_insight_related_product',true) != 'off') {

$education_insight_custom_style .='.related.products{';

	$education_insight_custom_style .='display: block;';
	
$education_insight_custom_style .='}';
}

// footer text alignment
$education_insight_footer_content_alignment = get_theme_mod( 'education_insight_footer_content_alignment','CENTER-ALIGN');

if($education_insight_footer_content_alignment == 'LEFT-ALIGN'){

$education_insight_custom_style .='.site-info{';

	$education_insight_custom_style .='text-align:left; padding-left: 30px;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='.site-info a{';

	$education_insight_custom_style .='padding-left: 30px;';

$education_insight_custom_style .='}';


}else if($education_insight_footer_content_alignment == 'CENTER-ALIGN'){

$education_insight_custom_style .='.site-info{';

	$education_insight_custom_style .='text-align:center;';

$education_insight_custom_style .='}';


}else if($education_insight_footer_content_alignment == 'RIGHT-ALIGN'){

$education_insight_custom_style .='.site-info{';

	$education_insight_custom_style .='text-align:right; padding-right: 30px;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='.site-info a{';

	$education_insight_custom_style .='padding-right: 30px;';

$education_insight_custom_style .='}';

}

// scroll button
$mobile_scroll_setting = get_option('education_insight_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('education_insight_scroll_enable', '1');

$education_insight_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $education_insight_custom_style .= 'display: none;';
}

$education_insight_custom_style .= '}';

// Add media query for mobile devices
$education_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $education_insight_custom_style .= '.scrollup { display: none; }';
}
$education_insight_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('education_insight_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('education_insight_enable_breadcrumb', '1');

$education_insight_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= 'display: none;';
}

$education_insight_custom_style .= '}';

// Add media query for mobile devices
$education_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$education_insight_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('education_insight_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('education_insight_single_enable_breadcrumb', '1');

$education_insight_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= 'display: none;';
}

$education_insight_custom_style .= '}';

// Add media query for mobile devices
$education_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= '.single_breadcrumb { display: none; }';
}
$education_insight_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('education_insight_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('education_insight_woocommerce_enable_breadcrumb', '1');

$education_insight_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= 'display: none;';
}

$education_insight_custom_style .= '}';

// Add media query for mobile devices
$education_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $education_insight_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$education_insight_custom_style .= '}';