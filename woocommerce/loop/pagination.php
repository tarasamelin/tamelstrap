<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 * v2.2.2
 * add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination d-table mx-auto mb-4 h5">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => false,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'plain',
			'end_size'     => 3,
			'mid_size'     => 3,
		) ) );
	?>
</nav>


























