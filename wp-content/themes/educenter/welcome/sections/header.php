<div class="welcome-header clearfix">
    <div class="welcome-intro">
        <h2><?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name, 2-theme version */
                    esc_html__('Welcome to %1$s - Version %2$s', 'educenter'), $this->theme_name, $this->theme_version);
            ?>
        </h2>
        <div class="welcome-text">
            <?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name */
                    esc_html__('Welcome and thank you for installing %1$s. %2$s is a clean, beautiful and fully customizable responsive modern free education based WordPress theme. And of course, the premium version for additional features and better supports.', 'educenter'), $this->theme_name, $this->theme_name);
            ?>
        </div>

        <div class="free-pro-demos">
            <?php if ( is_plugin_active( 'sparkle-demo-importer/sparkle-demo-importer.php' ) ) { ?>
                <a class="button button-primary" href="themes.php?page=sparkle-theme-demo-importer"><span class="dashicons dashicons-visibility"></span><?php esc_html_e('Free Demos', 'educenter'); ?></a>
            <?php }else{ ?>
                <a class="button button-primary" href="https://demo.sparklewpthemes.com/educenter/demos/#all" target="_blank"><span class="dashicons dashicons-visibility"></span><?php esc_html_e('Free Demos', 'educenter'); ?></a>
            <?php } ?>
            <a class="button button-primary" href="https://demo.sparklewpthemes.com/educenterpro/#demos" target="_blank"><span class="dashicons dashicons-cart"></span><?php esc_html_e('Premium Demos', 'educenter'); ?></a>
            <a class="button button-primary" href="https://docs.sparklewpthemes.com/educenter/" target="_blank"><span class="dashicons Media dashicons-media-document"></span><?php esc_html_e('Documentaion', 'educenter'); ?></a>
        </div>
    </div>

    <div class="welcome-promo-banner">
        <a class="welcome-promo-offer" href="<?php echo apply_filters('educenter-pro-link', esc_url('https://sparklewpthemes.com/wordpress-themes/education-wordpress-theme/') );?>" target="_blank"><?php echo esc_html__('Unlock all the possibilities with Educenter Pro', 'educenter'); ?></a>
        <a href="<?php echo apply_filters('educenter-pro-link', esc_url('https://sparklewpthemes.com/wordpress-themes/education-wordpress-theme/') );?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('Upgrade for $59', 'educenter'); ?></a>
    </div>
</div>

<div class="welcome-nav-wrapper clearfix">
    <?php foreach ($tabs as $section_id => $label) : ?>
        <?php
        $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started';
        $nav_class = 'welcome-nav-tab';
        if ($section_id == $section) {
            $nav_class .= ' welcome-nav-tab-active';
        }
        ?>
        <a href="<?php echo esc_url(admin_url('admin.php?page=educenter-welcome&section=' . $section_id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
            <?php echo esc_html($label); ?>
        </a>
    <?php endforeach; ?>
</div>