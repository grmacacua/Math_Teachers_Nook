<?php

$education_reform_custom_css = "";

$education_reform_theme_pagination_options_alignment = get_theme_mod('education_reform_theme_pagination_options_alignment', 'Center');
	if ($education_reform_theme_pagination_options_alignment == 'Center') {
	    $education_reform_custom_css .= '.pagination{';
	    $education_reform_custom_css .= 'text-align: center;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_theme_pagination_options_alignment == 'Right') {
	    $education_reform_custom_css .= '.pagination{';
	    $education_reform_custom_css .= 'text-align: Right;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_theme_pagination_options_alignment == 'Left') {
	    $education_reform_custom_css .= '.pagination{';
	    $education_reform_custom_css .= 'text-align: Left;';
	    $education_reform_custom_css .= '}';
	}

$education_reform_theme_breadcrumb_options_alignment = get_theme_mod('education_reform_theme_breadcrumb_options_alignment', 'Left');
	if ($education_reform_theme_breadcrumb_options_alignment == 'Center') {
	    $education_reform_custom_css .= '.breadcrumbs ul{';
	    $education_reform_custom_css .= 'text-align: center !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_theme_breadcrumb_options_alignment == 'Right') {
	    $education_reform_custom_css .= '.breadcrumbs ul{';
	    $education_reform_custom_css .= 'text-align: Right !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_theme_breadcrumb_options_alignment == 'Left') {
	    $education_reform_custom_css .= '.breadcrumbs ul{';
	    $education_reform_custom_css .= 'text-align: Left !important;';
	    $education_reform_custom_css .= '}';
	}

	$education_reform_menu_text_transform = get_theme_mod('education_reform_menu_text_transform', 'uppercase');
	if ($education_reform_menu_text_transform == 'Capitalize') {
	    $education_reform_custom_css .= '.site-navigation .primary-menu > li a{';
	    $education_reform_custom_css .= 'text-transform: Capitalize !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_menu_text_transform == 'uppercase') {
	    $education_reform_custom_css .= '.site-navigation .primary-menu > li a{';
	    $education_reform_custom_css .= 'text-transform: uppercase !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_menu_text_transform == 'lowercase') {
	    $education_reform_custom_css .= '.site-navigation .primary-menu > li a{';
	    $education_reform_custom_css .= 'text-transform: lowercase !important;';
	    $education_reform_custom_css .= '}';
	}

	$education_reform_single_page_content_alignment = get_theme_mod('education_reform_single_page_content_alignment', 'left');
	if ($education_reform_single_page_content_alignment == 'left') {
	    $education_reform_custom_css .= '#single-page .type-page{';
	    $education_reform_custom_css .= 'text-align: left !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_single_page_content_alignment == 'center') {
	    $education_reform_custom_css .= '#single-page .type-page{';
	    $education_reform_custom_css .= 'text-align: center !important;';
	    $education_reform_custom_css .= '}';
	} else if ($education_reform_single_page_content_alignment == 'right') {
	    $education_reform_custom_css .= '#single-page .type-page{';
	    $education_reform_custom_css .= 'text-align: right !important;';
	    $education_reform_custom_css .= '}';
	}