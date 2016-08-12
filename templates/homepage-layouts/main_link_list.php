<section class="section">
  <h2 class="section__heading"><?php the_sub_field('header'); ?></h2>
  <div class="section__content">
    <?php
    $links = get_sub_field('links');
    $first_half = array_slice($links, 0, ceil(count($links)/2));
    $second_half = array_slice($links, ceil(count($links)/2));
    ?>
    <?php if (!empty($links)): ?>
      <div class="grid-row grid-row--narrow">
        <div class="column-one-half">
          <ul class="link-list">
            <?php
            foreach ($first_half as $link) {
              include(locate_template('templates/link-list-li.php'));
            }
            ?>
          </ul>
        </div>
        <div class="column-one-half">
          <ul class="link-list">
            <?php
            foreach ($second_half as $link) {
              include(locate_template('templates/link-list-li.php'));
            }
            ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
