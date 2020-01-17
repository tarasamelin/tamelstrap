<?php
/*
 * =====================
 * Custome TML functions
 * =====================
 */

 /**
  * Query WooCommerce activation
  */
 function tath_is_woocommerce_activated() {
     return class_exists( 'WooCommerce' ) ? true : false;
 }

 /**
  * Check is Child Page
  */
 function tath_is_child_page() {
     global $post;
     if( is_page() && ( $post->post_parent ) ){ return true; }
     else { return false; }
 }
 add_action( 'init', 'tath_is_child_page' );

/**
* Excerpt Hooks Read More
*/
function tath_excerpt_more($more) {
    global $post;
    //return '<a href="'. get_permalink($post->ID) . '"> '. sprintf( __( 'Continue reading %s' ), '') .'</a>';
    return '';
}
add_filter('excerpt_more', 'tath_excerpt_more');
 /**
  * Child Page Loop excerpt Length
  */
function tath_child_page_excerpt_length($length) {
     global $post;
     if( tath_is_child_page() ){
 	return 50;
     }
     else {
 	return 20;
     }
}
add_filter('excerpt_length', 'tath_child_page_excerpt_length');

/**
 * pagination
 */
if (!function_exists('tath_pagination')):
	function tath_pagination() {
		global $wp_query;
		$big = 999999999;
		echo '<div class="page-links d-table mx-auto mb-4 h5">';
		echo paginate_links( array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => true,
        'prev_text'    => '&larr;',
		'next_text'    => '&rarr;',
		));
		echo '</div>';
	}
endif;

/**
 * Remove p tags from text widgets
 */
remove_filter('widget_text_content', 'wpautop');

/**
 * Displays the optional CUSTOME LOGO.
 * Does nothing if the custom logo is not available.
 */
if ( ! function_exists( 'tath_the_custom_logo' ) ) :
function tath_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

add_filter( 'get_custom_logo',  'tath_custom_logo_url' );
function tath_custom_logo_url ( $html ) {

$custom_logo_id = get_theme_mod( 'custom_logo' );
    $url = esc_url( home_url( '/' ) );
//$url = network_site_url();
//if(get_site_option( 'WPLANG' ) == en_EN) {}
$html = sprintf( '<a href="%1$s" class="navbar-brand custom-logo-link" rel="home"
itemprop="url">%2$s</a>',
    esc_url( $url  ),
    wp_get_attachment_image( $custom_logo_id, 'full', false, array(
        'class'    => 'custom-logo img-fluid',
        'itemprop'    => 'image',
    ) )
);
return $html;
}

/**
 * Remove Archive: Category: etc from Breadcrumbs
 */
//add_filter('get_the_archive_title', function( $title ){
//	return preg_replace('~^[^:]+: ~', '', $title );
//});

/**
 * Allow Shortcode custom HTML widget
 */
add_filter( 'widget_text', 'do_shortcode' );


