<?php

/**
 * Include a partial and set arguments as variables.
 *
 * @param string $partial The name of the partial file.
 * @param mixed ...$args Additional parameters.
 *
 * @return void
 */
function vrdt_partial( $partial, ...$args ) {
	if ( ! empty( $args[0] ) ) {
		foreach ( $args[0] as $name => $arg ) {
			${$name} = $arg;
		}
	}

    $file =  plugin_dir_path( __FILE__ ) . '../' . $partial . '.php';

    if ( ! file_exists(  $file ) ) {
        return;
    }

	include $file;
}