<?php
	//   ___        _               ___        _     _____
	//  / __|  _ __| |_ ___ _ __   | _ \___ __| |_  |_   _|  _ _ __  ___ ___
	// | (_| || (_-<  _/ _ \ '  \  |  _/ _ (_-<  _|   | || || | '_ \/ -_|_-<
	//  \___\_,_/__/\__\___/_|_|_| |_| \___/__/\__|   |_| \_, | .__/\___/__/
	//                                                    |__/|_|

	add_action('init', 'create_post_types');

	//Custom post type function
	function create_post_type($titleSingle=false, $titlePlural=false, $menuIcon='dashicons-admin-post') {

		//If we've set a single and plural title
		if ($titleSingle && $titlePlural) {

			$titleSlug = sanitize_title($titleSingle);

			register_post_type($titleSlug,
			array(
				'labels' => array(
					'name' => __($titlePlural, $titleSlug),
					'singular_name' => __($titleSingle, $titleSlug),
					'add_new' => __('Add New', $titleSlug),
					'add_new_item' => __('Add New '.$titleSingle, $titleSlug),
					'edit' => __('Edit', $titleSlug),
					'edit_item' => __('Edit '.$titleSingle, $titleSlug),
					'new_item' => __('New '.$titleSingle, $titleSlug),
					'view' => __('View '.$titleSingle, $titleSlug),
					'view_item' => __('View '.$titleSingle, $titleSlug),
					'search_items' => __('Search '.$titlePlural, $titleSlug),
					'not_found' => __('No '.$titlePlural.' found', $titleSlug),
					'not_found_in_trash' => __('No '.$titlePlural.' found in Trash', $titleSlug)
				),
				'public' => true,
				'hierarchical' => true,
				'has_archive' => true,
				'menu_icon' =>  $menuIcon,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail'
				),
				'taxonomies' => array(),
				'can_export' => true
				)
			);

		}

	}

	function create_post_types() {

		//Events post type
		create_post_type('Event', 'Events');

	}
?>
