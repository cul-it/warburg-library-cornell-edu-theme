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
  $arr = $variables;
  print '<pre>';
  print_r($arr);
  print '</pre>';

  //$url = $varibales['object']->uri;
}
else {
  print $output;
}
?>
<?php print $suffix; ?>
