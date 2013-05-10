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
// functions for handling panels, image groups, images
function warburg_hotspot($image_nid) {
  // load the image node
  $hotspot = array();
  $node = node_load($image_nid);
  if ($node != FALSE) {
    if ($node->type == 'panel_image') {
      $box = $node->field_bounding_box['und'];
      $hotspot['left'] = $box[0]['value'];
      $hotspot['top'] = $box[1]['value'];
      $hotspot['right'] = $box[2]['value'];
      $hotspot['bottom'] = $box[3]['value'];
      $hotspot['type'] = $node->type;
      $hotspot['nid'] = $node->nid;
      $hotspot['title'] = empty($node->field_full_title['und']) ? $node->title
      : $node->field_full_title['und'][0]['safe_value'];
    }
  }
  return $hotspot;
}

function warburg_hotspot_list($nid) {
  $hotspot = array();
  $node = node_load($nid);
  if ($node != FALSE) {
    if ($node->type == 'panel_image') {
      $hotspot = warburg_hotspot($node->nid);
    }
    elseif ($node->type == 'image_group') {
      $group = array('type' => $node->type, 'nid' => $node->nid, 'hotspots' => array());
      $bounds = array();
      $group['title'] = empty($node->field_full_title['und']) ? $node->title
        : $node->field_full_title['und'][0]['safe_value'];
      foreach ($node->field_image_list['und'] as $val) {
        $nid = $val['target_id'];
        $hotspot = warburg_hotspot($nid);
        if (!empty($hotspot)) {
          $group['hotspots'][] = $hotspot;
          if (empty($bounds)) {
            $bounds = $hotspot;
          }
          else {
            $bounds['left'] = min($bounds['left'], $hotspot['left']);
            $bounds['top'] = min($bounds['top'], $hotspot['top']);
            $bounds['right'] = max($bounds['right'], $hotspot['right']);
            $bounds['bottom'] = max($bounds['bottom'], $hotspot['bottom']);
          }
        }
      }
      $group['left'] = $bounds['left'];
      $group['top'] = $bounds['top'];
      $group['right'] = $bounds['right'];
      $group['bottom'] = $bounds['bottom'];
      $hotspot = $group;
    }
  }
  return $hotspot;
}

/**
 * anchor tag to locate and scale hotspot on the image
 * @param  box  $hotspot   position of image in pixels at raw resolution
 * @param  url  $url_base  prefix for url that ends in a node id
 * @param  int  $img_wid   width of the full sized image in pixels
 * @param  int  $img_hgt   height of the full sized image in pixels
 * @param  boolean $starthere if TRUE include id="tilezoom-starthere" for initial zoomed in positioning
 * @return text             <a tag for hotspot
 */
function warburg_hotspot_format($hotspot, $url_base, $img_wid, $img_hgt, $starthere = FALSE) {
  // makes an <a href for this hotspot
  $wid = $hotspot['right'] - $hotspot['left'];
  $hgt = $hotspot['bottom'] - $hotspot['top'];
  $left = $hotspot['left'] + $wid / 2;
  $top = $hotspot['top'] + $hgt / 2;
  $left_pct = floor($left * 100 / $img_wid);
  $top_pct = floor($top * 100 / $img_hgt);
  $rel = (max($wid, $hgt) > 1300) ? 11 : 12;
  $url = url($url_base . '/' . $hotspot['nid'], array('absolute' => TRUE));
  $starthere_id = $starthere ? 'id="tilezoom-starthere" ' : '';
  $str = t('<a href="!base/!nid" style="left:@left%;top:@top%;" rel="@rel" !id >@title</a>',
    array('!base' => $url_base, '!nid' => $hotspot['nid'],
      '@left' => $left_pct, '@top' => $top_pct, '@rel' => $rel, '@title' => $hotspot['title'],
      '!url' => $url, '!id' => $starthere_id));
  return $str;
}

function warburg_bounding_box_scale($image_width, $image_height, $left, $top, $right, $bottom) {
  // calculate the best scale (rel="?") for the given bounding box
  $pct_width = $right - $left;
  $pct_height = $bottom - $top;

}
?>
<?php print $prefix; ?>
<?php
if ($style_name == 'tilezoom') {
  // find out what mode display
  $mode = '';
  if (in_array(arg(0), array('panels', 'panel-overview', 'panel-images', 'panel-sequence'))) {
    if (is_numeric(arg(1))) {
      $mode = arg(0);
      $panel_nid = arg(1);
      $submode = arg(2);
      $nodeid = arg(3);
      if (!empty($submode) && in_array($submode, array('image', 'sequence', 'map')) && is_numeric($nodeid)) {
        $mode .= '-' . $submode;
        $image_nid = $nodeid;
      }
    }
  }
  if (empty($mode)) {
    print $output;
  }
  else {
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
    //dsm($mode);
    switch ($mode) {
      case 'panels':
      case 'panel-overview':
        break;
      case 'panels-map':
      case 'panel-images':
        // find image locations for hotspots
        $prefix = '/' . $mode . '/' . $panel_nid . '/';
        if (isset($panel->field_first_ordinal_group['und'])) {
          foreach ($panel->field_first_ordinal_group['und'] as $val) {
            $hotspot = warburg_hotspot_list($val['target_id']);
            $hotspots[] = warburg_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
          }
        }
        break;
      case 'panels-sequence':
      case 'panel-series':
        // find image locations for hotspots
        $prefix = '/' . $mode . '/' . $panel_nid . '/';
        if (isset($panel->field_first_sequence_group['und'])) {
           foreach ($panel->field_first_sequence_group['und'] as $val) {
              $hotspot = warburg_hotspot_list($val['target_id']);
              $hotspots[] = warburg_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
           }
         }
        break;
      case 'panels-image':
      case 'panel-images-image':
      case 'panel-images-panel_image':
        // display a single image
        $prefix = '';
        $hotspot = warburg_hotspot($image_nid);
        $hotspots[] = warburg_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height, TRUE);
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
              $hotspot = warburg_hotspot_list($val['target_id']);
              $hotspots[] = warburg_hotspot_format($hotspot, $prefix . $hotspot['type'], $width, $height);
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
    dsm(array($width, $height, $container_height));
    //$path = "/sites/default/files/panels/PanelC_files";
    $tilezoom = "jQuery('#container').tilezoom({width: $container_width, height: $container_height, path: '$tiles', mousewheel: false});";
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
