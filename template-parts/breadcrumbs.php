<?php
/*
* Template part for breadcrumbs
*/

defined( 'ABSPATH' ) || exit;
?>

<!-- breadcrumbs if woocommerce activated -->
<?php if( tath_is_woocommerce_activated() ): ?>
    
    <!-- breadcrumbs for woocommerce -->
    <?php if ( is_woocommerce() ) : do_action( 'tath_woocommerce_breadcrumbs_full_width' )  ?>
    <!-- breadcrumbs for not woocommerce -->
    <?php elseif ( !is_woocommerce() && !is_front_page() ): ?>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="bg-white text-primary justify-content-center px-1 py-2 mb-3 breadcrumb">
            <?php get_template_part( 'template-parts/breadcrumbs', 'blog' ); ?>
        </ol>
    </nav>
    <?php endif; ?>
    
<!-- breadcrumbs if woocommerce NOT activated -->
<?php else: ?>
    
    <?php if (!is_front_page() ): ?>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="bg-white text-primary justify-content-center px-1 py-2 mb-3 breadcrumb">
            <?php get_template_part( 'template-parts/breadcrumbs', 'blog' ); ?>
        </ol>
    </nav>
    <?php endif; ?>

<?php endif; ?>