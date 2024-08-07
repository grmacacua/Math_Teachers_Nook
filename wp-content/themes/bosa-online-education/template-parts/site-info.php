<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Online Education 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-online-education' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-online-education' );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-online-education' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-online-education' ) );
		?>
	</a>
</div><!-- .site-info -->