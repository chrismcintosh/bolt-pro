<?php

//* Move Pagination
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
	add_action('genesis_after_content_sidebar_wrap', 'genesis_posts_nav');
