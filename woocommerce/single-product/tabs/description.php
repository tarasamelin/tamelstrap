<?php
/**
 * Description tab
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) ) );
?>

<?php if ( $heading ) : ?>
<!--  <h2 class="h4 mt-2"><?php echo $heading; ?></h2>-->
<?php endif; ?>
<?php the_content(); ?>