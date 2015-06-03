<?php
/**
 * Popups 
 *
 * @package   Popups Plus
 * @author    #
 * @license   GPL-2.0+
 * @link     #
 * @copyright 2014 Tayyab
 *
 * @PopupsPlus
 * Plugin Name:       Popups Plus
 * Plugin URI:        #
 * Version: 		  1.0
 * Description: 	  This plugin will display a popup or splash screen when a new user visit your site showing a Google+, twitter and facebook follow links. This will increase you followers ratio in a 40%. Popup will be close depending on your settings. Check readme.txt for full details.
 * Author: 			  Tayyab
 * Author URI:        #
 * Text Domain:       ppl
 * License:           GPL-2.0+
 * License URI:       #
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

define( 'ppl_VERSION' , '1.0' );
define( 'ppl_PLUGIN_DIR' , plugin_dir_path(__FILE__) );
define( 'ppl_PLUGIN_URL' , plugin_dir_url(__FILE__) );
define( 'ppl_PLUGIN_HOOK' , basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/class-ppl-upgrader.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-social-popup.php' );
// Include Helper class
require_once( ppl_PLUGIN_DIR . 'includes/class-ppl-helper.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'PopupsPlus', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'PopupsPlus', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace PopupsPlus with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action( 'plugins_loaded', array( 'PopupsPlus', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/


if ( is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-social-popup-admin.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/class-ppl-notices.php' );

	$ppl_notices = new PopupsPlus_Notices();

	add_action( 'plugins_loaded', array( 'PopupsPlus_Admin', 'get_instance' ) );

	if( get_option('ppl_plugin_updated') && !get_option('ppl_rate_plugin') )
		add_action( 'admin_notices', array( $ppl_notices, 'rate_plugin') );

}