<?php

use MOJ\CentreOfExcellence\Setup;
use MOJ\CentreOfExcellence\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>
    <div class="page-container" id="content">
      <?php include Wrapper\template_path(); ?>
    </div>
    <?php
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
    ?>
  </body>
</html>
