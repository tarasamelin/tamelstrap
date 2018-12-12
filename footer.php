<?php
/**
 * The template for displaying the footer
 */
?>
</div><!-- #content -->
<a class="d-none totopbtn"><i class="fas fa-arrow-circle-up h1" aria-hidden="true"></i></a>
    <footer id="colophon" class="site-footer bg-light pb-3 pt-3 mt-4 border border-right-0 border-left-0 border-bottom-0" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
<!--       <nav class="navbar navbar-expand-lg pb-3 pt-3">-->
        <div class="container-fluid">
            <div class="row">
                <div class="site-info footer-1 col-md-4 text-md-left text-sm-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></a>
                </div><!-- .site-info -->
                <div class="footer-2 col-md-8 text-md-right text-sm-center">
                   <?php dynamic_sidebar( 'footer-2' ); ?>
                </div><!-- .site-info -->
            </div> <!-- row -->
        </div> <!-- container -->
<!--        </nav>-->
    </footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>