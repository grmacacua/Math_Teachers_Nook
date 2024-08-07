<?php
function education_skill_development_premium_setting( $wp_customize ) {
	
	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'education_skill_development_upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','education-skill-development'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class Education_Skill_Development_WP_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'education_skill_development_upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro','education-skill-development' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo','education-skill-development' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_DOCS_FREE ); ?>" target="_blank"><?php esc_html_e( 'Free Documentation','education-skill-development' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info discount-box">
				<ul>
					<li class="discount-text"><?php esc_html_e( 'Special Discount of 35% Use Code “winter35”','education-skill-development' ); ?></li>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Wordpress Theme Bundle','education-skill-development' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting('education_skill_development_premium_info_buttons', array(
	   'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'education_skill_development_sanitize_text',
	));
		
	$wp_customize->add_control( new Education_Skill_Development_WP_Button_Customize_Control( $wp_customize, 'education_skill_development_premium_info_buttons', array(
		'section' => 'education_skill_development_upgrade_premium',
    ))
);
}
add_action( 'customize_register', 'education_skill_development_premium_setting' );