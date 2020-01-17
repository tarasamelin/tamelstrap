<?php
/**
 * ShortCode [gallery] with Photoswipe
 */ 

remove_shortcode( 'gallery' );
add_shortcode( 'gallery', 'tath_gallery_callback' );

function tath_gallery_callback( $atts ){
    $atts = shortcode_atts(
		array(
			'col' => '4',
			'ids' => '',
		), $atts );
    extract( $atts );
    
    if( $col == 1 ){
        $colwidth = 'col-12';
        $thumb_width = '1336';
        $thumb_height = '';
    }
    elseif( $col == 2 ){
        $colwidth = 'col-12 col-sm-6';
        $thumb_width = '660';
        $thumb_height = '660';
    }
    elseif( $col == 3 ){
        $colwidth = 'col-6 col-sm-4';
        $thumb_width = '440';
        $thumb_height = '440';
    }
    else {
        $colwidth = 'col-6 col-sm-4 col-md-3';
        $thumb_width = '320';
        $thumb_height = '320';
    }
        
	$img_id = explode( ',', $atts['ids'] );
	$html = '<div class="row justify-content-center tath-photoswipe-gallery">';
	
    foreach( $img_id as $item ){
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        
		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_full = wp_get_attachment_image_src( $item, 'full' );
		$img_thumb = aq_resize( $img_full[0], $thumb_width, $thumb_height, true, true, true );
        
        $html .= '<figure class="bodrder '.$colwidth.'" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
		$html .= '<a href="'.$img_full[0].'" itemprop="contentUrl" data-size="'.$img_full[1].'x'.$img_full[2].'" >';
        $html .= '<img class="border m-0 figure-img img-fluid" src="'.$img_thumb.'" itemprop="thumbnail" alt="'.$img_title.'">';
        $html .= '</a>';
        $html .= '<figcaption class="figure-caption" itemprop="caption description">'.$img_caption.'</figcaption>';
        $html .= '</figure>';
	}
	$html .= '</div>';

	return $html;
    
}

/**
 * ShortCode [gallery_masonry] with Photoswipe
 */ 
add_shortcode( 'gallery_masonry', 'tath_gallery_masonry_callback' );
function tath_gallery_masonry_callback( $atts ){
    $atts = shortcode_atts(
		array(
			'col' => '4',
			'ids' => '',
		), $atts );
    extract( $atts );
    
    if( $col == 1 ){
        $colwidth = 'col-12';
        $thumb_width = '1336';
        $thumb_height = '';
    }
    elseif( $col == 2 ){
        $colwidth = 'col-12 col-sm-6';
        $thumb_width = '660';
        $thumb_height = '';
    }
    elseif( $col == 3 ){
        $colwidth = 'col-6 col-sm-4';
        $thumb_width = '440';
        $thumb_height = '';
    }
    else {
        $colwidth = 'col-6 col-sm-4 col-md-3';
        $thumb_width = '320';
        $thumb_height = '';
    }
        
	$img_id = explode( ',', $atts['ids'] );
	$html = '<div class="masonry-grid tath-photoswipe-gallery">';
	
    foreach( $img_id as $item ){
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        
		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_full = wp_get_attachment_image_src( $item, 'full' );
		$img_thumb = aq_resize( $img_full[0], $thumb_width, $thumb_height, true, true, true );
        
        $html .= '<figure class="m-0 p-1 masonry-grid-item '.$colwidth.'" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
		$html .= '<a href="'.$img_full[0].'" itemprop="contentUrl" data-size="'.$img_full[1].'x'.$img_full[2].'" >';
        $html .= '<img class="m-0 p-0 figure-img img-fluid" src="'.$img_thumb.'" itemprop="thumbnail" alt="'.$img_title.'">';
        $html .= '</a>';
        $html .= '<figcaption class="figure-caption" itemprop="caption description">'.$img_caption.'</figcaption>';
        $html .= '</figure>';
	}
	$html .= '</div>';

	return $html;
    
}

/**
 * Photoswipe template for gallery shortcode
 */
add_action('wp_footer', 'photoswipe_footer');
function photoswipe_footer() {
    global $post;
	if( has_shortcode( $post->post_content, 'gallery') && !is_archive() ) {
        get_template_part( 'template-parts/photoswipe' );
    }
}

/**
 * wp_enqueue_scripts with checking is post content has shortcode before 
 */
add_action( 'wp_enqueue_scripts', 'tath_custom_shortcode_scripts');
function tath_custom_shortcode_scripts() {
    global $post;
    if( ( has_shortcode( $post->post_content, 'gallery' ) || has_shortcode( $post->post_content, 'gallery_masonry' ) ) && !is_archive() ) {
        //galleyry scripts
        wp_register_script( 'photoswipe', get_template_directory_uri().'/assets/js/photoswipe.min.js', array('jquery-3.2.1'), '4.1.3', true );
        wp_enqueue_script( 'photoswipe');
        wp_register_script( 'photoswipe-ui-default', get_template_directory_uri().'/assets/js/photoswipe-ui-default.min.js', array('photoswipe'), '4.1.3', true );
        wp_enqueue_script( 'photoswipe-ui-default');
        wp_register_script( 'photoswipe-init', get_template_directory_uri().'/assets/js/photoswipe-init.js', array('photoswipe-ui-default'), '4.1.3', true );
        wp_enqueue_script( 'photoswipe-init');
        //gallery styles
        if( !tath_is_woocommerce_activated() ) {
            wp_enqueue_style( 'photoswipe-css', get_template_directory_uri().'/assets/css/photoswipe.css', array('bootstrap-4-css'), NULL, false );
        }
        wp_enqueue_style( 'photoswipe-default-skin', get_template_directory_uri().'/assets/css/photoswipe-default-skin/default-skin.css', array('photoswipe-css'), '4.1.3', false );
    }
    if( has_shortcode( $post->post_content, 'gallery_masonry') && !is_archive() ){
        //masonry scripts
        wp_register_script( 'masonry', get_template_directory_uri().'/assets/js/masonry.pkgd.min.js', array('jquery-3.2.1'), '4.2.0', true );
        wp_enqueue_script('masonry');
        wp_register_script( 'imagesloaded-js', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array('masonry'), '4.1.4', true );
        wp_enqueue_script( 'imagesloaded-js');
        wp_register_script( 'masonry-init', get_template_directory_uri().'/assets/js/masonry-init.js', array('masonry'), NULL, true );
        wp_enqueue_script( 'masonry-init');
        //masonry styles
        //wp_enqueue_style( 'masonry-css', get_template_directory_uri().'/assets/css/masonry.css', array('main'), NULL, false );
    }
}
