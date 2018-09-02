<?php
/**
 * ========================
 *      Theme SetUp
 * ========================
 */

/**
 *
 * Load Theme Textdomain (Localize theme)
 *
 */
function tml_localize_theme(){
	load_theme_textdomain( 'tamelstrap', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tml_localize_theme' );

/**
 *
 * Theme Support
 *
 */
function tml_add_theme_support() {
    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support('post-formats', array('gallery'));
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'widgets',
    ) );
    load_theme_textdomain( 'tml-base-theme', get_template_directory() . '/languages' );
	add_theme_support( 'custom-logo', array(
		'height'      => 45,
		'width'       => 235,
		'flex-height' => true,
	) );
}
add_action( 'after_setup_theme', 'tml_add_theme_support' );

/**
 *
 * WooCommerce Support
 *
 */
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

/**
 *
 * Register Nav Menus
 *
 */
function tml_register_nav_menus() {  
	register_nav_menus( array(
		'primary-menu' => 'Primary Menu',
	) );
}
add_action( 'after_setup_theme', 'tml_register_nav_menus' );

/**
 *
 * Register widget area.
 *
 */
function tml_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets here.',
		'before_widget' => '<section id="%1$s" class="mb-4 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => 'Footer text left',
		'id'            => 'footer-1',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Footer text right',
		'id'            => 'footer-2',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'tml_widgets_init' );


