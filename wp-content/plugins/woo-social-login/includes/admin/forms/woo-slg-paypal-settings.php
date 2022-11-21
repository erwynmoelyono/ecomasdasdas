<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Settings Page Paypal Tab
 * 
 * The code for the plugins settings page paypal tab
 * 
 * @package WooCommerce - Social Login
 * @since 1.6.4
 */

// Set option for default value
$woo_slg_paypal_icon_text = (!empty($woo_slg_paypal_icon_text)) ? $woo_slg_paypal_icon_text : esc_html__( 'Sign in with Paypal', 'wooslg' ) ;
$woo_slg_paypal_link_icon_text = (!empty($woo_slg_paypal_link_icon_text)) ? $woo_slg_paypal_link_icon_text : esc_html__( 'Link your account to Paypal', 'wooslg' ) ;

// Set environment options
$woo_slg_paypal_environment_option = array( 
	'live' 		=> esc_html__('Live','wooslg'), 
	'sandbox' 	=> esc_html__('Sandbox','wooslg') 
);
?>
<!-- beginning of the paypal settings meta box -->
<div id="woo-slg-paypal" class="post-box-container">
	<div class="metabox-holder">
		<div class="meta-box-sortables ui-sortable">
			<div id="paypal" class="postbox">
				<div class="handlediv" title="<?php esc_html_e( 'Click to toggle', 'wooslg' ); ?>"><br /></div>
					
					<!-- paypal settings box title -->
					<h3 class="hndle">
						<span class="woo-slg-vertical-top"><?php esc_html_e( 'Paypal Settings', 'wooslg' ); ?></span>
					</h3>

					<div class="inside">
					
					<table class="form-table">
						<tbody>
							
							<?php
								// do action for add setting before paypal settings
								do_action( 'woo_slg_before_paypal_setting', $woo_slg_options );
								
							?>
							
							<tr valign="top">
								<th scope="row">
									<label><?php esc_html_e( 'Paypal Application:', 'wooslg' ); ?></label>
								</th>
								<td>
									<p class="description"><?php echo esc_html__( 'Before you can start using Paypal for the social login, you need to create a Paypal Application. You can get a step by step tutorial on how to create Paypal Application on our', 'wooslg' ) . ' <a target="_blank" href="' . esc_url('https://docs.wpwebelite.com/social-network-integration/paypal/') . '">' . esc_html__( 'Documentation', 'wooslg' ) . '</a>'; ?></p>
								</td>
							</tr>

							<tr>
								<th scope="row">
									<label for="woo_slg_enable_paypal"><?php esc_html_e( 'Enable Paypal:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input type="checkbox" id="woo_slg_enable_paypal" name="woo_slg_enable_paypal" value="1" <?php echo ($woo_slg_enable_paypal=='yes') ? 'checked="checked"' : ''; ?>/>
									<label for="woo_slg_enable_paypal"><?php echo esc_html__( 'Check this box, if you want to enable Paypal social login registration.', 'wooslg' ); ?></label>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_client_id"><?php esc_html_e( 'Paypal Client ID:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_client_id" type="text" class="regular-text" name="woo_slg_paypal_client_id" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_client_id ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Paypal Client ID.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_client_secret"><?php esc_html_e( 'Paypal Client Secret:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_client_secret" type="text" class="regular-text" name="woo_slg_paypal_client_secret" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_client_secret ); ?>" />
									<p class="description"><?php echo esc_html__( 'Enter Paypal Client Secret.', 'wooslg'); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label><?php echo esc_html__( 'Paypal Callback URL:', 'wooslg' ); ?></label>
								</th>
								<td>
									<span class="description"><?php echo '<code>'.WOO_SLG_PAYPAL_REDIRECT_URL.'</code>'; ?></span>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_environment"><?php echo esc_html__(  'Environment:', 'wooslg' ); ?></label>
								</th>
								<td>
									<select name="woo_slg_paypal_environment" id="woo_slg_paypal_environment" class="wslg-select" data-width="350px">
										<?php foreach ( $woo_slg_paypal_environment_option as $key => $option ) { ?>
											<option value="<?php echo $key; ?>" <?php selected( $woo_slg_paypal_environment, $key ); ?>>
												<?php esc_html_e( $option ); ?>
											</option>
										<?php } ?>
									</select>
									<p class="description"><?php esc_html_e('Select which environment to process logins under.', 'wooslg'); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_icon_text"><?php esc_html_e( 'Custom Paypal Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_paypal_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Paypal Text, Enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_link_icon_text"><?php esc_html_e( 'Custom Paypal Link Text:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_link_icon_text" type="text" class="regular-text woo_slg_social_btn_text" name="woo_slg_paypal_link_icon_text" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_link_icon_text ); ?>" />
									<p class="description"><?php echo esc_html__( 'If you want to use your own Paypal Link Text, enter here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_icon_url"><?php esc_html_e( 'Custom Paypal Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_paypal_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Paypal Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									<label for="woo_slg_paypal_link_icon_url"><?php esc_html_e( 'Custom Paypal Link Icon:', 'wooslg' ); ?></label>
								</th>
								<td>
									<input id="woo_slg_paypal_link_icon_url" type="text" class="woo_slg_social_btn_image regular-text" name="woo_slg_paypal_link_icon_url" value="<?php echo $woo_slg_model->woo_slg_escape_attr( $woo_slg_paypal_link_icon_url ); ?>" />
									<input type="button" class="woo-slg-upload-file-button button-secondary" value="<?php esc_html_e( 'Upload File', 'wooslg' );?>"/>
									<p class="description"><?php echo esc_html__( 'If you want to use your own Paypal Link Icon, upload one here.', 'wooslg' ); ?></p>
								</td>
							</tr>

							<!-- Paypal Settings End -->

							<!-- Page Settings End --><?php
							
							// do action for add setting after paypal settings
							do_action( 'woo_slg_after_paypal_setting', $woo_slg_options );
							
							?>
							<tr>
								<td colspan="2"><?php
									echo apply_filters ( 'woo_slg_settings_submit_button', '<input class="button-primary woo-slg-save-btn" type="submit" name="woo-slg-set-submit" value="'.esc_html__( 'Save Changes','wooslg' ).'" />' );?>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .inside -->
			</div><!-- #paypal -->
		</div><!-- .meta-box-sortables ui-sortable -->
	</div><!-- .metabox-holder -->
</div><!-- #woo-slg-paypal -->