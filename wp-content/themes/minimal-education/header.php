<?php
/**
 * The header for our theme
 *
 * @subpackage Minimal Education
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'minimal-education' ); ?></a>
	<?php if( get_option('education_insight_theme_loader',true) != 'off'){ ?>
		<?php $education_insight_loader_option = get_theme_mod( 'education_insight_loader_style','style_one');
		if($education_insight_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($education_insight_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div class="top_header wow slideInDown">
			<div class="container">
				<div class="row">
		            <div class="col-lg-7 col-md-9 box-center">
						<div class="my-2">
							<?php if( get_theme_mod('education_insight_call') != ''){ ?>
								<span><i class="<?php echo esc_attr(get_theme_mod('education_insight_call_icon','fas fa-phone')); ?>"></i><?php echo esc_html(get_theme_mod('education_insight_call','')); ?></span>
							<?php }?>
							<?php if( get_theme_mod('education_insight_email') != ''){ ?>
								<span><i class="<?php echo esc_attr(get_theme_mod('education_insight_email_icon','far fa-envelope')); ?>"></i><?php echo esc_html(get_theme_mod('education_insight_email','')); ?></span>
							<?php }?>
							<?php if( get_option('education_insight_topbar_enable',false) != 'off'){ ?>
								<?php if(class_exists('woocommerce')){ ?>
									<span class="account">
										<?php if ( is_user_logged_in() ) { ?>
											<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e('MY ACCOUNT','minimal-education'); ?></a>
										<?php }
										else { ?>
											<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e('LOGIN / REGISTER','minimal-education'); ?></a>
										<?php } ?>
									</span>
				                <?php }?>
			                <?php }?>
			            </div>
		            </div>
		            <div class="col-lg-5 col-md-3 box-center">
		            	<?php if( get_option('header_social_icon_enable',false) != 'off'){ ?>
			            	<?php
								$education_insight_header_facebook_target = esc_attr(get_option('education_insight_header_facebook_target','true'));
								$education_insight_header_twt_target = esc_attr(get_option('education_insight_header_twt_target','true'));
								$education_insight_header_linkedin_target = esc_attr(get_option('education_insight_header_linkedin_target','true'));
								$education_insight_header_pinterest_target = esc_attr(get_option('education_insight_header_pinterest_target','true')); 
		          			?>  			
							<div class="links">
							<?php if( get_theme_mod('education_insight_facebook') != ''){ ?>
					            <a target="<?php echo $education_insight_header_facebook_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('education_insight_facebook','')); ?>">
					              <i class="<?php echo esc_attr(get_theme_mod('education_insight_facebook_icon','fab fa-facebook')); ?>"></i>
					            </a>
					         <?php }?>
							<?php if( get_theme_mod('education_insight_twitter') != ''){ ?>
					            <a target="<?php echo $education_insight_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('education_insight_twitter','')); ?>">
					              <i class="<?php echo esc_attr(get_theme_mod('education_insight_twitter_icon','fab fa-x-twitter')); ?>"></i>
					            </a>
					        <?php }?>
					        <?php if( get_theme_mod('education_insight_linkedin') != ''){ ?>
					            <a target="<?php echo $education_insight_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('education_insight_linkedin','')); ?>">
					              <i class="<?php echo esc_attr(get_theme_mod('education_insight_linkedin_icon','fab fa-linkedin')); ?>"></i>
					            </a>
					        <?php }?>
					        <?php if( get_theme_mod('education_insight_pinterest') != ''){ ?>
					            <a target="<?php echo $education_insight_header_pinterest_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('education_insight_pinterest','')); ?>">
					              <i class="<?php echo esc_attr(get_theme_mod('education_insight_pinterest_icon','fab fa-pinterest-p')); ?>"></i>
					            </a>
					        <?php }?>
							</div>
						<?php }?>
		            </div>
		        </div>
			</div>
		</div>
		<div id="header" class="wow slideInUp">
			<div class="wrap_figure fixed_header">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-5 col-sm-5 box-center">
							<div class="logo">
						        <?php if ( has_custom_logo() ) : ?>
				            		<?php the_custom_logo(); ?>
					            <?php endif; ?>
				              	<?php $blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
											<?php if( get_option('education_insight_logo_title',false) != 'off' ){ ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
																	<?php }?>
						                  	<?php else : ?>
												<?php if( get_option('education_insight_logo_title',false) != 'off' ){ ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
																		<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>

					                <?php
				                  		$description = get_bloginfo( 'description', 'display' );
					                  	if ( $description || is_customize_preview() ) :
					                ?>
					                <?php if( get_option('education_insight_logo_text',true) != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($description); ?>
					                  	</p>
					                <?php }?>
				              	<?php endif; ?>
						    </div>
						</div>
						<div class="col-lg-7 col-md-2 col-sm-2 col-6 box-center">
						   	<div class="theme-menu">
						   		
									<div class="toggle-menu gb_menu text-center">
										<button onclick="education_insight_gb_Menu_open()" class="gb_toggle"><i class="fas fa-ellipsis-h"></i><p><?php esc_html_e('Menu','minimal-education'); ?></p></button>
									</div>
								
								<?php get_template_part('template-parts/navigation/navigation-top'); ?>
						   	</div>
						</div>
						<div class="col-lg-2 col-md-5 col-sm-5 col-6 box-center">
							<div class="admision-btn">
								<?php if( get_theme_mod('education_insight_admission_text') != '' || get_theme_mod('education_insight_admission_link') != ''){ ?>
									<a href="<?php echo esc_url(get_theme_mod('education_insight_admission_link','')); ?>"><?php echo esc_html(get_theme_mod('education_insight_admission_text','')); ?></a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
