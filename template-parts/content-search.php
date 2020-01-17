<?php
/**
* Template part for displaying search results 
*/

defined( 'ABSPATH' ) || exit;
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	<div class="entry-summary">
	<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->
