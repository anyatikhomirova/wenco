<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Forge Saas
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function forge_saas_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'forge_saas_jetpack_setup' );
