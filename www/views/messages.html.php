<?php if (count($messages)): ?>
  <ul>
    <?php foreach ($messages as $message): ?>
      <li><?php echo $message; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
