<?php
/*
 * =====================
 * Custome TML functions
 * =====================
 */

/**
 * Excerpt Hooks
 */
function tml_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'tml_excerpt_length');


function tml_excerpt_more($more) {
	global $post;
	return '<a href="'. get_permalink($post->ID) . '"> '. sprintf( __( 'Continue reading %s' ), '') .'</a>';
}
add_filter('excerpt_more', 'tml_excerpt_more');

/**
 * pagination
 */ 
if (!function_exists('tml_pagination')):
	function tml_pagination() {
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
if ( ! function_exists( 'tml_the_custom_logo' ) ) :
function tml_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

add_filter( 'get_custom_logo',  'tml_custom_logo_url' );
function tml_custom_logo_url ( $html ) {

$custom_logo_id = get_theme_mod( 'custom_logo' );
$url = network_site_url();
$html = sprintf( '<a href="%1$s" class="navbar-brand custom-logo-link" rel="home" 
itemprop="url">%2$s</a>',
    esc_url( $url  ),
    wp_get_attachment_image( $custom_logo_id, 'full', false, array(
        'class'    => 'custom-logo img-fluid',
    ) )
);
return $html;    
}

/**
 * Query WooCommerce activation
 */ 
function tml_is_woocommerce_activated() {
    return class_exists( 'WooCommerce' ) ? true : false;
}




