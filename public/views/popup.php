<?php
/**
 * Popups Plus view
 *
 * @package   Popups Plus
 * @author    #
 * @license   GPL-2.0+
 * @link     #
 * @copyright 2014 Tayyab
 */

?><!-- Popups Plus v<?php echo self::VERSION; ?> -#--><?php
$box = get_post( $ppl_id );
$helper = new ppl_Helper;

// has box with this id been found?
if ( ! $box instanceof WP_Post || $box->post_status !== 'publish' ) {
	return; 
}

$opts 		= $helper->get_box_options( $box->ID );
$css 		= $opts['css'];
$content 	= $box->post_content;
$data_attrs	= '';
$box_class  = '';
$width 		= !empty( $css['width'] )  ?  $css['width']  : '';

// run filters on content
$content = apply_filters( 'ppl/popup/content', $content, $box );

// Qtranslate support 
if ( function_exists('qtrans_useCurrentLanguageIfNotFoundShowAvailable') ) {
	$content = qtrans_useCurrentLanguageIfNotFoundShowAvailable( $content );
}

// Optin popup ?
if( !empty( $opts['optin'] ) ) {
	$box_class  .= ' ppl-optin';
	if( !empty( $opts['optin_theme'] ) )
		$box_class  .= ' ppl-theme-'.$opts['optin_theme'];
	if( isset( $opts['optin_display_name'] ) && $opts['optin_display_name'] == '1' )
		$box_class  .= ' with-ppl-name';
}

do_action( 'ppl/popup/before_popup', $box, $opts, $css);

?>
<style type="text/css">
	#ppl-<?php echo $box->ID; ?> {
		background: <?php echo ( !empty( $css['background_color'] ) ) ? esc_attr($css['background_color']) : 'white'; ?>;
		<?php if ( !empty( $css['color'] ) ) { ?>color: <?php echo esc_attr($css['color']); ?>;<?php } ?>
		<?php if ( !empty( $css['border_color'] ) && !empty( $css['border_width'] ) ) { ?>border: <?php echo esc_attr($css['border_width']) . 'px' ?> solid <?php echo esc_attr($css['border_color']); ?>;<?php } ?>
		width: <?php echo ( empty( $opts['optin'] ) ) ?  esc_attr( $width ) : 'auto'; ?>;

	}
	#ppl-bg-<?php echo $box->ID; ?> {
		opacity: <?php echo ( !empty( $css['bgopacity'] ) ) ? esc_attr($css['bgopacity']) : 0; ?>;
	}
</style>
<div class="ppl-bg" id="ppl-bg-<?php echo $box->ID; ?>"></div>
<div class="ppl-box <?php echo $box_class;?> ppl-<?php echo esc_attr( $opts['css']['position'] ); ?> ppl-total-<?php echo get_post_meta($box->ID, 'ppl_social',true);?> <?php echo get_post_meta($box->ID, 'ppl_google',true) ? 'ppl-gogl' : '';?>" id="ppl-<?php echo $box->ID; ?>"
 data-box-id="<?php echo $box->ID ; ?>" data-trigger="<?php echo esc_attr( $opts['trigger'] ); ?>"
 data-trigger-number="<?php echo esc_attr( absint( $opts['trigger_number'] ) ); ?>" 
 data-pplanimation="<?php echo esc_attr($opts['animation']); ?>" data-cookie="<?php echo esc_attr( absint ( $opts['cookie'] ) ); ?>" data-test-mode="<?php echo esc_attr($opts['test_mode']); ?>" 
 data-auto-hide="<?php echo esc_attr($opts['auto_hide']); ?>" data-close-on-conversion="<?php echo $opts['conversion_close'] == 1 ?'1':''; ?>" data-bgopa="<?php echo esc_attr($css['bgopacity']);?>" data-total="<?php echo get_post_meta($box->ID, 'ppl_social',true);?>"
 style="left:-99999px !important;" data-width="<?php echo esc_attr(str_replace('px', '', $width)); ?>" <?php echo apply_filters( 'ppl/popup/data_attrs', $data_attrs, $opts);?>>
	<div class="ppl-content"><?php echo $content; ?></div>
	<span class="ppl-close ppl-close-popup"><i class="ppl-icon ppl-icon-close"></i></span>
	<span class="ppl-timer"></span>
	<?php if( $opts['powered_link'] == '1' ) {
		$aff_link = !empty($this->ppl_settings['aff_link']) ? $this->ppl_settings['aff_link'] : 'https://wordpress.org/plugins/popups-plus/';
		?>
		<p class="ppl-powered">Powered by <a href="<?php echo $aff_link;?>" target="_blank">Popups Plus</a></p>
	<?php } ?>
</div>
<!-- / Popups Plus Box -->
<?php
do_action( 'ppl/popup/after_popup', $box, $opts, $css);