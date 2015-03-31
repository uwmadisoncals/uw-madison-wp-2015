<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package UW Madison WP 2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function uw_madison_wp_2015_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'uw_madison_wp_2015_jetpack_setup' );
