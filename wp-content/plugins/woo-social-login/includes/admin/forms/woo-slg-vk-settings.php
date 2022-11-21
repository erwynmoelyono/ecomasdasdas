<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Settings Page VK Tab
 * 
 * The code for the plugins settings page vk tab
 * 
 * @package WooCommerce - Social Login
 * @since 1.6.4
 */

// Set option for default value
$woo_slg_vk_icon_text = (!empty($woo_slg_vk_icon_text)) ? $woo_slg_vk_icon_text : esc_html__( 'Sign in with VK', 'wooslg' ) ;
$woo_slg_vk_link_icon_text = (!empty($woo_slg_vk_link_icon_text)) ? $woo_slg_vk_link_icon_text : esc_html__( 'Link your account to VK', 'wooslg' ) ;

?>
<!-- beginning of the vk settings meta box -->
<div id="woo-slg-vk" class="post-box-container">
	<div class="metabox-holder">
		<div class="meta-box-sortables ui-sortable">
			<div id="vk" class="postbox">
				<div class="handlediv" title="<?php esc_html_e( 'Click to toggle', 'wooslg' ); ?>"><br /></div>
					
					<!-- vk settings box title -->
					<h3 class="hndle">
						<span class="woo-slg-vertical-top"><?php esc_html_e( 'VK Settings', 'wooslg' ); ?></span>
					</h3>

					<div class="inside">
					
					<table class="form-table">
						<tbody>
							
							<?php
								// do action for add setting before vk settings
								do_action( 'woo_slg_before_vk_setting', $woo_slg_options );
								
							?>
							
							<tr valign="top">
								<th scope="row">
									<label><?php esc_html_e( 'VK Application:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo esc_html__( 'Before you can start using VK for the social login, you need to create a VK Application. You can get a step by step tutorial on how to create VK Application on our', 'wooslg' ) . ' <a target="_blank" href="' . esc_url('https://docs.wpwebelite.com/social-network-integration/vk/') . '">' . esc_html__( 'Documentation', 'wooslg' ) . '</a>'; ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_vk"><?php esc_html_e( 'Enable VK:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_vk" name="woo_slg_enable_vk" value="1" <?php echo ($woo_slg_enable_vk=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_vk"><?php echo esc_html__( 'Check this box, if you want to enable VK social login registration.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_app_id"><?php esc_html_e( 'VK Application ID:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_app_id" type="text" class="regular-text" name="woo_slg_vk_app_id" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_app_id ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter VK Application ID.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_app_secret"><?php esc_html_e( 'VK Secret Key:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_app_secret" type="text" class="regular-text" name="woo_slg_vk_app_secret" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_app_secret ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter VK Secret Key.', 'wooslg'); ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_vk_avatar"><?php esc_html_e( 'Enable VK Avatar:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_vk_avatar" name="woo_slg_enable_vk_avatar" value="1" <?php echo ($woo_slg_enable_vk_avatar=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_vk_avatar"><?php echo esc_html__( 'Check this box, if you want to use VK profile pictures as avatars.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_icon_text"><?php esc_html_e( 'Custom VK Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_vk_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own VK Text, Enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_link_icon_text"><?php esc_html_e( 'Custom VK Link Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_link_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_vk_link_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_link_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own VK Link Text, enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_icon_url"><?php esc_html_e( 'Custom VK Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_vk_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own VK Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_vk_link_icon_url"><?php esc_html_e( 'Custom VK Link Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_vk_link_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_vk_link_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_vk_link_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own VK Link Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<!-- VK Settings End -->

							<!-- Page Settings End --><?php
							
							// do action for add setting after vk settings
							do_action( 'woo_slg_after_vk_setting', $woo_slg_options );
							
							?>
							<tr>
								<td colspan="2"><?php
									echo apply_filters ( 'woo_slg_settings_submit_button', '<input class="button-primary woo-slg-save-btn" type="submit" name="woo-slg-set-submit" value="'.esc_html__( 'Save Changes','wooslg' ).'" />' );?>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .inside -->
			</div><!-- #vk -->
		</div><!-- .meta-box-sortables ui-sortable -->
	</div><!-- .metabox-holder -->
</div><!-- #woo-slg-vk -->