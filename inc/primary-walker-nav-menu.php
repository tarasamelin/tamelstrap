<?php
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
//  START LEVEL   
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"rounded-0 dropdown-menu$submenu depth_$depth\">\n";
	}
	
//  START ELEMENT   
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ 
//    print_r($args);
    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
//		li
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = ($depth) ? 'dropdown-item bg-white' : 'nav-item';
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li'. $id . $value . $class_names . $li_attributes . '>';
//		a
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle nav-link text-secondary" data-toggle="dropdown"' : ' class="nav-link text-secondary"'; 
		
		$item_output = $args->before;
		$item_output .= '<a ' . $attributes . ' itemprop="url">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <i class="fa fa-angle-down" aria-hidden="true"></i></a>' : '</a>';
//		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
	
//  END ELEMENT   
//	public function end_el(&$output, $item, $depth = 0, $args = array()) {
//	}
	
//  END LEVEL   
//	public function end_lvl(&$output, $depth = 0, $args = array()) {
//	}
	
}