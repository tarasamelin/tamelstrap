<?php


add_shortcode( 'tml_gallery', 'tml_gallery' );

function tml_gallery($atts){
	$img_id = explode(',', $atts['ids']);

	$html = '<div class="tml-gallery"><div class="d-lg-flex justify-content-lg-center">';
    $img_count = 0;
	foreach($img_id as $item){
        ++$img_count;
        if (( (($img_count-1) % 3) == 0 ) && ($img_count!==1)){
        $html .= '</div><div class="d-lg-flex justify-content-lg-center">';
        }
            
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );

		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_thumb = wp_get_attachment_image_src( $item, 'shop_catalog' );
		$img_full = wp_get_attachment_image_src( $item, 'full' );

		$html .= "<a href='{$img_full[0]}' data-lightbox='gallery' data-title='{$img_caption}'><img src='{$img_thumb[0]}' width='{$img_thumb[1]}' height='{$img_thumb[2]}' alt='{$img_title}'></a>";
	}
	$html .= '</div></div>';
	return $html;
}