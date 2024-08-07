<?php
/**
 * Banner Section
 * 
 * slug: spoken-english-classes/banner
 * title: Banner
 * categories: spoken-english-classes
 */

return array(
    'title'      =>__( 'Banner', 'spoken-english-classes' ),
    'categories' => array( 'spoken-english-classes' ),
    'content'    => '<!-- wp:group {"tagName":"main","className":"slider-main-box wp-block-group alignfull","layout":{"type":"constrained","contentSize":"100%"}} -->
<main class="wp-block-group slider-main-box alignfull"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()) .'/assets/images/main-image.png","id":15,"dimRatio":0,"customOverlayColor":"#ff8cb2","isUserOverlayColor":true,"minHeight":800,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-cover is-light" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:800px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#ff8cb2"></span><img class="wp-block-cover__image-background wp-image-15" alt="" src="'.esc_url(get_template_directory_uri()) .'/assets/images/main-image.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontSize":"40px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":"banner-title","fontFamily":"poppins"} -->
<h2 class="wp-block-heading banner-title has-background-color has-text-color has-link-color has-poppins-font-family" style="font-size:40px;font-style:normal;font-weight:600">'. esc_html('Explore Engaging Online','spoken-english-classes') .'</h2>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"fontSize":"40px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"background","className":"banner-title2","fontFamily":"poppins"} -->
<h2 class="wp-block-heading banner-title2 has-background-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0;margin-bottom:0;font-size:40px;font-style:normal;font-weight:600">'. esc_html('English Speaking Classes','spoken-english-classes') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"lineHeight":"2"},"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"background","fontSize":"upper-heading","fontFamily":"poppins"} -->
<p class="has-background-color has-text-color has-link-color has-poppins-font-family has-upper-heading-font-size" style="margin-bottom:var(--wp--preset--spacing--60);line-height:2">'. esc_html('Offering dynamic online English speaking classes with expert tutors, Flexible scheduling, personalized instruction, and interactive learning.','spoken-english-classes') .'</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"SEARCH","style":{"border":{"radius":"8px"}},"backgroundColor":"accent","className":"slider-search","fontFamily":"poppins"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":15,"sizeSlug":"full","linkDestination":"none","align":"center","className":"slider-image"} -->
<figure class="wp-block-image aligncenter size-full slider-image"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/slider-image.png" alt="" class="wp-image-15"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></main>
<!-- /wp:group -->',
);