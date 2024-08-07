<!-- Start: Header
============================= -->
<?php

$education_skill_development_top_twitter_link = get_theme_mod('education_skill_development_top_twitter_link');
$education_skill_development_top_linkdin_link = get_theme_mod('education_skill_development_top_linkdin_link');
$education_skill_development_top_youtube_link = get_theme_mod('education_skill_development_top_youtube_link');
$education_skill_development_top_facebook_link = get_theme_mod('education_skill_development_top_facebook_link');
$education_skill_development_top_instagram_link = get_theme_mod('education_skill_development_top_instagram_link');

$education_skill_development_header_register_link = get_theme_mod('education_skill_development_header_register_link');
$education_skill_development_header_register_text = get_theme_mod('education_skill_development_header_register_text');

$education_skill_development_header_login_link = get_theme_mod('education_skill_development_header_login_link');
$education_skill_development_header_login_text = get_theme_mod('education_skill_development_header_login_text');

$education_skill_development_header_cart_link = get_theme_mod('education_skill_development_header_cart_link');
$education_skill_development_header_user_link = get_theme_mod('education_skill_development_header_user_link');

$education_skill_development_header_phone_number = get_theme_mod('education_skill_development_header_phone_number');
$education_skill_development_header_email_address = get_theme_mod('education_skill_development_header_email_address');

?>

<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 align-self-center text-center text-md-end">
				<?php if ( ! empty( $education_skill_development_header_phone_number ) ): ?>
					<span class="me-4"><i class="fa fa-phone me-3" aria-hidden="true"></i><?php echo esc_html( $education_skill_development_header_phone_number ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $education_skill_development_header_email_address ) ): ?>
					<span><i class="fa fa-envelope me-3" aria-hidden="true"></i><?php echo esc_html( $education_skill_development_header_email_address ); ?></span>
				<?php endif; ?>
			</div>
			<div class="col-lg-2 col-md-2 align-self-center text-center text-md-end">
				<div class="icons-media">
					<?php if ( ! empty( $education_skill_development_top_twitter_link ) ): ?>
						<a href="<?php echo esc_url( $education_skill_development_top_twitter_link ); ?>"><i class="fa fa-twitter me-2" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $education_skill_development_top_linkdin_link ) ): ?>
						<a href="<?php echo esc_url( $education_skill_development_top_linkdin_link ); ?>"><i class="fa fa-linkedin me-2" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $education_skill_development_top_youtube_link ) ): ?>
						<a href="<?php echo esc_url( $education_skill_development_top_youtube_link ); ?>"><i class="fa fa-youtube-play me-2" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $education_skill_development_top_facebook_link ) ): ?>
						<a href="<?php echo esc_url( $education_skill_development_top_facebook_link ); ?>"><i class="fa fa-facebook me-2" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $education_skill_development_top_instagram_link ) ): ?>
						<a href="<?php echo esc_url( $education_skill_development_top_instagram_link ); ?>"><i class="fa fa-instagram me-2" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 align-self-center text-center text-md-end">
				<?php if ( ! empty( $education_skill_development_header_register_link ) || ! empty( $education_skill_development_header_register_text ) ): ?>
					<a class="register_button" href="<?php echo esc_url( $education_skill_development_header_register_link ); ?>">
						<?php echo esc_html( $education_skill_development_header_register_text ); ?>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $education_skill_development_header_login_link ) || ! empty( $education_skill_development_header_login_text ) ): ?>
					<a class="login_button" href="<?php echo esc_url( $education_skill_development_header_login_link ); ?>">
						<?php echo esc_html( $education_skill_development_header_login_text ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<header id="header" role="banner" <?php if ( get_header_image() ) { ?> style="background-image: url( <?php header_image(); ?> ); background-size: 100%;" <?php } ?> >
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-8 align-self-center">
				<div class="logo main">
					<?php if ( function_exists( 'education_skill_development_logo_title_description' ) ) :	education_skill_development_logo_title_description(); endif; ?>
				</div>
			</div>
			<div class="col-lg-7 col-md-6 col-4 align-self-center">
				<div class="toggle-menu gb_menu mb-2 mb-md-0 text-start">
					<button onclick="education_skill_development_navigation_open()" class="gb_toggle"><p class="mb-0"><?php esc_html_e('Menu','education-skill-development'); ?></p></button>
				</div>
				<div id="gb_responsive" class="nav side_gb_nav">
					<nav id="top_gb_menu" class="gb_nav_menu" role="navigation" aria-label="<?php esc_attr_e( 'Menu', 'education-skill-development' ); ?>">
						<?php 
						    wp_nav_menu( array( 
								'theme_location' => 'primary_menu',
								'container_class' => 'gb_navigation clearfix' ,
								'menu_class' => 'clearfix',
								'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav mb-0 px-0">%3$s</ul>',
								'fallback_cb' => 'wp_page_menu',
						    ) ); 
						?>
						<a href="javascript:void(0)" class="closebtn gb_menu" onclick="education_skill_development_navigation_close()">x<span class="screen-reader-text"><?php esc_html_e('Close Menu','education-skill-development'); ?></span></a>
					</nav>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 align-self-center text-center text-md-end">
				<?php if ( ! empty( $education_skill_development_header_cart_link ) ): ?>
					<a class="lower-icons me-4" href="<?php echo esc_url( $education_skill_development_header_cart_link ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $education_skill_development_header_user_link ) ): ?>
					<a class="lower-icons" href="<?php echo esc_url( $education_skill_development_header_user_link ); ?>"><i class="fa fa-user" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>