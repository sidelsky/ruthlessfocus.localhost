<?php

    add_action('admin_menu', 'remove_default_post_type');

    function remove_default_post_type() {
        remove_menu_page('edit.php');
        remove_menu_page('edit.php?post_type=page');
        // remove_menu_page( 'index.php' );                   //Dashboard
        // remove_menu_page( 'jetpack' );                    //Jetpack* 
        // remove_menu_page( 'upload.php' );                 //Media
        // remove_menu_page( 'edit-comments.php' );          //Comments
        // remove_menu_page( 'themes.php' );                 //Appearance
        // remove_menu_page( 'plugins.php' );                //Plugins
        // remove_menu_page( 'users.php' );                  //Users
        // remove_menu_page( 'tools.php' );                  //Tools
        // remove_menu_page( 'options-general.php' );        //Settings

    }

