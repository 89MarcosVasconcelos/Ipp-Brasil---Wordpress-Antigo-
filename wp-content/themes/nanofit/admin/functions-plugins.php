<?php
defined( 'ABSPATH' ) or die();


/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 *
 * @return  void
 */
function nanofit_register_requirement_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'   => 'Revolution Slider',
			'slug'   => 'revslider',
			'source' => 'https://demo.21lab.co/plugins.php?id=revslider'
		),

		array(
			'name'   => 'Projects By LineThemes',
			'slug'   => 'nprojects',
			'source' => 'https://demo.21lab.co/plugins.php?id=nprojects'
		),

		array(
			'name'   => 'Elementor Website Builder',
			'slug'   => 'elementor'
		),

		array(
			'name'   => 'PowerPack Lite for Elementor',
			'slug'   => 'powerpack-lite-for-elementor'
		),

		array(
			'name'   => 'One Click Demo Import',
			'slug'   => 'one-click-demo-import'
		),

		array(
			'name'   => 'Advanced Custom Fields',
			'slug'   => 'advanced-custom-fields'
		),

		array(
			'name'   => 'Contact Form 7',
			'slug'   => 'contact-form-7'
		),

		array(
			'name'   => 'MailChimp for WordPress',
			'slug'   => 'mailchimp-for-wp'
		),

		array(
			'name'   => 'Breadcrumb NavXT',
			'slug'   => 'breadcrumb-navxt'
		),

		array(
			'name'   => 'Widget CSS Classes',
			'slug'   => 'widget-css-classes'
		),

		array(
			'name'   => 'SVG Support',
			'slug'   => 'svg-support'
		),

		array(
			'name'   => 'WooCommerce',
			'slug'   => 'woocommerce'
		),
	);

	tgmpa( $plugins, array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''
	) );
}
add_action( 'tgmpa_register', 'nanofit_register_requirement_plugins' );
