<?php

class Pgm_Walker extends Walker_Nav_Menu
{

    function start_el(&$output, $item, $depth, $args)
    {
		
		//var_dump($item);die;
        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



        $class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = 'menu-item-' . $item->ID;

		 $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        $class_names = ' class="' . esc_attr( $class_names ) . '"';



        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';



        $output .= $indent . '<li' . $id . $value . $class_names .'>';



        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$screen  = get_current_screen();

	
		
		if(is_admin()) {
				if(isset($screen->taxonomy) AND isset($_GET['tag_ID'])){
					$t_id = $_GET['tag_ID'];
					$pgm_postOption = get_option( "taxonomy_$t_id");			
				}
				else if(isset($screen->post_type)) 
				{		
					$pgm_postOption =get_post_meta(get_the_ID(), "_pgm_post_meta", 1 );						
				}
		}else {
			$pgm_postOption =get_post_meta(get_the_ID(), "_pgm_post_meta", 1 );
		}
		

		$checked ="";

		if(empty($pgm_postOption['pgm_menulist'])){		
			$checked ='checked="checked"';
		}

		else if(in_array($item->ID,$pgm_postOption['pgm_menulist'])){
			$checked ='checked="checked"';
		}

		
		$item_output = $args->before;
		
	if(isset($item->title)) //Empty menu
        $item_output .= '<input type="checkbox" '.$checked.' name="pgm_option[pgm_menulist][]" value="'.$item->ID.'">';

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;


        $item_output .= '';

        $item_output .= $args->after;



        $output .= $item_output;

    }

}

?>