<?php
/**
* @package Alphabetic posts directory for WordPress
* @author  Adrian Emil Tudorache
* @license GPL-2.0+
* @link    https://www.tudorache.me/
**/

namespace Alphabetic_Posts_Dir;

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

// Set includes
$files = array(
	'class-config.php' => array( 'Alphabetic_Posts_Dir\Config' ),
    'class-shortcodes.php' => array( 'Alphabetic_Posts_Dir\Shortcodes' )
);

//Include files
foreach( $files as $file => $classes ) {

    require_once( __DIR__ . '/' . $file );
    if( $classes ) {
        foreach( $classes as $class ) {
            new $class;
        }
    }

}

?>
