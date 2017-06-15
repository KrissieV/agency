<?php
/**
 * Custom post types for this theme.
 *
 *
 * @package fervor
 */


/**
 * Create case_study Post Type, and services Taxonomy
 */
function fervor_cpts_init() {
    $labels = array(
      'name'               => 'Clients',
      'singular_name'      => 'Client',
      'menu_name'          => 'Clients',
      'name_admin_bar'     => 'Client',
      'add_new'            => 'Add New Client',
      'add_new_item'       => 'Add New Client',
      'new_item'           => 'New Client',
      'edit_item'          => 'Edit Client',
      'view_item'          => 'View Client',
      'all_items'          => 'All Clients',
      'search_items'       => 'Search Clients',
      'parent_item_colon'  => 'Parent Clients',
      'not_found'          => 'No Clients found.',
      'not_found_in_trash' => 'No Clients found in trash.'
    );
    $args = array(
      'public' => false,
      'show_ui' => true,
      'labels'  => $labels,
      'supports' => array( 'title', 'thumbnail'),
      'menu_icon' => 'dashicons-id',
      'has_archive' => false,
      'hierarchical' => true,
    );
    register_post_type( 'client', $args );

    $labels = array(
      'name'               => 'Case Studies',
      'singular_name'      => 'Case Study',
      'menu_name'          => 'Case Studies',
      'name_admin_bar'     => 'Case Study',
      'add_new'            => 'Add New Case Study',
      'add_new_item'       => 'Add New Case Study',
      'new_item'           => 'New Case Study',
      'edit_item'          => 'Edit Case Study',
      'view_item'          => 'View Case Study',
      'all_items'          => 'All Case Studies',
      'search_items'       => 'Search Case Studies',
      'parent_item_colon'  => 'Parent Case Study',
      'not_found'          => 'No Case Studies found.',
      'not_found_in_trash' => 'No Case Studies found in trash.'
    );
    $args = array(
      'public' => true,
      'labels'  => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
      'menu_icon' => 'dashicons-index-card',
      'taxonomies' => array('service'),
      'has_archive' => false,
      'publicly_queryable' => true,
      'hierarchical' => true,
    );
    register_post_type( 'case_study', $args );

    $labels = array(
      'name'               => 'Testimonials',
      'singular_name'      => 'Testimonial',
      'menu_name'          => 'Testimonials',
      'name_admin_bar'     => 'Testimonial',
      'add_new'            => 'Add New Testimonial',
      'add_new_item'       => 'Add New Testimonial',
      'new_item'           => 'New Testimonial',
      'edit_item'          => 'Edit Testimonial',
      'view_item'          => 'View Testimonial',
      'all_items'          => 'All Testimonials',
      'search_items'       => 'Search Testimonials',
      'parent_item_colon'  => 'Parent Testimonials',
      'not_found'          => 'No Testimonials found.',
      'not_found_in_trash' => 'No Testimonials found in trash.'
    );
    $args = array(
      'public' => false,
      'show_ui' => true,
      'labels'  => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
      'menu_icon' => 'dashicons-format-quote',
      'has_archive' => false,
      'hierarchical' => true,
    );
    register_post_type( 'testimonial', $args );

    $labels = array(
      'name'               => 'Team',
      'singular_name'      => 'Team Member',
      'menu_name'          => 'Team',
      'name_admin_bar'     => 'Team Member',
      'add_new'            => 'Add New Member',
      'add_new_item'       => 'Add New Team Member',
      'new_item'           => 'New Team Member',
      'edit_item'          => 'Edit Team Member',
      'view_item'          => 'View Team Member',
      'all_items'          => 'All Team Members',
      'search_items'       => 'Search Team Members',
      'parent_item_colon'  => 'Parent Team Members',
      'not_found'          => 'No Team Members found.',
      'not_found_in_trash' => 'No Team Members found in trash.'
    );
    $args = array(
      'public' => true,
      'labels'  => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
      'menu_icon' => 'dashicons-groups',
      'has_archive' => false,
      'hierarchical' => true,
    );
    register_post_type( 'team_member', $args );
}
add_action( 'init', 'fervor_cpts_init' );

add_action( 'init', 'create_case_studyservice_tax' );

function create_case_studyservice_tax() {
	register_taxonomy(
		'service',
		'case_study',
		array(
			'label' => __( 'service' ),
			'rewrite' => array( 'slug' => 'service' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy_for_object_type( 'service', 'case_study' );
}