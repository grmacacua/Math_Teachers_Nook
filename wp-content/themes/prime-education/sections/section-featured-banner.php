<?php
/**
 * Banner Section
 * 
 * @package prime_education
 */
$prime_education_slider = get_theme_mod( 'prime_education_slider_setting',false );
$prime_education_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('prime_education_blog_slide_category'),
  'posts_per_page' => 3,
); ?>

<?php if ( $prime_education_slider ){?>
  <div class="banner">
    <div class="owl-carousel">
      <?php $prime_education_arr_posts = new WP_Query( $prime_education_args );
      if ( $prime_education_arr_posts->have_posts() ) :
        while ( $prime_education_arr_posts->have_posts() ) :
          $prime_education_arr_posts->the_post();
          ?>
          <div class="banner_inner_box">
            <?php
              if ( has_post_thumbnail() ) :
                the_post_thumbnail();
              else:
                ?>
                <div class="banner_inner_box">
                  <img src="<?php echo get_stylesheet_directory_uri() . '/images/banner.jpg'; ?>">
                </div>
                <?php
              endif;
            ?>
            <div class="banner_box">
              <h3 class="my-3"><?php the_title(); ?></a></h3>
              <p class="mb-0"><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
              <p class="btn-green mt-4">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Contact Us Now','prime-education'); ?></a>
              </p>
            </div>
          </div>
        <?php
      endwhile;
      wp_reset_postdata();
      endif; ?>
    </div>
  </div>
<?php } ?>