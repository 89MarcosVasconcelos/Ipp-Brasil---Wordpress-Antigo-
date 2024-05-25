<?php
defined( 'ABSPATH' ) or die();

function nanofit_blog_body_class( $classes ) {
	$classes[] = sprintf( 'blog-%s', nanofit_option( 'blog__archive__style' ) );

	return $classes;
}

function nanofit_blog_sidebar() {
	return nanofit_option( 'blog__archive__sidebar' );
}

function nanofit_blog_sidebar_position() {
	return nanofit_option( 'blog__archive__sidebarPosition' );
}

function nanofit_single_sidebar() {
	return nanofit_option( 'blog__single__sidebar' );
}

function nanofit_single_sidebar_position() {
	return nanofit_option( 'blog__single__sidebarPosition' );
}

