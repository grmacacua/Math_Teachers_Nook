<?php
/**
 *
 * Pagination Functions
 *
 * @package Education Reform
 */

if( !function_exists('education_reform_archive_pagination_x') ):

	// Archive Page Navigation
	function education_reform_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('education_reform_archive_pagination','education_reform_archive_pagination_x',20);