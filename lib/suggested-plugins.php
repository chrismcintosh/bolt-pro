<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bolt_pro_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function bolt_pro_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Include WP Accessibility.
		array(
			'name'     				=> 'WP Accessibility', // The plugin name.
			'slug'     				=> 'wp-accessibility', // The plugin slug (typically the folder name).
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
		),

          // Include Ninja Forms
          array(
               'name'     				=> 'Ninja Forms', // The plugin name.
               'slug'     				=> 'ninja-forms', // The plugin slug (typically the folder name).
               'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
          ),

          // Include Yoast SEO
          array(
               'name'     				=> 'Yoast SEO', // The plugin name.
               'slug'     				=> 'wordpress-seo', // The plugin slug (typically the folder name).
               'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
          ),

          // Include Wordpress Spamshield
          array(
               'name'     				=> 'WP Spamshield', // The plugin name.
               'slug'     				=> 'wp-spamshield', // The plugin slug (typically the folder name).
               'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
          ),

          // Include Google Analytics
          array(
               'name'     				=> 'Google Analytics', // The plugin name.
               'slug'     				=> 'google-analytics-for-wordpress', // The plugin slug (typically the folder name).
               'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
          ),

          // Include WP Smush
          array(
               'name'     				=> 'WP Smush', // The plugin name.
               'slug'     				=> 'wp-smushit', // The plugin slug (typically the folder name).
               'required' 				=> false, // If false, the plugin is only 'recommended' instead of required.
          ),

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'           => 'sby-starter',              // Text domain - likely want to be the same as your theme.
		'default_path'     => '',                         // Default absolute path to pre-packaged plugins.
		'parent_menu_slug' => 'themes.php',               // Default parent menu slug.
		'parent_url_slug'  => 'themes.php',               // Default parent URL slug.
		'menu'             => 'install-required-plugins', // Menu slug.
		'has_notices'      => true,                       // Show admin notices or not.
		'dismissable'      => true,                       // If false, a user cannot dismiss the nag message.
		'dismiss_msg'      => '',                         // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'     => false,                      // Automatically activate plugins after installation or not.
		'message'          => '',                         // Message to output right before the plugins table.
		'strings'          => array(
			'page_title'                      => __( 'Install Required Plugins', 'sby-starter' ),
			'menu_title'                      => __( 'Install Plugins', 'sby-starter' ),
			'installing'                      => _x( 'Installing Plugin: %s', '%1$s = plugin name', 'sby-starter' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'sby-starter' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'sby-starter' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'sby-starter' ),
			'complete'                        => _x( 'All plugins installed and activated successfully. %s', '%1$s = dashboard link', 'sby-starter' ),
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}
