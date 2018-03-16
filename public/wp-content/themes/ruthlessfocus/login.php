<?php
/**
 * Template Name: Login - page template
 */

    $url = site_url();
    if ( is_user_logged_in() ) {
        wp_redirect( $url . '/welcome' );
        exit;
    } 

    include("header.php");

?>

	<section role="main" class="login">

        <div class="login-canvas">

            <div class="login-canvas__logo">
                <svg>
                    <use xlink:href="#shape-logo"></use>
                </svg>
            </div>

            <?php
                //$blog_name = get_bloginfo();
                //Lets check to see if the 'Theme my login plugin is active...
                if( function_exists( 'theme_my_login' ) ) {
                    echo do_shortcode( '[theme-my-login show_title=0]' );
                }

                $paragraph_mobile = '<strong>Please access this website on your desktop. You can then download the files and view them at the best quality.</strong>';
    
                echo '<div class="c-welcome__title-container">';
                    echo '<div data-welcome-message>';
                        echo '<p class="c-welcome__para c-welcome__para--mobile">'. $paragraph_mobile .'</p>';
                    echo '</div>';
                echo '</div>';
            ?>

        </div>

	</section>

<?php include("footer.php"); ?>
