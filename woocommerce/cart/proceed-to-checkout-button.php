<?php
/**
 * Proceed to checkout button
 * Contains the markup for the proceed to checkout button on the cart.
 * @version     2.4.0
 */

defined( 'ABSPATH' ) || exit;
?>

<a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="ml-2 pt-1 pb-1 btn btn-outline-primary checkout-button button alt wc-forward">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
