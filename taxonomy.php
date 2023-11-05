<?php
global $wp_query;

switch ( $wp_query->posts[0]->post_type ) {
	case 'post':
		get_template_part( 'templates/archives/post' );

	case 'product':
		get_template_part( 'templates/archives/product' );
}


?>