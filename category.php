<?php
/**
 * The Archive template
 */
 
get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs'); ?>
    
<div class="row">

    <?php get_sidebar(); ?>

	<div id="primary" class="content-area col-lg-9 col-md-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
	    <div class="row">
			<?php
			while ( have_posts() ) : the_post();
                echo '<div class="col-sm-12 col-lg-6">';
                    get_template_part( 'template-parts/content', 'col2' );
                echo '</div>';
			endwhile;
	   echo '</div>';
            tml_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- row -->

<?php
get_footer();