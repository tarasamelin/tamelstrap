<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 * @version     3.3.1
 * add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

?>
<nav class="d-table mx-auto mb-4 mt-5 h5 woocommerce-pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
			'base'         => $base,
			'format'       => $format,
			'add_args'     => false,
			'current'      => max( 1, $current ),
			'total'        => $total,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'plain',
			'end_size'     => 3,
			'mid_size'     => 3,
		) ) );
	?>
</nav>