<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package prime_education
 */
$prime_education_heading_setting  = get_theme_mod( 'prime_education_post_heading_setting' , true );
$prime_education_meta_setting  = get_theme_mod( 'prime_education_post_meta_setting' , true );
$prime_education_image_setting  = get_theme_mod( 'prime_education_post_image_setting' , true );
$prime_education_content_setting  = get_theme_mod( 'prime_education_post_content_setting' , true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		  if ( $prime_education_heading_setting ){ 
			if ( is_single() ) {
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		  }

		if ( 'post' === get_post_type() ) : ?>
		<?php
		if ( $prime_education_meta_setting ){ ?>
			<div class="entry-meta">
				<?php prime_education_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php } ?>
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	 <?php  
		if ( $prime_education_image_setting ){?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
					<a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
					<div class="entry-meta">
						<?php prime_education_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div><!-- .featured-image -->
			<?php endif; ?>
	    <?php } ?>
    <?php
	if ( $prime_education_content_setting ){ ?>
		<div class="entry-content" itemprop="text">
			<?php
			if( is_single()){
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'prime-education' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				}else{
				the_excerpt();
				}
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'prime-education' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
    <?php } ?>
</article><!-- #post-## -->