<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Foundation' );
define( 'CHILD_THEME_URL', 'http://www.sbydigital.com/' );
define( 'CHILD_THEME_VERSION', '0.0.1' );

include get_stylesheet_directory() . '/lib/enqueue-scripts.php';
// include get_stylesheet_directory() . '/lib/header-navigation.php';
// include get_stylesheet_directory() . '/lib/off-canvas-wrapper.php';
include get_stylesheet_directory() . '/lib/theme-support.php';
// include get_stylesheet_directory() . '/lib/inline-title-logo.php';

include get_stylesheet_directory() . '/lib/foundation/foundation-functions.php';
include get_stylesheet_directory() . '/lib/foundation/foundation-walker.php';

//* Project Specific Includes
	// include get_stylesheet_directory() . '/lib/off-canvas-example.php';

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'site-inner',
	'footer-widgets',
	'footer'
) );


//* Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action('foundation_site_title', 'genesis_seo_site_title' );
//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
