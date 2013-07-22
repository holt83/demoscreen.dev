<?php

/**
 * @file
 * Theme implementation of a normal page in the Demo theme.
 */
?>

<div id="main">
  
  <?php if ($page['sidebar_first']): ?>
    <div id="sidebar-first" class="column sidebar">
      <?php print render($page['sidebar_first']); ?>
    </div> <!--/#sidebar-first -->
  <?php endif; ?>  
    
  <div id="content" class="column">
    <?php print render($page['help']); ?>
    <?php print render($page['content']); ?>
  </div> <!-- /#content -->
  
</div> <!-- /#main

