<?php

/**
 * Get class.
 *
 * @since 0.1
 */

namespace harmoni;

class get {

	/**
	 * Render head.
	 *
	 * @since 0.1
	 */

	public static function head() {

		echo '<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    ' . wp_head() . '
</head>';

	}

	public static function inter() {

		add_action( 'wp_head', function () {

			echo '<style id="harmoni-font-inter">
			@font-face {
    		font-family: inter;
    		src: url(" ' . get_template_directory_uri() . '/assets/fonts/inter.woff2") format( "woff2-variations" );
    		font-weight: 1 999;}
			</style> ';

		} );

	}

}
