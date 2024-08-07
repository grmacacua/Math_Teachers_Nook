<?php
/**
* Layouts Settings.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'education_reform_layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'education-reform' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'education_reform_theme_option_panel',
	)
);

$wp_customize->add_setting( 'education_reform_global_sidebar_layout',
    array(
    'default'           => $education_reform_default['education_reform_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'education_reform_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'education-reform' ),
    'section'     => 'education_reform_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'education-reform' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'education-reform' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'education-reform' ),
        ),
    )
);
