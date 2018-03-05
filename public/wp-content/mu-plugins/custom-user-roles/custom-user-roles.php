<?php
/*
Plugin Name: Custom user roles
Description: Create custom user roles
Author: Milad and Errol
*/

class btm_custom_user_roles {
  public function __construct() {

    //Create new user role - Site Manager
    ////////////////////////////////////////////////
    $result = add_role('site_manager', 'Site Manager', array(
      'moderate_comments' => true,
      'manage_categories' => true,
      'manage_links' => true,
      'edit_others_posts' => true,
      'edit_pages' => true,
      'edit_others_pages' => true,
      'edit_published_pages' => true,
      'publish_pages' => true,
      'delete_pages' => true,
      'delete_others_pages' => true,
      'delete_published_pages' => true,
      'delete_others_posts' => true,
      'delete_private_posts' => true,
      'edit_private_posts' => true,
      'read_private_posts' => true,
      'delete_private_pages' => true,
      'edit_private_pages' => true,
      'read_private_pages' => true,
      'unfiltered_html' => true,
      'edit_published_posts' => true,
      'upload_files' => true,
      'publish_posts' => true,
      'delete_published_posts' => true,
      'edit_posts' => true,
      'delete_posts' => true,
      'read' => true,
      'add_users' => true,
      'list_users' => true,
      'remove_users' => true,
      'create_users' => true,
      'delete_users' => true,
      'edit_users' => true
    ));

    //Removes default roles
    ////////////////////////////////////////////////
    //remove_role( 'subscriber' );
    remove_role( 'contributor' );
    remove_role( 'author' );

    //Flush database - remove_role
    //remove_role( 'site_manager' );

    //Helper function get getting roles that the user is allowed to create/edit/delete.
    ////////////////////////////////////////////////
    function get_allowed_roles( $user ) {
      $allowed = array();

      if ( in_array( 'administrator', $user->roles ) ) { // Admin can edit all roles
        $allowed = array_keys( $GLOBALS['wp_roles']->roles );
      } elseif ( in_array( 'site_manager', $user->roles ) ) {
        $allowed[] = 'editor';
      }
      return $allowed;
    }

    //Remove roles that are not allowed for the current user role.
    ////////////////////////////////////////////////
    function editable_roles( $roles ) {
      if ( $user = wp_get_current_user() ) {
        $allowed = get_allowed_roles( $user );

        foreach ( $roles as $role => $caps ) {
          if ( ! in_array( $role, $allowed ) )
          unset( $roles[ $role ] );
        }
      }

      return $roles;
    }
    add_filter( 'editable_roles', 'editable_roles' );

    //Prevent users deleting/editing users with a role outside their allowance.
    ////////////////////////////////////////////////
    function meta_cap( $caps, $cap, $user_ID, $args ) {
      if ( ( $cap === 'edit_user' || $cap === 'delete_user' ) && $args ) {
        $the_user = get_userdata( $user_ID ); // The user performing the task
        $user     = get_userdata( $args[0] ); // The user being edited/deleted

        if ( $the_user && $user && $the_user->ID != $user->ID /* User can always edit self */ ) {
          $allowed = get_allowed_roles( $the_user );

          if ( array_diff( $user->roles, $allowed ) ) {
            // Target user has roles outside of our limits
            $caps[] = 'not_allowed';
          }
        }
      }

      return $caps;
    }
    add_filter( 'map_meta_cap', 'meta_cap', 10, 4 );

    //Remove Menu Items in Admin Depending on User Role
    ////////////////////////////////////////////////
    function hide_menu_items() {

      global $user_ID;

      if ( current_user_can( 'site_manager' ) || current_user_can( 'editor' ) || current_user_can( 'subscriber' ) ) {
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'comments.php' );
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
      }
    }
    add_action( 'admin_menu', 'hide_menu_items' );

    /** Hide Administrator From User List **/
    function hide_admin_user($user_search) {
      $user = wp_get_current_user();
      if (!current_user_can('administrator')) { // Is Not Administrator - Remove Administrator
        global $wpdb;

        $user_search->query_where =
        str_replace('WHERE 1=1',
        "WHERE 1=1 AND {$wpdb->users}.ID IN (
        SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta
        WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
        AND {$wpdb->usermeta}.meta_value NOT LIKE '%administrator%')",
        $user_search->query_where
      );
    }
    }
    add_action('pre_user_query','hide_admin_user');

  }
}

$btm_custom_user_roles = new btm_custom_user_roles();
