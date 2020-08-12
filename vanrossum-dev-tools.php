<?php
/**
 * Plugin name:       Van Rossum Dev Tools
 * Plugin URI:        https://www.vanrossum.dev
 * Description:       This plugin provides some handy development tools.
 * Version:           1.0
 * Author:            Jeffrey van Rossum
 * Author URI:        https://www.vanrossum.dev
 * License:           GPL-2.0+
 * Text Domain:       vanrossum-dev-tools
 * Domain Path:       /languages
 */

require_once __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'd' ) ) {
	/**
	 * Dump variable.
	 */
	function d() {
		call_user_func_array( 'dump', func_get_args() );
	}
}


if ( ! function_exists( 'dd' ) ) {
	/**
	 * Dump variables and die.
	 */
	function dd() {
		call_user_func_array( 'dump', func_get_args() );
		die();
	}
}