<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function education_reform_menu() {
	add_theme_page(__('Omega Options', 'education-reform'), __('Omega Options', 'education-reform'), 'edit_theme_options', 'education-reform-theme', 'education_reform_page');
}
add_action('admin_menu', 'education_reform_menu');

add_action('admin_menu', 'education_reform_menu');

// Add Getstart admin notice
function education_reform_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'education_reform_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_education-reform-theme' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Thank You for installing Education Reform Theme!', 'education-reform') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=education-reform-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'education-reform'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(EDUCATION_REFORM_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'education-reform'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(EDUCATION_REFORM_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'education-reform'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(EDUCATION_REFORM_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'education-reform'); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?education_reform_admin_notice=1"><?php esc_html_e( 'Dismiss', 'education-reform' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'education_reform_admin_notice' );

if ( ! function_exists( 'education_reform_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function education_reform_update_admin_notice() {
    if ( isset( $_GET['education_reform_admin_notice'] ) && $_GET['education_reform_admin_notice'] == '1' ) {
        update_option( 'education_reform_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'education_reform_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'education_reform_getstart_setup_options' );
function education_reform_getstart_setup_options() {
    update_option( 'education_reform_admin_notice', false );
}
/**
 * Enqueue styles for the help page.
 */
function education_reform_admin_scripts($hook)
{
	wp_enqueue_style('education-reform-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'education_reform_admin_scripts');

/**
 * Add the theme page
 */
function education_reform_page(){
$education_reform_user = wp_get_current_user();
$education_reform_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="education-reform-panel header">
    <div class="education-reform-logo">
      <span></span>
      <h2><?php echo esc_html( $education_reform_theme ); ?></h2>
      <!-- <span><?php echo esc_html($education_reform_theme['Version']);?></span> -->
    </div>
    <p>
      <?php
            $education_reform_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $education_reform_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'education-reform'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="education-reform-panel">
        <div class="education-reform-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'education-reform'); ?></h3>
          </div>
          <a href="<?php echo esc_url( EDUCATION_REFORM_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'education-reform'); ?></a>
        </div>
      </div>
      <div class="education-reform-panel">
        <div class="education-reform-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'education-reform'); ?></h3>
          </div>
          <a href="<?php echo esc_url( EDUCATION_REFORM_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'education-reform'); ?></a>
        </div>
      </div>
       <div class="education-reform-panel">
        <div class="education-reform-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'education-reform'); ?></h3>
          </div>
          <a href="<?php echo esc_url( EDUCATION_REFORM_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'education-reform'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'education-reform'); ?>
          </strong>
          </h4>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'education-reform'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'education-reform'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'education-reform'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'education-reform'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( EDUCATION_REFORM_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'education-reform'); ?></a>
        </div>
      </div>
      <div class="education-reform-panel">
        <div class="education-reform-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'education-reform'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( EDUCATION_REFORM_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'education-reform'); ?></a>
        </div>
        <div class="education-reform-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'education-reform'); ?></h3>
          </div>
          <a href="<?php echo esc_url( EDUCATION_REFORM_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'education-reform'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}