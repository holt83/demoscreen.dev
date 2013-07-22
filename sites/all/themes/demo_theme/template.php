<?php

/**
 * @file 
 * Theme overrides and intercepts for the Demo theme.
 */

/**
 * Theme funtion overriding the default implementation of the block-theme-hook.
 */
function demo_theme_block($variables) {
  return $variables['content'];
}

/**
 * Theme funtion overriding the default implementation of the region-theme-hook.
 */
function demo_theme_region($variables) {
  if ($variables['content']) {
    return $variables['content'];
  }
  return '';
}

/**
 * Theme funtion overriding the default implementation of the field-theme-hook.
 */
function demo_theme_field($variables) {
  $output = '';
  foreach ($variables['items'] as $delta => $item) {
    $output .= drupal_render($item);
  }
  return $output;
}

/**
 * Add variables to be used in the template for nodes of type demo_screen.
 */
function demo_theme_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full') {
    //Setup loading_image variable
    $img_variables = array(
      'path' => '/sites/all/themes/demo_theme/images/loading.gif',  
      'attributes' => array('id' => 'demo-loading'),
    );
    $variables['loading_image'] = theme('image', $img_variables);
    //Prepare a audio tag for rendering on the demoscreen template
    $audio_path = '/sites/all/themes/demo_theme/audio/beep.wav';
    $variables['click_sound'] = array(
      '#prefix' => '<audio id="demo-beep" src="' . $audio_path . '">',
      '#suffix' => '</audio>',
    );
    //Add CSS for the demo screen
    drupal_add_css(drupal_get_path('theme', 'demo_theme') . '/css/demo-screen.css');
    drupal_add_css(drupal_get_path('theme', 'demo_theme') . '/css/demo-classes.css');
    //Add Javascript for the demo screen
    drupal_add_js(drupal_get_path('theme', 'demo_theme') . '/js/demo_script.js');    
  }
}

/**
 * Add variables to be used in the template for the frontpage in the Demo theme.
 */
function demo_theme_preprocess_page(&$variables) {
  if ($variables['is_front']) {
    //If one or more demoscreens have allready been created, provide a link to 
    //start the demo on the frontpage
    $variables['start_demo'] = FALSE;
    $query = new EntityFieldQuery();
    $query
      ->entityCondition('entity_type', 'node')
      ->entityCondition('bundle', array('demo_screen', 'page', 'article'))      
      ->propertyOrderBy('created', 'ASC')
      ->range(0, 1);
    $result = $query->execute();
    if (!empty($result)) {
      $first_id = array_shift(array_values($result['node']))->nid; 
      $variables['start_demo'] = l(t('Start demo'), 'node/' . $first_id);
    }
    //Provide a link to admin page for creating demoscreens
    $variables['create_demoscreen'] = l(t('Create'),'node/add');
    //Provide a link to admin page for editing demoscreens
    $variables['edit_demoscreen'] = l(t('Edit'), 'admin/content');
  }
}