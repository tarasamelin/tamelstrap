<?php
/**
 * The sidebar containing the main widget area.
 */

defined( 'ABSPATH' ) || exit;
?>

<!--<div id="secondary" class="widget-area order-last order-md-first col-lg-3 col-md-4" itemscope itemtype="https://schema.org/WPSideBar">-->
<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
<div id="secondary-blog" class="mb-3 col-12 widget-area" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
</div><!-- #secondary --><!-- col -->
<?php endif; ?>