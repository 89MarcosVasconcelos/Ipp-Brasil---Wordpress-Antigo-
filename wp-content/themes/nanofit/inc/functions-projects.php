<?php
defined( 'ABSPATH' ) or die();


add_filter( 'nprojects/shortcode_template', 'nanofit_project_shortcode_template' );
add_filter( 'nprojects/shortcode_parameters', 'nanofit_project_shortcode_params' );
add_filter( 'the_excerpt', 'nanofit_project_auto_excerpt', 99 );

add_action( 'after_setup_theme', function () {
	if ( class_exists( 'nProjects_Admin' ) ) {
		$admin = nProjects_Admin::instance();
		$meta_box_hook = 'add_meta' . '_boxes';
		
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_styles' ) );
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );
		remove_action( 'save_post', array( $admin, 'update_media_items' ) );
		remove_action( $meta_box_hook, array( $admin, 'add_metabox' ) );
	}
} );

function nanofit_project_auto_excerpt( $excerpt ) {
	if ( nanofit_current_post_type() == 'nproject' && mb_strlen( $excerpt ) > nanofit_option( 'projects__autoExcerptLength' ) ) {
		$excerpt = mb_substr( $excerpt, 0, nanofit_option( 'projects__autoExcerptLength' ) );
	}

	return $excerpt;
}

function nanofit_projects_body_class( $classes ) {
	$classes[] = sprintf( 'projects projects-%s', nanofit_option( 'projects__displayMode' ) );

	return $classes;
}

function nanofit_projects_sidebar() {
	return nanofit_option( 'projects__sidebar' );
}

function nanofit_projects_sidebar_position() {
	return nanofit_option( 'projects__sidebarPosition' );
}

function nanofit_single_project_sidebar() {
	return nanofit_option( 'project__sidebar' );
}

function nanofit_single_project_sidebar_position() {
	return nanofit_option( 'project__sidebarPosition' );
}

function nanofit_project_shortcode_template() {
	return 'tmpl/project/projects.php';
}