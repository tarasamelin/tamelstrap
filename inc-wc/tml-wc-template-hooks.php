<?php
/**
 * TML WooCommerce Template Hooks
 * Action/filter hooks used for WooCommerce functions/templates.
 */

/**
 * HOOK
 * $cols contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 */
add_filter( 'loop_shop_per_page', 'tml_loop_shop_per_page', 20 );

 /**
 * Custome woocommerce_template_loop_product_link_open  hooks
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'tml_woocommerce_template_loop_product_link_open', 10 );

/**
 * Custome woocommerce_template_loop_product_link_close  hooks
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 6 );

/**
 * bootstrap row and col for woocommerce_before_shop_loop hooks
 */
add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_row_open', 10 );

add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_col_open', 15 );
add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_col_close', 24 );
add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_col_open', 25 );
add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_col_close', 35 );

add_action( 'woocommerce_before_shop_loop', 'tml_woocommerce_before_shop_loop_row_close', 40 );

/**
 * Move upper Breadcrumbs.
 * woocommerce_breadcrumb()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
//add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 5, 0 );
add_action( 'tml_woocommerce_breadcrumbs_full_width', 'woocommerce_breadcrumb', 5, 0 );

/**
 * Remove WooCommerce Sidebar Hook
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Sidebar for woocommerce row and cols
 */
add_action( 'get_header', 'tml_add_wc_sidebar' );
function tml_add_wc_sidebar() {
//    if( !is_product() ){
        add_action( 'woocommerce_before_main_content', 'tml_row_open', 8 );
        add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 9 );
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
        add_action( 'woocommerce_before_main_content', 'tml_woocommerce_output_content_wrapper_with_sidebar', 10 );
        add_action( 'woocommerce_after_main_content', 'tml_row_close', 11 );
//    }
}

/**
 * Full width related product under single product
 */
add_action( 'get_header', 'tml_full_width_related_products' );
function tml_full_width_related_products() {
    if( is_product() ){
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_upsell_display', 12 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 13 );
    }
}


/**
 * Replace Output the product tabs.
 */
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 65 );

/**
 * Products Loop.
 * @see woocommerce_result_count()
 */
add_action( 'get_header', 'tml_remove_woocommerce_result_count' );
function tml_remove_woocommerce_result_count() {
    if( is_shop() ){
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    }
}

/**
 * Replace Cross Sell
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 5 );

/** 
 * Add custom css class to WooCommerce checkout fields
 */
add_filter('woocommerce_checkout_fields', 'tml_add_css_class_woocommerce_checkout_fields' );

/** 
 * Add Cart link in header
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'tml_cart_link_fragment');
/** 
 * Update AJAX WooCommerce Cart in header
 */
add_action( 'tml_header_cart', 'tml_cart_link' );

/**
 * Remove Option from WooCommerce Ordering - OrderBy in Catalog
**/
add_filter( 'woocommerce_catalog_orderby', 'tml_filter_woocommerce_catalog_orderby', 10, 1 ); 
function tml_filter_woocommerce_catalog_orderby( $array ) {
    $array = array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
//			'popularity' => __( 'Sort by popularity', 'woocommerce' ),
//			'rating'     => __( 'Sort by average rating', 'woocommerce' ),
			'date'       => __( 'Sort by newness', 'woocommerce' ),
			'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
			'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
		);
    return $array; 
}




