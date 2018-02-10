<?php

// gallery lightbox2
    
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
        
		$html .= '<a href="'.$img_full[0].'" data-lightbox="gallery" data-title="'.$img_caption.'"><img src="'.$img_thumb[0].'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'.$img_title.'"></a>';
	}
	$html .= '</div></div>';
	return $html;
}

// gallery photoswipe 4 columns

add_shortcode( 'gallery2', 'tml_gallery2' );
function tml_gallery2($atts){
    
	$img_id = explode(',', $atts['ids']);
	$html = '<div class="tml-photoswipe-gallery row">';
    
	foreach($img_id as $item){
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        
		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_full = wp_get_attachment_image_src( $item, 'full' );
		$img_thumb = aq_resize( $img_full[0], 300, 300, true,true,true );
        
        $html .= '<figure class="m-0 p-0 col-6 col-sm-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
		$html .= '<a href="'.$img_full[0].'" itemprop="contentUrl" data-size="'.$img_full[1].'x'.$img_full[2].'" >';
        $html .= '<img class="m-0 figure-img img-fluid" src="'.$img_thumb.'" itemprop="thumbnail" width="300" height="300" alt="'.$img_title.'">';
        $html .= '</a>';
        $html .= '<figcaption class="figure-caption" itemprop="caption description">'.$img_caption.'</figcaption>';
        $html .= '</figure>';
	}
	$html .= '</div><div class="clearfix"></div>';
	return $html;
}

// gallery Mansory with photoswipe

add_shortcode( 'gallery3', 'tml_gallery3' );
function tml_gallery3($atts){
    
	$img_id = explode(',', $atts['ids']);
	$html = '<div class="tml-photoswipe-gallery masonry-grid">';
	
    foreach($img_id as $item){
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        
		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_thumb = wp_get_attachment_image_src( $item, 'medium_large' );
		$img_full = wp_get_attachment_image_src( $item, 'full' );
        
        $html .= '<figure class="m-0 p-0 col-6 col-sm-4 masonry-grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
		$html .= '<a href="'.$img_full[0].'" itemprop="contentUrl" data-size="'.$img_full[1].'x'.$img_full[2].'" >';
        $html .= '<img class="m-0 figure-img img-fluid" src="'.$img_thumb[0].'" itemprop="thumbnail" alt="'.$img_title.'">';
        $html .= '</a>';
        $html .= '</figure>';
	}
	$html .= '</div><div class="clearfix w-100"></div>';
	return $html;
}

/**
 * Photoswipe for gallery
 */
//add_action('wp_footer', 'photoswipe_footer');
//    function photoswipe_footer() {
//	echo <<<EOF
//<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
//    <div class="pswp__bg"></div>
//    <div class="pswp__scroll-wrap">
//        <div class="pswp__container">
//            <div class="pswp__item"></div>
//            <div class="pswp__item"></div>
//            <div class="pswp__item"></div>
//        </div>
//        <div class="pswp__ui pswp__ui--hidden">
//            <div class="pswp__top-bar">
//                <div class="pswp__counter"></div>
//                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
//                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
//                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
//                <div class="pswp__preloader">
//                    <div class="pswp__preloader__icn">
//                      <div class="pswp__preloader__cut">
//                        <div class="pswp__preloader__donut"></div>
//                      </div>
//                    </div>
//                </div>
//            </div>
//            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
//            </button>
//            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
//            </button>
//            <div class="pswp__caption">
//                <div class="pswp__caption__center"></div>
//            </div>
//        </div>
//    </div>
//</div>
//EOF;
//}


















