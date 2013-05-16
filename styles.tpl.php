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
<?php
// FUNCTIONS were moved to warburgtools module
?>
<?php print $prefix; ?>
<?php
if ($style_name == 'tilezoom') {
  // find out what mode display
  $mode = '';
  if (in_array(arg(0), array('panel-overview', 'panel-images', 'panel-sequence'))) {
    if (is_numeric(arg(1))) {
      $mode = arg(0);
      $panel_nid = arg(1);
      $submode = arg(2);
      $nodeid = arg(3);
      if (!empty($submode) && in_array($submode, array('image', 'sequence')) && is_numeric($nodeid)) {
        $mode .= '-' . $submode;
        $image_nid = $nodeid;
      }
    }
  }
  if (arg(0) == 'panels') {
    $mode = arg(0);
    $warburgtools_id = arg(1);
    $submode = arg(2);
    if (!empty($submode) && in_array($submode, array('map', 'pathway'))) {
      $mode .= '-' . $submode;
    }
    if (is_numeric($nodeid = arg(3))) {
      $image_nid = $nodeid;
    }
  }
  if ((arg(0) == 'node') && (is_numeric(arg(1)))) {
    print 'checking node';
    $panel_nid = arg(1);
    $node = node_load($panel_nid);
    if ($node->type = 'panel') {
      $mode = 'node';
      $warburgtools_id = $node->field_warburg_id['und'][0]['value'];
      dsm($variables);
    }
  }
  if (empty($mode)) {
    print $output;
  }
  else {
    print ' loading ';
    $path = module_load_include('module', 'warburgtools');
    print $path;
    // read the .xml file to find the tiled image dimensions
    $width = 2000;
    $height = 2000;
    $path = file_stream_wrapper_get_instance_by_uri($variables['object']->uri)->realpath();
    $xml = file_get_contents($path);
    if (!empty($xml)) {
      if (preg_match_all('/<Size Width="([0-9]+)" Height="([0-9]+)"/', $xml, $matches)) {
        $width = $matches[1][0];
        $height = $matches[2][0];
      }
    }

    // directory of image tiles has same name as .xml file with '_files' instead of '.xml'
    $url = file_create_url($variables['object']->uri);
    $path = parse_url($url, PHP_URL_PATH);
    $tiles = preg_replace('/\.xml$/', '_files', $path);

    $panel = $variables['entity'];
    $panel_nid = $panel->nid;

    $startposition = ''; //"jQuery('#tilezoom-starthere').click();";
    $hotspots = array();
    dsm($mode);
    switch ($mode) {
      case 'panels':
      case 'panel-overview':
        break;
      case 'panels-map':
        // find image locations for hotspots
        $prefix = "/panels/$warburgtools_id/map/";
        if (isset($panel->field_first_ordinal_group['und'])) {
          foreach ($panel->field_first_ordinal_group['und'] as $val) {
            $hotspot = warburgtools_hotspot_list($val['target_id']);
            $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
          }
        }
        break;
      case 'node':
      case 'panel-images':
        // find image locations for hotspots
        $prefix = '/' . $mode . '/' . $panel_nid . '/';
        if (isset($panel->field_first_ordinal_group['und'])) {
          foreach ($panel->field_first_ordinal_group['und'] as $val) {
            $hotspot = warburgtools_hotspot_list($val['target_id']);
            $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
          }
        }
        break;
      case 'panels-pathway':
        // find image locations for hotspots
        $prefix = "/panels/$warburgtools_id/pathway/";
        dsm($panel);
        if (isset($panel->field_first_sequence_group['und'])) {
           foreach ($panel->field_first_sequence_group['und'] as $val) {
              $sequence_id = $val['target_id'];
              $sequence = node_load($sequence_id);
              dsm($sequence);
              if (isset($sequence->field_steps['und'])) {
                foreach ($sequence->field_steps['und'] as $val2) {
                  dsm($val2);
                  $hotspot = warburgtools_hotspot_list($val2['target_id']);
                  $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
                }
              }
           }
         }
        break;
      case 'panel-series':
        // find image locations for hotspots
        $prefix = '/' . $mode . '/' . $panel_nid . '/';
        if (isset($panel->field_first_sequence_group['und'])) {
           foreach ($panel->field_first_sequence_group['und'] as $val) {
              $hotspot = warburgtools_hotspot_list($val['target_id']);
              $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
           }
         }
        break;
      case 'panels-image':
      case 'panel-images-image':
      case 'panel-images-panel_image':
        // display a single image
        $prefix = '';
        $hotspot = warburgtools_hotspot($image_nid);
        $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height, TRUE);
        $startposition = "jQuery('#tilezoom-starthere').click();";
        break;
      case 'panels-sequence':
      case 'panel-sequence-sequence':
        // display all hotspots for this sequence
        $seq_id = $image_nid;
        $seq = node_load($seq_id);
        if ($seq !== FALSE) {
          if (isset($seq->field_steps['und'])) {
            dsm($seq);
            $prefix = '';
            foreach ($seq->field_steps['und'] as $val) {
              $hotspot = warburgtools_hotspot_list($val['target_id']);
              $hotspots[] = warburgtools_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
            }
          }
        }
        break;
    }

    //dsm($hotspots);
    //dsm($panel);
    //dsm($variables);

    $url = $variables['object']->uri;

    // add the css container class definition for #tilezoom-container
    drupal_add_css(drupal_get_path('theme', 'warburg') . '/css/tilezoom.css', array('type' => 'file'));
    drupal_add_css(drupal_get_path('theme', 'warburg') . '/js/tilezoom/jquery.tilezoom.css', array('type' => 'file'));

    // add the javascript to support tilezoom
    // drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/jquery.mousewheel.js', array('group' => JS_THEME));
    drupal_add_js(drupal_get_path('theme', 'warburg') . '/js/tilezoom/jquery.tilezoom.js', array('group' => JS_THEME));

    // inline js code for the ready function
    //$width = 2918;
    //$height = 4000;
    $container_width = 769;
    $container_height = floor(769 * $height / $width);
    //dsm(array($width, $height, $container_height));
    //$path = "/sites/default/files/panels/PanelC_files";
    $tilezoom = "jQuery('#container').tilezoom({width: '$width', height: '$height', path: '$tiles', mousewheel: false});";
    $ready = "jQuery(document).ready(function(){ $tilezoom $startposition });";
    drupal_add_js($ready, 'inline');
    $divs1 = <<<EOT
          <div id="container">
            <div class="zoom-holder">
              <div class="zoom-hotspots">
EOT;
    $divs2 = <<<EOT
              </div>
            </div>
          </div>
EOT;
  /*
                <a style="left:34%;top:78%;" href="#">Lisa's hands</a>
                <a style="left:86%;top:20%;" href="#" rel="12">Detail of the background</a>
                <a style="left:5%;top:5%;" href="#" rel="11" id="tilezoom-starthere">starting point</a>

   */
    print $divs1;
    print implode(PHP_EOL, $hotspots);
    print $divs2;
    print '<ul id="hotspots"><li>';
    print implode('</li>' . PHP_EOL .'<li>', $hotspots);
    print '</li></ul>';
  }
}
else {
  print $output;
}
?>
<?php print $suffix; ?>
