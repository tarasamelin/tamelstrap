<?php
/**
 * SideBar Widget NavMenu
 */

add_filter( 'widget_nav_menu_args', 'tml_sidebar_menu', 10, 4 );
function tml_sidebar_menu( $nav_menu_args, $nav_menu, $args, $instance ) {
    if( $args['id'] == 'sidebar-1' ) {
        $nav_menu_args['container'] = '';
        $nav_menu_args['menu_class'] = 'list-group rounded-0';
        $nav_menu_args[ 'walker' ] = new Sidebar_Walker_Nav_Menu();
        return $nav_menu_args;
    }
}

/**
***************  Walker_Nav_Menu  ***************
**/

class Sidebar_Walker_Nav_Menu extends Walker_Nav_Menu {
//  START LEVEL   
    function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
        if( $depth == 0 ) {
            $output .= '';
        }
    }
	
//  START ELEMENT   
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ 
//    print_r($args);
    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
//li		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = ( $args->walker->has_children ) ? '' : '';
		$classes[] = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = ( $depth==0 ) ? 'rounded-0 p-0 list-group-item bg-white border' : 'rounded-0 p-0 list-group-item bg-light border border-left-0 border-right-0 border-bottom-0';
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
//a		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? 'class="nav-link text-secondary"' : 'class="nav-link text-secondary"'; 
		
		$item_output = $args->before;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<div class="btn-group w-100"><button class="btn bg-white w-100 text-left p-0 rounded-0" type="button"><a' . $attributes . ' itemprop="url">' : '<a' . $attributes . ' itemprop="url">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '</a></button>' : '</a>';
        
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<button class="rounded-0 border-0 pl-3 pr-3 bg-white" type="button" data-toggle="collapse" data-target="#collapse-id-'.$item->ID.'" aria-expanded="false" aria-controls="collapseExample" ><i class="text-secondary fa fa-plus-circle" aria-hidden="true"></i></button></div><ul class="collapse pl-0" id="collapse-id-'.$item->ID.'">' : '';
		$item_output .= $args->after;
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

//  END ELEMENT   
//    public function end_el(&$output, $item, $depth = 0, $args = array()) {
//        if( $depth == 0 && $args->walker->has_children ) {
//        $output .= '';
//        }
//    }

    //  END LEVEL   
//    public function end_lvl(&$output, $depth = 0, $args = array()) {
//        if( $depth == 0 ) {
//            $output .= '';
//        }
//        print_r($args);
//    }
	
}