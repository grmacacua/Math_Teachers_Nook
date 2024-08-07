<?php if ( true == get_theme_mod( 'education_skill_development_team_on_off', 'off' ) ) : ?>

<?php 

$education_skill_development_team_count = get_theme_mod('education_skill_development_team_count'); 

$education_skill_development_team_main_heading = get_theme_mod('education_skill_development_team_main_heading');

?>

<section id="home_team" class="py-5">
  <div class="container">

    <?php if ( ! empty( $education_skill_development_team_main_heading ) ): ?>
      <h3 class="text-center mb-4"><?php echo esc_html( $education_skill_development_team_main_heading ); ?>
      </h3>
    <?php endif; ?>
    
    <div class="row">
      <?php for ($i=1; $i <= $education_skill_development_team_count; $i++) {
        
        $education_skill_development_team_image = get_theme_mod('education_skill_development_team_image'.$i);
        $education_skill_development_team_heading = get_theme_mod('education_skill_development_team_heading'.$i);        
        $education_skill_development_team_designation = get_theme_mod('education_skill_development_team_designation'.$i);
        ?>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="box mb-4">
            <?php if ( ! empty( $education_skill_development_team_image ) ) : ?>
              <img src="<?php echo esc_url( $education_skill_development_team_image ); ?>">
            <?php endif; ?>
            <div class="box-content">
              <?php if ( ! empty( $education_skill_development_team_heading ) ): ?>
                <h4 class="title"><?php echo esc_html( $education_skill_development_team_heading ); ?></h4>
              <?php endif; ?>
              <?php if ( ! empty( $education_skill_development_team_designation ) ): ?>
                <span class="post"><?php echo esc_html( $education_skill_development_team_designation ); ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php endif; ?>