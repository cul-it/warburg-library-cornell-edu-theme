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

    <link href='//fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

    <link href="<?php print $path_theme_panels; ?>/css/panels.css" rel="stylesheet">

    <!-- carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php print $path_theme_panels; ?>/css/panels/carousel/jquery.rs.carousel.css" media="all" />

    <!-- ZOOM -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php print $path_theme_panels; ?>/js/tilezoom/jquery.tilezoom.css" />

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

<body>


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
				<a class="carousel-toggle" href="#">hide</a>
            <?php
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
                        if (!empty($variables['warburg']['ordinal'])) {
                          print '<div class="zoom-hotspots">' . PHP_EOL;
                          foreach ($variables['warburg']['ordinal'] as $hotspot) {
                            print $hotspot['spot_link'] . PHP_EOL;
                          }
                          print '</div>' . PHP_EOL;
                        }
                        else if (!empty($variables['warburg']['sequence'])) {
                          print '<div class="zoom-hotspots">' . PHP_EOL;
                          foreach ($variables['warburg']['sequence'] as $hotspot) {
                            print $hotspot['spot_link'] . PHP_EOL;
                            break; // just the first
                          }
                          print '</div>' . PHP_EOL;
                        }
                        ?>
                    </div>

                </div>

            </section>

            <section class="panel-description">
                    <?php
                    $result = module_invoke('views', 'block_view', 'panel_description_block-block');
                    print render($result);
                    ?>

              <!-- Template metadata individual panels -->
              <!--
              <h3><span>Panel 48</h3>
              <h4>Various levels of transferring the cosmic system to humanity. Harmonic correspondence. Later reduction of the harmony to abstract geometry instead of to cosmically conditional [geometry] (Leonardo). </h4>
              <p>Panels  B  and  <a href="#" title="">C</a>  (which along with the not included panel A) provide the ‘grammar’ or ‘syntax’ with which to read the subsequent 60 panels. Offering an initial, paradigmatic itinerary or ‘meandering’ through Warburg’s vision, we see the genealogical and astrological  connections that link humanity and the cosmos. Panel B tracks the tensions between astrological and scientific-astronomical world views. In panel B the astrological is still dominant, whereas in panel <a href="#" title="">C</a>, with images showing Kepler’s astrological and astronomical</p>

              <h5>Theme:</h5>
              <ul>
                  <li><a href="#" title="">Cosmographical sequence</a></li>
                  <li><a href="#" title="">Theme 2</a></li>
                  <li><a href="#" title="">Theme 3</a></li>
              </ul>
            -->
              <!--END Template metadata individual panels -->


              <!-- Template metadata PATHWAY panels -->
              <!--<h3 class="pathway">Panel 79<br />
                 <span class="sequence"><img src="images/panels/pathway-icon.png" width="44" height="44" alt="Pathway Icon"> Sequence 1</span>
                 <a class="prev-sequence" href="#" title="Previous sequence" title="Previous Sequence">Previous</a>
                 <a class="next-sequence" href="#" title="Next sequence"  title="Next Sequence">Next</a>
               </h3>

               <h4>Various levels of transferring the cosmic system to humanity. Harmonic correspondence. Later reduction of the harmony to abstract geometry instead of to cosmically conditional [geometry] (Leonardo). </h4>

                <p>Panels B and <a href="#" title="">C</a>  (which along with the not included panel A) provide the ‘grammar’ or ‘syntax’ with which to read the subsequent 60 panels. Offering an initial, paradigmatic itinerary or ‘meandering’ through Warburg’s vision, we see the genealogical and astrological connections that link humanity and the cosmos. Panel B tracks the tensions between astrological and scientific-astronomical world views. In panel B the astrological is still dominant, whereas in panel <a href="#" title="">C</a>, with images showing Kepler’s astrological and astronomical</p>

                <h5>Theme:</h5>
                <p>Cosmographical sequence</p>

                <h5>Secondary</h5>
                <p>Cosmographical sequence</p> -->
                <!-- END Template metadata PATHWAY panels -->


            </section>

            <nav>
              <ul id="panel-tools">

                <li><a class="original <?php print $variables['warburg']['nav']['overview_class']; ?>" href="<?php print $variables['warburg']['nav']['overview']; ?>" title="full panel"></a></li>
                <?php
                $nav_classes = $variables['warburg']['nav']['images_class'];
                $nav_link = empty($variables['warburg']['nav']['images']) ? '#' : $variables['warburg']['nav']['images'];
                ?>
                <li><a class="map <?php print $nav_classes; ?>" href="<?php print $nav_link; ?>" title="individual images"></a></li>
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

    <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <!--<script src="js/bootstrap.min.js"></script>-->

    <!-- carousel lib -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/lib/jquery.ui.widget.js"></script>
    <!-- if using touch -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/lib/jquery.event.drag.js"></script>
    <!-- if using touch and translate3d -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/lib/jquery.translate3d.js"></script>

    <!-- carousel core -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/jquery.rs.carousel.js"></script>

    <!-- carousel extensions (optional) -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/jquery.rs.carousel-autoscroll.js"></script>
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/jquery.rs.carousel-continuous.js"></script>
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/carousel/jquery.rs.carousel-touch.js"></script>

    <script>
    		// iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
    		(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
    </script>

    <!-- Drop-Down Navigation: Responsive and Touch-Friendly -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/DoubleTapToGo.js"></script>


  	 <!-- panel utils -->
      <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/panels-utils.js"></script>
  <?php
    print '<pre>Variables: ' . print_r($variables['warburg'], true) . '</pre>';
  ?>


    <?php print $page_bottom; ?>
  </body>
</html>

