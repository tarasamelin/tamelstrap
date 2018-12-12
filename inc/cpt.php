<?php
/**
 *
 * Register CPT
 *
 */

function tml_cpt_slide() {
    register_post_type( 'tml-slide' ,array(
        'public'=>true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_position' =>120,
        'menu_icon' => admin_url() . 'images/media-button-other.gif' ,
        'labels' => array(
            'name' => __( 'slides', 'tamelstrap' ),
            'singular_name' => __( 'slide', 'tamelstrap' ),
            'menu_name'     => __( 'slider', 'tamelstrap' ),
            'all_items' => __( 'all slides', 'tamelstrap' ),
            'add_new' => __( 'add new slide', 'tamelstrap' ),
            'add_new_item' => __( 'new slide', 'tamelstrap' )
            
            )
    ));
}
add_action( 'init' , 'tml_cpt_slide' );

function tml_register_taxonomy() {
	register_taxonomy(
		'tml-slider',
		'tml-slide',
		array(
			'label' => __( 'sliders', 'tamelstrap' ),
			'rewrite' => array( 'slug' => 'tml-slider' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'tml_register_taxonomy' );