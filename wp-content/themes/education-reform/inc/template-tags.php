<?php
/**
 * Custom Functions
 * @package Education Reform
 * @since 1.0.0
 */

if( !function_exists('education_reform_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $args Arguments for displaying the site logo either as an image or text.
     * @param boolean $echo Echo or return the HTML.
     *
     * @return string $html Compiled HTML based on our arguments.
     */
    function education_reform_site_logo( $args = array(), $echo = true ){
        $education_reform_logo = get_custom_logo();
        $education_reform_site_title = get_bloginfo('name');
        $contents = '';
        $classname = '';
        $defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $args = wp_parse_args($args, $defaults);
        /**
         * Filters the arguments for `education_reform_site_logo()`.
         *
         * @param array $args Parsed arguments.
         * @param array $defaults Function's default arguments.
         */
        $args = apply_filters('education_reform_site_logo_args', $args, $defaults);
        if ( has_custom_logo() ) {
            $contents = sprintf($args['logo'], $education_reform_logo, esc_html($education_reform_site_title));
            $contents .= sprintf($args['title'], esc_url( get_home_url(null, '/') ), esc_html($education_reform_site_title));
            $classname = $args['logo_class'];
        } else {
            if ( get_theme_mod('education_reform_display_header_title', true) == true ) :
                $contents = sprintf($args['title'], esc_url( get_home_url(null, '/') ), esc_html($education_reform_site_title));
                $classname = $args['title_class'];
            endif;
        }
        $wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';
        // $wrap = 'home_wrap';
        $html = sprintf($args[$wrap], $classname, $contents);
        /**
         * Filters the arguments for `education_reform_site_logo()`.
         *
         * @param string $html Compiled html based on our arguments.
         * @param array $args Parsed arguments.
         * @param string $classname Class name based on current view, home or single.
         * @param string $contents HTML for site title or logo.
         */
        $html = apply_filters('education_reform_site_logo', $html, $args, $classname, $contents);
        if (!$echo) {
            return $html;
        }
        echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('education_reform_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $echo Echo or return the html.
     *
     * @return string $html The HTML to display.
     */
    function education_reform_site_description($echo = true){
        
        if ( get_theme_mod('education_reform_display_header_text', false) == true ) :
        $education_reform_description = get_bloginfo('description');
        if (!$education_reform_description) {
            return;
        }
        $wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $html = sprintf($wrapper, esc_html($education_reform_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $html The HTML to display.
         * @param string $education_reform_description Site description via `bloginfo()`.
         * @param string $wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $html = apply_filters('education_reform_site_description', $html, $education_reform_description, $wrapper);
        if (!$echo) {
            return $html;
        }
        echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('education_reform_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function education_reform_posted_on( $icon = true, $animation_class = '' ){

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_post_date = absint( get_theme_mod( 'education_reform_post_date',$education_reform_default['education_reform_post_date'] ) );

        if( $education_reform_post_date ){

            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $time_string = sprintf($time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $education_reform_year = get_the_date('Y');
            $education_reform_month = get_the_date('m');
            $education_reform_day = get_the_date('d');
            $education_reform_link = get_day_link($education_reform_year, $education_reform_month, $education_reform_day);

            $posted_on = '<a href="' . esc_url($education_reform_link) . '" rel="bookmark">' . $time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $animation_class ).'">';

            if( $icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                education_reform_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('education_reform_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function education_reform_posted_by( $icon = true, $animation_class = '' ){   

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_post_author = absint( get_theme_mod( 'education_reform_post_author',$education_reform_default['education_reform_post_author'] ) );

        if( $education_reform_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $animation_class ).'">';

            if( $icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                education_reform_the_theme_svg('user');
                echo '</span>';
                
            }

            $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('education_reform_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function education_reform_posted_by_avatar( $date = false ){

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_post_author = absint( get_theme_mod( 'education_reform_post_author',$education_reform_default['education_reform_post_author'] ) );

        if( $education_reform_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $byline . '</div>';

            if( $date ){
                education_reform_posted_on($icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('education_reform_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function education_reform_entry_footer( $cats = true, $tags = true, $edits = true){   

        $education_reform_default = education_reform_get_default_theme_options();
        $education_reform_post_category = absint( get_theme_mod( 'education_reform_post_category',$education_reform_default['education_reform_post_category'] ) );
        $education_reform_post_tags = absint( get_theme_mod( 'education_reform_post_tags',$education_reform_default['education_reform_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $cats && $education_reform_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $categories = get_the_category();
                if ($categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $categories as $category ){

                        $cat_name = $category->name;
                        $cat_slug = $category->slug;
                        $cat_url = get_category_link( $category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $cat_slug ); ?>" href="<?php echo esc_url( $cat_url ); ?>" rel="category tag"><?php echo esc_html( $cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $tags && $education_reform_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'education-reform'));
                if( $tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'education-reform'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('education_reform_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function education_reform_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $education_reform_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $education_reform_featured_image = isset($education_reform_featured_image[0]) ? $education_reform_featured_image[0] : '';
                if ($education_reform_featured_image != '' ) {
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else { ?>
                    <div class="post-thumbnail data-bg data-bg-big"></div>
                <?php }
                ?>
            </a>

        <?php

        endif; // End is_singular().

    }

endif;

if( !function_exists('education_reform_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $comment Comment data.
     *
     * @return bool
     */
    function education_reform_is_comment_by_post_author($comment = null){

        if (is_object($comment) && $comment->user_id > 0) {
            $user = get_userdata($comment->user_id);
            $post = get_post($comment->comment_post_ID);
            if (!empty($user) && !empty($post)) {
                return $comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('education_reform_breadcrumb') ) :

    /**
     * Education Reform Breadcrumb
     */
    function education_reform_breadcrumb($comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;
