<?php
/**
 * Sidebar woocommerce
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
<div id="secondary" class="widget-area col-lg-3 col-md-4 <?php if( is_product() ){echo 'order-last order-md-first ';} ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary --><!-- col -->
<?php endif; ?>
