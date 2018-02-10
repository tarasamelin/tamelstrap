<?php
/**
 * Proceed to checkout button
 * Contains the markup for the proceed to checkout button on the cart.
 * v2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="ml-2 pt-1 pb-1 btn btn-outline-secondary rounded-0 checkout-button button alt wc-forward">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
