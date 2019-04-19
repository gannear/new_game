<?php
/*Game Categories taxomomy*/

function add_gamecategory_taxonomy_to_post(){

    //set the name of the taxonomy
    $taxonomy = 'gamecategory';
    //set the post types for the taxonomy
    $object_type = 'games';
    
    //populate our array of names for our taxonomy

    $labels = array(
        'name'              => _x( 'Game Categories', 'taxonomy general name', 'game_portal' ),
        'singular_name'     => _x( 'Game Category', 'taxonomy singular name', 'game_portal' ),
        'search_items'      => __( 'Search Game Categories', 'game_portal' ),
        'all_items'         => __( 'All Game Categories', 'game_portal' ),
        'parent_item'       => __( 'Parent Game Category', 'game_portal' ),
        'parent_item_colon' => __( 'Parent Game Category:', 'game_portal' ),
        'edit_item'         => __( 'Edit Game Category', 'game_portal' ),
        'update_item'       => __( 'Update Game Category', 'game_portal' ),
        'add_new_item'      => __( 'Add New Game Category', 'game_portal' ),
        'new_item_name'     => __( 'New Game Category Name', 'game_portal' ),
        'menu_name'         => __( 'Game Category', 'game_portal' ),
    );
    
    //define arguments to be used 
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'how_in_nav_menus'  => true,
        'public'            => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'gamecategory')
    );
    
    //call the register_taxonomy function
    register_taxonomy($taxonomy, $object_type, $args); 
}
add_action('init','add_gamecategory_taxonomy_to_post',0);