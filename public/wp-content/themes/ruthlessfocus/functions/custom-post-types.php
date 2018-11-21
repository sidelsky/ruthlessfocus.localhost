<?php

	/**
	* Custom Post Types
	*/

	function createPostTypes() {

		//Post type - Meetings
		create_post_type([
			'name' => 'Meetings',
			'singular_name' => 'Meeting',
			'has_archive' => false,
			'capability_type' => 'post',
			'menu_icon' =>  'dashicons-admin-site',
			'menu_position' => 5,
				 'hierarchical' => false,
				 'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'meeting',
				'with_front' => TRUE
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions'
			)
		]);
		//End post type

		//Post type - Team
		create_post_type([
			'name' => 'Team',
			'singular_name' => 'Team',
			'has_archive' => false,
			'capability_type' => 'post',
			'menu_icon' =>  'dashicons-admin-users',
			'menu_position' => 6,
			'hierarchical' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'team',
				'with_front' => true
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions'
			)
		]);
		//End post type





	}

	add_action('init', 'createPostTypes');