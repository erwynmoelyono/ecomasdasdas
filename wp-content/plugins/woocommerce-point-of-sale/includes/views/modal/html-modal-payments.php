<!-- Payments Popup Box -->
<?php
$available_gateways = array_filter( WC()->payment_gateways()->get_available_payment_gateways(), 'wc_pos_is_pos_supported_gateway' );
?>
<script type="text/x-template" id="payment-template">
	<div id="payment-gateways">
		<slot name="top"></slot>
		<?php if ( ! empty( $available_gateways ) ) : ?>
		<q-tabs
			v-model="paymentGateway"
			inline-label
			class="bg-secondary text-grey-4 full-width"
			switch-indicator
			inline-label
			indicator-color="accent"
			active-bg-color="accent"
			active-color="grey-4"
			align="left"
			style="height: 56px;"
		>
			<?php
			WC()->customer = new WC_Customer();
			WC()->cart     = new WC_Cart();
			foreach ( $available_gateways as $i => $gateway ) {
				?>
				<q-tab no-caps :ripple="false" name="<?php echo esc_attr( $gateway->id ); ?>" label="<?php echo esc_attr( $gateway->title ); ?>" />
				<?php
			}
			?>
		</q-tabs>
		<q-tab-panels v-model="paymentGateway">
			<?php
			foreach ( $available_gateways as $gateway ) {
				if ( 'pos_cash' === $gateway->id ) {
					continue;
				}
				?>
				<q-tab-panel name="<?php echo esc_attr( $gateway->id ); ?>" class="q-pa-none">
					<?php
					if ( 0 === strpos( $gateway->id, 'pos_chip_and_pin' ) ) {
						?>
						<chip-pin></chip-pin>
						<?php
					} elseif ( 0 === strpos( $gateway->id, 'pos_bacs' ) ) {
						?>
						<bacs-payment></bacs-payment>
						<?php
					} elseif ( 0 === strpos( $gateway->id, 'pos_cheque' ) ) {
						?>
						<cheque-payment></cheque-payment>
						<?php
					} else {
						if ( $gateway->has_fields ) {
							echo wp_kses_post( $gateway->payment_fields() );
						}
					}
					?>
				</q-tab-panel>
				<?php
			}
			?>
			<slot name="panels"></slot>
		</q-tab-panels>
		<?php else : ?>
		<q-card class="bg-transparent no-shadow">
			<q-card-section class="q-pa-lg">
				<div class="text-h5 text-primary q-mb-md "><?php esc_html_e( 'No Payment Methods', 'woocommerce-point-of-sale' ); ?></div>
				<div class="text-body1 text-grey">
					<?php
						/* translators: %1$s anchor tag %1$s closing anchor tag */
						echo sprintf( esc_html__( 'Sorry, it seems that there are no available payment methods for Point of Sale. Please go to %1$sWooCommerce > Settings > Payments%2$s to enable payment methods.', 'woocommerce-point-of-sale' ), '<a target="_blank" href="' . esc_attr( admin_url( 'admin.php?page=wc-settings&tab=checkout' ) ) . '">', '</a>' );
					?>
				</div>
			</q-card-section>
		</q-card>
		<?php endif; ?>
		<slot name="bottom"></slot>
	</div>
</script>
