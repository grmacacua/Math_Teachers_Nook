<?php 
/**
Template Name: Default homepage
*/
?>
<?php 
	get_header();
	get_template_part('sections/home','slider');
	get_template_part('sections/home','features');
	get_template_part('sections/home','team');
	get_template_part('sections/home','content');
	get_footer();
?>