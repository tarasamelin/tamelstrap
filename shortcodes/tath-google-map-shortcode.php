<?php
/**
 * Shortcode Google map [map center="" width="600" height="300" zoom="13"]
 * google map js api 111111111111111111111111111111111111111
**/

add_shortcode( 'map', 'tath_map' );
//$tath_map_array = array();
function tath_map($atts){
    global $tath_map_array;
	$atts = shortcode_atts(
		array(
			'lat' => '50.4507781',
			'lng' => '30.5214974',
			'width' => '1140px',
			'height' => '400px',
			'zoom' => 16,
			'enablescrollwheel' => false,
			'disablecontrols' => false,
			'key' => '11111111111111111111111111111111111111111'
		), $atts );
    extract( $atts );
    $tath_map_array = array(
        'lat' => $lat,
        'lng' => $lng,
        'width' => $width,
        'height' => $height,
        'zoom' => $zoom,
        'enablescrollwheel' => $enablescrollwheel,
        'disablecontrols' => $disablecontrols,
        'key' => $key
    );
    
add_action( 'wp_footer', 'tath_map_styles_scripts' );
    ob_start(); ?>
       <div id="tath-google-map" class="border" style="width:100%; height: 400px;"></div>
    <?php
    wp_print_scripts('google-map-init-js');
    return ob_get_clean();
}

function tath_map_styles_scripts(){
    global $tath_map_array;
    wp_register_script( 'google-map-api-js', 'https://maps.google.com/maps/api/js?&callback=initMap&key='.sanitize_text_field($tath_map_array['key']), array('tml'), NULL, true );
    wp_register_script( 'google-map-init-js', get_template_directory_uri().'/assets/js/google-map-init.js', array('google-map-api-js'), NULL, true );
    wp_enqueue_script( 'google-map-api-js');
    wp_enqueue_script( 'google-map-init-js');
    wp_localize_script( 'google-map-init-js', 'TmlMapObj', $tath_map_array );
}
