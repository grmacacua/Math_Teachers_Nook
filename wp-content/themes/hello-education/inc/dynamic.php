<?php
/**
 * Dynamic Style from parent
 */
add_filter( 'educenter_dynamic_css', 'hello_education_dynamic_css', 100 );
function hello_education_dynamic_css($dynamic_css){

    
    $hello_education_dynamic_css = $hello_education_tablet_css = $hello_education_mobile_css = "";
    
    $primary_color = esc_html(get_theme_mod('educenter_primary_color', '#004A8D'));
    
    $hello_education_dynamic_css .= "
    .headerone .nav-menu .box-header-nav{
        background-color: {$primary_color}ae;
    }

    body.educenter-slider-enable #masthead,
    .box-header-nav .main-menu .page_item.focus > .children, .box-header-nav .main-menu .menu-item.focus > .sub-menu, .box-header-nav .main-menu .page_item:hover > .children, .box-header-nav .main-menu .menu-item:hover > .sub-menu,
    #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover,
    .learnpress-page .lp-button:hover, .learnpress-page #lp-button:hover,
    ul.learn-press-nav-tabs .course-nav.active::before,
    .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-readmore a,
    .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-readmore a:hover,
    .lp-archive-courses .learn-press-courses[data-layout=\"grid\"] .course .course-item .course-content .course-info::before,
    .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-categories a:first-child{
        background-color: $primary_color;
    }
    #learn-press-profile #profile-content .lp-button:hover,
    .lp-courses-bar .search-courses input[type=\"text\"]:focus,
    #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover{
        border-color: $primary_color;
    }
    .headerone .bottom-header .contact-info .quickcontact .get-tuch i,
    #learn-press-profile #profile-nav .lp-profile-nav-tabs > li.wishlist > a::before,
    .learn-press-pagination .page-numbers > li .page-numbers.current,
    .learn-press-pagination .page-numbers > li .page-numbers:hover,
    .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-permalink .course-title:hover,
    .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-wrap-meta .meta-item::before,
    .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-permalink .course-title:hover,
    input[type=\"radio\"]:nth-child(3):checked ~ .switch-btn:nth-child(4)::before,
    input[type=\"radio\"]:nth-child(1):checked ~ .switch-btn:nth-child(2)::before,
    .lp-archive-courses .course-summary .course-summary-content .course-detail-info .course-info-left .course-meta .course-meta__pull-left .meta-item::before ,
    #learn-press-course-tabs input[name=\"learn-press-course-tab-radio\"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label,
    #learn-press-course-tabs input[name=\"learn-press-course-tab-radio\"]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,
    #learn-press-course-tabs input[name=\"learn-press-course-tab-radio\"]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,
    #learn-press-course-tabs input[name=\"learn-press-course-tab-radio\"]:nth-child(4):checked ~ .learn-press-nav-tabs .course-nav:nth-child(4) label,
    #learn-press-profile #profile-nav .lp-profile-nav-tabs > li > a > i,
    .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title:hover,
    .lp-archive-courses .learn-press-courses[data-layout=\"grid\"] .course .course-item .course-content .course-info .course-footer .course-students::before{
        color: $primary_color;
    }
    ";


    $hello_education_dynamic_css .= "@media screen and (max-width:768px){{$hello_education_tablet_css}}";
    $hello_education_dynamic_css .= "@media screen and (max-width:480px){{$hello_education_mobile_css}}";

    $dynamic_css .= $hello_education_dynamic_css;

    wp_add_inline_style( 'hello-education-style', hello_education_strip_whitespace($dynamic_css) );

}

function hello_education_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css    = str_replace($search, $replace, $css);

    return trim($css);
}