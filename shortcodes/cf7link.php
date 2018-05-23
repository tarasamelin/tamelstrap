<?php

//[cf7link href="https://google.com"]

add_shortcode( 'cf7link', 'cf7link_sc' );
function cf7link_sc( $atts ) {
	extract( shortcode_atts( array(
		"href" => '',
	), $atts ) );
    
    if ( $link ) {
        echo '<script type="text/javascript">
                document.addEventListener( "wpcf7mailsent", function( event ) {
                    location = "'.$href.'";
                }, false );
            </script>';
    }
    
}