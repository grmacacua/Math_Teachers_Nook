<?php

$education_insight_custom_style= "";


$minimal_education_slider_content_alignment = get_theme_mod( 'minimal_education_slider_content_alignment','LEFT-ALIGN');

if($minimal_education_slider_content_alignment == 'LEFT-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='text-align:left; right: 45%; left: 19%';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:1199px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 20%; left: 19%';
    
$education_insight_custom_style .='} }';

$education_insight_custom_style .='@media screen and (max-width:991px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='right: 15%; left: 19%';
    
$education_insight_custom_style .='} }';


}else if($minimal_education_slider_content_alignment == 'CENTER-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='text-align:center; left: 15%; right: 15%;';

$education_insight_custom_style .='}';


}else if($minimal_education_slider_content_alignment == 'RIGHT-ALIGN'){

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='text-align:right; left: 45%; right: 19%;';

$education_insight_custom_style .='}';

$education_insight_custom_style .='@media screen and (max-width:1199px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='left: 20%; right: 19%';
    
$education_insight_custom_style .='} }';

$education_insight_custom_style .='@media screen and (max-width:991px){';

$education_insight_custom_style .='#slider .carousel-caption{';

    $education_insight_custom_style .='left: 15%; right: 19%';
    
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
    $education_insight_custom_style .= 'position: fixed; background: #01b509; box-shadow: none;';
    $education_insight_custom_style .= '}';

    $education_insight_custom_style .= '.page-template-custom-home-page .wrap_figure.fixed {';
    $education_insight_custom_style .= 'background: #01b509;';
    $education_insight_custom_style .= '}';

    $education_insight_custom_style .= '.admin-bar .fixed {';
    $education_insight_custom_style .= ' margin-top: 32px;';
    $education_insight_custom_style .= '}';
}




	