<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<section class="institution-brand">
  <div class="container">
    <div class="institution-links">
      <a href="http://www.library.cornell.edu">Cornell University Library</a> | <a href="http://warburg.sas.ac.uk/home/">The Warburg Institute</a> | <a href="http://www.cornellpress.cornell.edu/">Cornell University Press</a> | <a href="http://signale.cornell.edu">Signale</a>
      <a class="search-panels" href="#" title="search"><span class="search-panels-icon"></span></a>
    </div>
    
    <form id="search-panels" name="search-panels" action="/search/node" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">
      <input name="keys" type="text" value="" />
      <input class="search" type="submit" value="search" />
     </form>
  </div>
</section>


<nav class="navbar">
  <div class="container">
    <div class="row">
      <div class="span4 logo">
        <?php if ($site_name): ?>
         <h1><a href="<?php print $front_page; ?>"><span class="displace"><?php print $site_name; ?>. Meanderings through Aby Warburg's Atlas</span></a></h1> 
        <?php endif; ?>
      </div>
      <div class="span8">
        <div class="nav">
          <?php print render($page['navigation']); ?>
        </div>
      </div>
    </div>
  </div>
</nav>


<section class="hero">
  <section class="home-content">
    <?php print render($page['home_text']); ?>
  </section>
</section>

<section class="featured-content featured-content-first">
  <div class="container">
    <?php print render($page['highlighted']); ?>
    <!--<?php print $breadcrumb; ?>-->
    <?php print $messages; ?>
    <?php print render($tabs); ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    <?php if(drupal_is_front_page()) {
      unset($page['content']['system_main']['default_message']);
    }?>
    <div class="row">
      <div class="span4">
        <?php print render($page['home_panels_c1']); ?>
      </div>
      <div class="span4">
        <?php print render($page['home_panels_c2']); ?>
      </div>
      <div class="span4 warburg-institute">
        <?php print render($page['home_warburg']); ?>
      </div>
    </div>
  </div>
</section>  
<section class="featured-content">
  <div class="container">
    <div class="row">
      <div class="span4 media">
        <?php print render($page['home_media']); ?>
      </div>
      <div class="span4 ">
        <?php print render($page['home_companion_volume']); ?>
      </div>
      <div class="span4">
        <?php print render($page['home_resources']); ?>
      </div>
    </div>
  </div>
</section>  

<footer>
  <div class="container">
    <div class="row">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</footer>

<?php print render($page['bottom']); ?>
