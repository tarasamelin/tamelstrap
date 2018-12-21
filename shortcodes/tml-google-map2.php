<?php
/**
 * [map zoom="15" lat="49.8252481" lng="23.9590636" marker1lat="49.827766" marker1lng="23.951339" marker1title="МАГАЗИН Колірбур, м. Львів, вул. Городоцька, 224" marker2lat="49.8214278" marker2lng="23.9696201" marker2title="САЛОН Колірбуд, м.Львів, вул.Любінська,104"]
 * google map js api 111111111111111111111111111111111111111
**/

add_shortcode( 'map2', 'tml_map2' );
function tml_map2($atts2){
    global $tml_map_array2;
	$atts2 = shortcode_atts(
		array(
			'lat' => '49.8277655',
			'lng' => '23.9491504',
            
            'marker1title' => '',
			'marker1lat' => '',
			'marker1lng' => '',
            
			'width' => '1140px',
			'height' => '400px',
			'zoom' => 16,
			'enablescrollwheel' => false,
			'disablecontrols' => false,
			'key' => '111111111111111111111111111111111111111'
		), $atts2 );
    extract( $atts2 );
    $tml_map_array2 = array(
        'lat' => $lat,
        'lng' => $lng,
        
        'marker1title' => $marker1title,
        'marker1lat' => $marker1lat,
        'marker1lng' => $marker1lng,
        
        'width' => $width,
        'height' => $height,
        'zoom' => $zoom,
        'enablescrollwheel' => $enablescrollwheel,
        'disablecontrols' => $disablecontrols,
        'key' => $key
    );
    
add_action( 'wp_footer', 'tml_map_styles_scripts2' );
    ob_start(); ?>
       <div id="tml-google-map2" class="border" style="width:100%; height: 400px;"></div>
    <?php
    wp_print_scripts('google-map-init-js2');
    return ob_get_clean();
}

function tml_map_styles_scripts2(){
    global $tml_map_array2;
    wp_register_script( 'google-map-api-js2', 'https://maps.google.com/maps/api/js?&callback=initMap&key='.sanitize_text_field($tml_map_array2['key']), array('tml'), NULL, true );
    wp_register_script( 'google-map-init-js2', get_template_directory_uri().'/assets/js/google-map-init2.js', array('google-map-api-js2'), NULL, true );
    wp_enqueue_script( 'google-map-api-js2');
    wp_enqueue_script( 'google-map-init-js2');
    wp_localize_script( 'google-map-init-js2', 'TmlMapObj2', $tml_map_array2 );
}