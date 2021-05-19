<?php

/**
 * Page template.
 *
 * @since 0.01
 */
if ( class_exists( 'Timber\Site' ) ) {

	$context = Timber::context();

	ob_start();

	$context['post'] = Timber::query_post();
	$timber_post     = new Timber\Post();

	ob_end_clean();

	Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );

} else {
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
	endwhile;
	else: ?>
        <p>Sorry, no posts matched your criteria.</p>
	<?php endif;
} ?>