<?php
/**
 * Shortcode Google map [map center="" width="600" height="300" zoom="13"]
 * Googel Map API KEY - AIzaSyATHZGwZUPxAsYkjONt_WKza9-ad-90amg
 * Googel Static Map API KEY - AIzaSyDD9DzlVLAm0_t7eA6BkHvHbu1HU4ncUu0
 * new google map js api AIzaSyC1d-FtX6E4pTcAvS-gkrIpyIFiqZa2Eoc
**/

add_shortcode( 'map', 'tml_map' );
//$tml_map_array = array();
function tml_map($atts){
    global $tml_map_array;
	$atts = shortcode_atts(
		array(
			'lat' => '50.4507781',
			'lng' => '30.5214974',
			'width' => '1140px',
			'height' => '400px',
			'zoom' => 16,
			'enablescrollwheel' => false,
			'disablecontrols' => false,
			'key' => 'AIzaSyC1d-FtX6E4pTcAvS-gkrIpyIFiqZa2Eoc'
		), $atts );
    extract( $atts );
    $tml_map_array = array(
        'lat' => $lat,
        'lng' => $lng,
        'width' => $width,
        'height' => $height,
        'zoom' => $zoom,
        'enablescrollwheel' => $enablescrollwheel,
        'disablecontrols' => $disablecontrols,
        'key' => $key
    );
    
add_action( 'wp_footer', 'tml_map_styles_scripts' );
    ob_start(); ?>
       <div id="tml-google-map" class="border" style="width:100%; height: 400px;"></div>
    <?php
    wp_print_scripts('google-map-init-js');
    return ob_get_clean();
}

function tml_map_styles_scripts(){
    global $tml_map_array;
    wp_register_script( 'google-map-api-js', 'https://maps.google.com/maps/api/js?&callback=initMap&key='.sanitize_text_field($tml_map_array['key']), array('tml'), NULL, true );
    wp_register_script( 'google-map-init-js', get_template_directory_uri().'/assets/js/google-map-init.js', array('google-map-api-js'), NULL, true );
    wp_enqueue_script( 'google-map-api-js');
    wp_enqueue_script( 'google-map-init-js');
    wp_localize_script( 'google-map-init-js', 'TmlMapObj', $tml_map_array );
}