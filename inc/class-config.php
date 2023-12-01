<?php
/**
* @package Alphabetic posts directory for WordPress
* @author  Adrian Emil Tudorache
* @license GPL-2.0+
* @link    https://www.tudorache.me/
**/

namespace Alphabetic_Posts_Dir;

class Config {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
    }

    function scripts() {
        wp_register_style( 'alpha-dir', APDFWURL . '/assets/css/front.css' );
        wp_register_script( 'alpha-dir', APDFWURL . '/assets/scripts/build/front.bundle.js', array('jquery'), null, true );
    }

}
?>