<?php
/**
 * TML WooCommerce Template
 * Functions for the templating system.
 */

/**
 * Funcitons row open and row close
 */
function tml_row_open() {
    echo '<div class="row">';
}

function tml_row_close() {
    echo '</div>';
}

/**
 * Funciton
 * $cols contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 */
function tml_loop_shop_per_page( $cols ) {
  $cols = 12;
  return $cols;
}

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
 * Show the product title in the product loop. By default this is an H2.
 */
function woocommerce_template_loop_product_title() {
    echo '<h2 class="text-center h5 mb-1 mt-1 woocommerce-loop-product__title">' . get_the_title() . '</h2>';
}

/**
 * Insert the opening anchor tag for products in the loop.
 */
function tml_woocommerce_template_loop_product_link_open() {
    global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    
	echo '<a href="' . esc_url( $link ) . '" class="text-secondary d-block woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

/**
 * bootstrap row and col for woocommerce_before_shop_loop function
 */
function tml_woocommerce_before_shop_loop_row_open() {
    echo '<div class="row mb-4 mb-md-0 ">';
}

function tml_woocommerce_before_shop_loop_row_close() {
    echo '</div>';
}

function tml_woocommerce_before_shop_loop_col_open() {
    echo '<div class="col-md-6">';
}

function tml_woocommerce_before_shop_loop_col_close() {
    echo '</div>';
}

/**
 * Output the WooCommerce Breadcrumb.
 */
function woocommerce_breadcrumb( $args = array() ) {
    $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
        'delimiter'   => '&nbsp;&#47;&nbsp;',
        'wrap_before' => '<nav class="pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0 woocommerce-breadcrumb">',
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
function tml_woocommerce_output_content_wrapper_with_sidebar() {
    wc_get_template( 'global/wrapper-start-with-sidebar.php' );
}

/**
 * Output Related Products count filter
 */
function woocommerce_output_related_products() {
    $args = array(
        'posts_per_page' 	=> 4,
        'columns' 			=> 4,
        'orderby' 			=> 'rand', // @codingStandardsIgnoreLine.
    );
woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

/** woocommerce_single_variation()
 * Output placeholders for the single variation.
 */
function woocommerce_single_variation() {
    echo '<div class="border border-left-0 border-right-0 mb-3 pt-2 pb-2 woocommerce-variation single_variation"></div>';
}

/** 
 * Add custom css class to WooCommerce checkout fields
 */
function tml_add_css_class_woocommerce_checkout_fields( $fields ) {
    foreach ( $fields as &$fieldset ) {
        foreach ( $fieldset as &$field ) {
            $field['class'][] = 'form-group';
            $field['input_class'][] = 'form-control rounded-0 p-1 ml-1';
            $field['label_class'][] = 'ml-1';
        }
    }
    return $fields;
}


/** 
 * Function for Cart link in header
 * Hooked to action 'tml_header_cart'
 */
function tml_cart_link() {
    ?>

        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View cart', 'woocommerce' ); ?>">
        <i class="fa fa-shopping-cart"></i>
        <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
        <span class="text-info count">(<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>)</span>
        <span class="text-dark amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
        <?php endif; ?> 
        </a>

    <?php
}
/** 
 * Function for Updating AJAX WooCommerce Cart in header
 * Hooked to filter 'woocommerce_add_to_cart_fragments'
 */
function tml_cart_link_fragment( $fragments ) {
    ob_start();
    tml_cart_link();
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
	
			
		





