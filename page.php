<?php
/**
 * Basic page template
 */

get_header(); ?>
<?php get_template_part( 'template-parts/breadcrumbs'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
            endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; 
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();