<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Add your custom post types here...

// Register Custom Post Type
function wav_register_person() {

	$labels = array(
		'name'                  => 'Persons',
		'singular_name'         => 'Person',
		'menu_name'             => 'Persons',
		'name_admin_bar'        => 'Person',
		'archives'              => 'Person Archives',
		'attributes'            => 'Person Attributes',
		'parent_item_colon'     => 'Parent Person:',
		'all_items'             => 'All Persons',
		'add_new_item'          => 'Add New Person',
		'add_new'               => 'Add New',
		'new_item'              => 'New Person',
		'edit_item'             => 'Edit Person',
		'update_item'           => 'Update Person',
		'view_item'             => 'View Person',
		'view_items'            => 'View Persons',
		'search_items'          => 'Search Person',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into person',
		'uploaded_to_this_item' => 'Uploaded to this person',
		'items_list'            => 'Persons list',
		'items_list_navigation' => 'Persons list navigation',
		'filter_items_list'     => 'Filter persons list',
	);
	$args = array(
		'label'                 => 'Person',
		'description'           => 'Custom post type for persons',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'person', $args );

}
add_action( 'init', 'wav_register_person', 0 );



// Register Custom Post Type
function wav_register_press_item() {

	$labels = array(
		'name'                  => 'Press items',
		'singular_name'         => 'Press item',
		'menu_name'             => 'Press items',
		'name_admin_bar'        => 'Press item',
		'archives'              => 'Press item Archives',
		'attributes'            => 'Press item Attributes',
		'parent_item_colon'     => 'Parent Press item:',
		'all_items'             => 'All Press items',
		'add_new_item'          => 'Add New Press item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Press item',
		'edit_item'             => 'Edit Press item',
		'update_item'           => 'Update Press item',
		'view_item'             => 'View Press item',
		'view_items'            => 'View Press items',
		'search_items'          => 'Search Press item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Press item',
		'uploaded_to_this_item' => 'Uploaded to this Press item',
		'items_list'            => 'Press items list',
		'items_list_navigation' => 'Press items list navigation',
		'filter_items_list'     => 'Filter Press items list',
	);
	$args = array(
		'label'                 => 'Press item',
		'description'           => 'Custom post type to display press articles',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'press-item', $args );

}
add_action( 'init', 'wav_register_press_item', 0 );

// Register Custom Post Type
function wav_register_festival() {

	$labels = array(
		'name'                  => 'Festivals',
		'singular_name'         => 'Festival',
		'menu_name'             => 'Festivals',
		'name_admin_bar'        => 'Festival',
		'archives'              => 'Festival Archives',
		'attributes'            => 'Festival Attributes',
		'parent_item_colon'     => 'Parent Festival:',
		'all_items'             => 'All Festivals',
		'add_new_item'          => 'Add New Festival',
		'add_new'               => 'Add New',
		'new_item'              => 'New Festival',
		'edit_item'             => 'Edit Festival',
		'update_item'           => 'Update Festival',
		'view_item'             => 'View Festival',
		'view_items'            => 'View Festivals',
		'search_items'          => 'Search Festival',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Festival',
		'uploaded_to_this_item' => 'Uploaded to this Festival',
		'items_list'            => 'Festivals list',
		'items_list_navigation' => 'Festivals list navigation',
		'filter_items_list'     => 'Filter Festivals list',
	);
	$args = array(
		'label'                 => 'Festival',
		'description'           => 'custom post time to show festivals',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'festival', $args );

}
add_action( 'init', 'wav_register_festival', 0 );

// Register Custom Post Type
function wav_register_activity() {

	$labels = array(
		'name'                  => 'Activities',
		'singular_name'         => 'Activity',
		'menu_name'             => 'Activities',
		'name_admin_bar'        => 'Activity',
		'archives'              => 'Activity Archives',
		'attributes'            => 'Activity Attributes',
		'parent_item_colon'     => 'Parent Activity:',
		'all_items'             => 'All Activities',
		'add_new_item'          => 'Add New Activity',
		'add_new'               => 'Add New',
		'new_item'              => 'New Activity',
		'edit_item'             => 'Edit Activity',
		'update_item'           => 'Update Activity',
		'view_item'             => 'View Activity',
		'view_items'            => 'View Activities',
		'search_items'          => 'Search Activity',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into activity',
		'uploaded_to_this_item' => 'Uploaded to this activity',
		'items_list'            => 'Activities list',
		'items_list_navigation' => 'Activities list navigation',
		'filter_items_list'     => 'Filter activities list',
	);
	$args = array(
		'label'                 => 'Activity',
		'description'           => 'Custom post type for activities',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'activity', $args );

}
add_action( 'init', 'wav_register_activity', 0 );