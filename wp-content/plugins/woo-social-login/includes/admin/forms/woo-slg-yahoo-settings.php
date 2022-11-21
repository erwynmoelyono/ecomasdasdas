<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Settings Page Yahoo Tab
 * 
 * The code for the plugins settings page Yahoo tab
 * 
 * @package WooCommerce - Social Login
 * @since 1.6.4
 */

// Set option for default value
$woo_slg_yh_icon_text = (!empty($woo_slg_yh_icon_text)) ? $woo_slg_yh_icon_text : esc_html__( 'Sign in with Yahoo', 'wooslg' ) ;
$woo_slg_yh_link_icon_text = (!empty($woo_slg_yh_link_icon_text)) ? $woo_slg_yh_link_icon_text : esc_html__( 'Link your account to Yahoo', 'wooslg' ) ;

?>
<!-- beginning of the yahoo settings meta box -->
<div id="woo-slg-yahoo" class="post-box-container">
	<div class="metabox-holder">
		<div class="meta-box-sortables ui-sortable">
			<div id="yahoo" class="postbox">
				<div class="handlediv" title="<?php esc_html_e( 'Click to toggle', 'wooslg' ); ?>"><br /></div>
					
					<!-- yahoo settings box title -->
					<h3 class="hndle">
						<span class="woo-slg-vertical-top"><?php esc_html_e( 'Yahoo Settings', 'wooslg' ); ?></span>
					</h3>

					<div class="inside">
					
					<table class="form-table">
						<tbody>
							
							<?php
								// do action for add setting before Yahoo settings
								do_action( 'woo_slg_before_yahoo_setting', $woo_slg_options );
								
							?>
							
							<tr valign="top">
								<th scope="row">
									<label><?php esc_html_e( 'Yahoo Application:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo esc_html__( 'Before you can start using Yahoo for the social login, you need to create a Yahoo Application. You can get a step by step tutorial on how to create Yahoo Application on our', 'wooslg' ) . ' <a target="_blank" href="' . esc_url('https://docs.wpwebelite.com/social-network-integration/yahoo/') . '">' . esc_html__( 'Documentation', 'wooslg' ) . '</a>'; ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_yahoo"><?php esc_html_e( 'Enable Yahoo:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_yahoo" name="woo_slg_enable_yahoo" value="1" <?php echo ($woo_slg_enable_yahoo=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_yahoo"><?php echo esc_html__( 'Check this box, if you want to enable Yahoo social login registration.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_consumer_key"><?php esc_html_e( 'Yahoo Consumer Key:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_consumer_key" type="text" class="regular-text" name="woo_slg_yh_consumer_key" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_consumer_key ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Yahoo Consumer Key.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_consumer_secret"><?php esc_html_e( 'Yahoo Consumer Secret:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_consumer_secret" type="text" class="regular-text" name="woo_slg_yh_consumer_secret" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_consumer_secret ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Yahoo Consumer Secret.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							
							<tr valign="top">
								<th scope="row">
									<label ><?php echo esc_html__( 'Yahoo Home Page URL:', 'wooslg' ); ?></label>
								</th>
								<td>
									<span class="description"><?php echo '<code>'.WOO_SLG_YH_REDIRECT_URL.'</code>'; ?></span>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_yh_avatar"><?php esc_html_e( 'Enable Yahoo Avatar:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_yh_avatar" name="woo_slg_enable_yh_avatar" value="1" <?php echo ($woo_slg_enable_yh_avatar=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_yh_avatar"><?php echo esc_html__( 'Check this box, if you want to use Yahoo profile pictures as avatars.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_icon_text"><?php esc_html_e( 'Custom Yahoo Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_yh_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Yahoo Text, Enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_link_icon_text"><?php esc_html_e( 'Custom Yahoo Link Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_link_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_yh_link_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_link_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Yahoo Link Text, enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_icon_url"><?php esc_html_e( 'Custom Yahoo Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_yh_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Yahoo Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_yh_link_icon_url"><?php esc_html_e( 'Custom Yahoo Link Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_yh_link_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_yh_link_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_yh_link_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Yahoo Link Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<!-- Yahoo Settings End -->

							<!-- Page Settings End --><?php
							
							// do action for add setting after Yahoo settings
							do_action( 'woo_slg_after_yahoo_setting', $woo_slg_options );
							
							?>
							<tr>
								<td colspan="2"><?php
									echo apply_filters ( 'woo_slg_settings_submit_button', '<input class="button-primary woo-slg-save-btn" type="submit" name="woo-slg-set-submit" value="'.esc_html__( 'Save Changes','wooslg' ).'" />' );?>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .inside -->
			</div><!-- #yahoo -->
		</div><!-- .meta-box-sortables ui-sortable -->
	</div><!-- .metabox-holder -->
</div><!-- #woo-slg-yahoo -->