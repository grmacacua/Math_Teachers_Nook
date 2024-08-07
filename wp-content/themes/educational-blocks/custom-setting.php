<?php 

function educational_blocks_add_admin_menu() {
    add_menu_page(
        'Theme Settings', // Page title
        'Theme Settings', // Menu title
        'manage_options', // Capability
        'educational-blocks-theme-settings', // Menu slug
        'educational_blocks_settings_page' // Function to display the page
    );
}
add_action( 'admin_menu', 'educational_blocks_add_admin_menu' );

function educational_blocks_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Theme Settings', 'educational-blocks' ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'educational_blocks_settings_group' );
            do_settings_sections( 'educational-blocks-theme-settings' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function educational_blocks_register_settings() {
    register_setting( 'educational_blocks_settings_group', 'educational_blocks_enable_animations' );

    add_settings_section(
        'educational_blocks_settings_section',
        __( 'Animation Settings', 'educational-blocks' ),
        null,
        'educational-blocks-theme-settings'
    );

    add_settings_field(
        'educational_blocks_enable_animations',
        __( 'Enable Animations', 'educational-blocks' ),
        'educational_blocks_enable_animations_callback',
        'educational-blocks-theme-settings',
        'educational_blocks_settings_section'
    );
}
add_action( 'admin_init', 'educational_blocks_register_settings' );

function educational_blocks_enable_animations_callback() {
    $checked = get_option( 'educational_blocks_enable_animations', true );
    ?>
    <input type="checkbox" name="educational_blocks_enable_animations" value="1" <?php checked( 1, $checked ); ?> />
    <?php
}

