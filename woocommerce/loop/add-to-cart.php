<?php
/**
 * Loop Add to Cart
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 * v3.0.0
 * add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<div class="clearfix"></div><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s text-capitalize btn btn-outline-secondary mx-auto d-table rounded-0 pt-1 pb-1 mt-1" role="button">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
