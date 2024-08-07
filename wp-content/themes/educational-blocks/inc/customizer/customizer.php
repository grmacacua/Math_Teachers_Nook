<?php
/**
 * Educational Blocks: Customizer
 *
 * @subpackage Educational Blocks
 * @since 1.0
 */

function educational_blocks_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/inc/customizer/customizer.css');

	// Pro Section
 	$wp_customize->add_section('educational_blocks_pro', array(
        'title'    => __('EDUCATIONAL BLOCKS PREMIUM ', 'educational-blocks'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('educational_blocks_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Educational_Blocks_Pro_Control($wp_customize, 'educational_blocks_pro', array(
        'label'    => __('EDUCATIONAL BLOCKS PREMIUM', 'educational-blocks'),
        'section'  => 'educational_blocks_pro',
        'settings' => 'educational_blocks_pro',
        'priority' => 1,
    )));
}
add_action( 'customize_register', 'educational_blocks_customize_register' );


define('EDUCATIONAL_BLOCKS_PRO_LINK',__('https://www.ovationthemes.com/products/education-wordpress-theme','educational-blocks'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Educational_Blocks_Pro_Control')):
    class Educational_Blocks_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( EDUCATIONAL_BLOCKS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE EDUCATIONAL BLOCKS PREMIUM ','educational-blocks');?> </a>
	        </div>
            <div class="col-md">
                <img class="educational_blocks_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
                <ul style="padding-top:10px">
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'educational-blocks');?> </li>                 
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'educational-blocks');?> </li>
                    <li class="upsell-educational_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'educational-blocks');?> </li>
                </ul>
        	</div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( EDUCATIONAL_BLOCKS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE EDUCATIONAL BLOCKS PREMIUM ','educational-blocks');?> </a>
            </div>
        </label>
    <?php } }
endif;