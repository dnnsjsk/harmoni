<?php

/**
 * Init class.
 *
 * @since 0.01
 */

namespace Harmoni;

class Init {

	/**
	 * Initialise Twig.
	 *
	 * @since 0.01
	 */

	public static function twig() {

		require_once get_template_directory() . '/twig.php';

		if ( get_option( 'harmoni_twig' ) === FALSE ) {
			update_option( 'harmoni_twig', TRUE );
		}

	}

	/**
	 * Automatically enqueue CSS file.
	 *
	 * @since 0.01
	 */

	public static function Css() {

		if ( file_exists( get_stylesheet_directory() . '/assets/css/style.css' ) ) {

			add_action( 'wp_enqueue_scripts', function () {

				wp_enqueue_style(
					'harmoni-child-style',
					get_stylesheet_directory_uri() . '/assets/css/style.css',
					array(),
					filemtime( get_stylesheet_directory() . '/assets/css/style.css' ),
					FALSE );

			} );

		}

	}

	/**
	 * Automatically enqueue CSS resets.
	 *
	 * @since 0.01
	 */

	public static function resets() {

		add_action( 'wp_enqueue_scripts', function () {

			wp_enqueue_style(
				'harmoni-resets',
				get_template_directory_uri() . '/assets/css/style.css',
				array(),
				filemtime( get_template_directory() . '/assets/css/style.css' ),
				FALSE );

		} );

	}

	/**
	 * Automatically enqueue JS file.
	 *
	 * @since 0.01
	 */

	public static function js() {

		if ( file_exists( get_stylesheet_directory() . '/assets/js/scripts.js' ) ) {

			add_action( 'wp_enqueue_scripts', function () {

				wp_enqueue_script(
					'harmoni-child-scripts',
					get_stylesheet_directory_uri() . '/assets/js/scripts.js',
					array(),
					filemtime( get_stylesheet_directory() . '/assets/js/scripts.js' ),
					TRUE );

			} );

		}

	}

	/**
	 * Load fav icon.
	 *
	 * @since 0.01
	 */

	public static function favIcon() {

		add_action( 'admin_head', function () {

			echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-32x32.png" sizes="32x32">';
			echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-192x192.png" sizes="192x192">';
			echo '<link rel="apple-touch-icon-precomposed" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-180x180.png">';

		} );

		add_action( 'wp_head', function () {

			echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-32x32.png" sizes="32x32">';
			echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-192x192.png" sizes="192x192">';
			echo '<link rel="apple-touch-icon-precomposed" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon-180x180.png">';

		} );

	}

	/**
	 * Body class page slug.
	 *
	 * @since 0.01
	 */

	public static function bodyClassSlug() {

		add_filter( 'body_class', function ( $classes ) {
			global $post;
			if ( isset( $post ) ) {
				$classes[] = $post->post_type . '-' . $post->post_name;
			}

			return $classes;
		} );

	}

}
