<?php
/**
 * Content wrappers
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 * add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
	<div id="primary" class="content-area col-lg-9 col-md-8">
<?php else: ?>
	<div id="primary" class="content-area col-12">
<?php endif; ?>
		<main id="main" class="site-main" role="main">