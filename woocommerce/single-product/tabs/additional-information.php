<?php
/**
 * Additional Information tab
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;

$heading = esc_html( apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) ) );
?>

<?php if ( $heading ) : ?>
<!--	<h2 class="h4 mt-2"><?php echo $heading; ?></h2>-->
<?php endif; ?>
<?php do_action( 'woocommerce_product_additional_information', $product ); ?>