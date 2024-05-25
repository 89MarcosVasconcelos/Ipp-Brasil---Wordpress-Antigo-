<?php
defined( 'ABSPATH' ) or die();


/**
 * The helper function to generate controls definition
 * for the branding section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function nanofit_customize_generate_branding_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'logoHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	$controls[ $args['prefix'] . 'logo'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo', 'nanofit' ),
	);
	$controls[ $args['prefix'] . 'logoRetina'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Retina', 'nanofit' ),
	);
	$controls[ $args['prefix'] . 'logoSize'] = array(
		'type'        => 'dimension',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Size', 'nanofit' ),
		'choices'     => array(
			'width'   => esc_html__( 'Width', 'nanofit' ),
			'height'  => esc_html__( 'Height', 'nanofit' )
		)
	);
	
	return $controls;
}


/**
 * The helper function to generate controls definition
 * for the background section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @since   1.0.0
 */
function nanofit_customize_generate_background_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'backgroundHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	// Adding the controls
	$controls[ $args['prefix'] . 'backgroundImage'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Image', 'nanofit' ),
		'description' => esc_html__( 'Select an image for the background. If left empty, the background color will be used.', 'nanofit' )
	);
	$controls[ $args['prefix'] . 'backgroundColor'] = array(
		'type'        => 'color-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Color', 'nanofit' ),
		'description' => esc_html__( 'Select the color you want to use for the background.', 'nanofit' )
	);
	$controls[ $args['prefix'] . 'backgroundRepeat'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Repeat', 'nanofit' ),
		'choices' => array(
			'no-repeat' => esc_html__( 'No Repeat', 'nanofit' ),
			'repeat-x'  => esc_html__( 'Repeat X', 'nanofit' ),
			'repeat-y'  => esc_html__( 'Repeat Y', 'nanofit' ),
			'repeat'    => esc_html__( 'Repeat Both', 'nanofit' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundPosition'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Position', 'nanofit' ),
		'choices' => array(
			'top left'      => esc_html__( 'Top Left', 'nanofit' ),
			'top center'    => esc_html__( 'Top Center', 'nanofit' ),
			'top right'     => esc_html__( 'Top Right', 'nanofit' ),
			'center left'   => esc_html__( 'Center Left', 'nanofit' ),
			'center center' => esc_html__( 'Center Center', 'nanofit' ),
			'center right'  => esc_html__( 'Center Right', 'nanofit' ),
			'bottom left'   => esc_html__( 'Bottom Left', 'nanofit' ),
			'bottom center' => esc_html__( 'Bottom Center', 'nanofit' ),
			'bottom right'  => esc_html__( 'Bottom Right', 'nanofit' ),
			'custom'        => esc_html__( 'Custom Position', 'nanofit' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundOffset'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Custom Position', 'nanofit' ),
		'depends' => array(
			$args['prefix'] . 'backgroundPosition' => array( 'equals', 'custom' )
		),
		'fields'  => array(
			'x' => esc_html__( 'Position X', 'nanofit' ),
			'y' => esc_html__( 'Position Y', 'nanofit' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundAttachment'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Attachment', 'nanofit' ),
		'choices' => array(
			'fixed'      => esc_html__( 'Fixed', 'nanofit' ),
			'scroll'     => esc_html__( 'Scroll', 'nanofit' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundSize'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'nanofit' ),
		'choices' => array(
			'auto'       => esc_html__( 'Auto', 'nanofit' ),
			'cover'      => esc_html__( 'Cover', 'nanofit' ),
			'contain'    => esc_html__( 'Contain', 'nanofit' ),
			'fit-width'  => esc_html__( '100% Width', 'nanofit' ),
			'fit-height' => esc_html__( '100% Height', 'nanofit' ),
			'stretch'    => esc_html__( 'Stretch', 'nanofit' ),
			'custom'    => esc_html__( 'Custom', 'nanofit' )
		)
	);

	$controls[ $args['prefix'] . 'backgroundCustomSize'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'nanofit' ),
		'depends' => array( $args['prefix'] . 'backgroundSize' => array( 'equals', 'custom' ) ),
		'fields'  => array(
			'width'  => esc_html__( 'Width', 'nanofit' ),
			'height' => esc_html__( 'Height', 'nanofit' )
		)
	);
}


/**
 * The helper function to generate controls definition
 * for the typography section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function nanofit_customize_generate_typography_controls( &$controls, $args ) {

}


/**
 * Retrieve the menu list for using as the menu dropdown
 * 
 * @return  array
 * @since   1.0.0
 */
function nanofit_customize_dropdown_menus() {
	$menus   = wp_get_nav_menus();
	$choices = array( 0 => esc_html__( '-- Select Menu --', 'nanofit' ) );
	$choices = array_merge( $choices, wp_list_pluck( $menus, 'name', 'term_id' ) );

	return $choices;
}


/**
 * Return an array of sidebars that will be use for
 * the dropdown in the theme options
 * 
 * @return  array
 */
function nanofit_customize_dropdown_sidebars() {
	global $wp_registered_sidebars;
	static $sidebars;

	if ( empty( $sidebars ) ) {
		$sidebars = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			if ( $sidebar['id'] == 'wp_inactive_widgets' || strpos( $sidebar['id'], 'orphaned_widgets' ) !== false )
				continue;
			
			$sidebars[$sidebar['id']] = $sidebar['name'];
		}
	}
	
	return $sidebars;
}


function nanofit_customize_post_types_options() {
	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	return wp_list_pluck(
		$post_types,
		'label',
		'name'
	);
}
