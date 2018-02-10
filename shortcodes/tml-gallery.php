<?php


add_shortcode( 'gallery1', 'tml_gallery1' );

function tml_gallery1($atts){
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

add_shortcode( 'gallery2', 'tml_gallery2' );

function tml_gallery2($atts){
	$img_id = explode(',', $atts['ids']);

	$html = "<div class='tml-photoswipe-gallery row'>";

	foreach($img_id as $item){
        
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        

		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_full = wp_get_attachment_image_src( $item, 'full' );
		$img_thumb = aq_resize( $img_full[0], 300, 300, true,true,true );

        $html .= "<figure  class='m-0 p-0 col-6 col-sm-3' itemprop='associatedMedia' itemscope itemtype='http://schema.org/ImageObject'>";
		$html .= "<a href='{$img_full[0]}' itemprop='contentUrl' data-size='{$img_full[1]}x{$img_full[2]}' >";
        $html .= '<img  class="m-0 figure-img img-fluid" src="'.$img_thumb.'" itemprop="thumbnail" width="300" height="300" alt="'.$img_title.'">';
        $html .= "</a>";
        $html .= "<figcaption class='figure-caption' itemprop='caption description'>{$img_caption}</figcaption>";
        $html .= "</figure>";
	}
	$html .= "</div><div class='clearfix'></div>";
    
	return $html;
    
}






















