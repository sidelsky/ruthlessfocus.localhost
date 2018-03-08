<?php

    /**
     * Template name: Welcome template
     */

    $title = get_field( 'title' );
    $subtitle = get_field( 'subtitle' );
    // header
    include("header.php");
    // welcome
    include('partials/welcome.inc.php');
    // map
    include('partials/map.inc.php');
    // footer
    include("footer.php");

?>