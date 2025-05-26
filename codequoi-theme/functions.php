<?php
// Theme setup
function codequoi_theme_setup() {
    // Add support for title tag
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'codequoi-theme' ),
        'footer'  => __( 'Footer Menu', 'codequoi-theme' ),
    ) );

    // Add support for HTML5 markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo' );

    // Add support for custom background
    add_theme_support( 'custom-background' );

    // Add support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'codequoi_theme_setup' );

// Enqueue styles and scripts
function codequoi_theme_scripts() {
    wp_enqueue_style( 'codequoi-style', get_stylesheet_uri() );

    // Enqueue Google Fonts
    wp_enqueue_style( 'codequoi-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap', false );

    // Enqueue theme JS for dark/light mode switcher
    wp_enqueue_script( 'codequoi-theme-js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'codequoi_theme_scripts' );

// Register Custom Post Type: Articles
function codequoi_register_cpt_articles() {
    $labels = array(
        'name'                  => _x( 'Articles', 'Post Type General Name', 'codequoi-theme' ),
        'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'codequoi-theme' ),
        'menu_name'             => __( 'Articles', 'codequoi-theme' ),
        'name_admin_bar'        => __( 'Article', 'codequoi-theme' ),
        'archives'              => __( 'Article Archives', 'codequoi-theme' ),
        'attributes'            => __( 'Article Attributes', 'codequoi-theme' ),
        'parent_item_colon'     => __( 'Parent Article:', 'codequoi-theme' ),
        'all_items'             => __( 'All Articles', 'codequoi-theme' ),
        'add_new_item'          => __( 'Add New Article', 'codequoi-theme' ),
        'add_new'               => __( 'Add New', 'codequoi-theme' ),
        'new_item'              => __( 'New Article', 'codequoi-theme' ),
        'edit_item'             => __( 'Edit Article', 'codequoi-theme' ),
        'update_item'           => __( 'Update Article', 'codequoi-theme' ),
        'view_item'             => __( 'View Article', 'codequoi-theme' ),
        'view_items'            => __( 'View Articles', 'codequoi-theme' ),
        'search_items'          => __( 'Search Article', 'codequoi-theme' ),
        'not_found'             => __( 'Not found', 'codequoi-theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'codequoi-theme' ),
        'featured_image'        => __( 'Featured Image', 'codequoi-theme' ),
        'set_featured_image'    => __( 'Set featured image', 'codequoi-theme' ),
        'remove_featured_image' => __( 'Remove featured image', 'codequoi-theme' ),
        'use_featured_image'    => __( 'Use as featured image', 'codequoi-theme' ),
        'insert_into_item'      => __( 'Insert into article', 'codequoi-theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this article', 'codequoi-theme' ),
        'items_list'            => __( 'Articles list', 'codequoi-theme' ),
        'items_list_navigation' => __( 'Articles list navigation', 'codequoi-theme' ),
        'filter_items_list'     => __( 'Filter articles list', 'codequoi-theme' ),
    );
    $args = array(
        'label'                 => __( 'Article', 'codequoi-theme' ),
        'description'           => __( 'Articles custom post type', 'codequoi-theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'article', $args );
}
add_action( 'init', 'codequoi_register_cpt_articles', 0 );

// Register widget areas for footer
function codequoi_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'codequoi-theme' ),
        'id'            => 'footer-widget-area',
        'description'   => __( 'Widgets added here will appear in the footer.', 'codequoi-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'codequoi_widgets_init' );
?>
