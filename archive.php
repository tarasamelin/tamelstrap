<?php
/**
 * The Archive template
 */
 
get_header(); ?>

<div class="row">

    <?php get_sidebar(); ?>

	<div id="primary" class="col-12 content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
	    <div class="row justify-content-center">
			<?php
			while ( have_posts() ) : the_post();
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