<?php 
function themes_taxonomy() {
	register_taxonomy(
		'themes_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'themes',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Themes store',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'themes', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'themes_taxonomy');

/**
 * Maintain the permalink structure for custom taxonomy
 * Display custom taxonomy term name before post related to that term
 * @uses post_type_filter hook
 */
function filter_post_type_link( $link, $post) {
    if ( $post->post_type != 'themes' )
        return $link;

    if ( $cats = get_the_terms( $post->ID, 'themes_categories' ) )
        $link = str_replace( '%themes_categories%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

//Registering Custom Post Type Themes
add_action( 'init', 'register_themepost', 20 );
function register_themepost() {
    $labels = array(
		'name' => _x( 'Themes', 'catchthemes_custom_post','catchthemes' ),
		'singular_name' => _x( 'Theme', 'catchthemes_custom_post', 'catchthemes' ),
		'add_new' => _x( 'Add New', 'catchthemes_custom_post', 'catchthemes' ),
		'add_new_item' => _x( 'Add New ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
		'edit_item' => _x( 'Edit ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
		'new_item' => _x( 'New ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
		'view_item' => _x( 'View ThemePost', 'catchthemes_custom_post', 'catchthemes' ),
		'search_items' => _x( 'Search ThemePosts', 'catchthemes_custom_post', 'catchthemes' ),
		'not_found' => _x( 'No ThemePosts found', 'catchthemes_custom_post', 'catchthemes' ),
		'not_found_in_trash' => _x( 'No ThemePosts found in Trash', 'catchthemes_custom_post', 'catchthemes' ),
		'parent_item_colon' => _x( 'Parent ThemePost:', 'catchthemes_custom_post', 'catchthemes' ),
		'menu_name' => _x( 'Themes Posts', 'catchthemes_custom_post', 'catchthemes' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Custom Theme Posts',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
		'taxonomies' => array( 'post_tag','themes_categories'),
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => get_stylesheet_directory_uri() . '/functions/panel/images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'themes/%themes_categories%','with_front' => FALSE),
		'public' => true,
		'has_archive' => 'themes',
		'capability_type' => 'post'
    );
	register_post_type( 'themes', $args );//max 20 charachter cannot contain capital letters and spaces
}
?>