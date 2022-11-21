<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Settings Page Line Tab
 * 
 * The code for the plugins settings page line tab
 * 
 * @package WooCommerce - Social Login
 * @since 1.9.14
 */


$woo_slg_line_icon_text = (!empty($woo_slg_line_icon_text)) ? $woo_slg_line_icon_text : esc_html__( 'Sign in with Line', 'wooslg' ) ;
$woo_slg_line_link_icon_text = (!empty($woo_slg_line_link_icon_text)) ? $woo_slg_line_link_icon_text : esc_html__( 'Link your account to Line', 'wooslg' ) ;

?>
<!-- beginning of the line settings meta box -->
<div id="woo-slg-line" class="post-box-container">
	<div class="metabox-holder">
		<div class="meta-box-sortables ui-sortable">
			<div id="line" class="postbox">
				<div class="handlediv" title="<?php esc_html_e( 'Click to toggle', 'wooslg' ); ?>"><br /></div>
					
					<!-- line settings box title -->
					<h3 class="hndle">
						<span class="woo-slg-vertical-top"><?php esc_html_e( 'Line Settings', 'wooslg' ); ?></span>
					</h3>

					<div class="inside">
					
					<table class="form-table">
						<tbody>
						
							<?php
								// do action for add setting before line settings
								do_action( 'woo_slg_before_line_setting', $woo_slg_options );
								
							?>
							
							<tr valign="top">
								<th scope="row">
									<label><?php esc_html_e( 'Line Channel:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo esc_html__( 'Before you can start using Line for the social login, you need to create a Line Channel. You can get a step by step tutorial on how to create Line Channel on our', 'wooslg' ) . ' <a target="_blank" href="'. esc_url('https://docs.wpwebelite.com/social-network-integration/line/') . '">'. esc_html__( 'Documentation', 'wooslg' ). '</a>'; ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_line"><?php esc_html_e( 'Enable Line:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_line" name="woo_slg_enable_line" value="1" <?php echo ( $woo_slg_enable_line == 'yes' ) ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_line"><?php echo esc_html__( 'Check this box, if you want to enable line social login registration.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_client_id"><?php esc_html_e( 'Line Channel ID:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_client_id" type="text" class="regular-text" name="woo_slg_line_client_id" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_client_id ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Line Channel ID.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_client_secret"><?php esc_html_e( 'Line Channel Secret:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_client_secret" type="text" class="regular-text" name="woo_slg_line_client_secret" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_client_secret ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Line Channel Secret.', 'wooslg'); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label><?php echo esc_html__( 'Line Callback URL:', 'wooslg' ); ?></label>
								</th>
								<td>
									<span class="description"><?php echo '<code>'.WOO_SLG_LINE_REDIRECT_URL.'</code>'; ?></span>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_line_avatar"><?php esc_html_e( 'Enable Line Avatar:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_line_avatar" name="woo_slg_enable_line_avatar" value="1" <?php echo ($woo_slg_enable_line_avatar=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_line_avatar"><?php echo esc_html__( 'Check this box, if you want to use Line profile pictures as avatars.', 'wooslg' ); ?></label>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_icon_url"><?php esc_html_e( 'Custom Line Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_line_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Line Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_link_icon_url"><?php esc_html_e( 'Custom Line Link Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_link_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_line_link_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_link_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Line Link Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_icon_text"><?php esc_html_e( 'Custom Line Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_line_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Line Text, Enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_line_link_icon_text"><?php esc_html_e( 'Custom Line Link Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_line_link_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_line_link_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_line_link_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Line Link Text, enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<!-- Line Settings End -->

							<!-- Page Settings End --><?php
							
							// do action for add setting after line settings
							do_action( 'woo_slg_after_line_setting', $woo_slg_options );
							
							?>
							<tr>
								<td colspan="2"><?php
									echo apply_filters ( 'woo_slg_settings_submit_button', '<input class="button-primary woo-slg-save-btn" type="submit" name="woo-slg-set-submit" value="'.esc_html__( 'Save Changes','wooslg' ).'" />' );?>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .inside -->
			</div><!-- #line -->
		</div><!-- .meta-box-sortables ui-sortable -->
	</div><!-- .metabox-holder -->
</div><!-- #woo-slg-line -->