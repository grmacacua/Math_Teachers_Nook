<?php
/**
 * Widget Social Links
 *
 * @package prime_education
 */

// register Prime_Education_Social_Links widget 
function prime_education_register_social_links_widget() {
    register_widget( 'Prime_Education_Social_Links' );
}
add_action( 'widgets_init', 'prime_education_register_social_links_widget' );

if( ! class_exists( 'Prime_Education_Social_Links' ) ): 
 /**
 * Adds Prime_Education_Social_Links widget.
 */
class Prime_Education_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'prime_education_social_links', // Base ID
			esc_html__( 'TI: Social Links', 'prime-education' ), // Name
			array( 'description' => esc_html__( 'A Social Links Widget', 'prime-education' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $prime_education_title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $prime_education_facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $prime_education_instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $prime_education_twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $prime_education_pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $prime_education_linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $prime_education_youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        $prime_education_tiktok    = ! empty( $instance['tiktok'] ) ? $instance['tiktok'] : '' ;
        
        if( $prime_education_facebook || $prime_education_instagram || $prime_education_twitter || $prime_education_pinterest || $prime_education_linkedin || $prime_education_youtube || $prime_education_tiktok ){ 
        echo $args['before_widget'];
        if($prime_education_title)
        echo $args['before_title'] . apply_filters( 'widget_title', $prime_education_title, $instance, $this->id_base ) . $args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $prime_education_facebook ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_facebook ); ?>" title="<?php esc_attr_e( 'Facebook', 'prime-education' ); ?>" ><i class="fa fa-facebook"></i></a></li>
				<?php } if( $prime_education_instagram ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_instagram ); ?>" title="<?php esc_attr_e( 'Instagram', 'prime-education' ); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } if( $prime_education_twitter ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_twitter ); ?>" title="<?php esc_attr_e( 'Twitter', 'prime-education' ); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php } if( $prime_education_pinterest ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_pinterest ); ?>"  title="<?php esc_attr_e( 'Pinterest', 'prime-education' ); ?>"><i class="fa fa-pinterest-p"></i></a></li>
				<?php } if( $prime_education_linkedin ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_linkedin ); ?>" title="<?php esc_attr_e( 'Linkedin', 'prime-education' ); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php } if( $prime_education_youtube ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_youtube ); ?>" title="<?php esc_attr_e( 'YouTube', 'prime-education' ); ?>"><i class="fa fa-youtube"></i></a></li>
                <?php } if( $prime_education_tiktok ){ ?>
                <li><a href="<?php echo esc_url( $prime_education_tiktok ); ?>" title="<?php esc_attr_e( 'Tiktok', 'prime-education' ); ?>"><i class="fab fa-tiktok"></i></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $prime_education_title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $prime_education_facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $prime_education_instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $prime_education_twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $prime_education_pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $prime_education_linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $prime_education_youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        $prime_education_tiktok    = ! empty( $instance['tiktok'] ) ? $instance['tiktok'] : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_instagram ); ?>" />
		</p>
                
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_youtube ); ?>" />
		</p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>"><?php esc_html_e( 'Tiktok', 'prime-education' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tiktok' ) ); ?>" type="text" value="<?php echo esc_attr( $prime_education_tiktok ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']     = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) :'';
        $instance['facebook']  = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
        $instance['twitter']   = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
        $instance['pinterest'] = ! empty( $new_instance['pinterest'] ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
        $instance['linkedin']  = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
        $instance['youtube']   = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';
        $instance['tiktok']    = ! empty( $new_instance['tiktok'] ) ? esc_url_raw( $new_instance['tiktok'] ) : '';
		
        return $instance;
                
	}

} // class Prime_Education_Social_Links 
endif;