<?php
/*
Name:Custom Post
*/

function td_register_cpt(){

/* Banner */

$labels1=array(

		'name'=>_x('Banner','td'),
			
		'singular_name' => _x('Banner','td'),
			
            'add_new' => _x('New Banner','td'),
			
            'add_new_item' => __('New Banner','td'),
			
            'edit_item' => __('Edit Banner','td'),
			
            'new_item' => __('New Banner','td'),
			
            'all_items' => __('All Banner','td'),
			
            'view_item' => __('View Banner', 'td'),
			
            'search_items' => __('Search Banner', 'td'),
			
            'not_found' => __('No Banner','td'),
			
            'not_found_in_trash' => __('No Banner in trash','td'),
			
            'parent_item_colon' => '',
			
            'menu_name' => __('Banner', 'td')
);

$args1=array(

 'labels' => $labels1,

            'public' => true,

            '_builtin' => false,

            'publicly_queryable' => true,

            'show_ui' => true,

            'show_in_menu' => true,

            'show_in_nav_menus' => false,

            'exclude_from_search' => true,

            'query_var' => true,

            'rewrite' => true,

            'capability_type' => 'post',

            'has_archive' => true,

            'hierarchical' => false,

            'menu_position' => 30,
			
			'menu_icon'=> 'dashicons-images-alt2',

            'supports' => array('title', 'editor','thumbnail')

);

register_post_type('banner', $args1);

/* News */

$labels2=array(

            'name'=>_x('News','td'),
                  
            'singular_name' => _x('News','td'),
                  
            'add_new' => _x('New News','td'),
                  
            'add_new_item' => __('New News','td'),
                  
            'edit_item' => __('Edit News','td'),
                  
            'new_item' => __('New News','td'),
                  
            'all_items' => __('All News','td'),
                  
            'view_item' => __('View News', 'td'),
                  
            'search_items' => __('Search News', 'td'),
                  
            'not_found' => __('No News','td'),
                  
            'not_found_in_trash' => __('No News in trash','td'),
                  
            'parent_item_colon' => '',
                  
            'menu_name' => __('News', 'td')
);

$args2=array(

 'labels' => $labels2,

            'public' => true,

            '_builtin' => false,

            'publicly_queryable' => true,

            'show_ui' => true,

            'show_in_menu' => true,

            'show_in_nav_menus' => false,

            'exclude_from_search' => true,

            'query_var' => true,

            'rewrite' => true,

            'capability_type' => 'post',

            'has_archive' => true,

            'hierarchical' => false,

            'menu_position' => 30,
                  
                  'menu_icon'=> 'dashicons-admin-post',

            'supports' => array('title', 'editor','thumbnail')

);

register_post_type('news', $args2);

/* FAQ */

$labels3=array(

            'name'=>_x('FAQ','td'),
                  
            'singular_name' => _x('FAQ','td'),
                  
            'add_new' => _x('New FAQ','td'),
                  
            'add_new_item' => __('New FAQ','td'),
                  
            'edit_item' => __('Edit FAQ','td'),
                  
            'new_item' => __('New FAQ','td'),
                  
            'all_items' => __('All FAQ','td'),
                  
            'view_item' => __('View FAQ', 'td'),
                  
            'search_items' => __('Search FAQ', 'td'),
                  
            'not_found' => __('No FAQ','td'),
                  
            'not_found_in_trash' => __('No FAQ in trash','td'),
                  
            'parent_item_colon' => '',
                  
            'menu_name' => __('FAQ', 'td')
);

$args3=array(

 'labels' => $labels3,

            'public' => true,

            '_builtin' => false,

            'publicly_queryable' => true,

            'show_ui' => true,

            'show_in_menu' => true,

            'show_in_nav_menus' => false,

            'exclude_from_search' => true,

            'query_var' => true,

            'rewrite' => true,

            'capability_type' => 'post',

            'has_archive' => true,

            'hierarchical' => false,

            'menu_position' => 30,
                  
            'menu_icon'=> 'dashicons-admin-post',

            'supports' => array('title', 'editor','thumbnail')

);

register_post_type('faq', $args3);

/* BAKE SHOP */

$labels4=array(

            'name'=>_x('BAKE SHOP','td'),
                  
            'singular_name' => _x('BAKE SHOP','td'),
                  
            'add_new' => _x('New BAKE SHOP','td'),
                  
            'add_new_item' => __('New BAKE SHOP','td'),
                  
            'edit_item' => __('Edit BAKE SHOP','td'),
                  
            'new_item' => __('New BAKE SHOP','td'),
                  
            'all_items' => __('All BAKE SHOP','td'),
                  
            'view_item' => __('View BAKE SHOP', 'td'),
                  
            'search_items' => __('Search BAKE SHOP', 'td'),
                  
            'not_found' => __('No BAKE SHOP','td'),
                  
            'not_found_in_trash' => __('No BAKE SHOP in trash','td'),
                  
            'parent_item_colon' => '',
                  
            'menu_name' => __('BAKE SHOP', 'td')
);

$args4=array(

 'labels' => $labels4,

            'public' => true,

            '_builtin' => false,

            'publicly_queryable' => true,

            'show_ui' => true,

            'show_in_menu' => true,

            'show_in_nav_menus' => false,

            'exclude_from_search' => true,

            'query_var' => true,

            'rewrite' => true,

            'capability_type' => 'post',

            'has_archive' => true,

            'hierarchical' => false,

            'menu_position' => 30,
                  
            'menu_icon'=> 'dashicons-admin-post',

            'supports' => array('title', 'editor','thumbnail')

);

register_post_type('bake', $args4);

}
add_action('init','td_register_cpt');

function add_bake_taxonomies() {
      register_taxonomy('shop', 'bake', array(
            'hierarchical' => true,
            'labels' => array(
                  'name' => _x( ' Bake', 'td' ),
                  'singular_name' => _x( 'Bake', 'td' ),
                  'search_items' =>  __( 'Search Bake','td' ),
                  'all_items' => __( 'All Bake','td' ),
                  'parent_item' => __( 'Parent Bake','td' ),
                  'parent_item_colon' => __( 'Parent Bake:','td' ),
                  'edit_item' => __( 'Edit Bake','td' ),
                  'update_item' => __( 'Update Bake' ,'td'),
                  'add_new_item' => __( 'Add New Bake','td' ),
                  'new_item_name' => __( 'New Bake Name' ,'td'),
                  'Menu_name' => __( ' Bake','td' )
            ),
            'rewrite' => array(
                  'slug' => 'shop', // This controls the base slug that will display before each term
                  'with_front' => false, // Don't display the category base before "/locations/"
                  'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
      ));
}
add_action( 'init', 'add_bake_taxonomies', 0 );