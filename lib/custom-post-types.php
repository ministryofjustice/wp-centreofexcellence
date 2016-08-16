<?php

namespace MOJ\CentreOfExcellence\CPT;

/**
 * Class CPT
 *
 * Custom post types in the 'cpt' dir should extend this class.
 *
 * EXAMPLE USAGE:
 * ==============
 * File: cpt/tax-contact.php
 *
 * class TaxContact extends CPT {
 *   public $postType = 'tax-contact';
 *
 *   public $args = array(
 *     'labels' => array(
 *       'name' => 'Tax Contacts',
 *       'singular_name' => 'Tax Contact',
 *     ),
 *     'public' => false,
 *     'show_ui' => true,
 *     'menu_icon' => 'dashicons-id',
 *     'supports' => array(
 *       'title',
 *     ),
 *   );
 * }
 *
 * @package MOJ\CentreOfExcellence\CPT
 */
abstract class CPT {
  /**
   * Post type key, must not exceed 20 characters.
   *
   * @var string
   */
  public $postType;

  /**
   * Array of arguments for registering a post type.
   *
   * @var array
   */
  public $args;

  /**
   * CPT class constructor
   */
  public function __construct() {
    add_action('init', array($this, 'register_post_type'));
  }

  /**
   * Register the custom post type in WordPress
   */
  public function register_post_type() {
    register_post_type($this->postType, $this->args);
  }
}

$path = dirname(__FILE__) . '/cpt/';
$files = scandir($path);
$files = array_filter($files, function ($f) {
  return substr($f, 0, 1) !== '.';
});

$customPostTypes = array();

foreach ($files as $file) {
  $cpt = require_once $path . $file;
  $customPostTypes[$cpt->postType] = $cpt;
}
