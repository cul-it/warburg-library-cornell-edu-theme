<?php
/**
 *  views-view-list--panel-selector.tpl.php
 */

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php
if (!empty($rows)) {
  // add css to suport carousel
  drupal_add_css(drupal_get_path('theme', 'warburg') . 'css/content.css', array('type' => 'file'));
  drupal_add_css(drupal_get_path('theme', 'warburg') . 'css/panels.css', array('type' => 'file'));
  drupal_add_css(drupal_get_path('theme', 'warburg') . 'css/panels/carousel/jquery.rs.carousel.css', array('type' => 'file'));

  // add javascript to support carousel
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/lib/jquery.ui.widget.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/lib/jquery.event.drag.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/lib/jquery.translate3d.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/jquery.rs.carousel.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/jquery.rs.carousel-autoscroll.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/jquery.rs.carousel-continuous.js', array('group' => JS_THEME));
  drupal_add_js(drupal_get_path('theme', 'warburg') . 'js/carousel/jquery.rs.carousel-touch.js', array('group' => JS_THEME));
}
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>

