<?php

/**
 * @file
 * Theme implementation of the front page for the Demo theme.
 */
?>

<div id="main">
  
  <div id="content-front" class="column">
    
    <?php print render($page['help']); ?>
    <div id="create-demoscreen" class="front-link" >
      <?php print $create_demoscreen; ?>
    </div>
    
    <div id="edit-demoscreen" class="front-link" >
      <?php print $edit_demoscreen; ?>
    </div>
    
    <?php if ($start_demo): ?>
      <div id="start-demo" class="front-link">
        <?php print $start_demo; ?>
      </div>  
    <?php endif; ?>
    
  </div> <!-- /#content -->
  
</div> <!-- /#main-->

