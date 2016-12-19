<?php

// Add support for custom header
// https://codex.wordpress.org/Custom_Headers
add_theme_support( 'custom-header', array(
	'width'            => 400,
	'height'           => 150,
	'flex-height'      => true,
	'flex-width'       => true,
	'header-text'      => false,
) );

// Remove custom Genesis custom header style
remove_action( 'wp_head', 'genesis_custom_header_style' );

/**********************************
 *
 * Replace Header Site Title with Inline Logo
 *
 * @author AlphaBlossom / Tony Eppright, Neil Gee
 * @link http://www.alphablossom.com/a-better-wordpress-genesis-responsive-logo-header/
 * @link https://wpbeaches.com/adding-in-a-responsive-html-logoimage-header-via-the-customizer-for-genesis/
 *
 * @edited by Sridhar Katakam
 * @link https://sridharkatakam.com/
 *
************************************/
add_filter( 'genesis_seo_title', 'custom_header_inline_logo', 10, 3 );
function custom_header_inline_logo( $title, $inside, $wrap ) {

	if ( get_header_image() ) {
		$logo = '<img  src="' . get_header_image() . '" width="' . esc_attr( get_custom_header()->width ) . '" height="' . esc_attr( get_custom_header()->height ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage">';
	} else {
		$logo = get_bloginfo( 'name' );
	}

	$inside = sprintf( '<a href="%s">%s<span class="screen-reader-text">%s</span></a>', trailingslashit( home_url() ), $logo, get_bloginfo( 'name' ) );

	// Determine which wrapping tags to use
	$wrap = genesis_is_root_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? $wrap : $wrap;

	// A little fallback, in case an SEO plugin is active
	$wrap = genesis_is_root_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;

	// And finally, $wrap in h1 if HTML5 & semantic headings enabled
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );

}

add_filter( 'genesis_attr_site-description', 'abte_add_site_description_class' );
/**
 * Add class for screen readers to site description.
 *
 * Unhook this if you'd like to show the site description.
 *
 * @since 1.0.0
 *
 * @param array $attributes Existing HTML attributes for site description element.
 * @return string Amended HTML attributes for site description element.
 */
function abte_add_site_description_class( $attributes ) {
	$attributes['class'] .= ' screen-reader-text';

	return $attributes;
}
