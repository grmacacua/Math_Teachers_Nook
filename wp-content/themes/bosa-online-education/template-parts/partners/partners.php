<?php
$blogpartneroneID = get_theme_mod( 'blog_partner_one','' );
$blogpartnertwoID = get_theme_mod( 'blog_partner_two','' );       
$blogpartnerthreeID = get_theme_mod( 'blog_partner_three','' );
$blogpartnerfourID = get_theme_mod( 'blog_partner_four','' );
$blogpartnerfiveID = get_theme_mod( 'blog_partner_five','' );
$blogpartnersixID = get_theme_mod( 'blog_partner_six','' );

$partner_array = array();
$has_partner = false;
if( !empty( $blogpartneroneID ) ){
	$blog_partner_one  = wp_get_attachment_image_src( $blogpartneroneID,'bosa-420-300');
 	if ( is_array(  $blog_partner_one ) ){
 		$has_partner = true;
   	 	$blog_partner_one = $blog_partner_one[0];
   	 	$partner_array['image_one'] = array(
			'ID' => $blog_partner_one,
		);	
  	}
}
if( !empty( $blogpartnertwoID ) ){
	$blog_partner_two = wp_get_attachment_image_src( $blogpartnertwoID,'bosa-420-300');
	if ( is_array(  $blog_partner_two ) ){
		$has_partner = true;	
        $blog_partner_two = $blog_partner_two[0];
        $partner_array['image_two'] = array(
			'ID' => $blog_partner_two,
		);	
  	}
}
if( !empty( $blogpartnerthreeID ) ){	
	$blog_partner_three = wp_get_attachment_image_src( $blogpartnerthreeID,'bosa-420-300');
	if ( is_array(  $blog_partner_three ) ){
		$has_partner = true;
      	$blog_partner_three = $blog_partner_three[0];
      	$partner_array['image_three'] = array(
			'ID' => $blog_partner_three,
		);	
  	}
}
if( !empty( $blogpartnerfourID ) ){	
	$blog_partner_four = wp_get_attachment_image_src( $blogpartnerfourID,'bosa-420-300');
	if ( is_array(  $blog_partner_four ) ){
		$has_partner = true;
      	$blog_partner_four = $blog_partner_four[0];
      	$partner_array['image_four'] = array(
			'ID' => $blog_partner_four,
		);	
  	}
}
if( !empty( $blogpartnerfiveID ) ){	
	$blog_partner_five = wp_get_attachment_image_src( $blogpartnerfiveID,'bosa-420-300');
	if ( is_array(  $blog_partner_five ) ){
		$has_partner = true;
      	$blog_partner_five = $blog_partner_five[0];
      	$partner_array['image_five'] = array(
			'ID' => $blog_partner_five,
		);	
  	}
}
if( !empty( $blogpartnersixID ) ){	
	$blog_partner_six = wp_get_attachment_image_src( $blogpartnersixID,'bosa-420-300');
	if ( is_array(  $blog_partner_six ) ){
		$has_partner = true;
      	$blog_partner_six = $blog_partner_six[0];
      	$partner_array['image_six'] = array(
			'ID' => $blog_partner_six,
		);	
  	}
}

if( !get_theme_mod( 'disable_partners_section', true ) && $has_partner ){ ?>
	<section class="section-partner-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $partner_array as $each_partner ){ ?>
					<div class="col-sm-4 col-md-3 col-lg-2 col-6">
						<article class="partner-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_partner['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>