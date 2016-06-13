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

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'foundation-scripts', 'https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'foundation-init', get_stylesheet_directory_uri() . '/assets/js/foundation-init.js', array( 'jquery' ), true );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support
// add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );


//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'site-inner',
	'footer-widgets',
	'footer'
) );


//* Filter The Menu
function be_primary_menu_args( $args ) {
  if( 'primary' == $args['theme_location'] ) {
    // $args['depth'] = 1;
    $args['items_wrap'] = '<ul id=%1$s class="%2$s menu dropdown" data-dropdown-menu>%3$s</ul>';
  }

  return $args;
}
add_filter( 'wp_nav_menu_args', 'be_primary_menu_args' );


//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav' );



//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );



add_action('genesis_before', 'sby_off_canvas_open');
add_action('genesis_after', 'sby_off_canvas_close');
function sby_off_canvas_open() {
	echo '<div class="off-canvas-wrapper">';
	echo '<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>';
}
function sby_off_canvas_close() {
	echo '</div>';
	echo '</div>';
}


add_action('genesis_after_header', 'sby_off_test');
function sby_off_test() {
	?>
	<button type="button" class="button" data-toggle="offCanvas">Open Menu</button>
	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>

	        <!-- Close button -->
	        <button class="close-button" aria-label="Close menu" type="button" data-close>
	          <span aria-hidden="true">&times;</span>
	        </button>

	        <!-- Menu -->
	        <ul class="vertical menu">
	          <li><a href="#">Foundation</a></li>
	          <li><a href="#">Dot</a></li>
	          <li><a href="#">ZURB</a></li>
	          <li><a href="#">Com</a></li>
	          <li><a href="#">Slash</a></li>
	          <li><a href="#">Sites</a></li>
	        </ul>

	      </div>

	      <div class="off-canvas-content" data-off-canvas-content>
	        <!-- Page content -->
	      </div>
	<?php
}
