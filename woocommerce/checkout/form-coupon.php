<?php
/**
 * Checkout coupon form
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! wc_coupons_enabled() ) {
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?>

<form class="form-inline checkout_coupon" method="post" style="display:none">
	<p class="form-group form-row form-row-first">
		<input type="text" name="coupon_code" class="p-1 rounded-0 input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-group form-row form-row-last">
		<input type="submit" class="ml-3 pt-1 pb-1 btn btn-outline-secondary rounded-0 button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
	</p>

	<div class="clear"></div>
</form>
