<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * WPWeb Helper Page
 * 
 * Handle to display helper page
 * 
 * @package WPWeb Updater
 * @since 1.0.0
 */

global $wpweb_queued_updates;

?>
<div class="wrap">
	<h2><?php echo esc_html__( 'Welcome to WPWeb Updater', 'wooslg' );?></h2><?php 
	
	if( isset( $_GET['message'] ) && !empty( $_GET['message'] ) ) {
		echo '<div class="updated fade"><p>' . esc_html__( 'Licence key has been updated successfully.', 'wooslg' ) . '</p></div>' . "\n";
	}
		
	?>
	<form action="" method="post" id="wpwebupd-conf" enctype="multipart/form-data">
		<div class="tablenav top">
			<div class="tablenav-pages one-page"><span class="displaying-num"><?php echo count( $wpweb_queued_updates ) . ' ' . esc_html__( 'item', 'wooslg' );?></span></div>
		</div>
		<table class="wp-list-table widefat fixed wpweb-licenses">
			<thead>
				<tr>
					<th width="20%"><?php echo esc_html__( 'Product', 'wooslg' );?></th>
					<th width="10%"><?php echo esc_html__( 'Version', 'wooslg' );?></th>
					<th width="35%"><?php echo esc_html__( 'Email', 'wooslg' );?></th>
					<th width="35%"><?php echo esc_html__( 'Item Purchase Code', 'wooslg' );?></th>
				</tr>
			</thead>
			<tbody><?php 
				
				if( !empty( $wpweb_queued_updates ) ) { // 
					
					$plugins_license	= wpweb_all_plugins_purchase_code();
					$plugins_email		= wpweb_all_plugins_purchase_email();
					
					$counter			= 1;
					
					foreach ( $wpweb_queued_updates as $wpweb_queue ) { 
						
						$plugin_file	= isset( $wpweb_queue->file ) ? $wpweb_queue->file : '';
						$plugin_key		= isset( $wpweb_queue->plugin_key ) ? $wpweb_queue->plugin_key : '';
						
						$plugin_dir		= WP_PLUGIN_DIR . '/' . $plugin_file;
						$plugin_data	= get_plugin_data( $plugin_dir );
						
						$alternate		= ( $counter%2 == 1 ) ? 'alternate' : '';
						
						$licence		= isset( $plugins_license[$plugin_key] ) ? $plugins_license[$plugin_key] : '';
						$email			= isset( $plugins_email[$plugin_key] ) ? $plugins_email[$plugin_key] : '';
						
						?>
						<tr class="<?php echo $alternate;?>">
							<td><strong><?php echo $plugin_data['Name'];?></strong></td>
							<td><?php echo $plugin_data['Version'];?></td>
							<td>
								<input class="wpwebupd-email-field" size="40" type="text" value="<?php echo $email;?>" name="wpwebupd_email[<?php echo $plugin_key;?>]" placeholder="Place your email here" /><img src="<?php echo esc_url(WOO_SLG_WPWEB_UPD_URL).'includes/images/invalidemail.png'; ?>" class="wpwebupd-invalid-email"><img src="<?php echo esc_url(WOO_SLG_WPWEB_UPD_URL).'includes/images/done.png'; ?>" class="wpwebupd-done-email">
							</td>
							<td>
								<input class="wpwebupd-key-field" size="40" type="text" value="<?php echo $licence;?>" name="wpwebupd_lickey[<?php echo $plugin_key;?>]" placeholder="<?php echo esc_html__( 'Place', 'wooslg' ) . ' ' . $plugin_data['Name'] . ' ' . esc_html__( 'item purchase code here', 'wooslg' );?>" />
							</td>
						</tr><?php 
						
						$counter++;
					}
				} else { ?>
					<tr><td colspan="3"><?php echo esc_html__( 'There is no product available for update.', 'wooslg' );?></td></tr><?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th><?php echo esc_html__( 'Product', 'wooslg' );?></th>
					<th><?php echo esc_html__( 'Version', 'wooslg' );?></th>
					<th><?php echo esc_html__( 'Email', 'wooslg' );?></th>
					<th><?php echo esc_html__( 'Item Purchase Code', 'wooslg' );?></th>
				</tr>
			</tfoot>
		</table>
		<div class="tablenav bottom">
			<div class="tablenav-pages one-page"><span class="displaying-num"><?php echo count( $wpweb_queued_updates ) . ' ' . esc_html__( 'item', 'wooslg' );?></span></div>
		</div><?php 
		
		if( !empty( $wpweb_queued_updates ) ) { ?>
			<p class="submit">
				<input id="submit" class="button button-primary wpweb-upd-submit-button" type="submit" value="<?php echo esc_html__( 'Activate Products', 'wooslg' );?>" name="wpweb_upd_submit">
			</p><?php 
		}?>
	</form>
</div><!-- .wrap -->