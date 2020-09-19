<?php

/**
 * Page template.
 *
 * @since 0.01
 */

?>

<?php if ( get_option( 'harmoni_twig' ) === FALSE ) : ?>

<?php else : ?>

	<?php

	$context = Timber::context();

	ob_start();

	$context['post'] = Timber::query_post();
	$timber_post     = new Timber\Post();

	ob_end_clean();

	Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );

	?>

<?php endif; ?>
