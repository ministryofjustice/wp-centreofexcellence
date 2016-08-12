<?php if ($link['type'] == 'Attachment'): ?>
  <?php
  $filenameParts = explode('.', $link['file']['filename']);
  $ext = array_pop($filenameParts);
  ?>
  <li>
    <a href="<?php echo $link['file']['url']; ?>"><?php echo $link['name']; ?></a>
    <span class="help-text">(<?php echo $ext; ?>)</span>
  </li>
<?php elseif ($link['type'] == 'Link'): ?>
  <li>
    <a href="<?php echo $link['link']; ?>" rel="external">
      <?php echo $link['name']; ?>
    </a>
  </li>
<?php endif; ?>
