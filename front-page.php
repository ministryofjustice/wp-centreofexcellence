<?php the_post(); ?>

<article class="grid-row">
  <div class="column-two-thirds">

    <?php

    /**
     * Main content
     */
    $layout_templates = array(
      'text_section' => 'text_section',
      'link_list' => 'main_link_list',
      'department_contacts' => 'department_contacts',
    );
    while (have_rows('main_content')) {
      the_row();
      $layout = get_sub_field('acf_fc_layout');
      get_template_part('templates/homepage-layouts/' . $layout_templates[$layout]);
    }

    ?>
  </div>
  <div class="column-one-third">

    <?php

    /**
     * Sidebar content
     */
    $layout_templates = array(
      'text_section' => 'text_section',
      'link_list' => 'sidebar_link_list',
    );
    while (have_rows('sidebar_content')) {
      the_row();
      $layout = get_sub_field('acf_fc_layout');
      get_template_part('templates/homepage-layouts/' . $layout_templates[$layout]);
    }

    ?>

  </div>
</article>
