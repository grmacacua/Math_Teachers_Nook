<?php
/**
* Custom Addons.
*
* @package Education Reform
*/

$wp_customize->add_section( 'education_reform_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'education-reform' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'education_reform_theme_pagination_options_alignment',
    array(
    'default'           => $education_reform_default['education_reform_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'education_reform_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'education-reform' ),
    'section'     => 'education_reform_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'education-reform' ),
        'Right' => esc_html__( 'Right', 'education-reform' ),
        'Left'  => esc_html__( 'Left', 'education-reform' ),
        ),
    )
);

$wp_customize->add_setting( 'education_reform_theme_breadcrumb_options_alignment',
    array(
    'default'           => $education_reform_default['education_reform_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'education_reform_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'education-reform' ),
    'section'     => 'education_reform_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'education-reform' ),
        'Right' => esc_html__( 'Right', 'education-reform' ),
        'Left'  => esc_html__( 'Left', 'education-reform' ),
        ),
    )
);

$wp_customize->add_setting('education_reform_breadcrumb_font_size',
    array(
        'default'           => $education_reform_default['education_reform_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_number_range',
    )
);
$wp_customize->add_control('education_reform_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'education-reform'),
        'section'     => 'education_reform_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'education_reform_single_page_content_alignment',
    array(
    'default'           => $education_reform_default['education_reform_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'education_reform_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'education-reform' ),
    'section'     => 'education_reform_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'education-reform' ),
        'center'  => esc_html__( 'Center', 'education-reform' ),
        'right'    => esc_html__( 'Right', 'education-reform' ),
        ),
    )
);
