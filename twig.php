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
class StarterSite extends Timber\Site {

	/** Add timber support. */

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
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

new StarterSite();

/**
 * Add contexts.
 */

if ( class_exists( 'Timber\Site' ) ) {

	add_filter( 'timber/context', function ( $context ) {

		$latest = array(
			'posts_per_page' => 1,
			'offset'         => 0,
			'order'          => 'DESC',
			'post_type'      => 'post',
			'post_status'    => 'publish'
		);

		$context['harmoniHead']       = \harmoni\get::head();
		$context['harmoniPostLatest'] = new Timber\PostQuery( $latest );

		return $context;
	} );

}