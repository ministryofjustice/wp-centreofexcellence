<?php

namespace Roots\Sage\CPT;

class TaxContact {
  public $postType = 'tax-contact';

  public function __construct() {
    add_action('init', array($this, 'register_post_type'));
  }

  public function register_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'Tax Contacts',
        'singular_name' => 'Tax Contact',
      ),
      'public' => false,
      'show_ui' => true,
      'menu_icon' => 'dashicons-id',
      'supports' => array(
        'title',
      ),
    );

    register_post_type($this->postType, $args);
  }
}

return new TaxContact();
