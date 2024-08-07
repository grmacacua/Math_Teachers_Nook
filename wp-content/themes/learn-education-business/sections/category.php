<?php

add_action( 'bizberg_before_homepage_blog', 'learn_education_business_category' );
function learn_education_business_category(){ 

	$category = bizberg_get_theme_mod( 'category_status' );

	if( empty( $category ) ){
		return;
	}

	$page_id    = bizberg_get_theme_mod( 'category_title_page' );
	$page_obj   = get_post( $page_id );
	$categories = bizberg_get_theme_mod( 'learn_education_business_catogory_section' );
	$categories = json_decode( $categories, true ); ?>

	<div class="category1">
		
		<div class="container">

			<div class="cat_wrap">

				<div class="left">

					<h2><?php echo esc_html( $page_obj->post_title ); ?></h2>
					<p><?php echo esc_html( wp_trim_words( sanitize_text_field( $page_obj->post_content ), 20, ' [...]' ) ); ?></p>
					<a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>"><?php esc_html_e( 'Explore Categories' , 'learn-education-business' ); ?></a>

				</div>

				<div class="right">
					
					<div class="content">

						<?php 

						if( !empty( $categories ) ){

							foreach( $categories as $cat ){

								$icon    = !empty( $cat['icon'] ) ? $cat['icon'] : '';
								$page_id = !empty( $cat['page_id'] ) ? $cat['page_id'] : '';

								$page_obj = get_post( $page_id ); ?>

								<a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>">							
									<span>
										<i class="<?php echo esc_attr( $icon ); ?>"></i>
									</span>
									<h4>
										<?php echo esc_html( $page_obj->post_title ); ?>
									</h4>
								</a>
							
								<?php 

							}

						} ?>

					</div>

				</div>

			</div>

		</div>

	</div>

	<?php
}