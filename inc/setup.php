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
function tath_localize_theme(){
	load_theme_textdomain( 'tath', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tath_localize_theme' );

/**
 *
 * Theme Support
 *
 */
function tath_add_theme_support() {
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
    //load_theme_textdomain( 'tath-base-theme', get_template_directory() . '/languages' );
	add_theme_support( 'custom-logo', array(
		'height'      => 45,
		'width'       => 180,
		'flex-height' => true,
	) );
    /*
    * Wide bloks in Gutenberg Editor
    */
    add_editor_style( 'editor-style.css' );
    add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'tath_add_theme_support' );

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
function tath_register_nav_menus() {  
	register_nav_menus( array(
		'primary-menu' => 'Primary Menu',
        'polylang-menu' => 'Polylang Menu',
	) );
}
add_action( 'after_setup_theme', 'tath_register_nav_menus' );

/**
 *
 * Register widget area.
 *
 */
function tath_widgets_init() {
    register_sidebar( array(
		'name'          => 'Header top text left',
		'id'            => 'top-header-col-1',
		'description'   => 'Add HTML',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Header top text right',
		'id'            => 'top-header-col-2',
		'description'   => 'Add HTML',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
//        register_sidebar( array(
//		'name'          => 'Catalog Sidebar',
//		'id'            => 'cataog-sidebar',
//		'description'   => 'Add widgets here.',
//		'before_widget' => '<section id="%1$s" class="col-6 col-sm-3 col-xl-2 widget %2$s">',
//		'after_widget'  => '</section>',
//		'before_title'  => '<h4 class="h5 text-capitalize d-table widget-title">',
//		'after_title'   => '</h4>',
//	) );
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
		'name'          => 'Blog Sidebar',
		'id'            => 'blog-sidebar',
		'description'   => 'Add widgets here.',
		'before_widget' => '<nav id="%1$s" class="navbar-expand-md navbar justify-content-center widget %2$s">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h4 class="h5 text-capitalize widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => 'Single Product Widget Area',
		'id'            => 'single-product-widget-area',
		'description'   => 'Add widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Above Footer',
		'id'            => 'above-footer',
		'description'   => 'Add widgets here.',
		'before_widget' => '<div id="%1$s" class="above-footer widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
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
		'name'          => 'Footer text center',
		'id'            => 'footer-2',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Footer text right',
		'id'            => 'footer-3',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'tath_widgets_init' );

/**
 *
 * Custome Fields Support for CPT Slide
 *
**/
function slide_custom_fields() {
	add_post_type_support( 'tath-slide', 'custom-fields');
}
add_action('init', 'slide_custom_fields');
