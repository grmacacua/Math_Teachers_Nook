<?php

add_action( 'bizberg_before_homepage_blog', 'learn_education_business_services' );
function learn_education_business_services(){ 
	
	$status = bizberg_get_theme_mod( 'services_status' );

	if( empty( $status ) ){
		return;
	} 

	$page_id    = bizberg_get_theme_mod( 'services_title_page' );
	$page_obj   = get_post( $page_id );
	$services   = bizberg_get_theme_mod( 'learn_education_business_services' );
	$services   = json_decode( $services, true ); ?>

	<div class="services">
		
		<div class="container">
			
			<div class="serives_wrap">
				
				<div class="title_wrap">
					
					<h2><?php echo esc_html( $page_obj->post_title ); ?></h2>
					<p><?php echo esc_html( wp_trim_words( sanitize_text_field( $page_obj->post_content ), 20, ' [...]' ) ); ?></p>
					<a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>"><?php esc_html_e( 'All Services' , 'learn-education-business' ); ?></a>

				</div>

				<div class="content">

					<?php 

					if( !empty( $services ) ){ 

						foreach( $services as $value ){ 

							$page_id = !empty( $value['page_id'] ) ? $value['page_id'] : '';

							$page_obj = get_post( $page_id );

							$url = wp_get_attachment_url( get_post_thumbnail_id( $page_id ) ); ?>

							<a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>">
								
								<img src="<?php echo esc_url( $url ); ?>">

								<p><?php echo esc_html( $page_obj->post_title ); ?></p>

							</a>

							<?php 

						}

					} ?>
					
				</div>

			</div>

		</div>

	</div>

	<?php
}