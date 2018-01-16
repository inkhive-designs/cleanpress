<?php
/*
 * @package cleanpress, Copyright InkHive, rohitink.com
 * This file contains Custom Theme Related Functions.
 */
/*
* @package madhat, Copyright InkHive, rohitink.com
* This file contains Custom Theme Related Functions.
*/
//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/admin_scripts.php';
require get_template_directory() . '/framework/admin_modules/excerpt_length.php';
require get_template_directory() . '/framework/admin_modules/exclude_single_post.php';
/*
** Walkers for Navigation menus
*/ 
//Supports Menu Desc and Icons Both
class Cleanpress_Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="menu-desc">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}
//Supports Icon only. No Description.
class Cleanpress_Menu_With_Icon extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

  
/*
** Function to check if Sidebar is enabled on Current Page 
*/

function cleanpress_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('cleanpress_disable_sidebar') == 'disable' ) :
		$load_sidebar = false;
	elseif( get_theme_mod('cleanpress_disable_sidebar_home') == 'disable' && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('cleanpress_disable_sidebar_front') == 'disable' && e() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
** Add Body Class
*/
function cleanpress_body_class( $classes ) {
	
	$sidebar_class_name =  cleanpress_load_sidebar() ? "sidebar-enabled" : "sidebar-disabled" ;
    return array_merge( $classes, array( $sidebar_class_name ) );   
}
add_filter( 'body_class', 'cleanpress_body_class' );


/*
**	Determining Sidebar and Primary Width
*/
function cleanpress_primary_class() {
	$sw = esc_html(get_theme_mod('cleanpress_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !cleanpress_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('cleanpress_primary-width', 'cleanpress_primary_class');

function cleanpress_secondary_class() {
	$sw = esc_html(get_theme_mod('cleanpress_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('cleanpress_secondary-width', 'cleanpress_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function cleanpress_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function cleanpress_fade($color, $val) {
	return "rgba(".cleanpress_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function cleanpress_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('cleanpress_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('cleanpress_blog_layout') );
	else :
		get_template_part( $ldir ,'cleanpress');	
	endif;	
}
add_action('cleanpress_blog_layout', 'cleanpress_get_blog_layout');

/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


