<?php
/**
 * ShortCode [gallery] for Mansory Gallery with Photoswipe
**/ 

remove_shortcode( 'gallery' );
add_shortcode( 'gallery', 'tml_gallery' );
function tml_gallery($atts){
    
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
add_action('wp_footer', 'photoswipe_footer');
    function photoswipe_footer() {
	echo <<<EOF
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
EOF;
}


















