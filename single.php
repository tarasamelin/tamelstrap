<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!--<div class="row">-->
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			//the_post_navigation();
            the_tags( '<div class="tags py-2 ">#',' #','</div>');
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>
<!--</div>-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();