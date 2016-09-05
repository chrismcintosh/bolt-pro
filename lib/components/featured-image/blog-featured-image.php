<?php

add_action('genesis_entry_content', 'bolt_pro_foundation_featured_image', 1);
function bolt_pro_foundation_featured_image() {

	/**
	 * Add featured image above single posts.
	 *
	 * Outputs image as part of the post content, so it's included in the RSS feed.
	 * H/t to Robin Cornett for the suggestion of making image available to RSS.
	 */

	$image = '<div class="featured-image">';
	$image .= get_the_post_thumbnail( get_the_ID(), 'full' );
	$image .= '</div>';

	echo $image;
}
