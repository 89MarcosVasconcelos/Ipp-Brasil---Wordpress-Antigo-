<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'nanofit_customize_containers', 'nanofit_customize_elements_containers' );
add_filter( 'nanofit_customize_settings', 'nanofit_customize_elements_settings' );


// Add filter to register customize controls
add_filter( 'nanofit_customize_controls', 'nanofit_customize_elements_button_controls' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_elements_input_controls' );


function nanofit_customize_elements_containers( $containers ) {
	$containers['elementButton'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Button', 'nanofit' ),
		'heading'     => array(
			'title'       => esc_html__( 'Element Settings', 'nanofit' )
		)
	);
	$containers['elementInput'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Input, Textarea & Select', 'nanofit' )
	);

	return $containers;
}

function nanofit_customize_elements_settings( $settings ) {
	// The default settings for the button
	$settings['button__height'] = array( 'default' => '' );
	$settings['button__border'] = array( 'default' => array(
		'all'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'top'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'right'  => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'bottom' => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'left'   => array( 'size' => '', 'style' => 'none', 'color' => '' )
	) );
	$settings['button__borderRadius'] = array( 'default' => '' );
	$settings['button_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['button__typography'] = array( 'default' => array() );
	$settings['button__padding']    = array( 'default' => array() );

	// The default settings for the input
	$settings['input__height'] = array( 'default' => '' );
	$settings['input__border'] = array( 'default' => array(
		'all'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'top'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'right'  => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'bottom' => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'left'   => array( 'size' => '', 'style' => 'none', 'color' => '' )
	) );
	$settings['input__borderRadius'] = array( 'default' => '' );
	$settings['input_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['input__typography'] = array( 'default' => array() );
	$settings['input__padding']    = array( 'default' => array() );

	return $settings;
}

function nanofit_customize_elements_button_controls( $controls ) {
	$controls['button__background'] = array(
		'type'        => 'color',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Background Color', 'nanofit' ),
	);

	$controls['button__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Height (px)', 'nanofit' ),
	);

	$controls['button__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Font', 'nanofit' ),
	);

	$controls['button__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Padding', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'nanofit' ),
			'padding-right'  => esc_html__( 'Right', 'nanofit' ),
			'padding-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'padding-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	$controls['button__border'] = array(
		'type'        => 'border',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border', 'nanofit' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'nanofit' ),
			'right'  => esc_html__( 'Right', 'nanofit' ),
			'bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['button__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border Radius', 'nanofit' ),
	);

	return $controls;
}

function nanofit_customize_elements_input_controls( $controls ) {
	$controls['input__background'] = array(
		'type'        => 'color',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Background Color', 'nanofit' ),
	);

	$controls['input__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Height (px)', 'nanofit' ),
	);

	$controls['input__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Font', 'nanofit' ),
	);

	$controls['input__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Padding', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'nanofit' ),
			'padding-right'  => esc_html__( 'Right', 'nanofit' ),
			'padding-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'padding-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	$controls['input__border'] = array(
		'type'        => 'border',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border', 'nanofit' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'nanofit' ),
			'right'  => esc_html__( 'Right', 'nanofit' ),
			'bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['input__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border Radius', 'nanofit' ),
	);

	return $controls;
}
