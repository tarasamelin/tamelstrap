<?php
/**
 * Template part for displaying posts in category in 1 coll
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header> <!-- .entry-header -->
    <a href="<?php the_permalink(); ?>">
        <?php 
        the_post_thumbnail('medium_large', array(
            'class' => 'img-fluid border',
            'alt' => 'Responsive image',
        )); 
        ?>
    </a>
	<div class="entry-content">
        <?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->