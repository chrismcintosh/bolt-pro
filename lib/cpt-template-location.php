<?php


// Modify this so that we can keep the template directory clean
// Selects Custom Post Type Templates for single and archive pages
// ----------------------------------------------------------------------
add_filter('template_include', 'custom_template_include');
function custom_template_include($template) {
	$custom_template_location = '/templates';
     if ( get_post_type () ) {
        if ( is_archive() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php';
        endif;
        if ( is_single() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php';
        endif;
    }
    return $template;
  }
