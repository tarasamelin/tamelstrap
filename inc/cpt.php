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
            'name' => 'Slide',
            'all_items' => 'All Slides',
            'add_new' => 'Add new Slide',
            'add_new_item' => 'New Slide'
            )
    ));
}
add_action( 'init' , 'tml_cpt_slide' );

function tml_register_taxonomy() {
	register_taxonomy(
		'tml-slider',
		'tml-slide',
		array(
			'label' => __( 'slider' ),
			'rewrite' => array( 'slug' => 'tml-slider' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'tml_register_taxonomy' );