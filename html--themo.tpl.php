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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <blockquote>This page rendered by html--themo.tpl.php</blockquote>
  <?php //print $page_top; ?>
  
  
  <div class="page panels">
      
      <header>
          <nav>
              <ul>
                  <li><a href="#" title="">Home</a></li>
                  <li><a class="active" href="#" title="">All Panels</a></li>
                  <li><a href="#" title="">Guided Panels</a></li>
                  <li><a href="#" title="">Browse Themes</a></li>
              
                  <li class="search-panels"><a href="#" title=""><span class="search-panels-icon"></span></a></li>
              </ul>
          </nav>  
      </header>
      
      <section>
          <nav class="rs-carousel">
              <ul>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-B.jpg" width="148" height="198" alt="Panel B" />
                              <span class="panel-name">Panel B</span>
                          </a>                        
                      </p>
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-C.jpg" width="148" height="198" alt="Panel C" />
                              <span class="panel-name">Panel C</span>
                          </a>                        
                      </p>
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-8.jpg" width="148" height="198" alt="Panel 8" />
                              <span class="panel-name">Panel 8</span>
                          </a>                        
                      </p>
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-45.jpg" width="148" height="198" alt="Panel 45" />
                              <span class="panel-name">Panel 45</span>
                          </a>                        
                      </p>
                      
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-46.jpg" width="148" height="198" alt="Panel 46" />
                              <span class="panel-name">Panel 46</span>
                          </a>                        
                      </p>
                      
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-47.jpg" width="148" height="198" alt="Panel 47" />
                              <span class="panel-name">Panel 47</span>
                          </a>                        
                      </p>
              
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-48.jpg" width="148" height="198" alt="Panel 48" />
                              <span class="panel-name active">Panel 48</span>
                          </a>                        
                      </p>
                                
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-61-62-63-64.jpg" width="148" height="198" alt="Panel 61-62-63-64" />
                              <span class="panel-name">Panel 61-62-63-64</span>
                          </a>                        
                      </p>
                     
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-70.jpg" width="148" height="198" alt="Panel 70" />
                              <span class="panel-name">Panel 70</span>
                          </a>                        
                      </p>
                    
                  </li>
                  <li>
                      <p class="panel-item">
                          <a href="#" title"">
                              <img class="panel-image" src="images/panels/carousel/Panel-79.jpg" width="148" height="198" alt="Panel 79" />
                              <span class="panel-name">Panel 79</span>
                          </a>                        
                      </p>
                     
                  </li>
              </ul>
          </nav>
  
          <div class="carousel-left-limit"></div>
          <div class="carousel-right-limit"></div>
      </section>
          
      <section class="panels-display">

          <section class="panels-photo">
        
              <div id="container">
            
                  <div class="zoom-holder">
                      <div class="zoom-hotspots">
                          <a style="left:85%;top:55%;" href="#"></a>
                          <a style="left:90%;top:66%;" href="#" rel="12"></a>
                          <a style="left:7%;top:66%;" href="#" rel="9"></a>
                          <!--<a style="left:7%;top:66%;display:block;width:45%;height:24%;background-color: green;opacity: .5" href="#"  rel="10"></a>-->
                      </div>
                  </div>
                  
              </div>
          </section>
        
          <section class="panel-description">
            
            <!-- Template metadata individual panels -->
            <!--<h3><span>--><!--arrow--><!--</span>Panel 48</h3>-->
            <!--<h4>Various levels of transferring the cosmic system to humanity. Harmonic correspondence. Later reduction of the harmony to abstract geometry instead of to cosmically conditional [geometry] (Leonardo). </h4>
            <p>Panels  B  and  <a href="#" title="">C</a>  (which along with the not included panel A) provide the ‘grammar’ or ‘syntax’ with which to read the subsequent 60 panels. Offering an initial, paradigmatic itinerary or ‘meandering’ through Warburg’s vision, we see the genealogical and astrological  connections that link humanity and the cosmos. Panel B tracks the tensions between astrological and scientific-astronomical world views. In panel B the astrological is still dominant, whereas in panel <a href="#" title="">C</a>, with images showing Kepler’s astrological and astronomical</p>
             
            <h5>Theme:</h5>
            <ul>
                <li><a href="#" title="">Cosmographical sequence</a></li>
                <li><a href="#" title="">Theme 2</a></li>
                <li><a href="#" title="">Theme 3</a></li>
            </ul>-->
            <!--END Template metadata individual panels -->
            
            
            <!-- Template metadata PATHWAY panels -->
            <h3 class="pathway"><span><!--arrow--></span>Panel 7 <br />
               <span class="secuence"><img src="images/panels/pathway-icon.png" width="44" height="44" alt="Pathway Icon"> Sequence 1</span>
               <a href="#" title="Previous sequence">Previous</a>
               <a href="#" title="Next sequence">Next</a>
                </h3>
            <h4>Various levels of transferring the cosmic system to humanity. Harmonic correspondence. Later reduction of the harmony to abstract geometry instead of to cosmically conditional [geometry] (Leonardo). </h4>
              <p>Panels  B  and  <a href="#" title="">C</a>  (which along with the not included panel A) provide the ‘grammar’ or ‘syntax’ with which to read the subsequent 60 panels. Offering an initial, paradigmatic itinerary or ‘meandering’ through Warburg’s vision, we see the genealogical and astrological  connections that link humanity and the cosmos. Panel B tracks the tensions between astrological and scientific-astronomical world views. In panel B the astrological is still dominant, whereas in panel <a href="#" title="">C</a>, with images showing Kepler’s astrological and astronomical</p>

              <h5>Theme:</h5>
              <ul>
                  <li><a href="#" title="">Cosmographical sequence</a></li>
                  <li><a href="#" title="">Theme 2</a></li>
                  <li><a href="#" title="">Theme 3</a></li>
              </ul>
              <!-- END Template metadata PATHWAY panels -->

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
  
  
  
  <?php //print $page; ?>
  <?php //print $page_bottom; ?>
</body>
</html>
