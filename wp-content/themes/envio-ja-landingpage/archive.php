<?php
	get_header();

	$post_type = get_post_type(get_the_ID());

	// get_template_part( "partials/inc","breadcrumbs");

	if ($post_type) {
		get_template_part('archives/' . $post_type . "/index");
	} else {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: " . get_bloginfo('url'));
		exit();
	}

	get_footer();
?>