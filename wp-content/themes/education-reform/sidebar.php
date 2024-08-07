<?php
/**
 * The sidebar containing the main widget area
 * @package Education Reform
 */

global $post;

$education_reform_default = education_reform_get_default_theme_options();

if(!empty($post)) {
$education_reform_post_sidebar = esc_html( get_post_meta( $post->ID, 'education_reform_post_sidebar_option', true ) );
}

$education_reform_sidebar_column_class = 'column-order-2';

if (empty($education_reform_post_sidebar)) {
    $education_reform_education_reform_global_sidebar_layout = esc_html( get_theme_mod( 'education_reform_global_sidebar_layout',$education_reform_default['education_reform_global_sidebar_layout'] ) );
} else {
    $education_reform_education_reform_global_sidebar_layout = $education_reform_post_sidebar;
}
if ( ! is_active_sidebar( 'sidebar-1' ) || $education_reform_education_reform_global_sidebar_layout == 'no-sidebar' ) {
    return;
}

if ($education_reform_education_reform_global_sidebar_layout == 'left-sidebar') {
    $education_reform_sidebar_column_class = 'column-order-1';
}
 ?>

<aside id="secondary" class="widget-area <?php echo $education_reform_sidebar_column_class; ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
