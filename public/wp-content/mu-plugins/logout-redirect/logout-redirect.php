<?php
  /*
  Plugin Name: Logout redirect
  */

// class btm_login {
//   public function __construct() {
//
//   function btm_redirect_home_logout() {
//     wp_redirect( home_url() );
//     exit();
//   }
//
//   add_action('wp_logout','btm_redirect_home_logout');
//
//   //Login error Redirect
//   function btm_front_end_login_fail( $username ) {
//      $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
//      // if there's a valid referrer, and it's not the default log-in screen
//      if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
//         wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
//         exit;
//      }
//   }
//
//   add_action( 'wp_login_failed', 'btm_front_end_login_fail' );  // hook failed login
//
//   //Check for empy USERNAME and or PASSWORD
//   function btm_catch_empty_user( $username, $pwd ) {
//     if ( empty( $username ) || empty( $pwd ) ) {
//       wp_safe_redirect( home_url() );
//       exit();
//     }
//   }
//
//   add_action( 'wp_authenticate', 'btm_catch_empty_user', 1, 2 );
//
//   }
// }
//
// $btm_login = new btm_login();

?>
