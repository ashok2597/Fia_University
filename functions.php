<?php

function registerThemeStylesheetsAndScripts() {
  wp_enqueue_style(
    'fiauniversity-core',
    get_template_directory_uri() . '/assets/styles/fiauniversity-core.css',
    // array('reforma-fonts-css'),
    wp_get_theme()->get('Version'),
    false // true to put into footer, false to put in head
  );

  // TODO: Swiper enqueue // Not working
  // wp_enqueue_script(
  //   'swiper-bundle.min', 
  //   'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 
  //   array(),
  //   wp_get_theme()->get('Version'),
  //   true // true to put into footer, false to put in head
  // );
  
  wp_enqueue_script(
    'app',
    get_template_directory_uri() . '/assets/scripts/app.js',
    // array('swiper-bundle.min'),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action( 'wp_enqueue_scripts', 'registerThemeStylesheetsAndScripts' );

function wp_register_nav_menu(){
  register_nav_menus( array(
      'header_menu' => __( 'Header Menu'),
      'footer_links_menu'  => __( 'Footer Links Menu'),
  ) );
}
add_action( 'after_setup_theme', 'wp_register_nav_menu', 0 );

// function theme_custom_logo_setup() {
//   $defaults = array(
//   'height'      => 100,
//   'width'       => 400,
//   'flex-height' => true,
//   'flex-width'  => true,
//   'header-text' => array( 'site-title', 'site-description' ),
//   'unlink-homepage-logo' => true, 
//   );
//   add_theme_support( 'custom-logo', $defaults );
// }

// add_action( 'after_setup_theme', 'theme_custom_logo_setup' );

add_theme_support( 'custom-logo');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');


function wp_custom_post_type() {
  // register_post_type(
  //   'service',
  //   array(
  //     'labels' => array(
  //       'name' => __('XServices'),
  //       'singular_name' => __('XService'),
  //       'all_items'         => __('XAll Services'),
  //     ),
  //     // 'taxonomies' => array('brand', 'category'),
  //     'public' => true,
  //     'has_archive' => true,
  //     'publicly_queryable' => true,
  //     'supports' =>  ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats', 'categories'],
  //     'show_ui' => true,
  //     'show_in_rest' => true,
  //     'menu_icon' => 'dashicons-pets',
  //     'exclude_from_search' => true
  //   )
  // );

  register_post_type(
    'research',
    array(
      'labels' => array(
        'name' => __('Research'),
        'singular_name' => __('Research'),
        'all_items'         => __('All Research'),
      ),
      // 'taxonomies' => array('brand', 'category'),
      'public' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'supports' =>  ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats', 'categories'],
      'show_ui' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'exclude_from_search' => true,
      // 'taxonomies'          => array( 'category' ),
    )
  );

  register_post_type(
    'team',
    array(
      'labels' => array(
        'name' => __('Team Members'),
        'singular_name' => __('Team Member'),
        'all_items'         => __('All Team Members'),
      ),
      // 'taxonomies' => array('brand', 'category'),
      'public' => true,
      // 'has_archive' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'supports' =>  ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats', 'categories'],
      'show_ui' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-admin-users',
      'exclude_from_search' => true,
      'taxonomies'          => array( 'category' ),
    )
  );

  // register_post_type(
  //   'careers',
  //   array(
  //     'labels' => array(
  //       'name' => __('Careers'),
  //       'singular_name' => __('Career'),
  //       'all_items'         => __('All Careers'),
  //     ),
  //     // 'taxonomies' => array('brand', 'category'),
  //     'public' => true,
  //     'has_archive' => true,
  //     'publicly_queryable' => true,
  //     'supports' =>  ['title', 'editor', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats', 'categories'],
  //     'show_ui' => true,
  //     'show_in_rest' => true,
  //     'menu_icon' => 'dashicons-welcome-learn-more',
  //     'exclude_from_search' => true
  //   )
  // );
}
add_action('init', 'wp_custom_post_type');


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'     => 'Globals',
    'menu_title'    => 'Globals',
    'menu_slug'     => 'global-settings',
    'capability'    => 'edit_posts',
    'redirect'        => false,
    // 'icon_url' => 'dashicons-phone'
  ));
}
?>