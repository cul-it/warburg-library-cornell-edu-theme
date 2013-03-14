<?php

  /**
   *  @file
   *  Template file for theme_styles.
   */

  /**
   *  Available variables:
   *    $field_type => A string with the field type being styled.
   *    $style_name => A string with the style name.
   *    $container => The style container with all the style information.
   *    $style => The style preset being used, with all its information.
   *    $output => The themed output from the style.
   *    $id => The unique ID.
   */
?>
<?php print $prefix; ?>
<?php
if ($style_name == 'tilezoom') {
  $arr = $variables['object']->uri;
  print '<pre>';
  print_r($arr);
  print '</pre>';

  //$url = $varibales['object']->uri;

  // add the css container class definition for #tilezoom-container
  drupal_add_css(drupal_get_path('theme', 'warburg') . '/css/tilezoom.css', options);

  // add the javascript to support tilezoom
  drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/jquery.mousewheel.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/tilezoom/jquery.tilezoom.js', array('group' => JS_THEME));
}
else {
  print $output;
}
?>
<?php print $suffix; ?>
