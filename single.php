<?php

/**
 * Single template.
 *
 * @since 0.01
 */
if ( class_exists( 'Timber\Site' ) ) {

	$context = Timber::context();

	ob_start();

	$timber_post     = Timber::get_post();
	$context['post'] = Timber::query_post();

	ob_flush();

	if ( post_password_required( $timber_post->ID ) ) {
		Timber::render( 'single-password.twig', $context );
	} else {
		Timber::render( array(
			'single-' . $timber_post->ID . '.twig',
			'single-' . $timber_post->post_type . '.twig',
			'single-' . $timber_post->slug . '.twig',
			'single.twig'
		), $context );
	}

}