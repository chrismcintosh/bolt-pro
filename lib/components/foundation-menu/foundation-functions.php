<?php
add_action('genesis_before', 'ssm_open_offnav_markup', 10);
/**
 * Add Foundation offcanvas opening markup
 */
function ssm_open_offnav_markup() {
  $offnavopen = '<div class="off-canvas-wrapper">';
  $offnavopen .= '<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>';
  echo $offnavopen;
}
add_action('genesis_after', 'ssm_close_offnav_markup', 5);
/**
 * Add Foundation offcanvas closing markup
 */
function ssm_close_offnav_markup() {
  $offnavclose = '</div><!-- end .off-canvas-wrapper-inner -->';
  $offnavclose .= '</div><!-- end off-canvas-wrapper -->';
  echo $offnavclose;
}
/**
 * Rebuild Navigation Menus
 */
// Remove Genesis Nav Support
remove_theme_support( 'genesis-menus' );
/*********************
ADD FOUNDATION FEATURES TO WORDPRESS
*********************/
add_action('genesis_after_header', 'ssm_do_primary_navigation');
function ssm_do_primary_navigation() { ?>



     <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
       <button class="menu-icon float-right" type="button" data-toggle></button>
       <div class="title-bar-title"><?php do_action('foundation_site_title'); ?></div>
     </div>

     <div class="top-bar" id="example-menu">
       <div class="top-bar-left hide-for-small-only">
         <ul class="dropdown menu" data-dropdown-menu>
           <li class="menu-text"><?php do_action('foundation_site_title'); ?></li>
         </ul>
       </div>
       <div class="top-bar-right">
            <ul class="menu">
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
                     'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                     'walker'  => new Foundation_Walker()
                ));
                ?>
           </ul>
       </div>
     </div>







<?php }
