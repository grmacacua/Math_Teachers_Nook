<?php
/**
* Posts Settings.
*
* @package Education Reform
*/

$education_reform_default = education_reform_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'education_reform_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'education-reform' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_option_panel',
    )
);

$wp_customize->add_setting('education_reform_post_author',
    array(
        'default' => $education_reform_default['education_reform_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'education-reform'),
        'section' => 'education_reform_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_post_date',
    array(
        'default' => $education_reform_default['education_reform_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'education-reform'),
        'section' => 'education_reform_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_post_category',
    array(
        'default' => $education_reform_default['education_reform_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'education-reform'),
        'section' => 'education_reform_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_post_tags',
    array(
        'default' => $education_reform_default['education_reform_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'education-reform'),
        'section' => 'education_reform_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Single Post Section.
$wp_customize->add_section( 'education_reform_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'education-reform' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'education_reform_theme_option_panel',
    )
);

$wp_customize->add_setting('education_reform_display_archive_post_sticky_post',
    array(
        'default' => $education_reform_default['education_reform_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'education-reform'),
        'section' => 'education_reform_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_display_archive_post_category',
    array(
        'default' => $education_reform_default['education_reform_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'education-reform'),
        'section' => 'education_reform_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_display_archive_post_title',
    array(
        'default' => $education_reform_default['education_reform_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'education-reform'),
        'section' => 'education_reform_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_display_archive_post_content',
    array(
        'default' => $education_reform_default['education_reform_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'education-reform'),
        'section' => 'education_reform_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_display_archive_post_button',
    array(
        'default' => $education_reform_default['education_reform_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_reform_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'education-reform'),
        'section' => 'education_reform_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('education_reform_excerpt_limit',
    array(
        'default'           => $education_reform_default['education_reform_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_reform_sanitize_number_range',
    )
);
$wp_customize->add_control('education_reform_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'education-reform'),
        'section'     => 'education_reform_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);