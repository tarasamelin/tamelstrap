<?php
/**
 * The template for displaying the footer
 */
?>
<?php if ( is_active_sidebar( 'above-footer' ) ) {
echo '<div class="container-fluid"><div class="justify-content-center row m-0">';
    dynamic_sidebar( 'above-footer' ); 
echo '</div></div>'; } ?>

</div><!-- #content -->

<a class="d-none totopbtn"><i class="svg-i arrow-circle-up"></i></a>

    <footer id="colophon" class="site-footer pb-4 pt-4 mt-3 bg-light" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">

        <div class="container-fluid">
            <div class="row">
                
                <?php if ( is_active_sidebar( 'footer-2' ) ): ?>
                <div class="col-xl-4 text-center text-xl-left pt-2 site-info footer-1">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></a>
                </div>
                <div class="col-xl-4 text-center site-info footer-2">
                    <div class="justify-content-center row p-0 m-0">
                    <?php dynamic_sidebar( 'footer-2' );  ?>
                    </div>
                </div>
                <div class="col-xl-4 text-center text-xl-right pt-2 site-info footer-3">
                   <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <?php else: ?>
                <div class="site-info footer-1 col-md-4 text-md-left text-sm-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></a>
                </div>
                <div class="footer-2 col-md-8 text-md-right text-sm-center">
                   <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <?php endif; ?>
                
            </div> <!-- row -->
        </div> <!-- container -->

    </footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>