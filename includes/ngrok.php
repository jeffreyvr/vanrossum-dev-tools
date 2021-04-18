<?php

function vrdt_set_site_url( $value ) {
	if ( isset( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) ) {
		return 'http://' . $_SERVER['HTTP_X_ORIGINAL_HOST'];
	}

	return $value;
}
add_filter( 'option_siteurl', 'vrdt_set_site_url' );

/**
 * Check if local tunnel is active.
 *
 * @return boolean
 */
function vrdt_is_local_tunnel_active() {
	if ( ! defined( 'LOCALTUNNEL_ACTIVE' ) ) {
		return false;
	}

	if ( LOCALTUNNEL_ACTIVE === false ) {
		return false;
	}

	return true;
}

/**
 * Change URLs.
 *
 * @param string $page_html The page HTML.
 * @return string
 */
function vrdt_change_urls( $page_html ) {
	if ( ! vrdt_is_local_tunnel_active() ) {
		return;
	}

	$wp_home_url  = esc_url( home_url( '/' ) );
	$rel_home_url = wp_make_link_relative( $wp_home_url );

	$esc_home_url     = str_replace( '/', '\/', $wp_home_url );
	$rel_esc_home_url = str_replace( '/', '\/', $rel_home_url );

	$rel_page_html = str_replace( $wp_home_url, $rel_home_url, $page_html );
	$esc_page_html = str_replace( $esc_home_url, $rel_esc_home_url, $rel_page_html );

	return $esc_page_html;
}

/**
 * Start buffer.
 *
 * @return void
 */
function vrdt_buffer_start_relative_url() {
	if ( ! vrdt_is_local_tunnel_active() ) {
		return;
	}

	ob_start( 'vrdt_change_urls' );
}
add_action( 'registered_taxonomy', 'vrdt_buffer_start_relative_url' );

/**
 * End buffer.
 *
 * @return void
 */
function vrdt_buffer_end_relative_url() {
	if ( ! vrdt_is_local_tunnel_active() ) {
		return;
	}

	@ob_end_flush();
}
add_action( 'shutdown', 'vrdt_buffer_end_relative_url' );
