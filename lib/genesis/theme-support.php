<?php

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

//* Set full-width content as the default layout
genesis_set_default_layout( 'full-width-content' );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'site-inner',
	'footer-widgets',
	'footer'
) );
