<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

/**
 * views-view-fields--panels.tpl.php
 */
?>
<section class="panels-display">
  <section class="panels-photo">
    <?php print $fields['field_tiled_panel_image']->content; ?>
  </section>
  <section class="panel-description">
    <!-- Template metadata individual panels -->
    <h3><span><!--arrow--></span><?php print $fields['title']->content; ?></h3>
    <h4><?php print $fields['field_full_title']->content; ?></h4>
    <?php print $fields['body']->content; ?>
    <h5><?php print t('Theme:'); ?></h5>
    <ul>
      <li><a href="#" title=""><?php print $fields['field_theme']->content; ?></a></li>
      <li><a href="#" title=""><?php print $fields['field_secondary_theme']->content; ?></a></li>
    </ul>
  </section>
  <nav>
    <ul id="panel-tools">
      <li><a class="original active" href="<?php print $fields['nothing']->content; ?>" title=""></a></li>
      <?php if (!empty($fields['field_first_ordinal_group']->content)): ?>
      <li><a class="map" href="<?php print $fields['nothing_1']->content; ?>" title=""></a></li>
      <?php endif; ?>
      <?php if (!empty($fields['field_first_sequence_group']->content)): ?>
      <li><a class="pathway" href="<?php print $fields['nothing_2']->content; ?>" title=""></a></li>
      <?php endif; ?>

      <li class="display-tools"></li>
    </ul>
  </nav>
</section>

<!--
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
-->
<?php
print '<section class="technical"><pre>';
var_dump(array_keys($fields));
if (!empty($fields['field_first_ordinal_group']->content)) {
  print 'Ordinal: ';
  var_dump($fields['field_first_ordinal_group']->content);
}
if (!empty($fields['field_first_sequence_group']->content)) {
  print 'Sequence: ';
  var_dump($fields['field_first_sequence_group']->content);
}
//var_dump($view);
//var_dump($row);
print '</pre></section>';
?>

