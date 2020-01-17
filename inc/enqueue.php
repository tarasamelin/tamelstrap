<?php
/*
* Enqueue scripts and styles.
*/
function tath_enqueue_scripts_styles() {

/**
 * Enqueue scripts
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

wp_register_script( 'tath', get_template_directory_uri().'/assets/js/tath.js', array( 'bootstrap-4-js' ), NULL, true );
wp_enqueue_script( 'tath');
      
/**
 * Enqueue styles
 */
wp_enqueue_style( 'bootstrap-4-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.1.3', false );
wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css', array('bootstrap-4-css'), NULL, false );
wp_enqueue_style( 'color', get_template_directory_uri().'/assets/css/color.css', array('main'), NULL, false );
wp_enqueue_style( 'svg-i', get_template_directory_uri().'/assets/css/svg-i.css', array('color'), NULL, false );
wp_enqueue_style( 'fonts', get_template_directory_uri().'/assets/fonts/fonts.css', array('bootstrap-4-css'), NULL, false );
wp_enqueue_style( 'wc-star-rating-css', get_template_directory_uri().'/assets/css/wc-star-rating.css', array('fonts'), NULL, false );
wp_enqueue_style( 'custom-select-css', get_template_directory_uri().'/assets/css/custom-select.css', array('main'), NULL, false );

} /* Enqueue scripts and styles. CLOSE*/

add_action( 'wp_enqueue_scripts', 'tath_enqueue_scripts_styles' );

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






