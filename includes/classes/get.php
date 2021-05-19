<?php

/**
 * Get class.
 *
 * @since 0.01
 */
namespace Harmoni;

class Get {

	/**
	 * Render head.
	 *
	 * @since 0.01
	 */
	public static function head() {

		echo '
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    ' . wp_head() . '
	';

	}

	/**
	 * Get Inter font.
	 *
	 * @since 0.01
	 */
	public static function inter() {

		add_action( 'wp_head', function () {

			echo '<style id="harmoni-font-inter">
			@font-face {
    		font-family: inter;
    		src: url("' . get_template_directory_uri() . '/assets/fonts/inter.woff2") format( "woff2-variations" );
    		font-weight: 1 999;}
			</style> ';

		} );

	}

}
