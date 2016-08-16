<?php

namespace MOJ\CentreOfExcellence\Extras;

use WP_Query;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Remove Comments functionality
 */
// Removes from admin menu
function admin_menu_remove_comments() {
  remove_menu_page( 'edit-comments.php' );
}
add_action('admin_menu', __NAMESPACE__ . '\\admin_menu_remove_comments');

// Removes from post and pages
function init_remove_comments() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
}
add_action('init', __NAMESPACE__ . '\\init_remove_comments', 100);

// Removes from admin bar
function admin_bar_remove_comments() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\admin_bar_remove_comments');

/**
 * Hide 'Posts' post type
 */
// Removes from admin menu
function admin_menu_remove_posts() {
  remove_menu_page( 'edit.php' );
}
add_action('admin_menu', __NAMESPACE__ . '\\admin_menu_remove_posts');

/**
 * Include ACF fields from both parent & child theme.
 *
 * @param array $paths Directories to load ACF JSON files from.
 * @return array
 */
function acf_settings_load_json($paths) {
  if (is_child_theme()) {
    $paths[] = get_template_directory() . '/acf-json';
  }
  return $paths;
}
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\acf_settings_load_json');

/**
 * Create an ACF Options page.
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

/**
 * Disable frontend search functionality
 *
 * @param WP_Query $query
 */
function disable_search(WP_Query $query) {
  if (!is_admin() && $query->is_search()) {
    $query->is_search = false;
    $query->query_vars['s'] = false;
    $query->query['s'] = false;
    $query->is_404 = true;
  }
}
add_action('parse_query', __NAMESPACE__ . '\\disable_search');
