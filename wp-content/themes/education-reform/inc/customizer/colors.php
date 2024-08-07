<?php
/**
* Color Settings.
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

$wp_customize->add_setting( 'education_reform_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'education_reform_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'education-reform' ),
        'section'    => 'colors',
        'settings'   => 'education_reform_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'education_reform_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'education_reform_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'education-reform' ),
        'section'    => 'colors',
        'settings'   => 'education_reform_border_color',
    ) ) 
);