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
  $uri = $variables['object']->uri;
  $arr = file_stream_wrapper_get_instance_by_uri($variables['object']->uri)->realpath();
  //print '<pre>';
  //print_r($arr);
  //print '</pre>';

  //$url = $varibales['object']->uri;

  // add the css container class definition for #tilezoom-container
  drupal_add_css(drupal_get_path('theme', 'warburg') . '/css/tilezoom.css', array('type' => 'file'));

  // add the javascript to support tilezoom
  drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/jquery.mousewheel.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/tilezoom/jquery.tilezoom.js', array('group' => JS_THEME));

  // inline js code for the ready function
  $width = 2918;
  $height = 4000;
  $path = "/sites/default/files/panels/PanelC_files";
  $tilezoom = "jQuery('#container').tilezoom({width: $width, height: $height, path: '$path', mousewheel: false});";
  $startposition = ''; // "jQuery('#tilezoom-starthere').click();";
  $ready = "jQuery(document).ready(function(){ $tilezoom $startposition });";
  dsm($ready);
  drupal_add_js($ready, 'inline');
  $divs = <<<EOT
        <div id="container">
          <div class="zoom-holder">
            <div class="zoom-hotspots">
              <a style="left:34%;top:78%;" href="#">Lisa's hands</a>
              <a style="left:86%;top:20%;" href="#" rel="12">Detail of the background</a>
              <a style="left:5%;top:5%;" href="#" rel="11" id="tilezoom-starthere">starting point</a>
            </div>
          </div>
        </div>

EOT;
  print $divs;
}
else {
  print $output;
}
?>
<?php print $suffix; ?>
