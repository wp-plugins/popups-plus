<?php

/**
 * Class that handle all admin notices
 *
 * @since      1.0
 * @package    PopupsPlus
 * @subpackage PopupsPlus/Admin/Includes
 * @author     Damian Logghe <info@timersys.com>
 */
class PopupsPlus_Notices {


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.3.1
	 */
	public function __construct( ) {

		if( isset( $_GET['ppl_notice'])){
			update_option('ppl_'.esc_attr($_GET['ppl_notice']), true);
		}
	}


	public function rate_plugin(){
		?><div class="updated notice">
		<h3><i class=" dashicons-before dashicons-share-alt"></i>Popups Plus</h3>
			<p><?php echo sprintf(__( 'We noticed that you have been using our plugin for a while and we would like to ask you a little favour. If you are happy with it and can take a minute please <a href="%s" target="_blank">leave a nice review</a> on WordPress. It will be a tremendous help for us!', 'ppl' ), 'https://wordpress.org/support/view/plugin-reviews/popups?filter=5' ); ?></p>
		<ul>
			<li><?php echo sprintf(__('<a href="%s" target="_blank">Leave a nice review</a>'),'https://wordpress.org/support/view/plugin-reviews/popups?filter=5');?></li>
			<li><?php echo sprintf(__('<a href="%s">No, thanks</a>'), '?ppl_notice=rate_plugin');?></li>
		</ul>
		</div><?php
	}
}