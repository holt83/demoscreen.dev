<?php

/**
 * @file
 * Theme implementation for displaying a node in the Demo theme.
 */
?>
  
<div id="demo-content" >
  <!-- Render the content of the demoscreen -->
  <?php print render($content);?>
</div>

<!-- Print loading image-tag and render audio-tag if view_mode is full -->
<?php if ($view_mode == 'full'): ?>
  <?php print $loading_image ?>
  <?php print render($click_sound) ?>  
<?php endif; ?>


  
