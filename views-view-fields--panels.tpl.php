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
<blockquote>hello from views-view-fields--panels.tpl.php </blockquote>
<?php print '<pre>'; var_dump(array_keys($fields)); print '</pre>'; ?>
<section class="panels-display">
  <section class="panels-photo">
    <?php print $fields['field_panel_photo']->content; ?>
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
      <li><a class="original active" href="#" title=""></a></li>
      <li><a class="map" href="#" title=""></a></li>
      <li><a class="pathway" href="#" title=""></a></li>

      <li class="display-tools"></li>
    </ul>
  </nav>
</section>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>


