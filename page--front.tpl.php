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
      </div>
      <div class="span8">
        <div class="nav-collapse collapse">
          <div class="nav">
            <?php print render($page['navigation']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>


<section class="hero">
 <section class="content"> 
    <h2>Sunt in culpa qui officia.</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
    <nav>
      <ul>
        <li><a class="btn-pathway" href="#"><i class="icon-pathways"></i> Guided Pathways</a></li>
        <li><a class="btn-panels" href="#"><i class="icon-panels"></i> All panels</a></li>
      <ul>
    </nav>
  </section>
  <aside>
    <a href="#"><img class="book-cover" src="img/johnson-cover.jpg" /></a>
    <p><a class="cup" href="#">Cornell University Press <i class="icon-arrow icon-arrow-white"></i></a>
    <a class="signale" href="#">Signale: Modern German Letters, <br />Cultures, &amp; Thought <i class="icon-arrow icon-arrow-white"></i></a></p>
  </aside>
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
    <!--<?php print render($page['content']); ?>-->
    <div class="row">
      <div class="span8 media">
        <h3>Media</h3>
        <h4>Atlas. How to Carry the World on One's Back? <a href="#">All media <i class="icon-arrow icon-arrow-green"></i></a></h4>
        <div class="video-player">
          <iframe src="http://player.vimeo.com/video/24023841" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
      </div>
      <div class="span4 warburg-institute">
        <h3>Warburg Institute</h3>
        <img src="img/warburg-institute.jpg" alt="The Warburg Institute">
        <h4><a href="http://warburg.sas.ac.uk/home/">The Warburg Institute</a></h4>
        <p>The Warburg Institute of the University of London exists principally to further the study of the classical tradition, that is of those elements of European thought...</p>
        <p><a href="#">Read more <i class="icon-arrow icon-arrow-green"></i></a></p>
      </div>
    </div>
  </div>
</section>  

<section class="featured-content">
  <div class="container">
    <div class="row">
      <div class="span4">
        <h3>Interviews</h3>
        <div class="interview">
          <img src="img/placeholder-interview1.jpg">
          <p>Lorem ipsum dolor sit amet. Consectetur adipiscing elit.</p>
        </div>
        <div class="interview">
          <img src="img/placeholder-interview2.jpg">
          <p>Lorem ipsum dolor sit amet. Consectetur adipiscing elit.</p>
        </div>
        <div class="interview">
          <img src="img/placeholder-interview3.jpg">
          <p>Lorem ipsum dolor sit amet. Consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="span4">
        <h3>Other Atlas</h3>
        <div class="other-atlas">
          <img src="img/placeholder-other1.jpg">
          <p>Other atlas info goes here</p>
        </div>
        <div class="other-atlas">
          <img src="img/placeholder-other2.jpg">
          <p>Other atlas info goes here</p>
        </div>
      </div>
      <div class="span4">
        <h3>Book Resources</h3>
        <ul class="book-resources">
          <li>Consectetur adipiscing integer molestie lorem at massa facilisis in pretium nisl aliquet</li>
          <li>Lorem ipsum dolor sit ametc onsectetur adipiscing elit integer molestie lorem at massa acilisis in pretium nisl aliquet</li>
          <li>Ipsum dolor sit ametc onsectetur adipiscing elit integer molestie lorem at massa acilisis in pretium nisl aliquet</li>
        </ul>
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
