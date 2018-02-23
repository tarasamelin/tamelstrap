<?php
/*
* Enqueue scripts and styles.
*/
function tml_enqueue_scripts_styles() {

/**
* ------- SCRIPTS --------
*/   
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
wp_enqueue_script( 'jquery' );
    
wp_register_script( 'jquery-3.2.1', get_template_directory_uri().'/assets/js/jquery-3.2.1.min.js', array(), '3.2.1', true );
wp_enqueue_script( 'jquery-3.2.1' );
    
wp_register_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array('jquery-3.2.1'), NULL, true );
wp_enqueue_script( 'popper');

wp_register_script( 'bootstrap-4-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('popper'), NULL, true );
wp_enqueue_script( 'bootstrap-4-js' );

//    if ( has_post_format( 'gallery' ) ) {
//        wp_register_script( 'lightbox2', get_template_directory_uri().'/assets/js/lightbox.min.js', array('jquery-3.2.1'), NULL, true );
//        wp_enqueue_script( 'lightbox2');
//        wp_register_script( 'lightbox-option', get_template_directory_uri().'/assets/js/lightbox-option.js', array('lightbox2'), NULL, true );
//        wp_enqueue_script( 'lightbox-option');

        wp_register_script( 'photoswipe', get_template_directory_uri().'/assets/js/photoswipe.min.js', array('jquery-3.2.1'), '4.1.1', true );
        wp_enqueue_script( 'photoswipe');
        wp_register_script( 'photoswipe-ui-default', get_template_directory_uri().'/assets/js/photoswipe-ui-default.min.js', array('photoswipe'), '4.1.1', true );
        wp_enqueue_script( 'photoswipe-ui-default');
        wp_register_script( 'photoswipe-init', get_template_directory_uri().'/assets/js/photoswipe-init.js', array('photoswipe-ui-default'), '4.1.1', true );
        wp_enqueue_script( 'photoswipe-init');
    
        wp_register_script( 'masonry', get_template_directory_uri().'/assets/js/masonry.pkgd.min.js', array('jquery-3.2.1'), '4.2.0', true );
        wp_enqueue_script('masonry');
        wp_register_script( 'imagesloaded-js', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array('masonry'), '4.1.4', true );
        wp_enqueue_script( 'imagesloaded-js');
        wp_register_script( 'masonry-init', get_template_directory_uri().'/assets/js/masonry-init.js', array('masonry'), NULL, true );
        wp_enqueue_script( 'masonry-init');
//    }
wp_register_script( 'tml', get_template_directory_uri().'/assets/js/tml.js', array( 'bootstrap-4-js' ), NULL, true );
wp_enqueue_script( 'tml');
    

    
    
/**
* -------- STYLES --------
*/
//wp_enqueue_style( 'fontawesome-5', get_template_directory_uri().'/assets/icons/fontawesome-5/css/fontawesome-all.min.css', array(), '5.0.1', false );
wp_enqueue_style( 'bootstrap-4-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.0.0-beta.2', false );
wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css', array('bootstrap-4-css'), NULL, false );
wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css', array('bootstrap-4-css'), NULL, false );
wp_enqueue_style( 'fonts', get_template_directory_uri().'/assets/fonts/fonts.css', array('bootstrap-4-css'), NULL, false );
wp_enqueue_style( 'wc-star-rating-css', get_template_directory_uri().'/assets/css/wc-star-rating.css', array('fonts'), NULL, false );
wp_enqueue_style( 'custom-select-css', get_template_directory_uri().'/assets/css/custom-select.css', array('main'), NULL, false );

//    if ( has_post_format( 'gallery' ) ) {
        wp_enqueue_style( 'lightbox2-css', get_template_directory_uri().'/assets/css/lightbox.min.css', array('bootstrap-4-css'), NULL, false );
    
        wp_enqueue_style( 'photoswipe-css', get_template_directory_uri().'/assets/css/photoswipe.css', array('bootstrap-4-css'), NULL, false );
        wp_enqueue_style( 'photoswipe-default-skin', get_template_directory_uri().'/assets/css/photoswipe-default-skin/default-skin.css', array('photoswipe-css'), '4.1.1', false );
    
//        wp_enqueue_style( 'masonry-css', get_template_directory_uri().'/assets/css/masonry.css', array('main'), NULL, false );
//    }

}
add_action( 'wp_enqueue_scripts', 'tml_enqueue_scripts_styles' );


/**
* Remove woocommerce styles and scripts.
*/
add_filter('woocommerce_enqueue_styles','__return_empty_array');

/**
* Remove each style one by one
*/
//add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
//function jk_dequeue_styles( $enqueue_styles ) {
//	unset( $enqueue_styles['woocommerce-general'] );
//	unset( $enqueue_styles['woocommerce-layout'] );
//	unset( $enqueue_styles['woocommerce-smallscreen'] );
//	return $enqueue_styles;
//}






