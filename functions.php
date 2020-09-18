<?php

/**
 * Exit if accessed directly.
 *
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Make sure Timber is not active.
 *
 * @since 0.1
 */

if ( get_option( 'harmoni_twig' ) ) {
	delete_option( 'harmoni_twig' );
}

/**
 * Require files.
 *
 * @since 0.1
 */

require_once plugin_dir_path( __FILE__ ) . 'includes/classes/init.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/classes/get.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/classes/remove.php';