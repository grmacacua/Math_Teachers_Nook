<?php
/**
 * The default template for displaying content
 * @package Education Reform
 * @since 1.0.0
 */

$education_reform_default = education_reform_get_default_theme_options();
$education_reform_image_size = 'large';
global $education_reform_archive_first_class; 
$education_reform_archive_classes = [
    'theme-article-post',
    'theme-article-animate',
    $education_reform_archive_first_class
];?>

<article id="post-<?php the_ID(); ?>" <?php post_class($education_reform_archive_classes); ?>>
    <div class="theme-article-image">
        <div class="entry-thumbnail">
            <?php
            if (is_search() || is_archive() || is_front_page()) {
                $education_reform_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                $education_reform_featured_image = isset($education_reform_featured_image[0]) ? $education_reform_featured_image[0] : '';
                $background_style = $education_reform_featured_image ? 'background-image: url(' . esc_url($education_reform_featured_image) . ');' : 'background-color: #f0f0f0;';
                ?>
                <div class="post-thumbnail data-bg data-bg-big" style="<?php echo $background_style; ?>">
                    <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                </div>
                <?php
            } else {
                education_reform_post_thumbnail($education_reform_image_size);
            }
            if (get_theme_mod('education_reform_display_archive_post_sticky_post', true) == true) :
                education_reform_post_format_icon();
            endif;
            ?>
        </div>
    </div>
    <div class="theme-article-details">
        <?php if ( get_theme_mod('education_reform_display_archive_post_category', true) == true ) : ?>
        <div class="entry-meta-top">
            <div class="entry-meta">
                <?php education_reform_entry_footer($cats = true, $tags = false, $edits = false); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('education_reform_display_archive_post_title', true) == true ) : ?>
            <header class="entry-header">
                <h2 class="entry-title entry-title-medium">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <span><?php the_title(); ?></span>
                    </a>
                </h2>
            </header>
        <?php endif; ?>
         <?php if ( get_theme_mod('education_reform_display_archive_post_content', true) == true ) : ?>
            <div class="entry-content">
                <?php
                if (has_excerpt()) {

                    the_excerpt();

                } else {

                    echo '<p>';
                echo esc_html(wp_trim_words(get_the_content(), get_theme_mod('education_reform_excerpt_limit', 10), '...'));
                echo '</p>';
                }

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'education-reform'),
                    'after' => '</div>',
                )); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('education_reform_display_archive_post_button', true) == true ) : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" class="theme-btn-link">
              <span> <?php esc_html_e('Read More', 'education-reform'); ?> </span>
              <span class="topbar-info-icon"><?php education_reform_the_theme_svg('arrow-right-1'); ?></span>
            </a>
        <?php endif; ?>
    </div>
</article>