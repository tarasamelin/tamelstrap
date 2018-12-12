<?php
/**
 * Loop Add to Cart
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 * @version     3.3.0
 * add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<div class="clearfix"></div>
            <a href="%s" data-quantity="%s"class="%s btn btn-outline-secondary mx-auto d-table rounded-0 pt-1 pb-1 mt-1" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
$product, $args );
