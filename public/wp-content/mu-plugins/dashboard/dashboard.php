<?php
/*
Plugin Name: Dashboard edit
Author: Errol
*/

function btm_do_dashboard() {
  //remove_meta_box( 'dashboard_primary', 'dashboard', 'post_container_2' );
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
   remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
   remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' ); //News
   remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
   remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
   remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
   remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
   remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
   remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'btm_do_dashboard' );

function btm_add_google_analytics() {
  global $wp_admin_bar;
}

add_action( 'admin_init', 'btm_add_google_analytics' );