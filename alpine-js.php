<?php
/**
 * Plugin Name:       Add Alpine.js
 * Description:       Adds Alpine.js script
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.0.1
 * Author:            Ryan Dejaegher
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       alpine-js
 *
 */



// Load Alpine.js
function enqueue_alpine_script() {
	wp_enqueue_script(
		'alpine',
		'https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js',
		array(),
		'3.10.5'
	);

}
add_action( 'wp_enqueue_scripts', 'enqueue_alpine_script' );


// Add defer attribute to Alpine.js
function add_defer_attribute( $tag, $handle ) {
	if ( 'alpine' === $handle ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );
