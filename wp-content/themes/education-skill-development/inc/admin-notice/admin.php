<?php 
/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_education_skill_development_dismissed_notice_handler', 'education_skill_development_ajax_notice_handler' );

/** * AJAX handler to record dismissible notice status. */
function education_skill_development_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function education_skill_development_admin_notice_deprecated_hook() {
        $current_screen = get_current_screen();
        if ($current_screen->id !== 'appearance_page_education-skill-development-guide-page') {
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="education-skill-development-getting-started-notice clearfix">
                    <div class="education-skill-development-theme-notice-content">
                        <h2 class="education-skill-development-notice-h2">
                            <?php
                            echo esc_html__( 'Let\'s Create Your website With', 'education-skill-development' ) . ' <strong>' . esc_html( wp_get_theme()->get('Name') ) . '</strong>';
                            ?>
                        </h2>
                        <span class="st-notification-wrapper">
                            <span class="st-notification-column-wrapper">
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Feature Rich WordPress Theme','education-skill-development'); ?></h2>
                                    <ul class="st-notification-column-list">
                                        <li><?php echo esc_html('Live Customize','education-skill-development'); ?></li>
                                        <li><?php echo esc_html('Detailed theme Options','education-skill-development'); ?></li>
                                        <li><?php echo esc_html('Cleanly Coded','education-skill-development'); ?></li>
                                        <li><?php echo esc_html('Search Engine Friendly','education-skill-development'); ?></li>
                                    </ul>
                                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=education-skill-development-guide-page' ) ); ?>" target="_blank" class="button-primary button"><?php echo esc_html('Theme Info','education-skill-development'); ?></a>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Customize Your Website','education-skill-development'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" target="_blank" class="button button-primary"><?php echo esc_html('Customize','education-skill-development'); ?></a></li>
                                        <li><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ) ?>" class="button button-primary"><?php echo esc_html('Add Widgets','education-skill-development'); ?></a></li>
                                        <li><a href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_SUPPORT_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Get Support','education-skill-development'); ?></a> </li>
                                    </ul>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Get More Options','education-skill-development'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_DEMO_PRO ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('View Live Demo','education-skill-development'); ?></a></li>
                                        <li><a href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_BUY_NOW ); ?>" class="button button-primary"><?php echo esc_html('Purchase Now','education-skill-development'); ?></a></li>
                                        <li><a href="<?php echo esc_url( EDUCATION_SKILLS_DEVELOPMENT_DOCS_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Free Documentation','education-skill-development'); ?></a> </li>
                                    </ul>
                                </span>
                            </span>
                        </span>

                        <style>
                        </style>
                    </div>
                </div>
            </div>
        <?php }
    }
}

add_action( 'admin_notices', 'education_skill_development_admin_notice_deprecated_hook' );

function education_skill_development_switch_theme_function () {
    delete_option('dismissed-get_started', FALSE );
}

add_action('after_switch_theme', 'education_skill_development_switch_theme_function');