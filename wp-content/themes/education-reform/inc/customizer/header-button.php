<?php
/**
* Header Options.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'education_reform_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'education-reform' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'education_reform_theme_option_panel',
	)
);

$wp_customize->add_setting( 'education_reform_header_layout_phone_number',
    array(
    'default'           => $education_reform_default['education_reform_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'education-reform' ),
    'section'  => 'education_reform_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'education_reform_header_layout_email_address',
    array(
    'default'           => $education_reform_default['education_reform_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Header Email Address', 'education-reform' ),
    'section'  => 'education_reform_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'education_reform_header_layout_button_login_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'education_reform_header_layout_button_login_link',
    array(
    'label'    => esc_html__( 'Header Login Link', 'education-reform' ),
    'section'  => 'education_reform_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'education_reform_header_layout_button_register_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'education_reform_header_layout_button_register_link',
    array(
    'label'    => esc_html__( 'Header Register Link', 'education-reform' ),
    'section'  => 'education_reform_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('education_reform_menu_font_size',
    array(
        'default'           => $education_reform_default['education_reform_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_number_range',
    )
);
$wp_customize->add_control('education_reform_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'education-reform'),
        'section'     => 'education_reform_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'education_reform_menu_text_transform',
    array(
    'default'           => $education_reform_default['education_reform_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'education_reform_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'education-reform' ),
    'section'     => 'education_reform_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'education-reform' ),
        'uppercase'  => esc_html__( 'Uppercase', 'education-reform' ),
        'lowercase'    => esc_html__( 'Lowercase', 'education-reform' ),
        ),
    )
);

$wp_customize->add_setting('education_reform_sticky',
    array(
        'default' => $education_reform_default['education_reform_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'education-reform'),
        'section' => 'education_reform_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_theme_loader',
    array(
        'default' => $education_reform_default['education_reform_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'education-reform'),
        'section' => 'education_reform_button_header_setting',
        'type' => 'checkbox',
    )
);