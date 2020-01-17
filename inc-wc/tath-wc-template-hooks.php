<?php
/**
 * TML WooCommerce Template Hooks
 * Action/filter hooks used for WooCommerce functions/templates.
 */

/*********************************************************/
/*********** IN CATALOG & PRODUCT CATEGORY ***************/
/*********************************************************/

/**
 * hooks
 * Move upper Breadcrumbs.
 * woocommerce_breadcrumb()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
//add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 5, 0 );
add_action( 'tath_woocommerce_breadcrumbs_full_width', 'woocommerce_breadcrumb', 5, 0 );

/**
 * Remove WooCommerce Sidebar hook
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
/**
 * Sidebar for woocommerce row and cols hooks
 */
add_action( 'get_header', 'tath_add_wc_sidebar' );
function tath_add_wc_sidebar() {
//    if( !is_product() ){
        add_action( 'woocommerce_before_main_content', 'tath_row_open', 8 );
        add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 9 );
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
        add_action( 'woocommerce_before_main_content', 'tath_woocommerce_output_content_wrapper_with_sidebar', 10 );
        add_action( 'woocommerce_after_main_content', 'tath_row_close', 11 );
//    }
}

/**
 * Products Loop.
 * @see woocommerce_result_count()
 */
add_action( 'get_header', 'tath_remove_woocommerce_result_count' );
function tath_remove_woocommerce_result_count() {
    if( is_shop() ){
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    }
}

/**
 * HOOK
 * Change and remove Option from WooCommerce Ordering - OrderBy in Catalog
 */
add_filter( 'woocommerce_catalog_orderby', 'tath_filter_woocommerce_catalog_orderby', 10, 1 ); 

/**
 * bootstrap row and col for woocommerce_before_shop_loop hooks
 */
add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_row_open', 10 );

add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_col_open', 15 );
add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_col_close', 24 );
add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_col_open', 25 );
add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_col_close', 35 );

add_action( 'woocommerce_before_shop_loop', 'tath_woocommerce_before_shop_loop_row_close', 40 );

/**
 * HOOK
 * $cols contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 */
add_filter( 'loop_shop_per_page', 'tath_loop_shop_per_page', 20 );

/**
 * Custome woocommerce_template_loop_product_link_open  hooks
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'tath_woocommerce_template_loop_product_link_open', 10 );

/**
 * Custome woocommerce_template_loop_product_link_close  hooks
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 6 );

/**
 * HOOK
 * TML WooCommerce add currency symbol
 */
add_filter('woocommerce_currency_symbol', 'tath_add_my_currency_symbol', 10, 2);


/*********************************************************/
/******************** SINGLE PRODUCT *********************/
/*********************************************************/

/*
 * HOOKS
 * TML WooCommerce Change add to cart text
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'tath_custom_woocommerce_product_single_add_to_cart_text' ); 
add_filter( 'woocommerce_product_add_to_cart_text', 'tath_custom_woocommerce_product_add_to_cart_text' );

/**
 * Replace Output the product tabs.
 */
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 65 );

/**
 * Full width related product under single product hooks
 */
add_action( 'get_header', 'tath_full_width_related_products' );
function tath_full_width_related_products() {
    if( is_product() ){
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_upsell_display', 12 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 13 );
    }
}

/**
 * HOOK Remove SALE badge from Product Archives and Single Product
 */
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/**
 * TATH Hooks Single Product widget area
 */
add_action( 'woocommerce_single_product_summary', 'tath_single_product_widget_area', 45 );


/*********************************************************/
/****************** CART AND CHECKOUT ********************/
/*********************************************************/

/** 
 * Update AJAX WooCommerce Cart in header
 */
add_action( 'tath_header_cart', 'tath_cart_link' );

/** 
 * Add Cart link in header
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'tath_cart_link_fragment');

/**
 * Replace Cross Sell
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 5 );

/** 
 * Add custom css class to WooCommerce checkout fields
 */
add_filter('woocommerce_checkout_fields', 'tath_add_css_class_woocommerce_checkout_fields' );

/*********************************************************/
/********************* OTHER WC HOOKS ********************/
/*********************************************************/

/**
 * HOOK
 * Adds a demo store banner to the site if enabled.
 */
remove_action( 'wp_footer', 'woocommerce_demo_store' );
add_action( 'wp_footer', 'tath_woocommerce_demo_store' );

