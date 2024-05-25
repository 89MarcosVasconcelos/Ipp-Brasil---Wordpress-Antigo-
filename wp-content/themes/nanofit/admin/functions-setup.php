<?php
defined( 'ABSPATH' ) or die();

// The third-party libraries
require_once NANOFIT_PATH . 'vendor/class-tgm-plugin-activation.php';

// Classes
require_once NANOFIT_PATH . 'admin/inc/class-sample-data.php';

// Register theme's assets
add_action( 'init', 'nanofit_setup_admin_assets' );


if ( ! function_exists( 'nanofit_setup_admin_assets' ) ):
/**
 * Register scripts and styles for the theme
 * 
 * @return  void
 */
function nanofit_setup_admin_assets() {
	// Font Icons
	wp_register_style( 'font-icons', get_theme_file_uri( 'assets/css/components.css' ), array(), '4.7.0' );
	
	// Chosen
	wp_register_style( 'nanofit-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.min.css' ), array(), NANOFIT_VERSION );
	wp_register_script( 'nanofit-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.jquery.min.js' ), array( 'jquery' ), NANOFIT_VERSION, true );
	
	// Spectrum
	wp_register_style( 'nanofit-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.css' ), array(), NANOFIT_VERSION );
	wp_register_script( 'nanofit-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.js' ), array( 'jquery' ), NANOFIT_VERSION, true );

	// Spectrum
	wp_register_style( 'nanofit-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/css/jquery.fonticonpicker.css' ), array(), NANOFIT_VERSION );
	wp_register_script( 'nanofit-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/fonticonpicker.js' ), array( 'jquery' ), NANOFIT_VERSION, true );

	// VueJS library
	wp_register_script( 'vuejs', get_theme_file_uri( 'admin/js/vendor/vue.js' ), array(), NANOFIT_VERSION, true );

	/**
	 * Core scripts
	 */
	wp_register_script( 'nanofit-options', get_theme_file_uri( 'admin/js/options.js' ), array(
		'vuejs',
		'nanofit-spectrum',
		'nanofit-chosen',
		'wp-plupload',
		'jquery-ui-resizable',
		'jquery-ui-sortable',
		'nanofit-iconpicker'
	), NANOFIT_VERSION, true );

	wp_register_style( 'nanofit-options', get_theme_file_uri( 'admin/css/options.css' ), array(
		'font-icons',
		'nanofit-chosen',
		'nanofit-spectrum',
		'nanofit-iconpicker'
	), NANOFIT_VERSION );
	
	wp_register_style( 'nanofit-customize', get_theme_file_uri( 'admin/css/customize.css' ), array( 'nanofit-options' ), NANOFIT_VERSION );
}
endif;

add_filter('acf/settings/save_json', function() {
	return get_theme_file_path( 'admin/json/' );
} );

add_filter('acf/settings/load_json', function( $paths ) {
    return array( get_theme_file_path( 'admin/json/' ) );
} );