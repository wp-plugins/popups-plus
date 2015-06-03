<?php 
/**
 * Settings page template
 * @since  1.1
 */
?>
<div class="wrap">
	<h2>Popups Plus <?php echo PopupsPlus::VERSION;
		if( class_exists('PopupsP') ){
			echo ' - Premium v', PopupsP::VERSION;
		}
		?></h2>
	<form name="ppl-settings" method="post">
		<table class="form-table">
			<?php do_action( 'ppl/settings_page/before' ); ?>
			<tr style="display:none;" valign="top" class="">
				<th><label style="display:none;" for="add_link"><?php _e( 'Affiliate link', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input style="display:none;" type="text" id="add_link" name="ppl_settings[aff_link]" value="<?php  echo @$opts['aff_link'];?>" class="regular-text" />
						<p style="display:none;" class="help"><?php echo sprintf(__( 'You can earn money by promoting the plugin! Join <a href="%s">our affiliate program</a> and paste your affiliate link here to earn 35&#37; in commissions . Once entered, it will replace the default "Powered by" on the popups.', $this->plugin_slug ) , 'https://wp.timersys.com/affiliates/'); ?></p>
				</td>
			</tr>
			<tr valign="top" class="">
				<th><label for="ajax_mode"><?php _e( 'Ajax mode?', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="ajax_mode" name="ppl_settings[ajax_mode]" value="1" <?php checked(@$opts['ajax_mode'], 1); ?> />
					<p class="help"><?php _e( 'Load popups using ajax. Compatible with cache plugins, but might not work with all plugins', $this->plugin_slug ); ?></p>
				</td>
			</tr>

			<tr valign="top" class="">
				<th><label for="debug"><?php _e( 'Enable Debug mode?', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="debug" name="ppl_settings[debug]" value="1" <?php checked(@$opts['debug'], 1); ?> />
					<p class="help"><?php _e( 'Will use uncompressed js', $this->plugin_slug ); ?></p>
				</td>

			</tr>
			<tr valign="top" class="">
				<th><label for="safe"><?php _e( 'Enable safe mode?', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="safe" name="ppl_settings[safe]" value="1" <?php checked(@$opts['safe'], 1); ?> /> 
					<p class="help"><?php _e( 'Will move all popups to top of the screen.', $this->plugin_slug ); ?></p>
				</td>
				
			</tr>
			<tr valign="top" class="">
				<th><label for="style"><?php _e( 'Remove shortcodes style', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="style" name="ppl_settings[shortcodes_style]" value="1" <?php checked(@$opts['shortcodes_style'], 1); ?> /> 
					<p class="help"><?php _e( 'By default the plugin will apply some style to shortcodes. Check here if you want to manually style them', $this->plugin_slug ); ?></p>
				</td>
				
			</tr>
			<tr valign="top" class="">
				<th><label for="style"><?php _e( 'Unload Facebook javascript', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="style" name="ppl_settings[facebook]" value="1" <?php checked(@$opts['facebook'], 1); ?> /> 
					<p class="help"><?php _e( 'If you use your own Facebook script, check this', $this->plugin_slug ); ?></p>
				</td>
				
			</tr>
			<tr valign="top" class="">
				<th><label for="style"><?php _e( 'Unload Google javascript', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="style" name="ppl_settings[google]" value="1" <?php checked(@$opts['google'], 1); ?> /> 
					<p class="help"><?php _e( 'If you use your own Google script, check this', $this->plugin_slug ); ?></p>
				</td>
				
			</tr>
			<tr valign="top" class="">
				<th><label for="style"><?php _e( 'Unload Twitter javascript', $this->plugin_slug ); ?></label></th>
				<td colspan="3">
					<label><input type="checkbox" id="style" name="ppl_settings[twitter]" value="1" <?php checked(@$opts['twitter'], 1); ?> /> 
					<p class="help"><?php _e( 'If you use your own Twitter script, check this', $this->plugin_slug ); ?></p>
				</td>
				
			</tr>
			<?php do_action( 'ppl/settings_page/after' ); ?>
			<tr><td><input type="submit" class="button-primary" value="<?php _e( 'Save settings', $this->plugin_slug );?>"/></td>
			<?php wp_nonce_field('ppl_save_settings','ppl_nonce'); ?>
		</table>
	</form>
</div>