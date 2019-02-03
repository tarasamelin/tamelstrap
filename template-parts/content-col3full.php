<?php
/**
 * Template part for displaying posts in category in 1 coll
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>">
        <?php 
        the_post_thumbnail('medium_large', array(
            'class' => 'img-fluid border d-block',
            'alt' => 'Responsive image',
        )); 
        ?>
    <?php echo '<div class="py-0 px-1 position-absolute date">'.get_the_date().'</div>'; ?>
    </a>
	<header class="mt-1 entry-header">
        <?php the_title( '<h3 class="h4 mb-0 entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header> <!-- .entry-header -->
	<div class="entry-content text-justify">
        <?php the_excerpt(); ?>
	</div><!-- .entry-content -->
    <?php echo '<a href="'. get_permalink($post->ID) . '" class="btn btn-outline-secondary d-table rounded-0 mb-3 mt-1"> '. sprintf( __( 'Continue reading %s' ), '') .'</a>'; ?>

</article><!-- #post-<?php the_ID(); ?> -->