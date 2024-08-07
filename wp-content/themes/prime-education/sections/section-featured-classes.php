<?php 
/**
 * Template part for displaying Featured Classes Section
 *
 * @package Prime Education
 */

$prime_education_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('prime_education_student_category'),
  'posts_per_page' => 6,
); 
$prime_education_classes = get_theme_mod( 'prime_education_classes_setting',false );
$prime_education_section_title = get_theme_mod( 'prime_education_section_title' );

?>
<?php if ( $prime_education_classes ){?>
<div class="our-classes">
    <div class="container">
        <?php if ( $prime_education_section_title ){?>
            <h3 class="mb-5"><?php echo esc_html( $prime_education_section_title );?></h3>
        <?php } ?>
        <div class="row">
            <?php for ($i=1; $i <=6; $i++) {  ?>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4">
                  <div class="category-box <?php echo ('catebox'.$i); ?> m-2 mb-2">
                    <?php if( get_theme_mod( 'prime_education_category_icon'.$i ) != '' ) { ?>
                        <span><i class="<?php echo esc_attr(get_theme_mod('prime_education_category_icon'.$i)); ?>"></i></span>
                    <?php } ?>
                  <?php if( get_theme_mod( 'prime_education_section_category_title'.$i ) != '' ) { ?>
                    <h5 class="mt-2"><a target="_blank" href="<?php echo esc_url( get_theme_mod( 'prime_education_section_category_title_url'.$i,'' ) ); ?>"><?php echo esc_html( get_theme_mod( 'prime_education_section_category_title'.$i,'' ) ); ?></a></h5>
                  <?php } ?>
                  </div>
                </div>
            <?php }?>      
        </div>
    </div>
</div>
<?php } ?>