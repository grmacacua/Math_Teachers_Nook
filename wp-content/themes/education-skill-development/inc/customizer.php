<?php
/**
 * education-skill-development Theme Customizer.
 *
 * @package education-skill-development
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_skill_development_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';	
}
add_action( 'customize_register', 'education_skill_development_customize_register' );

if ( ! defined( 'EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1' ) ) {
define('EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1',__('https://www.mishkatwp.com/themes/skill-development-wordpress-theme/','education-skill-development'));
}

if ( class_exists("Kirki")){

	/* Logo */

	/* Logo Size limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'education_skill_development_logo_resizer_setting',
			'label'       => esc_html__( 'Logo Size Limit', 'education-skill-development' ),
			'section'     => 'title_tagline',
			'default'     => 70,
			'choices'     => [
				'min'  => 10,
				'max'  => 300,
				'step' => 10,
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_site_title_setting',
			'label'       => esc_html__( 'Site Title On / Off', 'education-skill-development' ),
			'section'     => 'title_tagline',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_tagline_setting',
			'label'       => esc_html__( 'Tagline On / Off', 'education-skill-development' ),
			'section'     => 'title_tagline',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'title_tagline',
    ] );

	/* Logo End */

	/* Social Icon */

	new \Kirki\Section(
		'education_skill_development_top_header_section',
		[
			'title'       => esc_html__( 'Header Social Icon', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add social links.', 'education-skill-development' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_top_twitter_link',
			'label'    => esc_html__( 'Add Twitter Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_top_linkdin_link',
			'label'    => esc_html__( 'Add Linkdin Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_top_youtube_link',
			'label'    => esc_html__( 'Add Youtube Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_top_facebook_link',
			'label'    => esc_html__( 'Add Facebook Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_top_instagram_link',
			'label'    => esc_html__( 'Add Instagram Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_top_header_section',
    ] );

    //Home page Setting Panel
	new \Kirki\Panel(
		'education_skill_development_home_page_section',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Home Page Sections', 'education-skill-development' ),
			'priority'    => 20,
		]
	);

	/* Header */

	new \Kirki\Section(
		'education_skill_development_header_button_section',
		[
			'title'       => esc_html__( 'Header', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add header button text and link.', 'education-skill-development' ),
			'panel'		  => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_header_phone_number',
			'label'    => esc_html__( 'Add Phone Number', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_header_email_address',
			'label'    => esc_html__( 'Add Email Address', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_header_register_text',
			'label'    => esc_html__( 'Add Register Text', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_header_register_link',
			'label'    => esc_html__( 'Add Register Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_header_login_text',
			'label'    => esc_html__( 'Add Login Text', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_header_login_link',
			'label'    => esc_html__( 'Add Login Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_header_cart_link',
			'label'    => esc_html__( 'Add Cart Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'education_skill_development_header_user_link',
			'label'    => esc_html__( 'Add My Account Link', 'education-skill-development' ),
			'section'  => 'education_skill_development_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_header_button_section',
    ] );

	/* Home Slider */

	new \Kirki\Section(
		'education_skill_development_home_slider_section',
		[
			'title'       => esc_html__( 'Home Slider', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add slider image, title and text.', 'education-skill-development' ),
			'panel'		  => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_slide_on_off',
			'label'       => esc_html__( 'Slider On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_home_slider_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'education_skill_development_slide_count',
			'label'    => esc_html__( 'Slider Number Control', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_slider_section',
			'default'  => '',
			'choices'  => [
				'min'  => 1,
				'max'  => 2,
				'step' => 1,
			],
		]
	);

	$education_skill_development_slide_count = get_theme_mod('education_skill_development_slide_count');

	for ($i=1; $i <= $education_skill_development_slide_count; $i++) { 
		
		new \Kirki\Field\Image(
			[
				'settings'    => 'education_skill_development_slider_image'.$i,
				'label'       => esc_html__( 'Slider Image 0', 'education-skill-development' ).$i,
				'section'     => 'education_skill_development_home_slider_section',
				'default'     => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_slider_short_heading'.$i,
				'label'    => esc_html__( 'Short Heading 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_slider_heading'.$i,
				'label'    => esc_html__( 'Main Heading 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_slider_section',
			]
		);

		new \Kirki\Field\URL(
			[
				'settings' => 'education_skill_development_slider_heading_link'.$i,
				'label'    => esc_html__( 'Heading Url 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_slider_section',
				'default'  => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_slider_content'.$i,
				'label'    => esc_html__( 'Content Text 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_slider_section',
			]
		);
	}

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_slider_phone_number_text',
			'label'    => esc_html__( 'Phone Number Text', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_slider_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_slider_phone_number',
			'label'    => esc_html__( 'Phone Number', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_slider_section',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_home_slider_section',
    ] );

	/* Home Features */

	new \Kirki\Section(
		'education_skill_development_home_features_section',
		[
			'title'       => esc_html__( 'Home Features', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add features icon and title.', 'education-skill-development' ),
			'panel'		  => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_features_on_off',
			'label'       => esc_html__( 'Features On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_home_features_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'education_skill_development_features_count',
			'label'    => esc_html__( 'Features Number Control', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_features_section',
			'default'  => '',
			'choices'  => [
				'min'  => 0,
				'max'  => 6,
				'step' => 1,
			],
		]
	);

	$education_skill_development_features_count = get_theme_mod('education_skill_development_features_count');

	for ($i=1; $i <= $education_skill_development_features_count; $i++) { 
		
		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_features_icon'.$i,
				'label'    => esc_html__( 'Icon 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_features_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_features_heading'.$i,
				'label'    => esc_html__( 'Main Heading 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_features_section',
			]
		);
		
	}

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_home_features_section',
    ] );

    /* Pro Popular Courses */

    new \Kirki\Section(
		'education_skill_development_popular_courses_section',
		[
			'title'       => esc_html__( 'Popular Courses Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_popular_courses_section',
        'description' => __( '<p>a. Add more Popular Courses Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Popular Courses Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Popular Courses End */

	/* Pro Our Facilities */

    new \Kirki\Section(
		'education_skill_development_our_facilities_section',
		[
			'title'       => esc_html__( 'Our Facilities Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_our_facilities_section',
        'description' => __( '<p>a. Add more Our Facilities Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Facilities Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Our Facilities End */

	/* Pro About Us */

    new \Kirki\Section(
		'education_skill_development_about_us_section',
		[
			'title'       => esc_html__( 'About Us Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_about_us_section',
        'description' => __( '<p>a. Add more About Us Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For About Us Section</p>', 'education-skill-development' ),
    ] );

	/* Pro About Us End */

	/* Pro Join Us */

    new \Kirki\Section(
		'education_skill_development_join_us_section',
		[
			'title'       => esc_html__( 'Join Us Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_join_us_section',
        'description' => __( '<p>a. Add more Join Us Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Join Us Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Join Us End */

	/* Pro Counter */

    new \Kirki\Section(
		'education_skill_development_counter_section',
		[
			'title'       => esc_html__( ' Counter Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_counter_section',
        'description' => __( '<p>a. Add more Counter Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Counter Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Counter End */

	/* Home Team */

	new \Kirki\Section(
		'education_skill_development_home_team_section',
		[
			'title'       => esc_html__( 'Home Team', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add team name and team designation to display team.', 'education-skill-development' ),
			'panel'		  => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_team_on_off',
			'label'       => esc_html__( 'Team On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_home_team_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_team_main_heading',
			'label'    => esc_html__( 'Main Heading', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_team_section',
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'education_skill_development_team_count',
			'label'    => esc_html__( 'Team Number Control', 'education-skill-development' ),
			'section'  => 'education_skill_development_home_team_section',
			'default'  => '',
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	$education_skill_development_team_count = get_theme_mod('education_skill_development_team_count');

	for ($i=1; $i <= $education_skill_development_team_count; $i++) { 
		
		new \Kirki\Field\Image(
			[
				'settings'    => 'education_skill_development_team_image'.$i,
				'label'       => esc_html__( 'Team Image 0', 'education-skill-development' ).$i,
				'section'     => 'education_skill_development_home_team_section',
				'default'     => '',
			]
		);		
		
		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_team_heading'.$i,
				'label'    => esc_html__( 'Team Member Name 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_team_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'education_skill_development_team_designation'.$i,
				'label'    => esc_html__( 'Team Designation 0', 'education-skill-development' ).$i,
				'section'  => 'education_skill_development_home_team_section',
			]
		);

	}

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_home_team_section',
    ] );

    /* Pro Offer */

    new \Kirki\Section(
		'education_skill_development_offer_section',
		[
			'title'       => esc_html__( 'Offer Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_offer_section',
        'description' => __( '<p>a. Add more Offer Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Offer Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Offer End */

	/* Pro Testimonial */

    new \Kirki\Section(
		'education_skill_development_testimonial_section',
		[
			'title'       => esc_html__( 'Testimonial Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_testimonial_section',
        'description' => __( '<p>a. Add more Testimonial Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Testimonial Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Testimonial End */

	/* Pro Latest News */

    new \Kirki\Section(
		'education_skill_development_latest_news_section',
		[
			'title'       => esc_html__( 'Latest News Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_latest_news_section',
        'description' => __( '<p>a. Add more Latest News Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Latest News Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Latest News End */

	/* Pro Newsletter */

    new \Kirki\Section(
		'education_skill_development_newsletter_section',
		[
			'title'       => esc_html__( 'Newsletter Section', 'education-skill-development' ),
			'panel'       => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'education_skill_development_newsletter_section',
        'description' => __( '<p>a. Add more Newsletter Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Newsletter Section</p>', 'education-skill-development' ),
    ] );

	/* Pro Newsletter End */


	/* Footer */

	new \Kirki\Section(
		'education_skill_development_footer_section',
		[
			'title'       => esc_html__( 'Footer', 'education-skill-development' ),
			'panel'		  => 'education_skill_development_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_footer_widgets_on_off',
			'label'       => esc_html__( 'Footer Widgets On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_copyright_on_off',
			'label'       => esc_html__( 'Footer Copyright On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_copyright_content_text',
			'label'    => esc_html__( 'Copyright Text', 'education-skill-development' ),
			'section'  => 'education_skill_development_footer_section',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_footer_section',
    ] );

	/* Single Post Options */

	new \Kirki\Section(
		'education_skill_development_single_post_options',
		[
			'title'       => esc_html__( 'Single Post Options', 'education-skill-development' ),
			'priority'    => 30,
		]
	);
    
    /* Single Post Heading Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_single_post_heading_on_off',
			'label'       => esc_html__( 'Single Post Heading On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Single Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_single_post_content_on_off',
			'label'       => esc_html__( 'Single Post Content On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Single Post Meta Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_single_meta_on_off',
			'label'       => esc_html__( 'Single Post Meta On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Single Post Feature Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_single_post_image_on_off',
			'label'       => esc_html__( 'Single Post Feature Image On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Single Post Pagination Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_single_post_pagination_on_off',
			'label'       => esc_html__( 'Single Post Pagination On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_single_post_options',
    ] );


	/* Post Options */

	new \Kirki\Section(
		'education_skill_development_post_options',
		[
			'title'       => esc_html__( 'Post Options', 'education-skill-development' ),
			'priority'    => 30,
		]
	);
    
    /* Post Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_image_on_off',
			'label'       => esc_html__( 'Post Image On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Heading Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_heading_on_off',
			'label'       => esc_html__( 'Post Heading On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_content_on_off',
			'label'       => esc_html__( 'Post Content On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Date Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_date_on_off',
			'label'       => esc_html__( 'Post Date On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Comments Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_comment_on_off',
			'label'       => esc_html__( 'Post Comments On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Author Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_author_on_off',
			'label'       => esc_html__( 'Post Author On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post Categories Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_post_categories_on_off',
			'label'       => esc_html__( 'Post Categories On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	/* Post limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'education_skill_development_post_content_limit',
			'label'       => esc_html__( 'Post Content Limit', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_options',
			'default'     => 15,
			'choices'     => [
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_post_options',
    ] );

	/* Post Options End */

	/* Post Options */

	new \Kirki\Section(
		'education_skill_development_post_layouts_section',
		[
			'title'       => esc_html__( 'Post Layout Options', 'education-skill-development' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Radio_Image(
		[
			'settings'    => 'education_skill_development_post_layout',
			'label'       => esc_html__( 'Blog Layout', 'education-skill-development' ),
			'section'     => 'education_skill_development_post_layouts_section',
			'default'     => 'two_column_right',
			'priority'    => 10,
			'choices'     => [
				'one_column'   => get_template_directory_uri().'/images/1column.png',
				'two_column_right' => get_template_directory_uri().'/images/right-sidebar.png',
				'two_column_left'  => get_template_directory_uri().'/images/left-sidebar.png',
				'three_column'  => get_template_directory_uri().'/images/3column.png',
				'four_column'  => get_template_directory_uri().'/images/4column.png',
				'grid_post'  => get_template_directory_uri().'/images/grid.png',
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_post_layouts_section',
    ] );

	/* Post Options End */

	/* 404 Page */

	new \Kirki\Section(
		'education_skill_development_404_page_section',
		[
			'title'       => esc_html__( '404 Page', 'education-skill-development' ),
			'description' => esc_html__( 'Here you can add 404 Page information.', 'education-skill-development' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_404_page_heading',
			'label'    => esc_html__( 'Add Heading', 'education-skill-development' ),
			'section'  => 'education_skill_development_404_page_section',
			'default'  => esc_html__( '404', 'education-skill-development' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_404_page_content',
			'label'    => esc_html__( 'Add Content', 'education-skill-development' ),
			'section'  => 'education_skill_development_404_page_section',
			'default'  => esc_html__( 'Ops! Something happened...', 'education-skill-development' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'education_skill_development_404_page_button',
			'label'    => esc_html__( 'Add Button', 'education-skill-development' ),
			'section'  => 'education_skill_development_404_page_section',
			'default'  => esc_html__( 'Home', 'education-skill-development' ),
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_404_page_section',
    ] );

	/* 404 Page End */

	/* General Options */

	new \Kirki\Section(
		'education_skill_development_general_options_section',
		[
			'title'       => esc_html__( 'General Options', 'education-skill-development' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_preloader_setting',
			'label'       => esc_html__( 'Preloader On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_general_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'education_skill_development_scroll_to_top_setting',
			'label'       => esc_html__( 'Scroll To Top On / Off', 'education-skill-development' ),
			'section'     => 'education_skill_development_general_options_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'education-skill-development' ),
				'off' => esc_html__( 'Disable', 'education-skill-development' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'education-skill-development' ),
		'default'  => '<a class="premium_info_btn" target="_blank" href="' . esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'education-skill-development' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'education_skill_development_general_options_section',
    ] );

	/* General Options End */

}