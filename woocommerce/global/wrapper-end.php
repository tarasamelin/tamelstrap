<?php
/**
 * Content wrappers
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-end.php.
 * add_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();
?>
		</main><!-- #main -->
	</div><!-- #primary -->