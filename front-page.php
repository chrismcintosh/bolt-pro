<?php
/**
 * Front page for the Utility Pro theme
 *
 * @package Utility_Pro
 * @author  Carrie Dils
 * @license GPL-2.0+
 */

add_action( 'genesis_meta', 'foundation_homepage_setup' );
function foundation_homepage_setup() {

	// Full width layout.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove standard loop and replace with loop showing Posts, not Page content.
	remove_action( 'genesis_loop', 'genesis_do_loop' );

}




genesis();
