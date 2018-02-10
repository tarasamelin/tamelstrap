<?php
/**
* Template part for displaying content in page.php
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--		<?php the_title( '<h1 class="h3 text-secondary entry-title">', '</h1>' ); ?>-->
        <?php the_content(); ?>
</article><!-- #post-## -->
