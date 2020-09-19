<?php

/**
 * Index page.
 *
 * @since 0.01
 */

?>

<?php /** Check if Twig is active. */ ?>

<?php if ( get_option( 'harmoni_twig' ) === false ) : ?>

        Hello, I am Harmoni! :)

<?php else : ?>

	<?php /** Init Timber. */ ?>

	<?php
	$context          = Timber::get_context();
	$context['posts'] = new Timber\PostQuery();
	$templates        = array( 'index.twig' );
	if ( is_home() ) {
		array_unshift( $templates, 'front-page.twig', 'home.twig' );
	}
	Timber::render( $templates, $context );
	?>

<?php endif; ?>
