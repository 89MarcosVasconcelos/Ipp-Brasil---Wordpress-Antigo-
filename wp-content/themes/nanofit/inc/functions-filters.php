<?php
defined( 'ABSPATH' ) or die();


// A filter for adding custom classes
// into the body element
add_filter( 'nanofit_body_class', 'nanofit_body_classes', 5 );


// A filter to generate the post excerpt
// automatically
add_filter( 'nanofit_the_content', 'nanofit_auto_excerpt', 5 );

/**
 * Return the classes name for the body tag
 * in array format
 * 
 * @param   array  $classes  An existing classes
 * @return  array
 * @since   1.0.0
 */
function nanofit_body_classes( $classes ) {
	$classes[] = sprintf( 'layout-%s', nanofit_option( 'global__layout__mode' ) );

	if ( nanofit_has_sidebar() && is_active_sidebar( nanofit_sidebar_id() ) ) {
		$classes[] = sprintf( 'sidebar-%s', nanofit_sidebar_position() );
	}

	return $classes;
}


function nanofit_auto_excerpt( $content ) {
	if ( nanofit_option( 'blog__archive__autoExcerpt' ) === 'on' ) {
		$length = (int) nanofit_option( 'blog__archive__excerptLength' );
		$post   = get_post();

		if ( ! preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			$content = strip_tags( strip_shortcodes( $content ) );
			$content = trim( $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length );
				$content.= '...';
			}

			return sprintf( '<p>%s</p>', $content );
		}
	}

	return $content;
}