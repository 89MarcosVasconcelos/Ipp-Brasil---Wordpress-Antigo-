<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'nanofit_customize_containers', 'nanofit_customize_footer_containers' );
add_filter( 'nanofit_customize_settings', 'nanofit_customize_footer_settings' );


// Add filter to register customize controls
add_filter( 'nanofit_customize_controls', 'nanofit_customize_footer_controls' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_footer_content_bottom_controls' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_footer_widgets_controls' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_footer_copyright_controls' );


function nanofit_customize_footer_containers( $containers ) {
	$containers['footerGeneral'] = array(
		'type'    => 'section',
		'panel'   => 'headerAndFooter',
		'title'   => _x( 'General Settings', 'customize', 'nanofit' ),
		'heading' => array(
			'title'       => _x( 'Footer Settings', 'customize', 'nanofit' ),
			'description' => _x( '', 'customize', 'nanofit' )
		)
	);
	$containers['footerContentBottom'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Content Bottom', 'customize', 'nanofit' )
	);
	$containers['footerWidgets'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Footer Widget', 'customize', 'nanofit' )
	);
	$containers['footerCopyright'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Copyright Settings', 'customize', 'nanofit' )
	);

	return $containers;
}


function nanofit_customize_footer_settings( $settings ) {
	$settings['footer__background'] = array( 'default' => array() );
	$settings['footer__typography'] = array( 'default' => array() );
	$settings['footer__colors']     = array( 'default' => array() );
	$settings['footer__padding']    = array( 'default' => array() );


	$settings['footer__copyright']             = array( 'default' => 'on' );
	$settings['footer__copyright__content']    = array( 'default' => 'Copyright &copy; 2021 LineThemes' );
	$settings['footer__copyright__full']         = array( 'default' => 'off' );
	$settings['footer__copyright__typography'] = array( 'default' => array() );
	$settings['footer__copyright__colors'] = array( 'default' => array() );
	$settings['footer__copyright__padding'] = array( 'default' => array() );
	$settings['footer__copyright__background'] = array( 'default' => array() );


	$settings['footer__widgets']                  = array( 'default' => 'on' );
	$settings['footer__widgets__layout']          = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['footer__widgets__full']            = array( 'default' => 'off' );
	$settings['footer__widgets__padding']         = array( 'default' => array() );
	$settings['footer__widgets__background']      = array( 'default' => array() );
	$settings['footer__widgets__typography']      = array( 'default' => array() );
	$settings['footer__widgets__colors']          = array( 'default' => array() );
	$settings['footer__widgets__title']           = array( 'default' => array() );
	$settings['footer__widgets__margin']          = array( 'default' => array() );

	return $settings;
}



function nanofit_customize_footer_controls( $controls ) {
	$controls['footer__background'] = array(
		'type'        => 'background',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Background', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);

	$controls['footer__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Font', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Link Colors', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'nanofit' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'nanofit' )
		)
	);
	$controls['footer__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Padding', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'nanofit' ),
			'padding-right'  => _x( 'Right', 'customize', 'nanofit' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'nanofit' ),
			'padding-left'   => _x( 'Left', 'customize', 'nanofit' )
		)
	);

	return $controls;
}



function nanofit_customize_footer_copyright_controls( $controls ) {
	$controls['footer__copyright'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Enable Copyright Bar', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__copyright__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( '100% Full Width', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__copyright__content'] = array(
		'type'        => 'textareafield',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Content', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__copyright__background'] = array(
		'type'        => 'background',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Background', 'customize', 'nanofit' )
	);

	$controls['footer__copyright__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Typography', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__copyright__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Link Colors', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'nanofit' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'nanofit' )
		)
	);
	$controls['footer__copyright__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Padding', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'nanofit' ),
			'padding-right'  => _x( 'Right', 'customize', 'nanofit' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'nanofit' ),
			'padding-left'   => _x( 'Left', 'customize', 'nanofit' )
		)
	);

	return $controls;
}

function nanofit_customize_footer_content_bottom_controls( $controls ) {
	$controls['contentBottom__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Enable Content Bottom Areas', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['contentBottom__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerContentBottom',
		'label'       => _x( '100% Full Width', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['contentBottom__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['contentBottom__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Background', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['contentBottom__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Padding', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'nanofit' ),
			'padding-right'  => _x( 'Right', 'customize', 'nanofit' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'nanofit' ),
			'padding-left'   => _x( 'Left', 'customize', 'nanofit' )
		)
	);
	$controls['contentBottom__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Font', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['contentBottom__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Link Colors', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'nanofit' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'nanofit' )
		)
	);
	$controls['contentBottom__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerContentBottom',
		'label'       => esc_html__( 'Content Bottom Widget Title Font', 'nanofit' ),
	);
	$controls['contentBottom__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerContentBottom'
	);
	$controls['contentBottom__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerContentBottom',
		'label'   => esc_html__( 'Content Bottom Widget Margin', 'nanofit' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	return $controls;
}

function nanofit_customize_footer_widgets_controls( $controls ) {
	$controls['footer__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Enable Footer Widget Areas', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( '100% Full Width', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'nanofit' ),
			'padding-right'  => _x( 'Right', 'customize', 'nanofit' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'nanofit' ),
			'padding-left'   => _x( 'Left', 'customize', 'nanofit' )
		)
	);
	$controls['footer__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls['footer__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'nanofit' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'nanofit' )
		)
	);
	$controls['footer__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerWidgets',
		'label'       => esc_html__( 'Footer Widget Title Font', 'nanofit' ),
	);
	$controls['footer__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets'
	);
	$controls['footer__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerWidgets',
		'label'   => esc_html__( 'Footer Widget Margin', 'nanofit' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	return $controls;
}

