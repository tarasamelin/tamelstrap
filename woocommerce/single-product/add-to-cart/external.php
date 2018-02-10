<?php
/**
 * External product add to cart
 * v2.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<p class="cart">
	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="text-capitalize btn btn-outline-secondary rounded-0 pt-1 pb-1 single_add_to_cart_button button alt"><?php echo esc_html( $button_text ); ?></a>
</p>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
