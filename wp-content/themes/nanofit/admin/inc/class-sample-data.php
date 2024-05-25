<?php
defined( 'ABSPATH' ) or die();

add_filter( 'ocdi/import_files', 'nanofit_import_files' );

add_action( 'ocdi/after_import', 'nanofit_after_import_setup' );

function nanofit_import_files() {
  return [
    [
      'import_file_name'             => 'Demo Import',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/customizer.dat',
      'preview_url'                  => 'https://live.21lab.co/nanofit/',
    ],
  ];
}

function nanofit_after_import_setup() {
    // Assign menus to their locations.
    $top_menu     = get_term_by('name', 'Top Menu', 'nav_menu');
    $main_menu    = get_term_by('name', 'Main Menu', 'nav_menu' );
    $mobile_menu  = get_term_by('name', 'Mobile Menu', 'nav_menu');
 
    set_theme_mod( 'nav_menu_locations', [
            'top'     => $top_menu->term_id,
            'primary' => $main_menu->term_id,
            'sliding'  => $mobile_menu->term_id
        ]
    );
 
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );
 
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'widget_block', '0' );

    //Import Revolution Slider
    if ( class_exists( 'RevSlider' ) ) {
         $slider_array = array(
            get_template_directory()."/demo/home1.zip"
            );

         $slider = new RevSlider();
     
         foreach($slider_array as $filepath){
           $slider->importSliderFromPost(true,true,$filepath);  
         }
     
         echo ' Slider processed';
    }   
}