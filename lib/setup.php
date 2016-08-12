<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/editor.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  wp_enqueue_style('sage/ie8', Assets\asset_path('styles/ie8.css'), false, null);
  wp_style_add_data('sage/ie8', 'conditional', 'IE 8');

  wp_enqueue_style('sage/ie7', Assets\asset_path('styles/ie7.css'), false, null);
  wp_style_add_data('sage/ie7', 'conditional', 'IE 7');

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), array('jquery'), null, true);

  wp_enqueue_script('sage/html5', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js', array(), null);
  wp_script_add_data('sage/html5', 'conditional', 'lte IE 8');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
