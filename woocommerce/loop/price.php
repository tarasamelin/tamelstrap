<?php
/**
 * Loop Price
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 * v1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price text-center btn-block card-link"><?php echo $price_html; ?></span>
<?php endif; ?>
