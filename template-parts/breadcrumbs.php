<?php
/*
* Template part for breadcrumbs
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- breadcrumbs for woocommerce -->
<?php if ( is_woocommerce() ): do_action( 'tml_woocommerce_breadcrumbs_full_width' ); 
?>

<!-- breadcrumbs for not woocommerce -->
<?php elseif ( !is_woocommerce() && !is_front_page() ): ?>
<nav aria-label="breadcrumb" role="navigation">
<ol class="bg-white text-secondary justify-content-center px-1 py-2 mb-3 breadcrumb">

<!-- breadcrumbs for blog page -->
    <?php if ( is_home() && !is_front_page() ) : ?>
        <li class="breadcrumb-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php // echo get_the_title( get_option('page_on_front') ); ?><?php echo _x( 'Home', 'breadcrumb', 'woocommerce' ); ?></a>
        </li>
        <?php
            $posts_page = get_post( get_option( 'page_for_posts') );
            $title_blog_page = ' ' . $posts_page->post_title . ' ';
        ?>
        <li class="breadcrumb-item active"><?php echo $title_blog_page ?></li>

<!-- breadcrumbs for post category -->
    <?php elseif ( is_category() ) : ?>
        <li class="breadcrumb-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php echo _x( 'Home', 'breadcrumb', 'woocommerce' ); ?>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" rel="home">
            <?php $posts_page = get_post( get_option( 'page_for_posts') );
            echo $title_blog_page = ' ' . $posts_page->post_title . ' '; ?>
            </a>
        </li>
        <li class="breadcrumb-item active"><?php single_cat_title(); ?></li>
    
<!-- breadcrumbs for single post -->
    <?php elseif (  is_singular('post') ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo _x( 'Home', 'breadcrumb', 'woocommerce' ); ?></a></li>
        <li class="breadcrumb-item">
            <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" rel="home">
            <?php $posts_page = get_post( get_option( 'page_for_posts') );
            echo $title_blog_page = ' ' . $posts_page->post_title . ' '; ?>
            </a>
        </li>
        <li class="breadcrumb-item"><?php the_category(' & '); ?></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>
<!-- breadcrumbs for page (not child) -->
    <?php elseif ( ( is_page() && !is_front_page() && !tml_is_child_page() ) || is_404() || is_search() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo _x( 'Home', 'breadcrumb', 'woocommerce' ); ?></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>

<!-- breadcrumbs for child page -->
    <?php elseif ( tml_is_child_page() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo _x( 'Home', 'breadcrumb', 'woocommerce' ); ?></a></li>
        <?php
        $parent = get_post($post->post_parent);
        $parent_title = get_the_title($parent);
        $parent_permalink = get_the_permalink($parent);
        ?>
        <li class="breadcrumb-item"><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>
    <?php endif; ?>

    </ol>
</nav>
<?php endif; ?>
