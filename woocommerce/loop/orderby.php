<?php
/**
 * Show options for ordering
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 * v2.2.0
 * add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<form class="woocommerce-ordering d-flex justify-content-md-end" method="get">
	<select name="orderby" class="orderby justify-content-end custom-select rounded-0 pt-0 pb-0 mb-3">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit' ) ); ?>
</form>
