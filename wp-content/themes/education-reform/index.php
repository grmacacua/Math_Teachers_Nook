<?php
/**
 * The main template file
 * @package Education Reform
 * @since 1.0.0
 */

get_header();
$education_reform_default = education_reform_get_default_theme_options();
$education_reform_education_reform_global_sidebar_layout = esc_html( get_theme_mod( 'education_reform_global_sidebar_layout',$education_reform_default['education_reform_global_sidebar_layout'] ) );
$education_reform_sidebar_column_class = 'column-order-2';
if ($education_reform_education_reform_global_sidebar_layout == 'right-sidebar') {
    $education_reform_sidebar_column_class = 'column-order-1';
}

global $education_reform_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $education_reform_sidebar_column_class; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            education_reform_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('education_reform_archive_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();
