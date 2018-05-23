<?php
/*
* Template part for breadcrumbs
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( is_home() && !is_front_page() ) : ?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
        <?php
            $posts_page = get_post( get_option( 'page_for_posts') );
            $title_blog_page = ' ' . $posts_page->post_title . ' ';
        ?>
        <li class="breadcrumb-item active"><?php echo $title_blog_page ?></li>
    </ol>
</nav>

<?php elseif ( is_category() ) : ?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
<!--        <li class="breadcrumb-item active"><?php the_archive_title(); ?></li>-->
        <li class="breadcrumb-item active"><?php single_cat_title(); ?></li>
    </ol>
</nav>

<?php elseif (  is_singular('post') ) : ?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
        <li class="breadcrumb-item"><?php the_category(' & '); ?></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>
    </ol>
</nav>

<?php elseif ( ( is_page() && !is_front_page() && !tml_is_child_page() ) || is_404() || is_search() ) : ?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>
    </ol>
</nav>

<?php elseif ( tml_is_child_page() ) : ?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-3 border border-right-0 border-left-0 border-top-0">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_the_title( get_option('page_on_front') ); ?></a></li>
        <?php
        $parent = get_post($post->post_parent);
        $parent_title = get_the_title($parent);
        $parent_permalink = get_the_permalink($parent);
        ?>
        <li class="breadcrumb-item"><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>
    </ol>
</nav>

<?php endif; ?>
