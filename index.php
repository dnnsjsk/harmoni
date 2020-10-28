<?php

/**
 * Index page.
 *
 * @since 0.01
 */

?>

<?php /** Check if Twig is active. */ ?>

<?php if ( get_option( 'harmoni_twig' ) === FALSE ) : ?>

    Hello, I am Harmoni! :)

<?php else : ?>

	<?php /** Init Timber. */ ?>

	<?php

	if ( class_exists( 'Timber\Site' ) ) {

		$context          = Timber::get_context();
		$context['posts'] = new Timber\PostQuery();
		$templates        = array( 'index.twig' );
		if ( is_home() ) {
			array_unshift( $templates, 'front-page.twig', 'home.twig' );
		}
		Timber::render( $templates, $context );

	}

	?>

<?php endif; ?>
