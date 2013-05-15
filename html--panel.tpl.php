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

    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

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
                <!--
            	<ul class="clearfix">

            		<li><a href="#" title="">Home</a></li>
                    <li><a class="active" href="#" title="">All Panels</a></li>
                    <li><a href="#" title="">Guided Panels</a></li>
                    <li>
                        <a href="#" title=""><span>Browse Themes</span></a>
            			<ul>
            				<li><a href="#">Theme type #1</a></li>
            				<li><a href="#">Theme type #2</a></li>
            				<li><a href="#">Theme type #3</a></li>
            			</ul>
            		</li>

            	</ul>
                -->

            </nav>

            <a class="search-panels" href="#" title=""><span class="search-panels-icon"></span></a>

             <form id="search-panels" action="#" method="get" name="search-panels">
                    <input name="query" type="text" value="" />
                    <input class="search" type="submit" value="search" />
            </form>

            <!--<nav>
                <ul>
                    <li><a href="#" title="">Home</a></li>
                    <li><a class="active" href="#" title="">All Panels</a></li>
                    <li><a href="#" title="">Guided Panels</a></li>
                    <li><a href="#" title="">Browse Themes</a></li>

                    <li class="search-panels"><a href="#" title=""><span class="search-panels-icon"></span></a></li>
                </ul>
            </nav> -->


        </header>

        <section>
            <?php
            $block = module_invoke('views', 'block_view', 'panel_selector-block');
            print render($block);
            ?>
            <!--
           <nav class="rs-carousel">
                <ul>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-B.jpg" width="148" height="198" alt="Panel B" />
                                <span class="panel-name">Panel B</span>
                            </a>
                        </p>
                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-C.jpg" width="148" height="198" alt="Panel C" />
                                <span class="panel-name">Panel C</span>
                            </a>
                        </p>
                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-8.jpg" width="148" height="198" alt="Panel 8" />
                                <span class="panel-name">Panel 8</span>
                            </a>
                        </p>
                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-45.jpg" width="148" height="198" alt="Panel 45" />
                                <span class="panel-name">Panel 45</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-46.jpg" width="148" height="198" alt="Panel 46" />
                                <span class="panel-name">Panel 46</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-47.jpg" width="148" height="198" alt="Panel 47" />
                                <span class="panel-name">Panel 47</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-48.jpg" width="148" height="198" alt="Panel 48" />
                                <span class="panel-name active">Panel 48</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-61-62-63-64.jpg" width="148" height="198" alt="Panel 61-62-63-64" />
                                <span class="panel-name">Panel 61-62-63-64</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-70.jpg" width="148" height="198" alt="Panel 70" />
                                <span class="panel-name">Panel 70</span>
                            </a>
                        </p>

                    </li>
                    <li>
                        <p class="panel-item">
                            <a href="#" title"">
                                <img class="panel-image" src="<?php print $path_theme_panels; ?>/images/panels/carousel/Panel-79.jpg" width="148" height="198" alt="Panel 79" />
                                <span class="panel-name">Panel 79</span>
                            </a>
                        </p>

                    </li>
                </ul>
            </nav>

            <div class="carousel-left-limit"></div>
            <div class="carousel-right-limit"></div>
             -->
       </section>

        <section class="panels-display">

            <section class="panels-photo">
                <?php print $fields['field_tiled_panel_image']->content; ?>
                <!--
                <div id="container">

                    <div class="zoom-holder">
                        <div class="zoom-hotspots">
                            <a style="left:85%;top:55%;" href="#"></a>
                            <a style="left:90%;top:66%;" href="#" rel="12"></a>
                            <a style="left:7%;top:66%;" href="#" rel="9"></a>
                            <!- -<a style="left:7%;top:66%;display:block;width:45%;height:24%;background-color: green;opacity: .5" href="#"  rel="10"></a>- ->
                        </div>
                    </div>

                </div>
                -->
            </section>

            <section class="panel-description">

              <!-- Template metadata individual panels -->
              <h3><span>Panel 48</h3>
              <h4>Various levels of transferring the cosmic system to humanity. Harmonic correspondence. Later reduction of the harmony to abstract geometry instead of to cosmically conditional [geometry] (Leonardo). </h4>
              <p>Panels  B  and  <a href="#" title="">C</a>  (which along with the not included panel A) provide the ‘grammar’ or ‘syntax’ with which to read the subsequent 60 panels. Offering an initial, paradigmatic itinerary or ‘meandering’ through Warburg’s vision, we see the genealogical and astrological  connections that link humanity and the cosmos. Panel B tracks the tensions between astrological and scientific-astronomical world views. In panel B the astrological is still dominant, whereas in panel <a href="#" title="">C</a>, with images showing Kepler’s astrological and astronomical</p>

              <h5>Theme:</h5>
              <ul>
                  <li><a href="#" title="">Cosmographical sequence</a></li>
                  <li><a href="#" title="">Theme 2</a></li>
                  <li><a href="#" title="">Theme 3</a></li>
              </ul>
              <!--END Template metadata individual panels -->


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
    </div>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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

    <!-- Drop-Down Navigation: Responsive and Touch-Friendly -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/DoubleTapToGo.js"></script>


    <!-- tilezoom -->
    <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/jquery.mousewheel.js"></script>
  	<script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/tilezoom/jquery.tilezoom.js"></script>

  	 <!-- panel utils -->
      <script type="text/javascript" src="<?php print $path_theme_panels; ?>/js/panels-utils.js"></script>

<h2>Warburg theme - html--warburg.tpl.php</h2>
<?php
print views_embed_view('panels','page', 'panels', '79');
?>
  </body>
</html>

