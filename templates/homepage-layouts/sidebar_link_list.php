<?php

/**
 * NOTE: all link lists will have class 'section__content--smaller'
 *       unless the header is 'Our offerings'
 */

$content_class = 'section__content';
$header = trim(strtolower(get_sub_field('header')));
if ($header !== 'our offerings') {
  $content_class .= ' section__content--smaller';
}

?>

<section class="section">
  <h2 class="section__heading"><?php the_sub_field('header'); ?></h2>
  <div class="<?php echo $content_class; ?>">
    <?php
    $links = get_sub_field('links');
    ?>
    <?php if (!empty($links)): ?>
      <ul class="link-list">
        <?php
        foreach ($links as $link) {
          include(locate_template('templates/link-list-li.php'));
        }
        ?>
      </ul>
    <?php endif; ?>
  </div>
</section>
