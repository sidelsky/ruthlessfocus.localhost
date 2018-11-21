<?php
    /**
    * Custom taxonomies
    */

    //Example
    //'name' => 'Ad types',
    //'singular_name' => 'Ad type',
    //'slug' => 'ad_types'
    //'post_name' => 'ad-formats'

    //Set all of the taxonomies
    function customTaxonomies() {

      // Course subject
      $ad_type = create_custom_taxonomy(

          $args = array(
              'name' => 'Location',
              'singular_name' => 'Location',
              'slug' => 'location',
              'with_front' => true,
              'hierarchical' => true,
              "cptp_permalink_structure" => "/%help_centre_category%/",
          )

      );

      $custom_posts = array(
          'post_name' => 'team'
      );

      register_taxonomy($args['slug'], $custom_posts['post_name'], $ad_type['args']);


  }


  add_action('init', 'customTaxonomies');
