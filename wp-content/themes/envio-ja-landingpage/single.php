<?php
	get_header();

	$post_type = get_post_type(get_the_ID());

	// get_template_part("partials/inc","breadcrumbs");

	get_template_part("archives/" . $post_type . "/single");

	get_footer();
?>