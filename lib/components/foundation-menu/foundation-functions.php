<?php


//* Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
//* Add site title to foundation header and nav
add_action('foundation_site_title', 'genesis_seo_site_title' );
//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


/**
 * Rebuild Navigation Menus
 */
// Remove Genesis Nav Support
remove_theme_support( 'genesis-menus' );
/*********************
ADD FOUNDATION FEATURES TO WORDPRESS
*********************/
add_action('genesis_header', 'ssm_do_primary_navigation');
function ssm_do_primary_navigation() { ?>

     <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
          <div class="title-bar-title"><?php do_action('foundation_site_title'); ?></div>
          <button type="button" class="menu-toggle" data-toggle>MENU <i class="menu-icon"></i></button>
     </div>

     <div class="top-bar" id="example-menu">
          <div class="wrap">
               <div class="top-bar-left">
                    <ul class="menu">
                         <li class="menu-text"><?php do_action('foundation_site_title'); ?></li>
                    </ul>
               </div>
               <div class="top-bar-right">
                    <?php
                    wp_nav_menu(array(
                         'container'	=> false,
                         'menu' => 'Primary Navigation',
                         'menu_class'	=> 'dropdown menu',
                         'theme_location' => 'primary-navigation',
                         'before' => '',
                         'after' => '',
                         'link_before' => '',
                         'link_after' => '',
                         'items_wrap' => '<ul id="%1$s" class="%2$s menu" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>',
                         'walker'  => new Foundation_Walker()
                    ));
                    ?>
               </div>
          </div>
     </div>


<?php }
