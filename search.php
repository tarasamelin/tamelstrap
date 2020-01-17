<?php
/**
 * The Search page template
 */
 
get_header(); ?>
    
<div class="row">

    <?php get_sidebar(); ?>

	<div id="primary" class="content-area col-12">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
	    <div class="row justify-content-center">
			<?php
			while ( have_posts() ) : the_post();
//                echo '<div class="col-sm-12 col-lg-6">';
                echo '<div class="col-sm-6 col-lg-4">';
                    get_template_part( 'template-parts/content', 'col3full' );
                echo '</div>';
			endwhile;
        echo '</div>';
            tath_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- row -->

<?php
get_footer();