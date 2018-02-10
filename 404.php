<?php
/**
 * The main template file
 */

get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs'); ?>
<div class="row">

<?php get_sidebar(); ?>

	<div id="primary" class="content-area col-lg-9 col-md-8">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
					<h1 class="text-center page-title">404</h1>
					<p class="h2 text-center"><?php _e( 'Sorry, no such page.') ?></p>
					<p class="h4 mb-5 text-center"><?php _e( 'Are you sure it exists?' ) ?></p>
					<div class="d-flex justify-content-center"><?php get_search_form(); ?></div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- row -->

<?php get_footer();








