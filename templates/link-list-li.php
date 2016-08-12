<?php if ($link['type'] == 'Attachment'): ?>
  <?php

  // Get file extension
  $filename = $link['file']['filename'];
  $period = strrpos($filename, '.');
  if ($period !== false) {
    $ext = strtolower(substr($filename, $period + 1));
  } else {
    $ext = false;
  }

  ?>
  <li>
    <a href="<?php echo $link['file']['url']; ?>"><?php echo $link['name']; ?></a>
    <?php if ($ext): ?>
      <span class="help-text">(<?php echo $ext; ?>)</span>
    <?php endif; ?>
  </li>
<?php elseif ($link['type'] == 'Link'): ?>
  <?php

  // Determine if this is an external link
  $url = $link['link'];
  $has_protocol = (strpos($url, '://') !== false);
  $is_external_domain = (stripos($url, get_home_url()) !== 0);
  $external = ($has_protocol && $is_external_domain);

  ?>
  <li>
    <a href="<?php echo $link['link']; ?>"<?php if ($external) { ?> rel="external" target="_blank" <?php } ?>>
      <?php echo $link['name']; ?>
    </a>
  </li>
<?php endif; ?>
