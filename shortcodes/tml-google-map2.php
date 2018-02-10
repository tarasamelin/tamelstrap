<?php
/**
 * Shortcode TML Simple Google Maps
 */

function pw_map_shortcode( $atts ) {

	$atts = shortcode_atts(array(
        'lat'               => '50.522188',
		'lng'               => '30.5991438',
		'width'             => '100%',
		'height'            => '400px',
		'zoom'              => 16,
		'key'               => 'AIzaSyC1d-FtX6E4pTcAvS-gkrIpyIFiqZa2Eoc'
		),$atts
	);

	wp_enqueue_script( 'google-maps-api', '//maps.google.com/maps/api/js?sensor=false&callback=initMap&key=' . sanitize_text_field( $atts['key'] ) );

    wp_print_scripts( 'google-maps-api' );

    ob_start(); ?>
    <div id="map" style="height: <?php echo esc_attr( $atts['height'] ); ?>; width: <?php echo esc_attr( $atts['width'] ); ?>"></div>
    <script type="text/javascript">
        var map;
        function tml_run_map(){
            var location = new google.maps.LatLng("<?php echo $atts['lat']; ?>", "<?php echo $atts['lng']; ?>");
            var map_options = {
                zoom: <?php echo $atts['zoom']; ?>,
                center: location,
                scrollwheel: false,
                disableDefaultUI: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map"), map_options);
            var marker = new google.maps.Marker({
            position: location,
            map: map
            });
        }
        tml_run_map();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'map2', 'pw_map_shortcode' );

