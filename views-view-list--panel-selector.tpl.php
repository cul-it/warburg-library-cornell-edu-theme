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
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  
  <?php //print $list_type_prefix; ?>
  
  <nav class="rs-carousel">
      <ul>
  
            
                <?php foreach ($rows as $id => $row): ?>
                    <li class="<?php print $classes_array[$id]; ?>">
                    
                    <?php print $row; ?>
                    
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-B.jpg" width="148" height="198" alt="Panel B" />
                                <span class="panel-name">Panel B</span>
                            </a>                        
                        </p>
                    
                    </li>
                    
                    
                    
                    
                    
                <?php endforeach; ?>
    
    </ul>
  </nav>  
  <?php //print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>


