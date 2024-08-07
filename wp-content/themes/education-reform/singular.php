<?php
/**
 * The template for displaying single posts and pages.
 * @package Education Reform
 * @since 1.0.0
 */
get_header();

    $education_reform_default = education_reform_get_default_theme_options();
    $education_reform_education_reform_global_sidebar_layout = esc_html( get_theme_mod( 'education_reform_global_sidebar_layout',$education_reform_default['education_reform_global_sidebar_layout'] ) );
    $education_reform_post_sidebar = esc_html( get_post_meta( $post->ID, 'education_reform_post_sidebar_option', true ) );
    $education_reform_sidebar_column_class = 'column-order-1';

    if (!empty($education_reform_post_sidebar)) {
        $education_reform_education_reform_global_sidebar_layout = $education_reform_post_sidebar;
    }

    if ($education_reform_education_reform_global_sidebar_layout == 'left-sidebar') {
        $education_reform_sidebar_column_class = 'column-order-2';
    } ?>

    <div id="single-page" class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $education_reform_sidebar_column_class; ?>">
                    <main id="site-content" class="" role="main">

                        <?php
                            education_reform_breadcrumb();

                        if( have_posts() ): ?>

                            <div class="article-wraper">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked education_reform_related_posts - 20  
                         * @hooked education_reform_single_post_navigation - 30  
                        */

                        do_action('education_reform_navigation_action'); ?>

                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php
get_footer();
