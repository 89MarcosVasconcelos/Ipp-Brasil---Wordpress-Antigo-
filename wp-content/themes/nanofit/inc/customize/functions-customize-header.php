<?php
defined( 'ABSPATH' ) or die();

add_filter( 'nanofit_customize_containers', 'nanofit_customize_header_containers' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_header_controls' );
add_filter( 'nanofit_customize_settings', 'nanofit_customize_header_settings' );

function nanofit_customize_header_containers( $containers ) {
	$containers['headerAndFooter'] = array(
		'type'        => 'panel',
		'title'       => _x( 'Header & Footer', 'customize', 'nanofit' )
	);

	$containers['headerGeneral'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General', 'customize', 'nanofit' ),
		'parent'      => _x( 'Header Settings', 'customize', 'nanofit' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Settings', 'nanofit' ),
		)
	);
	$containers['headerTopbar'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Topbar Settings', 'customize', 'nanofit' ),
		'parent'      => _x( 'Header Settings', 'customize', 'nanofit' )
	);
	$containers['headerNavigator'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'nanofit' ),
		'parent'      => _x( 'Header Settings', 'customize', 'nanofit' ),
	);

	$containers['headerTitle'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Title Bar', 'customize', 'nanofit' ),
		'parent'      => _x( 'Header Settings', 'customize', 'nanofit' )
	);

	$containers['headerSticky'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General Settings', 'customize', 'nanofit' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Sticky Setting', 'nanofit' ),
		)
	);
	$containers['headerStickyNav'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'nanofit' )
	);

	return $containers;
}

function nanofit_customize_header_controls( $controls ) {
	/**
	 * Header Styles
	 */
	$controls['header__style'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Styles', 'customize', 'nanofit' ),
		'choices'     => array(
			'style1'  => _x( 'Style 1', 'customize', 'nanofit' ),
			'style2'  => _x( 'Style 2', 'customize', 'nanofit' ),
			'style3'  => _x( 'Style 3', 'customize', 'nanofit' ),
			'style4'  => _x( 'Style 4', 'customize', 'nanofit' )
		)
	);
	/**
	 * The logo profile
	 */
	$controls['header__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Logo that will be shown', 'customize', 'nanofit' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'nanofit' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'nanofit' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'nanofit' )
		)
	);
	$controls[ 'header__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Logo Margin', 'nanofit' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Height', 'customize', 'nanofit' )
	);
	$controls['header__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => _x( '100% Header Full Width', 'customize', 'nanofit' )
	);
	$controls['header__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Shadow', 'nanofit' ),
	);
	$controls['header__transparent'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Header Transparent', 'nanofit' ),
	);

	$controls['header__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Background', 'customize', 'nanofit' )
	);
	$controls['header__background'] = array(
		'type'        => 'background',
		'section'     => 'headerGeneral'
	);

	$controls['header__info__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Site Info', 'customize', 'nanofit' )
	);

	$controls['header__extras'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Show Extra Items On The Header', 'nanofit' ),
		'choices'     => array(
			'cart'      => _x( 'Shopping Cart', 'customize', 'nanofit' ),
			'search'    => _x( 'Search Box', 'customize', 'nanofit' )
		)
	);

	/**
	 * Topbar Settings
	 */
	$controls['header__topbar'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Enable Topbar', 'customize', 'nanofit' )
	);

	// Topbar content
	$controls['header__topbar__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Content', 'customize', 'nanofit' )
	);

	$controls['header__topbar__typoHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Font', 'nanofit' ),
	);
	$controls['header__topbar__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerTopbar'
	);
	$controls['header__topbar__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Link Colors', 'nanofit' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Link Color', 'nanofit' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'nanofit' ),
			'menu-active' => esc_html__( 'Active Color', 'nanofit' )
		)
	);

	$controls['header__topbar__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Background', 'customize', 'nanofit' )
	);
	$controls['header__topbar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTopbar'
	);

	/**
	 * Navigation Bar Settings
	 */
	$controls['header__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Font', 'nanofit' ),
	);
	$controls['header__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Colors', 'nanofit' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'nanofit' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'nanofit' ),
			'menu-active' => esc_html__( 'Active Color', 'nanofit' )
		)
	);
	$controls[ 'header__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Margin', 'nanofit' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['header__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Padding', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'nanofit' ),
			'padding-right'  => esc_html__( 'Right', 'nanofit' ),
			'padding-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'padding-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	/**
	 * Sticky Header Settings
	 */
	$controls['header__sticky'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'nanofit' ),
		'default'     => 'on'
	);
	$controls['header__sticky__style'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Styles', 'customize', 'nanofit' ),
		'choices'     => array(
			'style1'  => _x( 'Style 1', 'customize', 'nanofit' ),
			'style2'  => _x( 'Style 2', 'customize', 'nanofit' ),
			'style3'  => _x( 'Style 3', 'customize', 'nanofit' ),
			'style4'  => _x( 'Style 4', 'customize', 'nanofit' )
		)
	);
	$controls['header__sticky__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerSticky',
		'label'       => _x( 'Logo that will be shown', 'customize', 'nanofit' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'nanofit' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'nanofit' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'nanofit' )
		)
	);
	$controls[ 'header__sticky__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Logo Margin', 'nanofit' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__sticky__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Height', 'customize', 'nanofit' )
	);
	$controls['header__sticky__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( '100% Full Width', 'customize', 'nanofit' )
	);
	
	$controls['header__sticky__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Enable Shadow', 'nanofit' ),
	);

	$controls['header__sticky__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Background', 'customize', 'nanofit' )
	);
	$controls['header__sticky__background'] = array(
		'type'        => 'background',
		'section'     => 'headerSticky'
	);

	$controls['header__sticky__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Font', 'nanofit' ),
	);
	$controls['header__sticky__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Colors', 'nanofit' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'nanofit' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'nanofit' ),
			'menu-active' => esc_html__( 'Active Color', 'nanofit' )
		)
	);
	$controls[ 'header__sticky__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Margin', 'nanofit' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['header__sticky__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Padding', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'nanofit' ),
			'padding-right'  => esc_html__( 'Right', 'nanofit' ),
			'padding-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'padding-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);


	/**
	 * Title bar
	 */
	$controls['header__titlebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Displays', 'customize', 'nanofit' ),
		'choices'     => array(
			'both'        => _x( 'Page Title and Breadcrumbs', 'customize', 'nanofit' ),
			'title'       => _x( 'Page Title Only', 'customize', 'nanofit' ),
			'breadcrumbs' => _x( 'Breadcrumbs Only', 'customize', 'nanofit' ),
			'none'        => _x( 'None', 'customize', 'nanofit' )
		)
	);
	$controls['header__titlebar__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Alignment', 'customize', 'nanofit' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'nanofit' ),
			'center' => _x( 'Center', 'customize', 'nanofit' ),
			'right'  => _x( 'Right', 'customize', 'nanofit' ),
			'inline' => _x( 'Inline', 'customize', 'nanofit' )
		)
	);
	$controls['header__titlebar__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Height', 'customize', 'nanofit' )
	);
	$controls['header__titlebar__home'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Display On The Homepage', 'customize', 'nanofit' )
	);
	$controls['header__titlebar__scrolldown'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Scroll Down Button', 'nanofit' ),
	);
	$controls['header__titlebar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Background', 'customize', 'nanofit' ),
		'description' => _x( '', 'customize', 'nanofit' )
	);
	$controls[ 'header__titlebar__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Margin', 'nanofit' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'nanofit' ),
			'margin-right'  => esc_html__( 'Right', 'nanofit' ),
			'margin-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'margin-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['header__titlebar__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Padding', 'nanofit' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'nanofit' ),
			'padding-right'  => esc_html__( 'Right', 'nanofit' ),
			'padding-bottom' => esc_html__( 'Bottom', 'nanofit' ),
			'padding-left'   => esc_html__( 'Left', 'nanofit' )
		)
	);
	$controls['header__titlebar__backgroundFeatured'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerTitle',
		'label'       => _x( 'Use Featured Image As Background in', 'customize', 'nanofit' ),
		'choices'     => 'nanofit_customize_post_types_options'
	);

	$controls['header__titlebar__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Page Title Font', 'customize', 'nanofit' )
	);
	$controls['header__titlebar__titleFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);

	$controls['header__titlebar__breadcrumbColors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Link Color', 'customize', 'nanofit' ),
		'choices'     => array(
			'link' => _x( 'Link Color', 'customize', 'nanofit' ),
			'linkHover' => _x( 'Hover Color', 'customize', 'nanofit' )
		)
	);


	/**
	 * Sticky Header Settings
	 */
	$controls['header__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'header__widgets',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'nanofit' ),
		'description' => _x( 'Turn ON to enable the header widgets area', 'customize', 'nanofit' ),
		'default'     => 'on'
	);

	return $controls;
}



function nanofit_customize_header_settings( $settings ) {
	$border_default = array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' );
	$settings = array_merge( $settings, array(
		'header__style'  => array( 'default' => 'style1' ),
		'header__logo'       => array( 'default' => 'logoDefault' ),
		'header__logoMargin' => array( 'default' => array() ),

		'header__width'      => array( 'default' => 'on' ),
		'header__height'     => array( 'default' => '' ),
		'header__background' => array( 'default' => array() ),
		'header__shadow'     => array( 'default' => 'off' ),
		'header__transparent' => array( 'default' => 'off' ),
		'header__extras'     => array( 'default' => array() ),

		'header__topbar'             => array( 'default' => 'off' ),
		'header__topbar__text'       => array( 'default' => 'Content here' ),
		'header__topbar__icons'      => array( 'default' => '' ),
		'header__topbar__background' => array( 'default' => array() ),
		'header__topbar__typography' => array( 'default' => array() ),
		'header__topbar__colors'     => array( 'default' => array() ),

		'header__nav__typography' => array( 'default' => array() ),
		'header__nav__colors'     => array( 'default' => array() ),
		'header__nav__margin'     => array( 'default' => array() ),
		'header__nav__padding' => array( 'default' => array() ),
		'header__nav__background' => array( 'default' => array() ),

		'header__sticky'             => array( 'default' => 'off' ),
		'header__sticky__style'      => array( 'default' => 'style1' ),
		'header__sticky__logo'       => array( 'default' => 'logoDefault' ),
		'header__sticky__logoMargin' => array( 'default' => array() ),

		'header__sticky__width'      => array( 'default' => 'on' ),
		'header__sticky__height'     => array( 'default' => '' ),
		'header__sticky__background' => array( 'default' => array() ),
		'header__sticky__shadow'     => array( 'default' => 'off' ),
		'header__sticky__nav__typography' => array( 'default' => array() ),
		'header__sticky__nav__colors'     => array( 'default' => array() ),
		'header__sticky__nav__margin'     => array( 'default' => array() ),
		'header__sticky__nav__padding'    => array( 'default' => array() ),

		'header__titlebar'         => array( 'default' => 'both' ),
		'header__titlebar__home'   => array( 'default' => 'on' ),
		'header__titlebar__align'  => array( 'default' => 'left' ),
		'header__titlebar__height' => array( 'default' => '' ),
		'header__titlebar__margin' => array( 'default' => array() ),
		'header__titlebar__padding' => array( 'default' => array() ),
		'header__titlebar__scrolldown' => array( 'default' => 'on' ),
		'header__titlebar__background'         => array( 'default' => array() ),
		'header__titlebar__backgroundFeatured' => array( 'default' => array() ),
		'header__titlebar__titleFont'          => array( 'default' => array() ),
		'header__titlebar__breadcrumbColors'   => array( 'default' => array() ),
	) );

	return $settings;
}
