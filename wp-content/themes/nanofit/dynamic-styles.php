<?php
defined( 'ABSPATH' ) or die();

// Generate the background styles based on the
// given options key
$background_options = array(
	'global__layout__background'      => 'body',
	'header__background'              => '#site-header',
	'header__topbar__background'      => '#site-topbar',
	'header__sticky__background'      => '#site-header-sticky',
	// Title bar
	'header__titlebar__background'    => '.site-content .content-header'
);

foreach ( $background_options as $key => $selector ) {
	nanofit_define_style( $selector, nanofit_background_styles(
		nanofit_option( $key )
	) );
}

$queried_object = get_queried_object();

if ( $queried_object instanceOf WP_Post ) {
	$featured_background_types = (array) nanofit_option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = nanofit_current_post_type();
	
	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail( $queried_object->ID ) ) {
		list($src, $width, $height, $crop) = wp_get_attachment_image_src( get_post_thumbnail_id( $queried_object->ID ), 'full', false );
		
		nanofit_define_style( '.site-content .content-header', array(
			'background-image' => sprintf( 'url(%s)', $src )
		) );
	}
}


// Generate the typography styles based on the
// given options key
$typography_options = array(
	'global__typography__body'              => 'body',
	'global__typography__h1'                => 'h1',
	'global__typography__h2'                => 'h2',
	'global__typography__h3'                => 'h3',
	'global__typography__h4'                => 'h4',
	'global__typography__h5'                => 'h5',
	'global__typography__h6'                => 'h6',
	'global__typography__blockquote'        => 'blockquote',
	'header__topbar__typography'            => '#site-topbar',
	'header__nav__typography'               => '.site-header .navigator > .menu > li a',
	'header__sticky__nav__typography'       => '.site-header-sticky .navigator > .menu > li a',

	// Title bar
	'header__titlebar__titleFont' => '.content-header .page-title-inner,.ctaBox h2',

	// Widget
	'global__widget__title'   => '.widget > .widget-title, .widget .wp-block-group h2',
	'global__widget__content' => '.widget',

	// Sliding content
	'sliding__sidebarTypography'  => '.off-canvas-left .off-canvas-wrap .widget',
	'sliding__menuTypography'     => '.sliding-menu',

	// Content bottom widgets
	'contentBottom__widgets__typography'   => '.content-bottom-widgets .widget',
	'contentBottom__widgets__title'        => '.content-bottom-widgets .widget-title',

	// Footer typography
	'footer__typography'            => '.site-footer',
	'footer__copyright__typography' => '.footer-copyright',
	'footer__widgets__typography'   => '#site-footer .footer-widgets .widget',
	'footer__widgets__title'        => '#site-footer .footer-widgets .widget-title'

);

foreach ( $typography_options as $key => $selector ) {
	nanofit_define_style( $selector, nanofit_typography_styles(
		(array) nanofit_option( $key )
	) );
}

if ( $heading_sizes = nanofit_option( 'global__typography__headingSize' ) ) {
	foreach ( $heading_sizes as $tag => $size ) {
		nanofit_define_style( $tag, array(
			'font-size' => $size
		) );
	}
}

// Generate the text colors based on the
// given options key
$text_color_options = array( 'global__typography__colors' );

foreach ( $text_color_options as $key ) {
	$color_values = array_filter( nanofit_option( $key ) );
	
	foreach ( $color_values as $selector => $color ) {
		nanofit_define_style( $selector, array(
			'color' => $color
		) );
	}
}

$nav_colors_options = array(
	'header__topbar__colors' => array(
		'menu'        => '#site-topbar a',
		'menu-hover'  => '#site-topbar a:hover,#site-topbar .menu-top li:hover a',
		'menu-active' => array(
			'#site-topbar .menu-top li.current-menu-item > a',
			'#site-topbar .menu-top li.current_page_item > a',
			'#site-topbar .menu-top li.current-menu-ancestor > a',
			'#site-topbar .menu-top li.current-menu-parent > a',
			'#site-topbar .menu-top li.current-page-ancestor > a'
		)
	),
	'header__nav__colors' => array(
		'menu'        => '#site-header a',
		'menu-hover'  => '#site-header a:hover,#site-header .navigator .menu > li:hover > a',
		'menu-active' => array(
			'#site-header .navigator .menu > li.current-menu-item > a',
			'#site-header .navigator .menu > li.current_page_item > a',
			'#site-header .navigator .menu > li.current-menu-ancestor > a',
			'#site-header .navigator .menu > li.current-menu-parent > a',
			'#site-header .navigator .menu > li.current-page-ancestor > a'
		)
	),
	'header__sticky__nav__colors' => array(
		'menu'        => '#site-header-sticky a',
		'menu-hover'  => '#site-header-sticky a:hover,#site-header-sticky .navigator .menu > li:hover > a',
		'menu-active' => array(
			'#site-header-sticky .navigator .menu > li.current-menu-item > a',
			'#site-header-sticky .navigator .menu > li.current_page_item > a',
			'#site-header-sticky .navigator .menu > li.current-menu-ancestor > a',
			'#site-header-sticky .navigator .menu > li.current-menu-parent > a',
			'#site-header-sticky .navigator .menu > li.current-page-ancestor > a'
		)
	),
	'header__titlebar__breadcrumbColors' => array(
		'link'      => '.breadcrumbs a',
		'linkHover' => '.breadcrumbs a:hover'
	),

	// Widget link color
	'global__widget__linkColors' => array(
		'link'      => '.main-sidebar a',
		'linkHover' => '.main-sidebar a:hover'
	),

	// Sliding content color
	'sliding__sidebarColors' => array(
		'link'      => '.off-canvas-left a',
		'linkHover' => '.off-canvas-left a:hover'
	),
	'sliding__menuColors' => array(
		'link'      => '.sliding-menu .off-canvas-wrap a',
		'linkHover' => '.sliding-menu .off-canvas-wrap a:hover'
	),

	// Content bottom widgets
	'contentBottom__widgets__colors' => array(
		'link'      => '.content-bottom-widgets a',
		'linkHover' => '.content-bottom-widgets a:hover'
	),

	// Footer
	'footer__colors' => array(
		'link'      => '.site-footer a',
		'linkHover' => '.site-footer a:hover'
	),
	'footer__widgets__colors' => array(
		'link'      => '.site-footer .footer-widgets a',
		'linkHover' => '.site-footer .footer-widgets a:hover'
	),
	'footer__copyright__colors' => array(
		'link'      => '.site-footer .footer-copyright a',
		'linkHover' => '.site-footer .footer-copyright a:hover'
	),
);

foreach ( $nav_colors_options as $option_key => $selectors ) {
	$colors = nanofit_option( $option_key );

	foreach ( $colors as $key => $value ) {
		$selector = is_array( $selectors[ $key ] )
			? join( ', ', $selectors[ $key ] )
			: $selectors[ $key ];

		nanofit_define_style( $selector, array(
			'color' => $value
		) );
	}
}

// Generate the layout width settings
nanofit_define_style( '.wrap',
	(array) nanofit_option( 'global__layout__width' )
);

// The content padding styles
nanofit_define_style( '.content-body-inner',
	(array) nanofit_option( 'global__layout__padding' )
);

/**
 * The header options
 */
nanofit_define_style( '.site-header .header-brand',
	(array) nanofit_option( 'header__logoMargin' )
);
nanofit_define_style( '.site-header .site-header-inner', array(
	'height' => nanofit_option( 'header__height' )
) );
nanofit_define_style( '.site-header .navigator .menu',
	(array) nanofit_option( 'header__nav__margin' )
);
nanofit_define_style( '.site-header .navigator .menu > li > a',
	(array) nanofit_option( 'header__nav__padding' )
);

/**
 * The header options
 */
nanofit_define_style( '.site-header-sticky .header-brand',
	(array) nanofit_option( 'header__sticky__logoMargin' )
);
nanofit_define_style( '.site-header-sticky .site-header-inner', array(
	'height' => nanofit_option( 'header__sticky__height' )
) );
nanofit_define_style( '.site-header-sticky .navigator .menu',
	(array) nanofit_option( 'header__sticky__nav__margin' )
);
nanofit_define_style( '.site-header-sticky .navigator .menu > li > a',
	(array) nanofit_option( 'header__sticky__nav__padding' )
);

nanofit_define_style( '#site-content .content-header', (array) nanofit_option( 'header__titlebar__margin' ) );
nanofit_define_style( '#site-content .content-header', (array) nanofit_option( 'header__titlebar__padding' ) );
nanofit_define_style( '.content-header .content-header-inner', array( 'height' => nanofit_option( 'header__titlebar__height' ) ) );


/**
 * The logo size
 */
foreach ( array( 'logoDefault', 'logoLight', 'logoDark' ) as $logo_profile ) {
	$size = (array) nanofit_option( "{$logo_profile}__logoSize" );
	$size = array_filter( $size );

	nanofit_define_style( ".logo.{$logo_profile}", $size );
}


/**
 * The sliding content
 */
if ( is_active_sidebar( 'off-canvas-left' ) ) {
	nanofit_define_style( '.off-canvas-left', nanofit_background_styles(
		(array) nanofit_option( 'sliding__sidebarBackground' )
	) );
	nanofit_define_style( '.off-canvas-left .off-canvas-wrap', (array) nanofit_option( 'sliding__sidebarPadding' ) );
}
// if ( has_nav_menu( 'sliding' ) ) {
	nanofit_define_style( '.sliding-menu', nanofit_background_styles(
		(array) nanofit_option( 'sliding__menuBackground' )
	) );
	nanofit_define_style( '.sliding-menu .off-canvas-wrap', (array) nanofit_option( 'sliding__menuPadding' ) );
// }


/**
 * Sidebar Styles
 */
if ( nanofit_has_sidebar() && is_active_sidebar( nanofit_sidebar_id() ) ) {
	$layout_dimension = nanofit_option( 'global__layout__width' );
	$sidebar_dimension = nanofit_option( 'global__sidebar__dimension' );
	$padding_side = nanofit_sidebar_position() == 'right' ? 'padding-left' : 'padding-right';

	nanofit_define_style( '#main-content', array(
		'width' => sprintf( 'calc(100%% - %spx)', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] )
	) );
	nanofit_define_style( '.main-sidebar', array(
		'width' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] ),
		$padding_side => $sidebar_dimension['margin']
	) );
	nanofit_define_style( '.sidebar-right .content-body-inner::before', array(
		'right' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin']/2 )
	) );
	nanofit_define_style( '.sidebar-left .content-body-inner::before', array(
		'left' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin']/2 )
	) );
}

/**
 * The widget styles
 */
nanofit_define_style( '.widget', (array) nanofit_option( 'global__widget__contentPadding' ) );
nanofit_define_style( '.widget', (array) nanofit_option( 'global__widget__contentMargin' ) );

/**
 * Button styles
 */
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'background' => nanofit_option( 'button__background' )
) );
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button', array( 
	'height' => nanofit_option( 'button__height' ) 
) );
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button', nanofit_typography_styles(
	(array) nanofit_option( 'button__typography' )
) );
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button',
	(array) nanofit_option( 'button__padding' )
);
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button', nanofit_border_styles(
	(array) nanofit_option( 'button__border' )
) );
nanofit_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'border-radius' => nanofit_option( 'button__borderRadius' )
) );

/**
 * Input styles
 */
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', array(
	'background' => nanofit_option( 'input__background' )
) );
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), select', array( 
	'height' => nanofit_option( 'input__height' ) 
) );
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', nanofit_typography_styles(
	(array) nanofit_option( 'input__typography' )
) );
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select',
	(array) nanofit_option( 'input__padding' )
);
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', nanofit_border_styles(
	(array) nanofit_option( 'input__border' )
) );
nanofit_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', array(
	'border-radius' => nanofit_option( 'input__borderRadius' )
) );

// Content bottom widgets
if ( nanofit_option( 'contentBottom__widgets' ) == 'on' ) {
	nanofit_define_style( '#site-footer .content-bottom-widgets', nanofit_background_styles(
		(array) nanofit_option( 'contentBottom__widgets__background' )
	) );
	nanofit_define_style( '#site-footer .content-bottom-widgets', (array) nanofit_option( 'contentBottom__widgets__padding' ) );
	nanofit_define_style( '#site-footer .content-bottom-widgets .widget', (array) nanofit_option( 'contentBottom__widgets__margin' ) );
}


/**
 * Footer styles
 */
nanofit_define_style( '#site-footer', nanofit_background_styles(
	(array) nanofit_option( 'footer__background' )
) );
nanofit_define_style( '.site-footer', (array) nanofit_option( 'footer__padding' ) );

// Footer widgets
if ( nanofit_option( 'footer__widgets' ) == 'on' ) {
	nanofit_define_style( '.footer-widgets', nanofit_background_styles(
		(array) nanofit_option( 'footer__widgets__background' )
	) );
	nanofit_define_style( '#site-footer .footer-widgets', (array) nanofit_option( 'footer__widgets__padding' ) );
	nanofit_define_style( '#site-footer .footer-widgets .widget', (array) nanofit_option( 'footer__widgets__margin' ) );
}

// Footer copyright
if ( nanofit_option( 'footer__copyright' ) == 'on' ) {
	nanofit_define_style( '.site-footer .footer-copyright', nanofit_background_styles(
		(array) nanofit_option( 'footer__copyright__background' )
	) );
	nanofit_define_style( '.site-footer .footer-copyright', (array) nanofit_option( 'footer__copyright__padding' ) );
}

/**
 * Shop
 */
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$grid_spacing = abs( (int)nanofit_option( 'shop__gridGutter' ) );
	
	nanofit_define_style( '.content-inner.products[data-grid] .product,.content-inner.products[data-grid-normal] .product', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	nanofit_define_style( '.content-inner.products[data-grid],.content-inner.products[data-grid-normal]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Projects
 */
if ( is_post_type_archive( 'nproject' ) ||
	 is_tax( 'nproject-category' ) ||
	 is_tax( 'nproject-tag' ) ||
	 is_page_template( 'tmpl/template-projects.php' ) ) {

	$grid_spacing = abs( (int)nanofit_option( 'projects__gridGutter' ) );
	
	nanofit_define_style( '.content-inner[data-grid] .project', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	nanofit_define_style( '.projects .content-inner[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Blog
 */
$grid_spacing = abs( (int)nanofit_option( 'blog__archive__gridGutter' ) );
	
nanofit_define_style( '.content-inner[data-grid] .post, .content-inner[data-grid-normal] .post', array(
	'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
	'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
	'margin-bottom' => sprintf( '%dpx', $grid_spacing )
) );

nanofit_define_style( '.content-inner[data-grid], .content-inner[data-grid-normal]', array(
	'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
	'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
) );

/**
 * Loading screen
 */
$loading_screen_enabled = nanofit_option( 'global__misc__loading' );

if ( $loading_screen_enabled === 'off' ) {
	nanofit_define_style( 'body:not(.is-loaded):after, body:not(.is-loaded):before', array(
		'content' => 'none !important'
	) );
}
