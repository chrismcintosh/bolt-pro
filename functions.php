<?php
/**
 * Bolt Pro.
 *
 * This file adds functions to the Bolt Pro Theme.
 *
 * @package Bolt Pro
 * @author  Chris Mcintosh
 * @license GPL-2.0+
 * @link    http://www.mcintosh.io
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Bolt Pro' );
define( 'CHILD_THEME_URL', 'http://www.mcintosh.io' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Include Default Plugins Scripts and Styles
	include get_stylesheet_directory() . '/lib/enqueue-scripts.php';
	include get_stylesheet_directory() . '/lib/suggested-plugins.php';

//* Include Genesis Specific Modifications
	include get_stylesheet_directory() . '/lib/genesis/theme-support.php';
	include get_stylesheet_directory() . '/lib/genesis/inline-title-logo.php';
	include get_stylesheet_directory() . '/lib/genesis/breadcrumbs.php';
	include get_stylesheet_directory() . '/lib/genesis/blog-featured-image.php';
	include get_stylesheet_directory() . '/lib/genesis/move-pagination.php';

//* Include Foundation Specific Modifcations
	include get_stylesheet_directory() . '/lib/foundation/foundation-menu/index.php';
	include get_stylesheet_directory() . '/lib/foundation/off-canvas-wrapper.php';
	// include get_stylesheet_directory() . '/lib/foundation/off-canvas-example.php';
