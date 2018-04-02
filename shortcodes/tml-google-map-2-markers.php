<?php
/**
 * [map zoom="15" lat="49.8252481" lng="23.9590636" marker1lat="49.827766" marker1lng="23.951339" marker1title="МАГАЗИН Колірбур, м. Львів, вул. Городоцька, 224" marker2lat="49.8214278" marker2lng="23.9696201" marker2title="САЛОН Колірбуд, м.Львів, вул.Любінська,104"]
 * Googel Map API KEY - AIzaSyATHZGwZUPxAsYkjONt_WKza9-ad-90amg
 * Googel Static Map API KEY - AIzaSyDD9DzlVLAm0_t7eA6BkHvHbu1HU4ncUu0
 * new google map js api AIzaSyC1d-FtX6E4pTcAvS-gkrIpyIFiqZa2Eoc
**/

add_shortcode( 'map', 'tml_map' );
function tml_map($atts){
    global $tml_map_array;
	$atts = shortcode_atts(
		array(
			'lat' => '49.8277655',
			'lng' => '23.9491504',
            
            'marker1title' => '',
			'marker1lat' => '',
			'marker1lng' => '',
            
            'marker2title' => '',
			'marker2lat' => '',
			'marker2lng' => '',
            
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
        
        'marker1title' => $marker1title,
        'marker1lat' => $marker1lat,
        'marker1lng' => $marker1lng,
        
        'marker2title' => $marker2title,
        'marker2lat' => $marker2lat,
        'marker2lng' => $marker2lng,
        
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