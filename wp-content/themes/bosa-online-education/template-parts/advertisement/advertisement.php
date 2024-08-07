<?php
$blogAdvertoneID = get_theme_mod( 'blog_advertisement_one','');
$blogAdverttwoID = get_theme_mod( 'blog_advertisement_two','');       
$blogAdvertthreeID = get_theme_mod( 'blog_advertisement_three','');

$Advert_array = array();
$has_Advert = false;
if( !empty( $blogAdvertoneID ) ){
	$blog_advertisement_one  = wp_get_attachment_image_src( $blogAdvertoneID,'bosa-420-300');
 	if ( is_array(  $blog_advertisement_one ) ){
 		$has_Advert = true;
   	 	$blog_advertisements_one = $blog_advertisement_one[0];
   	 	$Advert_array['image_one'] = array(
			'ID' => $blog_advertisements_one,
		);	
  	}
}
if( !empty( $blogAdverttwoID ) ){
	$blog_advertisement_two = wp_get_attachment_image_src( $blogAdverttwoID,'bosa-420-300');
	if ( is_array(  $blog_advertisement_two ) ){
		$has_Advert = true;	
        $blog_advertisements_two = $blog_advertisement_two[0];
        $Advert_array['image_two'] = array(
			'ID' => $blog_advertisements_two,
		);	
  	}
}
if( !empty( $blogAdvertthreeID ) ){	
	$blog_advertisement_three = wp_get_attachment_image_src( $blogAdvertthreeID,'bosa-420-300');
	if ( is_array(  $blog_advertisement_three ) ){
		$has_Advert = true;
      	$blog_advertisements_three = $blog_advertisement_three[0];
      	$Advert_array['image_three'] = array(
			'ID' => $blog_advertisements_three,
		);	
  	}
}

if( !get_theme_mod( 'disable_advertisement_section', true ) && $has_Advert ){ ?>
	<section class="section-advertisement-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $Advert_array as $each_Advert ){ ?>
					<div class="col-md-4">
						<article class="advertisement-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_Advert['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
