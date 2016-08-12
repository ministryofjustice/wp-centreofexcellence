<section class="section">
  <h2 class="section__heading"><?php the_sub_field('header'); ?></h2>
  <div class="section__content">
    <?php
    $taxContacts = new WP_Query(array(
      'post_type' => 'tax-contact',
      'posts_per_page' => -1,
    ));
    ?>
    <?php if ($taxContacts->have_posts()): ?>
      <table class="table table--striped">
        <thead>
        <th>Departments</th>
        <th>Contact details</th>
        </thead>
        <tbody>
        <?php while ($taxContacts->have_posts()): $taxContacts->the_post(); ?>
          <tr>
            <td><?php the_field('departments'); ?></td>
            <td>
              <?php if (get_field('email')): ?>
                <a href="mailto:<?php the_field('email'); ?>" class="email-link">
                  <?php the_title(); ?>
                </a>
              <?php else: ?>
                <?php the_title(); ?>
              <?php endif; ?>
              <?php if (get_field('telephone')): ?>
                <br/>
                Telephone: <?php the_field('telephone'); ?>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>
