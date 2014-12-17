<?php
/*
Great Circle Design functions and definitions
*/
function gcd_setup() {

    // Enable support for Post Thumbnails, and declare two sizes.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 672, 372, true );
    add_image_size( 'twentyfourteen-full-width', 1038, 576, true );
    add_image_size('home-post',215, 215, true);
    add_image_size('project-gallery', 612, 405, true);
    add_image_size('article', 960, 230, true);

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
        'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );

    // This theme allows users to set a custom background.
    add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
        'default-color' => 'f5f5f5',
    ) ) );

    // Add support for featured content.
    add_theme_support( 'featured-content', array(
        'featured_content_filter' => 'twentyfourteen_get_featured_posts',
        'max_posts' => 6,
    ) );

    // This theme uses its own gallery styles.
    add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'gcd_setup' );


function twentyfourteen_widgets_init() {
    require get_template_directory() . '/inc/widgets.php';
    register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

function twentyfourteen_scripts() {
    
    // Add Genericons font, used in the main stylesheet.
    wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

    // Load our main stylesheet.
    wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
    wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
    }

    if ( is_active_sidebar( 'sidebar-3' ) ) {
        wp_enqueue_script( 'jquery-masonry' );
    }

    if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
        wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
        wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
            'prevText' => __( 'Previous', 'twentyfourteen' ),
            'nextText' => __( 'Next', 'twentyfourteen' )
        ) );
    }

    wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

add_filter('be_gallery_metabox_post_types','projects_screen_only');
function projects_screen_only(){
    $screen = array('gcd_projects', 'gprojects');
    return $screen;
}

add_action( 'init', 'register_taxonomies_and_custom_post_types' );
function register_taxonomies_and_custom_post_types() {

    //registering gcd_projects(cpt)
    $args = array(
        'labels' => array(
            'name' => __( 'Projects' ),
            'singular_name' => __( 'Project' ),
            'all_items' => __( 'All Projects' ),
            'add_new' => __( 'New Project' ),
            'add_new_item' => __( 'New Project' ),
            'edit_item' => __( 'Edit Project' ),
            'new_item' => __('New Project' ),
            'view_item' => __('View Project' ),
            'search_items' => __('Search Projects' ),
            'not_found' => __('No Projects' ),
            'not_found_in_trash' => __('No Projects found in Trash' ),
            'parent_item_colon' => __( 'Parent Group' ),
            'menu_name' => __('Projects')
        ),
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => true,
        'show_in_admin_bar' => false,
        //'menu_position' => 25,
        'menu_icon' => 'dashicons-portfolio',
        'capability_type' => 'post',
        'hierarchical' => false, 
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'projects' )
    );

    register_post_type( 'gcd_projects', $args);

    //registering gcd_groups(taxonomy) for gcd_projects(cpt)
    register_taxonomy('gcd_groups', array( 'gcd_projects', 'testimonial' ), array(
        'hierarchical' => true,
        'labels' => array(
              'name' => __( 'Groups' ),
              'singular_name' => __( 'Group' ),
              'menu_name' => __( 'Groups' ),
              'all_items' => __( 'All Groups' ),
              'edit_item' => __( 'Edit Group' ),
              'view_item' => __('View Group' ),
              'update_item' => __( 'Update Group' ),
              'add_new_item' => __( 'Add New Group' ),
              'new_item_name' => __( 'New Group Name'),
              'parent_item' => __( 'Parent Group' ),
              'parent_item_colon' => __( 'Parent Group:' ),
              'search_items' => __( 'Search Groups' ),
        ),
        'rewrite' => array(
              'slug' => 'gcd_partnerships', // This controls the base slug that will display before each term
              'with_front' => false, // Don't display the category base before "/locations/"
              'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        )
    ));

    //registering gprojects(cpt)
    $args = array(
        'labels' => array(
            'name' => __( 'General Projects' ),
            'singular_name' => __('General Project'),
            'menu_name' => __('GProjects'),
            'all_items' => __( 'All GProjects' ),
            'add_new' => __( 'New GProject' ),
            'add_new_item' => __( 'New GProject' ),
            'edit_item' => __( 'Edit GProject' ),
            'new_item' => __('New GProject3' ),
            'view_item' => __('View GProject' ),
            'search_items' => __('Search GProjects' ),
            'not_found' => __('No GProjects' ),
            'not_found_in_trash' => __('No GProjects found in Trash' ),
            'parent_item_colon' => __( 'Parent GProject' ),
        ),
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => true,
        'show_in_admin_bar' => false,
        //'menu_position' => 25,
        'menu_icon' => 'dashicons-portfolio',
        'capability_type' => 'post',
        'hierarchical' => false, 
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
        // 'rewrite' => true

    );
    register_post_type( 'gprojects', $args );

    //registering gproject-groups(taxonomy) for gprojects(cpt)
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('GProject Groups'),
            'singular_name' => __( 'GProject Group' ),
            'menu_name' => __( 'GProject Groups' ),
            'all_items' => __( 'All GProject Groups' ),
            'edit item' => __( 'Edit GProject Group' ),
            'view_item' => __( 'View GProject Group' ),
            'update_item' => __( 'Update GProject Group' ),
            'add_new_item' => __( 'Add New GProject Group' ),
            'new_item_name' => __( 'New GProject Group' ),
            'parent_item' => __( 'Parent GProject Group' ),
            'parent_item_colon' => __( 'Parent GProject Group:' ),
            'search_items' => __( 'Search GProject Groups' ),
        ),
        'rewrite' => array(
            'slug' => 'gproject-groups', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        )
    );
    register_taxonomy( 'gproject-groups', 'gprojects', $args);

    //registering testimonial(cpt)
    $args = array(
        'labels' => array(
            'name' => __( 'Testimonials' ),
            'singular_name' => __('Testimonial'),
            'menu_name' => __('Testimonials'),
            'all_items' => __( 'All Testimonials' ),
            'add_new' => __( 'New Testimonial' ),
            'add_new_item' => __( 'New Testimonial' ),
            'edit_item' => __( 'Edit Testimonial' ),
            'new_item' => __('New Testimonial' ),
            'view_item' => __('View Testimonial' ),
            'search_items' => __('Search Testimonials' ),
            'not_found' => __('No Testimonials' ),
            'not_found_in_trash' => __('No Testimonials found in Trash' ),
        ),
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => true,
        'show_in_admin_bar' => false,
        'menu_icon' => 'dashicons-format-quote',
        'capability_type' => 'post',
        'hierarchical' => false, 
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
    );
    register_post_type( 'testimonial', $args );
}


function gcd_tax_add_new_meta_field() {
    // this will add the custom meta field to the add new term page
    ?>
    <div class="form-field">
        <label for="term_meta[featured]"><?php _e( 'Featured ?', '' ); ?></label>
        <input type="text" name="term_meta[featured]" id="term_meta[featured]" value="">
        <p class="description"><?php _e( 'Type 1 if you want to list category as featured','' ); ?></p>
    </div>

    <div class="form-field">
        <label for="term_meta[subtitle]"><?php _e( 'Subtitle', '' ); ?></label>
        <input type="text" name="term_meta[subtitle]" id="term_meta[subtitle]" value="">
        <p class="description"><?php _e( 'Subtitle for your group','' ); ?></p>
    <div>
<?php
}

add_action('gcd_groups_add_form_fields', 'gcd_tax_add_new_meta_field', 10, 2);


function gcd_tax_edit_meta_field($term) {
    // put the term ID into a variable
    $t_id = $term->term_id;
 
    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[featured]"><?php _e( 'Featured ?', '' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[featured]" id="term_meta[featured]" value="<?php echo esc_attr( $term_meta['featured'] ) ? esc_attr( $term_meta['featured'] ) : ''; ?>">
            <p class="description"><?php _e( 'Type 1 if you want to list category as featured','' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[subtitle]"><?php _e( 'Subtitle', '' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[subtitle]" id="term_meta[subtitle]" value="<?php echo esc_attr( $term_meta['subtitle'] ) ? esc_attr( $term_meta['subtitle'] ) : ''; ?>">
            <p class="description"><?php _e( 'Subtitle for your project','' ); ?></p>
        </td>
    </tr>
<?php
}

add_action( 'gcd_groups_edit_form_fields', 'gcd_tax_edit_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }
}  
add_action( 'edited_gcd_groups', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_gcd_groups', 'save_taxonomy_custom_meta', 10, 2 );

require_once(get_template_directory().'/inc/gproject-metabox.php');


// ==============================================================
// REQUIRE
// ==============================================================
require_once 'includes/__.php';
// ==============================================================
// Controls Collection
// ==============================================================
$ccollection_gcd_projects = new Controls\ControlsCollection(
    array(      
        new Controls\Editor(
            'Rational', 
            array('default-value' => ''),
            array('textarea_name' => 'rational')
        ),
    )
);
// ==============================================================
// Meta Boxes
// ==============================================================
$meta_box_slider = new Admin\MetaBox(
    'Rational box', 
    array(
        'post_type' => 'gcd_projects',
        'prefix' => 'r_'
    ), 
    $ccollection_gcd_projects
);
