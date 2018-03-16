<?php 

    add_filter( 'wp_image_editors', 'change_graphic_lib' );

    function change_graphic_lib($array) {
        return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
    }

?>