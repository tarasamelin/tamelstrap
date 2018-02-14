<?php
/**
 * My Account navigation
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="mb-4 woocommerce-MyAccount-navigation">
	<ul class="nav nav-pills">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="nav-item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a class="border border-secondary btn-outline-secondary rounded-0 nav-link" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
