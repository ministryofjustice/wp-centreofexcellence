<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

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
