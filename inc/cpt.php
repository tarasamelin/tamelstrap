<?php
/**
 *
 * Register CPT
 *
 */

function tath_cpt_slide() {
    register_post_type( 'tath-slide' ,array(
        'public'=>true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_position' =>120,
        'menu_icon' => admin_url() . 'images/media-button-other.gif' ,
        'labels' => array(
            'name' => __( 'slides', 'tath' ),
            'singular_name' => __( 'slide', 'tath' ),
            'menu_name'     => __( 'slider', 'tath' ),
            'all_items' => __( 'all slides', 'tath' ),
            'add_new' => __( 'add new slide', 'tath' ),
            'add_new_item' => __( 'new slide', 'tath' )
            
            )
    ));
}
add_action( 'init' , 'tath_cpt_slide' );

function tath_register_taxonomy() {
	register_taxonomy(
		'tath-slider',
		'tath-slide',
		array(
			'label' => __( 'sliders', 'tath' ),
			'rewrite' => array( 'slug' => 'tath-slider' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'tath_register_taxonomy' );