<?php
add_filter( 'acf/prepare_field/name=sidebar', function ( $field ) {
	global $wp_registered_sidebars;

	$custom_sidebars = (array) get_option( wp_get_theme()->Template . '_sidebars' );
	$custom_sidebars = array_merge($wp_registered_sidebars, $custom_sidebars);
	
	$field['choices'] = array();
	$field['choices']['default'] = esc_html__( 'Use Theme Default', 'nanofit' );

	foreach ($custom_sidebars as $id => $sidebar) {
		$field['choices'][$id] = $sidebar['name'];
	}

	return $field;
} );


function nanofit_override_sidebar_position( $position ) {
	$object = get_post();

	if ( is_singular() && isset( $object->ID ) && function_exists( 'get_field' ) ) {
		$sidebar_position = get_field('sidebarPosition', $object->ID);

		if ( ! empty( $sidebar_position ) && $sidebar_position != 'default' ) {
			$position = $sidebar_position;
		}
	}

	return $position;
}
add_filter( 'nanofit_sidebar_position', 'nanofit_override_sidebar_position', 99 );


function nanofit_override_sidebar_id( $id ) {
	$object = get_queried_object();

	if ( isset( $object->ID ) && function_exists( 'get_field' ) ) {
		$sidebar = get_field('sidebar', $object->ID);
		
		if ( ! empty( $sidebar ) && $sidebar != 'default' ) {
			$id = $sidebar;
		}
	}

	return $id;
}
add_filter( 'nanofit_sidebar_id', 'nanofit_override_sidebar_id', 99 );

//Fix v5.11

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_58fd663b3c896',
	'title' => 'Portfolio Category',
	'fields' => array(
		array(
			'key' => 'field_58fd6646cc667',
			'label' => 'Thumbnail',
			'name' => 'thumbnail',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'nproject-category',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_5dabd0121d9a6',
	'title' => 'Project Info',
	'fields' => array(
		array(
			'key' => 'field_5dabe18a9d10d',
			'label' => 'Client Logo',
			'name' => 'projectClientLogo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dabe1c59d10e',
			'label' => 'Accent Color',
			'name' => 'projectAccentColor',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => false,
			'return_format' => 'string',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'nproject',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_595f057296b63',
	'title' => 'Page Options',
	'fields' => array(
		array(
			'key' => 'field_595f057c5871a',
			'label' => 'Title Bar',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_595f05995871b',
			'label' => 'Title',
			'name' => 'title',
			'type' => 'text',
			'instructions' => 'Enter the custom title you want to show on the title bar.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_595f06045871c',
			'label' => 'Subtitle',
			'name' => 'subtitle',
			'type' => 'text',
			'instructions' => 'Enter the custom title you want to show on the title bar.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_59fa9e15663bf',
			'label' => 'Layout',
			'name' => 'titlebarLayout',
			'type' => 'select',
			'instructions' => 'Select the content layout for titlebar that you want to display.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Use Theme Setting',
				'both' => 'Page Title and Breadcrumbs',
				'title' => 'Page Title Only',
				'breadcrumbs' => 'Breadcrumbs Only',
				'none' => 'None',
			),
			'default_value' => 'default',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_59fa9ed623c88',
			'label' => 'Content Alignment',
			'name' => 'titlebarAlign',
			'type' => 'radio',
			'instructions' => 'Select an alignment for the titlebar content.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Use Theme Setting',
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right',
				'inline' => 'Inline',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_595f06195871d',
			'label' => 'Layout',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_595f06285871e',
			'label' => 'Sidebar Position',
			'name' => 'sidebarPosition',
			'type' => 'radio',
			'instructions' => 'Select the position of the primary sidebar for the current page/post.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Use Theme Setting',
				'none' => 'No Sidebar',
				'left' => 'Left',
				'right' => 'Right',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_595f06905871f',
			'label' => 'Custom Widgets Area',
			'name' => 'sidebar',
			'type' => 'select',
			'instructions' => 'Select the custom widgets area that will replace the primary sidebar area for this page/post.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_595f06285871e',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Use Theme Setting',
			),
			'default_value' => 'default',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_60daecf83043b',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_60daebf1237b6',
			'label' => 'Header Styles',
			'name' => 'headerStyles',
			'type' => 'radio',
			'instructions' => 'Select header style that will show this page/post.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Use Theme Setting',
				'style1' => 'Style 1',
				'style2' => 'Style 2',
				'style3' => 'Style 3',
				'style4' => 'Style 4',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'elementor_library',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;