<?php get_header(); ?>

<?php

	if (is_front_page()) {
		get_template_part('partials/page', 'home' );
	} else{
		get_template_part('partials/'.get_page_template().'');
	}
?>

<?php get_footer(); ?>