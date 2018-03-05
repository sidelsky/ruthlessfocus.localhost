<?php

	/**
	* Custom Post Types
	*/

	function createPostTypes() {

		//Post type - Events
		create_post_type(

			array(
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
            )
            
		);
		//End post type





	}

	add_action('init', 'createPostTypes');