<?php

/**
 * Sets the directories to find .twig files.
 */

Timber::$dirname = array( 'templates', 'views' );

/**
 * Autoescaping.
 */

Timber::$autoescape = FALSE;

/**
 * Timber StarterSite class.
 */
class HarmoniTwig extends Timber\Site {

	/** Add timber support. */

	public function __construct() {
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		parent::__construct();
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 *
	 * @return string
	 */

	public function add_to_context( $context ) {
		$context['site'] = $this;

		return $context;
	}

	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );

		return $twig;
	}

}

new HarmoniTwig();

/**
 * Extensions.
 */

if ( class_exists( 'Timber\Site' ) ) {

	/**
	 * Add contexts.
	 */

	add_filter( 'timber/context', function ( $context ) {

		$latest = array(
			'posts_per_page' => 1,
			'offset'         => 0,
			'order'          => 'DESC',
			'post_type'      => 'post',
			'post_status'    => 'publish'
		);

		$context['harmoniHead']        = \harmoni\get::head();
		$context['harmoniPostLatest']  = new Timber\PostQuery( $latest );
		$context['harmoniCurrentYear'] = date( 'Y' );

		return $context;
	} );

	/**
	 * Add custom filters.
	 */

	add_filter( 'timber/twig', function ( $twig ) {

		/** Shuffle. */

		$twig->addFilter( new Timber\Twig_Filter( 'shuffle', function ( $array ) {
			shuffle( $array );
			$newArray = [];

			foreach ( $array as $item ) {
				array_push( $newArray, $item );
			}

			return $newArray;
		} ) );

		/** Slugify. */

		$twig->addFilter( new Timber\Twig_Filter( 'slugify', function ( $title ) {
			return sanitize_title( $title );
		} ) );

		return $twig;
	} );

}