<?php
/**
 * TML WooCommerce Template
 * Functions for the templating system.
 */

/**
 * row open and row close
 */
function tath_row_open() {
    echo '<div class="row">';
}

function tath_row_close() {
    echo '</div>';
}

/*********************************************************/
/*********** IN CATALOG & PRODUCT CATEGORY ***************/
/*********************************************************/

/**
 * Output the WooCommerce Breadcrumb.
 */
function woocommerce_breadcrumb( $args = array() ) {
    $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
        'delimiter'   => '<span class="delimiter">&nbsp;&#47;&nbsp;</span>',
        'wrap_before' => '<nav class="text-center pt-2 pb-2 mb-3 woocommerce-breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    ) ) );
    $breadcrumbs = new WC_Breadcrumb();
    if ( ! empty( $args['home'] ) ) {
        $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
    }
    $args['breadcrumb'] = $breadcrumbs->generate();
    // @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
    do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );
    wc_get_template( 'global/breadcrumb.php', $args );
}

/**
 * Output the start of the page wrapper with sidebar.
 */
function tath_woocommerce_output_content_wrapper_with_sidebar() {
    wc_get_template( 'global/wrapper-start-with-sidebar.php' );
}

/**
 * bootstrap row and col for woocommerce_before_shop_loop function
 */
function tath_woocommerce_before_shop_loop_row_open() {
    echo '<div class="row mb-4 mb-md-0 ">';
}

function tath_woocommerce_before_shop_loop_row_close() {
    echo '</div>';
}

function tath_woocommerce_before_shop_loop_col_open() {
    echo '<div class="col-md-6">';
}

function tath_woocommerce_before_shop_loop_col_close() {
    echo '</div>';
}

/**
 * Remove Option from WooCommerce Ordering - OrderBy in Catalog
 */
function tath_filter_woocommerce_catalog_orderby( $array ) {
    $array = array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
//			'popularity' => __( 'Sort by popularity', 'woocommerce' ),
//			'rating'     => __( 'Sort by average rating', 'woocommerce' ),
			'date'       => __( 'Sort by most recent', 'woocommerce' ),
			'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
			'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
		);
    return $array; 
}

/**
 * Output Related Products count filter
 */
function woocommerce_output_related_products() {
    $args = array(
        'posts_per_page' 	=> 1,
        'columns' 			=> 4,
        'orderby' 			=> 'rand', // @codingStandardsIgnoreLine.
    );
woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

/**
 * $cols contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 */
function tath_loop_shop_per_page( $cols ) {
  $cols = 12;
  return $cols;
}

/**
 * Show the product title in the product loop. By default this is an H2.
 */
function woocommerce_template_loop_product_title() {
    echo '<h2 class="text-center h5 mb-1 mt-1 woocommerce-loop-product__title">' . get_the_title() . '</h2>';
}

/**
 * Insert the opening anchor tag for products in the loop.
 */
function tath_woocommerce_template_loop_product_link_open() {
    global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    
	echo '<a href="' . esc_url( $link ) . '" class="text-primary d-block woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

/**
 * functions
 * TATH WooCommerce add currency symbol
 */
function tath_add_my_currency( $currencies ) {
    $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
    return $currencies;
}
function tath_add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = ' грн.'; break;
    }
    return $currency_symbol;
}

/*********************************************************/
/******************** SINGLE PRODUCT *********************/
/*********************************************************/

/**
 * Get the product thumbnail, or the placeholder if not set.
 */
function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
    global $product;

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
        
    $img_classes_array = get_post_class();
    $img_classes_array[] = 'img-fluid mx-auto d-block';
    $img_class = implode( ' ', $img_classes_array );
    
    return $product ? $product->get_image( $image_size,  $attr = array( 'class' => $img_class ) ) : '';
}

/** 
 * woocommerce_single_variation()
 * Output placeholders for the single variation.
 */
function woocommerce_single_variation() {
    echo '<div class="py-2 woocommerce-variation single_variation"></div>';
}

/**
 * functions
 * TML WooCommerce Change add to cart text
 */
function tath_custom_woocommerce_product_single_add_to_cart_text() {
        return __( 'Buy', 'tath' );
}

function tath_custom_woocommerce_product_add_to_cart_text() {
    global $product;
    if ( $product->is_in_stock() ) {
        if ( $product->is_type( 'simple' ) ) {
            return __( 'Buy', 'tath' );
        }
        elseif ( $product->is_type( 'variable' ) ) {
            return __( 'Select options', 'woocommerce' );
        }
        elseif ( $product->is_type( 'grouped' ) ) {
            return _x( 'Buy product', 'placeholder', 'woocommerce' );
        }
        elseif ( $product->is_type( 'external' ) ) {
            return __( 'View products', 'woocommerce' );
        }
    }
    else {
        return __( 'Read more', 'woocommerce' );
    }
}

/**
 * TATH Function Single Product widget area
 */
function tath_single_product_widget_area() {
    wc_get_template( 'tath-single-product-widget-area.php' );
}


/*********************************************************/
/****************** CART AND CHECKOUT ********************/
/*********************************************************/

/** 
 * Function for Cart link in header
 * Hooked to action 'tath_header_cart'
 */
function tath_cart_link() {
require_once get_template_directory().'/inc-wc/tath-wc-mini-cart.php';
}
/** 
 * Function for Updating AJAX WooCommerce Cart in header
 * Hooked to filter 'woocommerce_add_to_cart_fragments'
 */
function tath_cart_link_fragment( $fragments ) {
    ob_start();
    tath_cart_link();
//    $fragments['a.cart-contents'] = ob_get_clean();
    $fragments['ul.tath-wc-mini-cart'] = ob_get_clean();
    return $fragments;
}

/** 
 * Add custom css class to WooCommerce checkout fields
 */
function tath_add_css_class_woocommerce_checkout_fields( $fields ) {
    foreach ( $fields as &$fieldset ) {
        foreach ( $fieldset as &$field ) {
            $field['class'][] = 'form-group';
            $field['input_class'][] = 'form-control p-1 ml-1';
            $field['label_class'][] = 'ml-1';
        }
    }
    return $fields;
}

/*********************************************************/
/********************* OTHER WC HOOKS ********************/
/*********************************************************/

/**
 * Adds a demo store banner to the site if enabled CUSTOME tath.
 */
function tath_woocommerce_demo_store() {
    if ( ! is_store_notice_showing() ) {
        return;
    }

    $notice = get_option( 'woocommerce_demo_store_notice' );

    if ( empty( $notice ) ) {
        $notice = __( 'This is a demo store for testing purposes &mdash; no orders shall be fulfilled.', 'woocommerce' );
    }

    $notice_id = md5( $notice );
    echo apply_filters( 'tath_woocommerce_demo_store', '<p class="h4 border p-2 pb-4 mb-0 text-center w-100 fixed-bottom woocommerce-store-notice demo_store"><a href="#" class="d-block py-2 woocommerce-store-notice__dismiss-link"><i class="svg-i times-circle"></i></a>' . wp_kses_post( $notice ) . '</p>', $notice ); // WPCS: XSS ok.
}


