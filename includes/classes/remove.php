<?php

/**
 * Remove class.
 *
 * @since 0.01
 */

namespace harmoni;

class remove {

	/**
	 * Remove jQuery.
	 *
	 * @since 0.01
	 */

	public static function jquery() {

		add_action( 'wp_enqueue_scripts', function () {

			wp_deregister_script( 'jquery' );
			wp_deregister_script( 'jquery-migrate' );

		} );


	}

	/**
	 * Remove Embed.
	 *
	 * @since 0.01
	 */

	public static function embed() {

		add_action( 'wp_enqueue_scripts', function () {

			wp_deregister_script( 'wp-embed' );

		} );

	}

	/**
	 * Remove emojis.
	 *
	 * @since 0.01
	 */

	public static function emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		add_filter('emoji_svg_url', '__return_false');
		add_filter( 'tiny_mce_plugins', function ( $plugins ) {
			if ( is_array( $plugins ) ) {
				return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
				return array();
			}
		} );
		add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
			if ( 'dns-prefetch' == $relation_type ) {
				$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

				$urls = array_diff( $urls, array( $emoji_svg_url ) );
			}

			return $urls;
		}, 10, 2 );

	}

	/**
	 * Remove Gutenberg blocks.
	 *
	 * @since 0.01
	 */

	public static function gutenberg()
	{
		add_action('wp_enqueue_scripts', function () {
			wp_dequeue_style('wp-block-library');
		}, 200);
	}

	/**
	 * Remove extra RSS feeds.
	 *
	 * @since 0.01
	 */

	public static function extraRss()
	{
		add_filter('feed_links_show_comments_feed', '__return_false');
	}

	/**
	 * Remove recent comments CSS.
	 *
	 * @since 0.01
	 */

	public static function recentCommentsCss()
	{
		add_filter('show_recent_comments_widget_style', '__return_false');
	}

	/**
	 * Remove gallery CSS.
	 *
	 * @since 0.01
	 */

	public static function galleryCss()
	{
		add_filter('use_default_gallery_style', '__return_false');
	}

	/**
	 * Remove WordPress.
	 *
	 * @since 0.01
	 */

	public static function wordpress()
	{
		add_filter('the_generator', '__return_false');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wp_shortlink_wp_head', 10);
		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');
	}

}
