<?php if ( true == get_theme_mod( 'education_skill_development_slide_on_off', 'off' ) ) : ?>

<?php $education_skill_development_slide_count = get_theme_mod('education_skill_development_slide_count'); ?>

<section id="home_slider">
	<div class="owl-carousel">
		<?php for ($i=1; $i <= $education_skill_development_slide_count; $i++) {
			
			$education_skill_development_slider_image = get_theme_mod('education_skill_development_slider_image'.$i);
			$education_skill_development_slider_short_heading = get_theme_mod('education_skill_development_slider_short_heading'.$i);
			$education_skill_development_slider_heading = get_theme_mod('education_skill_development_slider_heading'.$i);
			$education_skill_development_slider_heading_link = get_theme_mod('education_skill_development_slider_heading_link'.$i); 
			$education_skill_development_slider_content = get_theme_mod('education_skill_development_slider_content'.$i); 
			$education_skill_development_slider_phone_number_text = get_theme_mod('education_skill_development_slider_phone_number_text');
			$education_skill_development_slider_phone_number = get_theme_mod('education_skill_development_slider_phone_number'); ?>

			<div class="slider_main_box">
				<?php if ( ! empty( $education_skill_development_slider_image ) ) : ?>
					<img src="<?php echo esc_url( $education_skill_development_slider_image ); ?>">
					<div class="slider_content_box">
						<?php if ( ! empty( $education_skill_development_slider_short_heading ) ) : ?>
							<h5><?php echo esc_html( $education_skill_development_slider_short_heading ); ?></h5>
						<?php endif; ?>
						<?php if ( ! empty( $education_skill_development_slider_heading_link ) || ! empty( $education_skill_development_slider_heading ) ): ?>
							<h3><a href="<?php echo esc_url( $education_skill_development_slider_heading_link ); ?>"><?php echo esc_html( $education_skill_development_slider_heading ); ?></a></h3>
							<hr>
						<?php endif; ?>
						<?php if ( ! empty( $education_skill_development_slider_content ) ) : ?>
							<p><?php echo esc_html( $education_skill_development_slider_content ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $education_skill_development_slider_phone_number_text ) || ! empty( $education_skill_development_slider_phone_number ) ): ?>
							<h6><?php echo esc_html( $education_skill_development_slider_phone_number_text ); ?></h6>
							<p class="mb-0 call-number"><i class="fa fa-phone me-3" aria-hidden="true"></i><?php echo esc_html( $education_skill_development_slider_phone_number ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php } ?>
	</div>
</section>

<?php endif; ?>