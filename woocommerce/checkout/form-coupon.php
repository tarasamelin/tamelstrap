<?php
/**
 * Checkout coupon form
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() || ! empty( WC()->cart->applied_coupons ) ) { // @codingStandardsIgnoreLine.
	return;
}

//if ( empty( WC()->cart->applied_coupons ) ) {
    wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' ), 'notice' );
//}

?>

<form class="form-inline checkout_coupon" method="post" style="display:none">
    
    <p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>
    
	<p class="form-group form-row form-row-first">
		<input type="text" name="coupon_code" class="p-1 rounded-0 input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-group form-row form-row-last">
		<input type="submit" class="ml-3 pt-1 pb-1 btn btn-outline-secondary rounded-0 button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
	</p>

	<div class="clear"></div>
</form>
