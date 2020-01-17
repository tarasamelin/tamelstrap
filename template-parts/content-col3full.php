<?php
/**
 * Template part for displaying posts in 3 colls
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>">
        
        <?php 
        $post_full_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $post_full_img_src_resized = aq_resize( $post_full_img_url, 420, 420, true, true, true );
        ?>
        <?php if( $post_full_img_src_resized ) : ?>
        <img width="420" height="240" src="<?php echo $post_full_img_src_resized;?>" class="border img-fluid d-block w-100 wp-post-image" alt="<?php echo the_title();?>">
        <?php endif; ?>
        
    <?php echo '<div class="py-0 px-1 position-absolute date">'.get_the_date().'</div>'; ?>
    </a>
	<header class="mt-1 entry-header">
        <?php the_title( '<h3 class="h4 mb-0 entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header>
    
	<div class="entry-content text-justify">
        <?php the_excerpt(); ?>
	</div>
    <?php echo '<a href="'. get_permalink($post->ID) . '" class="btn btn-outline-primary d-table mb-3 mt-1"> '. sprintf( __( 'Continue reading %s' ), '') .'</a>'; ?>

</article><!-- #post-<?php the_ID(); ?> -->