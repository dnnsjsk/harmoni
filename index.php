<?php

/**
 * Index page.
 *
 * @since 0.01
 */

if ( class_exists( 'Timber' ) ) {

	$context          = Timber::context();
	$context['posts'] = new Timber\PostQuery();
	$templates        = array( 'index.twig' );
	if ( is_home() ) {
		array_unshift( $templates, 'front-page.twig', 'home.twig' );
	}
	Timber::render( $templates, $context );

}