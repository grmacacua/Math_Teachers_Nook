<?php
/**
* Header Banner Options.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();
$education_reform_post_category_list = education_reform_post_category_list();

$wp_customize->add_section( 'education_reform_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'education-reform' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_home_pannel',
    )
);

$wp_customize->add_setting('education_reform_display_header_title',
    array(
        'default' => $education_reform_default['education_reform_display_header_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_header_title',
    array(
        'label' => esc_html__('Enable / Disable Title', 'education-reform'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_display_header_text',
    array(
        'default' => $education_reform_default['education_reform_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'education-reform'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_header_banner',
    array(
        'default' => $education_reform_default['education_reform_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'education-reform'),
        'section' => 'education_reform_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'education_reform_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'education_reform_sanitize_select',
    )
);
$wp_customize->add_control( 'education_reform_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'education-reform' ),
    'section'     => 'education_reform_header_banner_setting',
    'type'        => 'select',
    'choices'     => $education_reform_post_category_list,
    )
);

$wp_customize->add_section( 'education_reform_header_category_setting',
    array(
    'title'      => esc_html__( 'Category Carousel Settings', 'education-reform' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_home_pannel',
    )
);

$wp_customize->add_setting('education_reform_category_section',
    array(
        'default' => $education_reform_default['education_reform_category_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_category_section',
    array(
        'label' => esc_html__('Enable Category Section', 'education-reform'),
        'section' => 'education_reform_header_category_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'education_reform_cat_main_service_title',
    array(
    'default'           => $education_reform_default['education_reform_cat_main_service_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_cat_main_service_title',
    array(
    'label'    => esc_html__( 'Main Title', 'education-reform' ),
    'section'  => 'education_reform_header_category_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'education_reform_cat_main_title',
    array(
    'default'           => $education_reform_default['education_reform_cat_main_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_cat_main_title',
    array(
    'label'    => esc_html__( 'Text', 'education-reform' ),
    'section'  => 'education_reform_header_category_setting',
    'type'     => 'text',
    )
);

for ($x = 1; $x <= 8; $x++) {

    $wp_customize->add_setting( 'education_reform_category_cat_'.$x,
        array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_select',
        )
    );
    $wp_customize->add_control( 'education_reform_category_cat_'.$x,
        array(
        'label'       => esc_html__( 'Category ', 'education-reform' ).$x,
        'section'     => 'education_reform_header_category_setting',
        'type'        => 'select',
        'choices'     => $education_reform_post_category_list,
        )
    );

}

$wp_customize->add_section( 'header_courses_category_setting',
    array(
    'title'      => esc_html__( 'Courses Carousel Settings', 'education-reform' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_home_pannel',
    )
);

$wp_customize->add_setting('education_reform_courses_category_section',
    array(
        'default' => $education_reform_default['education_reform_courses_category_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_courses_category_section',
    array(
        'label' => esc_html__('Enable Category Section', 'education-reform'),
        'section' => 'header_courses_category_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'education_reform_cat_main_service_title',
    array(
    'default'           => $education_reform_default['education_reform_cat_main_service_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_cat_main_service_title',
    array(
    'label'    => esc_html__( 'Main Title', 'education-reform' ),
    'section'  => 'header_courses_category_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'education_reform_cat_main_title',
    array(
    'default'           => $education_reform_default['education_reform_cat_main_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'education_reform_cat_main_title',
    array(
    'label'    => esc_html__( 'Text', 'education-reform' ),
    'section'  => 'header_courses_category_setting',
    'type'     => 'text',
    )
);

for ($x = 1; $x <= 8; $x++) {

    $wp_customize->add_setting( 'education_reform_courses_category_cat_'.$x,
        array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_select',
        )
    );
    $wp_customize->add_control( 'education_reform_courses_category_cat_'.$x,
        array(
        'label'       => esc_html__( 'Category ', 'education-reform' ).$x,
        'section'     => 'header_courses_category_setting',
        'type'        => 'select',
        'choices'     => $education_reform_post_category_list,
        )
    );

}