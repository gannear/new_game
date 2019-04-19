<?php
/*Home slider*/
add_action( 'init', 'register_cpt_homeslider' );

function register_cpt_homeslider() {

    $labels = array( 
        'name' => _x( 'Homeslider', 'homeslider' ),
        'singular_name' => _x( 'Homeslider', 'homeslider' ),
        'add_new' => _x( 'Add New Slide', 'homeslider' ),
        'add_new_item' => _x( 'Add New Slide', 'homeslider' ),
        'edit_item' => _x( 'Edit Slide', 'homeslider' ),
        'new_item' => _x( 'New Slide', 'homeslider' ),
        'view_item' => _x( 'View Slide', 'homeslider' ),
        'search_items' => _x( 'Search Slide', 'homeslider' ),
        'not_found' => _x( 'No Slide found', 'homeslider' ),
        'not_found_in_trash' => _x( 'No Slide found in Trash', 'homeslider' ),
        'parent_item_colon' => _x( 'Parent Slide:', 'homeslider' ),
        'menu_name' => _x( 'Homeslider', 'homeslider' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'homeslider', $args );
}

/*Games*/
add_action( 'init', 'register_cpt_games' );

function register_cpt_games() {

    $labels = array( 
        'name' => _x( 'Games', 'games' ),
        'singular_name' => _x( 'Games', 'games' ),
        'add_new' => _x( 'Add New Game', 'games' ),
        'add_new_item' => _x( 'Add New Game', 'games' ),
        'edit_item' => _x( 'Edit Game', 'games' ),
        'new_item' => _x( 'New Game', 'games' ),
        'view_item' => _x( 'View Game', 'games' ),
        'search_items' => _x( 'Search Game', 'games' ),
        'not_found' => _x( 'No Game found', 'games' ),
        'not_found_in_trash' => _x( 'No Game found in Trash', 'games' ),
        'parent_item_colon' => _x( 'Parent Game:', 'games' ),
        'menu_name' => _x( 'Games', 'games' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'games', $args );
}

