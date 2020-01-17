<?php
/**
 * The template for displaying product search form
 * @version 3.3.0
 */

defined( 'ABSPATH' ) || exit;
?>

<form role="search" method="get" class="w-100 py-0 form-inline woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<!--	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>-->
    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="w-100 mr-0 pr-5 py-0 form-control search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button class="border mr-0 bg-white form-control" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="svg-i search"></i>
    </button>
    <input type="hidden" name="post_type" value="product" />
</form>