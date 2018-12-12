<?php
/**
 * The sidebar containing the main widget area.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="secondary" class="widget-area order-last order-md-first col-lg-3 col-md-4" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary --><!-- col -->