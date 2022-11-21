<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Settings Page Twitter Tab
 * 
 * The code for the plugins settings page twitter tab
 * 
 * @package WooCommerce - Social Login
 * @since 1.6.4
 */

// Get twitter options 
$woo_slg_twitter_options = array(
	'woo_slg_enable_twitter',
	'woo_slg_tw_consumer_key',
	'woo_slg_tw_consumer_secret',
	'woo_slg_enable_tw_avatar',
	'woo_slg_tw_icon_text',
	'woo_slg_tw_link_icon_text',
	'woo_slg_tw_icon_url',
	'woo_slg_tw_link_icon_url'
);

// Get option value
foreach ($woo_slg_twitter_options as $woo_slg_option_key) {

	$$woo_slg_option_key = get_option( $woo_slg_option_key );
}

// Set option for default value
$woo_slg_tw_icon_text = (!empty($woo_slg_tw_icon_text)) ? $woo_slg_tw_icon_text : esc_html__( 'Sign in with Twitter', 'wooslg' ) ;
$woo_slg_tw_link_icon_text = (!empty($woo_slg_tw_link_icon_text)) ? $woo_slg_tw_link_icon_text : esc_html__( 'Link your account to Twitter', 'wooslg' ) ;

?>
<!-- beginning of the twitter settings meta box -->
<div id="woo-slg-twitter" class="post-box-container">
	<div class="metabox-holder">
		<div class="meta-box-sortables ui-sortable">
			<div id="twitter" class="postbox">
				<div class="handlediv" title="<?php esc_html_e( 'Click to toggle', 'wooslg' ); ?>"><br /></div>
					
					<!-- twitter settings box title -->
					<h3 class="hndle">
						<span class="woo-slg-vertical-top"><?php esc_html_e( 'Twitter Settings', 'wooslg' ); ?></span>
					</h3>

					<div class="inside">
					
					<table class="form-table">
						<tbody>
							
							<?php
								// do action for add setting before twitter settings
								do_action( 'woo_slg_before_twitter_setting' );
								
							?>
							
							<tr valign="top">
								<th scope="row">
									<label><?php esc_html_e( 'Twitter Application:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo esc_html__( 'Before you can start using Twitter for the social login, you need to create a Twitter Application. You can get a step by step tutorial on how to create Twitter Application on our', 'wooslg' ) . ' <a target="_blank" href="' . esc_url('https://docs.wpwebelite.com/social-network-integration/twitter/') . '">' . esc_html__( 'Documentation', 'wooslg' ) . '</a>'; ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_twitter"><?php esc_html_e( 'Enable Twitter:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_twitter" name="woo_slg_enable_twitter" value="1" <?php echo ($woo_slg_enable_twitter=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_twitter"><?php echo esc_html__( 'Check this box, if you want to enable Twitter social login registration.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_consumer_key"><?php esc_html_e( 'Twitter API Key:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_consumer_key" type="text" class="regular-text" name="woo_slg_tw_consumer_key" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_consumer_key ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Twitter API Key.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_consumer_secret"><?php esc_html_e( 'Twitter API Secret:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_consumer_secret" type="text" class="regular-text" name="woo_slg_tw_consumer_secret" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_consumer_secret ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Twitter API Secret.', 'wooslg'); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_redirect_url"><?php echo esc_html__( 'Twitter Callback URL:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo '<code>'.site_url().'</code>'; ?></p>
									<p class="description"><?php echo sprintf(esc_html__( 'Add your site url without %s slash(/) %s at the end of url.', 'wooslg' ), '<b>', '</b>'); ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_tw_avatar"><?php esc_html_e( 'Enable Twitter Avatar:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_tw_avatar" name="woo_slg_enable_tw_avatar" value="1" <?php echo ($woo_slg_enable_tw_avatar=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_tw_avatar"><?php echo esc_html__( 'Check this box, if you want to use Twitter profile pictures as avatars.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_icon_text"><?php esc_html_e( 'Custom Twitter Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_tw_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Twitter Text, Enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_link_icon_text"><?php esc_html_e( 'Custom Twitter Link Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_link_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_tw_link_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_link_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Twitter Link Text, enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_icon_url"><?php esc_html_e( 'Custom Twitter Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_tw_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Twitter Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_tw_link_icon_url"><?php esc_html_e( 'Custom Twitter Link Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_tw_link_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_tw_link_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_tw_link_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Twitter Link Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<!-- Twitter Settings End -->

							<!-- Page Settings End --><?php
							
							// do action for add setting after twitter settings
							do_action( 'woo_slg_after_twitter_setting' );
							
							?>
							<tr>
								<td colspan="2"><?php
									echo apply_filters ( 'woo_slg_settings_submit_button', '<input class="button-primary woo-slg-save-btn" type="submit" name="woo-slg-set-submit" value="'.esc_html__( 'Save Changes','wooslg' ).'" />' );?>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .inside -->
			</div><!-- #twitter -->
		</div><!-- .meta-box-sortables ui-sortable -->
	</div><!-- .metabox-holder -->
</div><!-- #woo-slg-twitter -->