<?php
/**
* Footer Settings.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

$wp_customize->add_section( 'education_reform_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'education-reform' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'education_reform_theme_option_panel',
	)
);

$wp_customize->add_setting( 'education_reform_footer_column_layout',
	array(
	'default'           => $education_reform_default['education_reform_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_reform_sanitize_select',
	)
);
$wp_customize->add_control( 'education_reform_footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'education-reform' ),
	'section'     => 'education_reform_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'education-reform' ),
		'2' => esc_html__( 'Two Column', 'education-reform' ),
		'3' => esc_html__( 'Three Column', 'education-reform' ),
	    ),
	)
);

$wp_customize->add_setting( 'education_reform_footer_copyright_text',
	array(
	'default'           => $education_reform_default['education_reform_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'education_reform_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'education-reform' ),
	'section'  => 'education_reform_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('education_reform_copyright_font_size',
    array(
        'default'           => $education_reform_default['education_reform_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_number_range',
    )
);
$wp_customize->add_control('education_reform_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'education-reform'),
        'section'     => 'education_reform_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'education_reform_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'education_reform_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'education-reform'),
    'description' => __('It will change the complete footer widget background color.', 'education-reform'),
    'section' => 'education_reform_footer_widget_area',
    'settings' => 'education_reform_footer_widget_background_color',
)));

$wp_customize->add_setting('education_reform_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'education_reform_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','education-reform'),
    'section' => 'education_reform_footer_widget_area'
)));