<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/**
 * Adds the Customize page to the WordPress admin area
 */
function example_customizer_menu() {
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'example_customizer_menu' );

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function example_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'custom_headers',
        array(
            'title' => 'Custom Header Images',
            'description' => 'This is where you can upload an image to be used as the header on the main blog page.',
            'priority' => 35,
        )
    );
  
  $wp_customize->add_setting( 'header-img-upload' );
 
  $wp_customize->add_control(
      new WP_Customize_Upload_Control(
          $wp_customize,
          'header-img-upload',
          array(
              'label' => 'Main Blog Header Image',
              'section' => 'custom_headers',
              'settings' => 'header-img-upload'
          )
      )
  );
  
  $wp_customize->add_setting( 'default-header-img' );
 
  $wp_customize->add_control(
      new WP_Customize_Upload_Control(
          $wp_customize,
          'default-header-img',
          array(
              'label' => 'Default Header Image',
              'section' => 'custom_headers',
              'settings' => 'default-header-img'
          )
      )
  );
  
  $categories =   $categories = get_categories('');
  foreach ( $categories as $category ) { 
      $wp_customize->add_setting( 'cat-' . $category->name . '-img' );
 
      $wp_customize->add_control(
          new WP_Customize_Upload_Control(
              $wp_customize,
              'cat-' . $category->name . '-img',
              array(
                  'label' => $category->name .' Category Header Image',
                  'section' => 'custom_headers',
                  'settings' => 'cat-' . $category->name . '-img'
              )
          )
      );

  }
}
add_action( 'customize_register', 'example_customizer' );

?>