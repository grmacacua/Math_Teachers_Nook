<?php if ( true == get_theme_mod( 'education_skill_development_features_on_off', 'off' ) ) : ?>

<?php $education_skill_development_features_count = get_theme_mod('education_skill_development_features_count'); ?>

<section id="home_features">
	<div class="row m-0">
		<?php for ($i=1; $i <= $education_skill_development_features_count; $i++) {
			$education_skill_development_features_icon = get_theme_mod('education_skill_development_features_icon'.$i);
			$education_skill_development_features_heading = get_theme_mod('education_skill_development_features_heading'.$i); ?>
			
			<div class="col-lg-2 col-md-4 features_main_box">
				<?php if ( ! empty( $education_skill_development_features_icon ) ) : ?>
					<i class="<?php echo esc_attr( $education_skill_development_features_icon ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
				<?php if ( ! empty( $education_skill_development_features_heading ) ): ?>
					<h3><?php echo esc_html( $education_skill_development_features_heading ); ?></h3>
				<?php endif; ?>
			</div>
		<?php } ?>
	</div>
</section>

<?php endif; ?>