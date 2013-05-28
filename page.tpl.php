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
    <a href="http://www.library.cornell.edu">Cornell University Library</a> | <a href="http://warburg.sas.ac.uk/home/">The Warburg Institute</a> | <a href="http://www.cornellpress.cornell.edu/">Cornell University Press</a>
  </div>
</section>

<nav class="navbar">
  <div class="container">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="row">
      <div class="span4">
        <?php if ($site_name): ?>
          <a class="brand" href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
        <?php endif; ?>
        <div class="subtitle">Meanderings through Aby Warburg's Atlas</div>
      </div>
      <div class="span8">
        <div class="nav-collapse collapse">
          <div class="nav">
            <?php print render($page['navigation']); ?>
          </div>
        </div>
        <a class="search-panels" href="#" title="Search panels"><span class="search-panels-icon"></span></a>
        <form id="search-panels" action="#" method="get" name="search-panels">
        <input name="query" type="text" value="" />
        <input class="search" type="submit" value="search" />
        </form>
      </div>
    </div>
  </div>
</nav>

<header>
  <div class="container">
    <?php if ($title): ?>
      <h2><?php print $title; ?></h2>
    <?php endif; ?>
  </div>
</header>

<section class="main-content">
  <div class="container">
    <?php
        // Render the sidebar to see if there's anything in them.
        $sidebar  = render($page['sidebar']);
    ?>

    <!--if there is a sidebar, then create two column layout-->
    <?php if ($sidebar): ?>

      <div class="row">
        <div class="span8">
          <?php print render($page['highlighted']); ?>
          <!--<?php print $breadcrumb; ?>-->
          <?php print $messages; ?>
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <!--<?php if(drupal_is_front_page()) {
            unset($page['content']['system_main']['default_message']);
          }?>-->
          <?php print render($page['content']); ?>
        </div>
        <div class="span4 sidebar">
          <?php print $sidebar; ?>
        </div>
      </div>

    <!--if there isn't a sidebar, then create one column layout-->
    <?php else :?>

      <?php print render($page['highlighted']); ?>
      <!--<?php print $breadcrumb; ?>-->
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <!--<?php if(drupal_is_front_page()) {
        unset($page['content']['system_main']['default_message']);
      }?>-->
      <?php print render($page['content']); ?>

    <?php endif; ?>
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
