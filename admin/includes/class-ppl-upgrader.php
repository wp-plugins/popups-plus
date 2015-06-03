<?php

/*
*  Upgrader Class
*
*  @description: Upgrade rutines and upgrade messages
*  @since 1.3.1
*  @version 1.0
*/

class PopupsPlus_Upgrader {

	public function upgrade_plugin() {
		global $wpdb;
		$current_version = get_option('ppl-version');

		if( !get_option('ppl_plugin_updated') ) {
			// show feedback box if updating plugin
			if ( empty( $current_version ) ) {
				$total = $wpdb->get_var( "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'pplcpt'" );
				if ( $total > 0 ) {
					update_option( 'ppl_plugin_updated', true );
				}
			} elseif ( ! empty( $current_version ) && version_compare( $current_version, PPL_VERSION, '<' ) ) {
				update_option( 'ppl_plugin_updated', true );
			}
		}
	}
}