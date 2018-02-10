<?php
/**
 * Output a single payment method
 * @version     2.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="list-group-item rounded-0 wc_payment_method payment_method_<?php echo $gateway->id; ?>">
<div class="custom-control custom-radio input-group mb-3">
    <input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="custom-control-input mr-2" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
	<label class="custom-control-label text-secondary" for="payment_method_<?php echo $gateway->id; ?>">
		<?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?>
	</label>
</div>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo $gateway->id; ?>" <?php if ( ! $gateway->chosen ) : ?>style="display:none;"<?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>