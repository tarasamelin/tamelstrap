<?php
/**
 * Loop Rating
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

echo wc_get_rating_html( $product->get_average_rating() );
