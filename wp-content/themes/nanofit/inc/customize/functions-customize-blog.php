<?php
defined( 'ABSPATH' ) or die();

add_filter( 'nanofit_customize_containers', 'nanofit_customize_blog_containers' );
add_filter( 'nanofit_customize_settings', 'nanofit_customize_blog_settings' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_blog_archive' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_blog_single' );
add_filter( 'nanofit_customize_controls', 'nanofit_customize_blog_related' );


function nanofit_customize_blog_containers( $containers ) {
	$containers['blog'] = array(
		'type'            => 'panel',
		'title'           => esc_html__( 'Blog & Post', 'nanofit' )
	);
	$containers['blogArchive'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Blog Settings', 'nanofit' )
	);
	$containers['blogSingle'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Post Settings', 'nanofit' )
	);
	$containers['blogAuthor'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Author Box', 'nanofit' ),
	);
	$containers['blogRelated'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Related Posts', 'nanofit' ),
	);

	return $containers;
}


function nanofit_customize_blog_settings( $settings ) {
	$settings['blog__archive__style']           = array( 'default' => 'grid' );
	$settings['blog__archive__columns']         = array( 'default' => 3 );
	$settings['blog__archive__gridGutter']      = array( 'default' => 60 );
	$settings['blog__archive__imagesize']       = array( 'default' => 'full' );
	$settings['blog__archive__imagesizeCrop']   = array( 'default' => 'crop' );
	$settings['blog__archive__autoExcerpt']     = array( 'default' => 'on' );
	$settings['blog__archive__excerptLength']   = array( 'default' => '145' );
	$settings['blog__archive__postMeta']        = array( 'default' => 'on' );
	$settings['blog__archive__readmore']        = array( 'default' => 'on' );
	$settings['blog__archive__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__archive__sidebarPosition'] = array( 'default' => 'none' );
	
	$settings['blog__single__postMeta']        = array( 'default' => 'on' );
	$settings['blog__single__postTags']        = array( 'default' => 'on' );
	$settings['blog__single__postNav']         = array( 'default' => 'on' );
	$settings['blog__single__postAuthor']      = array( 'default' => 'on' );
	$settings['blog__single__relatedPosts']    = array( 'default' => 'on' );
	$settings['blog__single__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__single__sidebarPosition'] = array( 'default' => 'right' );
	
	$settings['blog__related__title']       = array( 'default' => 'Related Posts' );
	$settings['blog__related__type']        = array( 'default' => 'category' );
	$settings['blog__related__gridColumns'] = array( 'default' => '3' );
	$settings['blog__related__count']       = array( 'default' => '3' );

	return $settings;
}


function nanofit_customize_blog_archive( $controls ) {
	$controls['blog__archive__style'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Blog Layout', 'nanofit' ),
		'section' => 'blogArchive',
		'default' => 'grid',
		'choices' => array(
			'grid'   => esc_html__( 'Grid', 'nanofit' ),
			'list'  => esc_html__( 'List', 'nanofit' )
		)
	);
	$controls['blog__archive__columns'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Grid Columns', 'nanofit' ),
		'section' => 'blogArchive',
		'choices' => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['blog__archive__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'nanofit' ),
	);
	$controls['blog__archive__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label' => esc_html__( 'Image Size', 'nanofit' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'nanofit' )
	);
	$controls['blog__archive__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogArchive',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'nanofit'),
			'none' => esc_html__('None', 'nanofit')
		)
	);
	$controls['blog__archive__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'nanofit' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__readmore'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Read More', 'nanofit' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__autoExcerpt'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Auto Post Excerpt', 'nanofit' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);

	$controls['blog__archive__excerptLength'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Post Excerpt Length', 'nanofit' ),
		'section' => 'blogArchive',
		'default' => 145
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__archive__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar Position', 'nanofit' ),
		'choices' => array(
			'none' => esc_html__( 'No Sidebar', 'nanofit' ),
			'left'       => esc_html__( 'Left', 'nanofit' ),
			'right'      => esc_html__( 'Right', 'nanofit' )
		)
	);
	$controls['blog__archive__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar', 'nanofit' ),
		'choices' => 'nanofit_customize_dropdown_sidebars'
	);
	
	return $controls;
}


function nanofit_customize_blog_single( $controls ) {
	$controls['blog__single__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'nanofit' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postTags'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Tags', 'nanofit' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postNav'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Navigator', 'nanofit' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postAuthor'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Author', 'nanofit' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__relatedPosts'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Related Posts', 'nanofit' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__single__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar Position', 'nanofit' ),
		'choices' => array(
			'none'    => esc_html__( 'No Sidebar', 'nanofit' ),
			'left'  => esc_html__( 'Left', 'nanofit' ),
			'right' => esc_html__( 'Right', 'nanofit' )
		)
	);
	$controls['blog__single__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar', 'nanofit' ),
		'choices' => 'nanofit_customize_dropdown_sidebars'
	);
	
	return $controls;
}


function nanofit_customize_blog_related( $controls ) {
	$controls['blog__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'nanofit' ),
		'section' => 'blogRelated',
		'default' => esc_html__( 'Related Posts', 'nanofit' )
	);

	$controls['blog__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Posts', 'nanofit' ),
		'section' => 'blogRelated',
		'default' => esc_html__( '3', 'nanofit' )
	);

	$controls['blog__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogRelated',
		'label'       => esc_html__( 'Grid Columns', 'nanofit' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['blog__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'blogRelated',
		'label' => esc_html__( 'Show Related Posts Based On', 'nanofit' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => esc_html__( 'Tag', 'nanofit' ),
			'category' => esc_html__( 'Category', 'nanofit' ),
			'random'   => esc_html__( 'Random', 'nanofit' ),
			'recent'   => esc_html__( 'Recent', 'nanofit' )
		)
	);

	return $controls;
}
