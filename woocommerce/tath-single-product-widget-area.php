<?php
/*
 * TATH Single Product widget area tmplate
 */
if ( is_active_sidebar( 'single-product-widget-area' ) ): ?>
    <div class="py-2 my-2 tath_single_product_widget_area">
            <?php dynamic_sidebar( 'single-product-widget-area' ); ?>
    </div>
<?php endif;