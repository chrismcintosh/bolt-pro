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

	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'genesis-sample' ),
		'subMenu'  => __( 'Menu', 'genesis-sample' ),
	);
	wp_localize_script( 'genesis-sample-responsive-menu', 'genesisSampleL10n', $output );

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



//* Filter The Menu
function be_primary_menu_args( $args ) {
  if( 'primary' == $args['theme_location'] ) {
    // $args['depth'] = 1;
  }

  return $args;
}
add_filter( 'wp_nav_menu_args', 'be_primary_menu_args' );


//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav' );



//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );



add_filter( 'genesis_attr_site-header', 'sby_header_add_css' );
function sby_header_add_css( $attributes ) {

 // add original plus extra CSS classes
 $attributes['class'] .= ' top-bar';

 // return the attributes
 return $attributes;

}

add_filter( 'genesis_attr_site-title', 'sby_title_add_css' );
function sby_title_add_css( $attributes ) {

 // add original plus extra CSS classes
 $attributes['class'] .= ' top-bar-left';

 // return the attributes
 return $attributes;

}

add_filter( 'genesis_attr_header-widget-area', 'sby_header_widget_area' );
function sby_header_widget_area( $attributes ) {

 // add original plus extra CSS classes
 $attributes['class'] .= ' top-bar-right';

 // return the attributes
 return $attributes;

}
