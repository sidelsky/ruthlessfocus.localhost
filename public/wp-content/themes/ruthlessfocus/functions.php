<?php

    /**
	* Update options
	* update_option('siteurl','inchbald.dev');
	* update_option('home','inchbald.dev');
	*/

    /**
    * Require all functions within the functions folder
    */
    function getFunctions() {

        $folder = '/functions/*.php';
        $files = glob(dirname(__FILE__) . $folder);

        foreach( $files as $file ) {
            require_once( $file );
        }

    }

    getFunctions();