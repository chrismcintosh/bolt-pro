<?php

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'bolt_pro_enqueue_scripts_styles' );
function bolt_pro_enqueue_scripts_styles() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'foundation-scripts', 'https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'foundation-init', get_stylesheet_directory_uri() . '/assets/js/foundation-init.js', array( 'jquery' ), true );

}
