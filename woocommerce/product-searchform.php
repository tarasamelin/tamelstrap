<?php
/**
 * The template for displaying product search form
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="form-inline woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<!--	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>-->

	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="form-control rounded-0 search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button class="border bg-white rounded-0 form-control" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="text-secondary fa fa-search" aria-hidden="true"></i>
<!--	<?php echo esc_html_x( 'Search', 'submit button', 'woocommerce' ); ?>-->
	</button>
	<input type="hidden" name="post_type" value="product" />
</form>
