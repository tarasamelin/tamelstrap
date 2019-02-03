<?php
/**
 * The Archive posts template
 */
 
get_header(); ?>

<div class="row">

    <?php get_sidebar(); ?>

<!--	<div id="primary" class="content-area col-lg-9 col-md-8">-->
	<div id="primary" class="content-area col-12">
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
//                echo '<div class="col-sm-12 col-lg-6">';
                echo '<div class="col-sm-6 col-lg-4">';
                    get_template_part( 'template-parts/content', 'col3full' );
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