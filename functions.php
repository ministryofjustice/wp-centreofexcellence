<?php
/**
 * This theme was built using Sage 8.4.2 by Roots
 * Available here: https://github.com/roots/sage/releases/tag/8.4.2
 *
 * -----------------------------------------------------------------------------
 *
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = array(
  'lib/assets.php',             // Scripts and stylesheets
  'lib/commands.php',           // WP-CLI commands
  'lib/custom-post-types.php',  // Register custom post types
  'lib/extras.php',             // Custom functions
  'lib/setup.php',              // Theme setup
  'lib/titles.php',             // Page titles
  'lib/wrapper.php',            // Theme wrapper class
  'lib/customizer.php'          // Theme customizer
);

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Get the current version of WP
 *
 * This is provided for external resources to resolve the current wp_version
 *
 * @return string
 */
function moj_wp_version()
{
  global $wp_version;
  return $wp_version;
}

if (function_exists("add_action")) {
  add_action('rest_api_init', function () {
    register_rest_route('moj', '/version', array(
      'methods' => 'GET',
      'callback' => 'moj_wp_version'
    ));
  });
}
