<?php

if ( class_exists( 'Timber\Site' ) ) {

	$context = Timber::get_context();
	Timber::render( '404.twig', $context );

}
