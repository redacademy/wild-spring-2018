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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
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
