<?php

add_shortcode( 'items-carousel', 'tml_items_carousel' );
function tml_items_carousel( $atts ){
        $img_id = explode( ',', $atts['ids'] );    
// if ( ( ( ( $i - 1 ) % 3 ) == 0 ) && ( $i !== 1 ) ) {
        foreach( $img_id as $item ){
            $img_data = get_posts( array(
                'p' => $item,
                'post_type' => 'attachment'
            ) );

            $img_caption = $img_data[0]->post_excerpt;
            $img_title = $img_data[0]->post_title;
            $img_thumb = wp_get_attachment_image_src( $item, 'woocommerce_thumbnail' );

            ++$i;
            if (  $i == 1 ) {
                $html = '<div id="carouselExampleControls" class="mb-3 carousel slide" data-ride="carousel"><div class="carousel-inner"><div class="row item active">';
            }
            elseif ( ( $i == 5 ) ) {
                $html .= '<div class="row item">';
            }

            $html .= '<div class="col-md-3">';
            $html .= '<img class="border img-fluid" src="'.$img_thumb[0].'" itemprop="thumbnail" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'.$img_title.'">';
            $html .= $i.'</div>';

            if ( $i == 4  ) {
                $html .= '</div>';
            }
            elseif ( $i == 8 ) {
                $html .= '</div></div></div>';
            }
        }
        return $html;
}