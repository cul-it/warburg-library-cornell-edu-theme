<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>

<?php $path_theme_panels = base_path() . path_to_theme(); // full path to the theme. ?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

  <head>
    <?php print $head; ?>
    <meta charset="utf-8">
    <title>Mnemosyne: Meanderings through Aby Warburg's Atlas | Cornell University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php print $styles; ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php print $scripts; ?>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

  </head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>

    <div class="page panels">

        <header>

            <nav id="nav" role="navigation">
            	<a href="#nav" title="Show navigation">Show navigation</a>
            	<a href="#" title="Hide navigation">Hide navigation</a>
                <?php
                $block = module_invoke('menu', 'block_view', 'menu-panel-navigation');
                print render($block);
                ?>
            </nav>

            <?php print $variables['warburg']['search_form']; ?>

       </header>

        <section>
        <a title="collapse panels" class="carousel-toggle carousel-toggle-hide" href="#"></a>
            <?php
            dsm($variables['warburg']); // jgr25
            $block = module_invoke('views', 'block_view', 'panel_selector-block');
            print render($block);
            ?>

            <div class="carousel-left-limit"></div>
            <div class="carousel-right-limit"></div>
        </section>

        <section class="panels-display">

            <section class="panels-photo">

                <div id="container" data-panelinfo='[<?php print $variables['warburg']['panel']['tilezoominfo']; ?>]'>

                    <div class="zoom-holder">
                        <?php
                        if (!empty($variables['warburg']['ordinal'][0]['spot_metadata_link'])) {
                          print '<div class="zoom-hotspots">' . PHP_EOL;
                          foreach ($variables['warburg']['ordinal'] as $hotspot) {
                            if (isset($hotspot['spot_metadata_link'])) {
                              print $hotspot['spot_metadata_link'] . PHP_EOL;
                            }
                          }
                          print '</div>' . PHP_EOL;
                        }
                        ?>
                    </div>

                </div>

            </section>

            <section id="imageMetadata" class="panel-description">
                    <?php
                    $result = module_invoke('views', 'block_view', '240f2561056d0722cec3e68a281bd9e6');
                    print render($result);
                    ?>
            </section>

            <nav>
               <ul id="panel-tools">

                  <li><a class="original enabled" href="<?php print $variables['warburg']['nav']['overview']; ?>" title="original panel"></a></li>
                  <?php
                  $nav_classes = $variables['warburg']['nav']['images_class'];
                  $nav_link = empty($variables['warburg']['nav']['images']) ? '#' : $variables['warburg']['nav']['images'];
                  ?>
                  <li><a class="map active <?php print $nav_classes; ?>" href="<?php print $nav_link; ?>" title="individual images"></a></li>
                  <?php
                  $nav_classes = $variables['warburg']['nav']['pathways_class'];
                  $nav_link = empty($variables['warburg']['nav']['pathways']) ? '#' : $variables['warburg']['nav']['pathways'];
                  ?>
                  <li><a class="pathway <?php print $nav_classes; ?>" href="<?php print $nav_link; ?>" title="guided pathways"></a></li>


                  <li class="display-tools"></li>
                </ul>
            </nav>




        </section>

    </div>

    <?php print $page_bottom; ?>
  </body>
</html>

