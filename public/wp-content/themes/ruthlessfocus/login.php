<?php
/**
 * Template Name: Login - page template
 */

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
                } else {
                    //We might want a message here...
                    //echo "Please <a href='mailto:someone@yoursite.com?subject=User login request from $blog_name&body=Please may be granted access to $blog_name  '>email us</a> for your personal login details...";
                }
            ?>

        </div>

	</section>

<?php include("footer.php"); ?>
