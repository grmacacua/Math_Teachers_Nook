<?php
/**
* Additional Woocommerce Settings.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'education_reform_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'education-reform' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'education_reform_theme_option_panel',
	)
);

	$wp_customize->add_setting('education_reform_per_columns',
		array(
		'default'           => $education_reform_default['education_reform_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_reform_sanitize_number_range',
		)
	);
	$wp_customize->add_control('education_reform_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'education-reform'),
		'section'     => 'education_reform_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('education_reform_product_per_page',
		array(
		'default'           => $education_reform_default['education_reform_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_reform_sanitize_number_range',
		)
	);
	$wp_customize->add_control('education_reform_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'education-reform'),
		'section'     => 'education_reform_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);