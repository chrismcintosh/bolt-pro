<?php


//* Remove Default Genesiss Header
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'foundation_custom_header' );
//* Write in a custom header to more closely mirror foundation and to remove stuff like header-widget-area
function foundation_custom_header() {
?>
<div class="title-bar hide-for-medium" data-responsive-toggle="primary-navigation" data-hide-for="medium">
  <div class="title-bar-left">
       <div class="title-bar-title"><?php do_action( 'custom_site_title_hook' ); ?></div>
  </div>
  <div class="title-bar-right">
       <button class="menu-icon" type="button" data-toggle></button>
  </div>
</div>

<div class="top-bar" id="primary-navigation">
  <div class="top-bar-left">
    <ul class="menu" data-toggler data-animate="slide-in-down slide-out-up">
      <li class="menu-text"><?php do_action( 'custom_site_title_hook' ); ?></li>
    </ul>
  </div>
  <div class="top-bar-right">
	  <?php do_action( 'custom_navigation_hook' ); ?>
  </div>
</div>
<?php
}

//* Reposition the primary navigation menu
     remove_action( 'genesis_after_header', 'genesis_do_nav' );
     add_action( 'custom_navigation_hook', 'genesis_do_nav' );

//* Add The Site Title ino the custom header
     add_action('custom_site_title_hook', 'genesis_seo_site_title');


//* Filter The Menu to include foundation classes and data attributes
     function be_primary_menu_args( $args ) {
       if( 'primary' == $args['theme_location'] ) {
         // $args['depth'] = 1;
         $args['items_wrap'] = '<ul id="primary-menu" class="%2$s menu dropdown" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>';
       }
       return $args;
     }
     add_filter( 'wp_nav_menu_args', 'be_primary_menu_args' );



//* Remove the p tag around the site title
     add_filter( 'genesis_seo_title', 'child_header_title', 10, 3 );
     function child_header_title( $title, $inside, $wrap ) {
         $inside = sprintf( '%s', esc_attr( get_bloginfo( 'name' ) ), get_bloginfo( 'name' ) );
         return sprintf( '<span itemprop="headline">%2$s</span>', $wrap, $inside );
     }
