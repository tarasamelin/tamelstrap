<?php
/**
 * Content wrappers
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 * add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
 * @version     3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$template = wc_get_theme_slug_for_templates();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">