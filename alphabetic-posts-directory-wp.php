<?php
/*
* Plugin Name: Alphabetic posts directory for WordPress
* Plugin URI: https://github.com/railmedia/alphabetic-posts-directory-wp
* Description: Creates a directory-style layout and displays posts ordered alphabetically with an A-Z selector to filter posts
* Version: 1.0.0
* Author: Adrian Emil Tudorache
* Author URI: https://github.com/railmedia
* Text Domain: alphabetic-dir
* Domain Path: /languages
* License: GPLv2 or later
*/

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

define( 'APDFWVER', '2.0.5' );
define( 'APDFWPATH', plugin_dir_path( __FILE__ ) );
define( 'APDFWBASE', plugin_basename( __FILE__ ) );
define( 'APDFWURL', plugin_dir_url( __FILE__ ) );
define( 'APDFW_SSL_PREFIX', is_ssl() ? 'https://' : 'http://' );

load_plugin_textdomain( 'alphabetic-dir', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

require_once( __DIR__ . '/inc/init.php' );

?>
