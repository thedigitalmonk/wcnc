<?php 

/* Events Post-type
*****************************************************/

$event_labels = array(

    'name' => _x('Events', 'post type general name'),

    'singular_name' => _x('Events', 'post type singular name'),

    'add_new' => _x('Add New', 'Event'),

    'add_new_item' => __("Add New Event"),

    'edit_item' => __("Edit Event"),

    'new_item' => __("New Event"),

    'view_item' => __("View Event"),

    'search_items' => __("Search Event"),

    'not_found' =>  __('No Event found'),

    'not_found_in_trash' => __('No Event found in Trash'),

    'parent_item_colon' => ''

);


$event_args = array(

    'labels' => $event_labels,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true,

    'query_var' => true,

    'taxonomies' => array('category'),

    'has_archive' => true,

    'rewrite' => true,

    'hierarchical' => false,

    'menu_position' => null,

    'capability_type' => 'post',

    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes' ),

    'menu_icon' => 'dashicons-format-status'

);

register_post_type('events', $event_args);



/* FootPrint Post-type
*****************************************************/

$footprint_labels = array(

    'name' => _x('Foot Prints', 'post type general name'),

    'singular_name' => _x('Foot Print', 'post type singular name'),

    'add_new' => _x('Add New', 'Foot Print'),

    'add_new_item' => __("Add New Foot Print"),

    'edit_item' => __("Edit Foot Print"),

    'new_item' => __("New Foot Print"),

    'view_item' => __("View Foot Print"),

    'search_items' => __("Search Foot Print"),

    'not_found' =>  __('No Foot Print found'),

    'not_found_in_trash' => __('No Foot Print found in Trash'),

    'parent_item_colon' => ''

);


$footprint_args = array(

    'labels' => $footprint_labels,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true,

    'has_archive' => true,

    'query_var' => true,

    'rewrite' => true,

    'hierarchical' => false,

    'menu_position' => null,

    'capability_type' => 'post',

    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes' ),

    'menu_icon' => 'dashicons-book'

);

register_post_type('footprints', $footprint_args);

?>