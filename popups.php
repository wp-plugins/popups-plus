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
 * Plugin URI:        https://wordpress.org/plugins/popups-plus/
 * Version: 		  1.1
 * Description: 	  This plugin can display different popups like Facebook, Twitter, Google+. Popup will be close depending on your settings.
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

define( 'ppl_VERSION' , '1.1' );
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


function pplfbs() {
{
?>
<!-- : # -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }}
add_action('wp_head', 'pplfbs', 100);

