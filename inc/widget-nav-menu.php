<?php
/**
 * SideBar Widget NavMenu
 */

add_filter( 'widget_nav_menu_args', 'tath_sidebar_menu', 10, 4 );
function tath_sidebar_menu( $nav_menu_args, $nav_menu, $args, $instance ) {
    if( $args['id'] == 'sidebar-1' ) {
        $nav_menu_args['container'] = '';
        $nav_menu_args['menu_class'] = 'list-group';
        $nav_menu_args[ 'walker' ] = new Sidebar_Walker_Nav_Menu();
        return $nav_menu_args;
    }
    elseif ( $args['id'] == 'blog-sidebar' ) {
        $nav_menu_args['container'] = '';
        $nav_menu_args['menu_class'] = 'navbar-nav text-center';
        $nav_menu_args[ 'walker' ] = new Blog_Sidebar_Walker_Nav_Menu();
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
		$classes[] = ( $depth==0 ) ? 'p-0 list-group-item bg-white border-0' : 'p-0 list-group-item bg-light border-0';
		
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
		
		$attributes .= ( $args->walker->has_children ) ? 'class="nav-link text-primary"' : 'class="nav-link text-primary"'; 
		
		$item_output = $args->before;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<div class="btn-group w-100"><button class="btn border-0 bg-white w-100 text-left p-0" type="button"><a' . $attributes . ' itemprop="url">' : '<a' . $attributes . ' itemprop="url">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '</a></button>' : '</a>';
        
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<button class="border-0 border-0 pl-3 pr-3 bg-white" type="button" data-toggle="collapse" data-target="#collapse-id-'.$item->ID.'" aria-expanded="false" aria-controls="collapseExample" ><i class="svg-i plus-circle"></i><i class="svg-i minus-circle"></i></button></div><ul class="collapse pl-0" id="collapse-id-'.$item->ID.'">' : '';
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

/**
***************  Blog_Sidebar_Walker_Nav_Menu  ***************
**/

class Blog_Sidebar_Walker_Nav_Menu extends Walker_Nav_Menu {
//  START LEVEL   
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' dropdown-submenu' : '';
		$output .= "\n$indent<ul class=\"text-right text-lg-left bg-white px-3 py-lg-0 px-lg-0 dropdown-menu$submenu depth_$depth\">\n";
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
//		$classes[] = 'p-0 menu-item-' . $item->ID;
		$classes[] = 'p-1 menu-item-' . $item->ID;
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
		
        if ( $depth == 0 ){
		$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle nav-link text-primary text-uppercase py-1 px-3 mx-2 border" data-toggle="dropdown"' : ' class="nav-link text-primary text-uppercase px-3 mx-2 border "'; 
        }
        else {
//        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle nav-link text-primary w-100 d-flex justify-content-between" data-toggle="dropdown"' : ' class="nav-link text-primary"'; 
        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle nav-link text-primary w-100 d-inline-block d-lg-flex justify-content-between"' : ' class="nav-link text-primary"'; 
        }
		$item_output = $args->before;
		$item_output .= '<a ' . $attributes . ' itemprop="url">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        if ( $depth == 0 ){
		$item_output .= ( $args->walker->has_children ) ? ' <i class="ml-1 svg-i angle-down"></i></a>' : '</a>';
        }
        else {
		$item_output .= ( $args->walker->has_children ) ? ' <i class="pl-3 pt-1 d-none d-sm-inline svg-i angle-right"></i></a>' : '</a>';
        }
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