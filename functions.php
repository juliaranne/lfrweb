<?php

function childtheme_enqueue_styles() {
if( is_front_page() ){
    wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
  }
}
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_styles' );

// Remove p tags around inline images
function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// Add Your Menu Locations
function register_my_menus() {
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'homepage_links' => __('Homepage Links', 'twentyseventeen-child' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
		'members' => __('Members pages', 'twentyseventeen-child' ),
	) );
} 
add_action( 'init', 'register_my_menus' );
