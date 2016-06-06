<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Icarus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function icarus_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  // Add page slug to singular page
  if ( is_page() ) {
    global $post;
    $classes[] = 'page-' . $post->post_name;
  }

	return $classes;
}
add_filter( 'body_class', 'icarus_body_classes' );

/**
 * Count Widgets in Sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * https://gist.github.com/slobodan/6156076
 */
if( ! function_exists( 'icarus_count_widgets' ) ) {

  function icarus_count_widgets( $sidebar_id ) {
    // If loading from front page, consult $_wp_sidebars_widgets rather than options to see if wp_convert_widget_settings() has made manipulations in memory.
    $sidebars_widgets = wp_get_sidebars_widgets();
    
    if ( isset( $sidebars_widgets ) ) :

      $widget_count = count( $sidebars_widgets[ $sidebar_id ] );
      $widget_classes = 'widget-count-' . count( $sidebars_widgets[ $sidebar_id ] );
      if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
        // Four widgets er row if there are exactly four or more than six
        $widget_classes .= ' per-row-4';
      elseif ( $widget_count >= 3 ) :
        // Three widgets per row if there's three or more widgets 
        $widget_classes .= ' per-row-3';
      elseif ( 2 == $widget_count ) :
        // Otherwise show two widgets per row
        $widget_classes .= ' per-row-2';
      endif;

      return $widget_classes;

    endif;

  }

}