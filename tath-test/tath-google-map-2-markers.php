<?php
/**
 * [map zoom="15" lat="49.8252481" lng="23.9590636" marker1lat="49.827766" marker1lng="23.951339" marker1title="МАГАЗИН Колірбур, м. Львів, вул. Городоцька, 224" marker2lat="49.8214278" marker2lng="23.9696201" marker2title="САЛОН Колірбуд, м.Львів, вул.Любінська,104"]
 * google map js api 111111111111111111111111111111111111111
**/

add_shortcode( 'map', 'tath_map' );
function tath_map($atts){
    global $tath_map_array;
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
			'key' => '111111111111111111111111111111111111111'
		), $atts );
    extract( $atts );
    $tath_map_array = array(
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