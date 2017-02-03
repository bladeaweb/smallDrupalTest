<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
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
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="page-wrapper" class="page-wrapper">
  <div id="page" class="page">
		<?php if ($logo || $site_name || $site_slogan || $page['header']): ?>
      <header id="header" class="header">
        <div class="container">
          <div class="section section-header">
						<?php if ($logo || $site_name || $site_slogan): ?>
              <div class="header-site-info">
								<?php if ($logo): ?>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                  </a>
								<?php endif; ?>

								<?php if ($site_name || $site_slogan): ?>
                  <div id="name-and-slogan">
										<?php if ($site_name): ?>
											<?php if ($is_front): ?>
                        <div id="site-name" class="site-name">
                               <?php print $site_name; ?>
                        </div>
											<?php else: ?>
                        <div id="site-name" class="site-name">
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                              <?php print $site_name; ?>
                            </a>
                        </div>
											<?php endif; ?>
										<?php endif; ?>

										<?php if ($site_slogan): ?>
                      <div id="site-slogan"><?php print $site_slogan; ?></div>
										<?php endif; ?>
                  </div> <!-- /#name-and-slogan -->
								<?php endif; ?>
              </div>
						<?php endif; ?>

            <?php if($page['header'] || $main_menu): ?>
            <div class="header-second">
              <?php if($main_menu): ?>
                <div class="block-system-main-menu">
                  <div class="content">
                    <a href="#" class="menu-toggler js-menu-toggler">
                      <span class="menu-icon"></span>
                    </a>
										<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'menu-main-header', 'class' => array('menu', 'inline', 'clearfix')), 'heading' => false)); ?>
                  </div>
                </div>
							<?php endif; ?>
              <?php print render($page['header']); ?>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </header> <!-- /.section, /#header -->
    <?php endif; ?>

		<?php if ($secondary_menu): ?>
      <nav id="navigation" class="navigation">
        <div class="container">
          <div class="section section-navigation">
						<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
          </div>
        </div>
      </nav> <!-- /.section, /#navigation -->
		<?php endif; ?>

		<?php if ($breadcrumb): ?>
      <div id="breadcrumb" class="breadcrumb-wrapper">
        <div class="container">
					<?php print $breadcrumb; ?>
        </div>
      </div>
		<?php endif; ?>

    <?php if($page['highlighted']||$messages): ?>
      <div id="highlighted" class="highlighted">
        <div class="container">
					<?php print $messages; ?>
			    <?php if($page['highlighted']):?>
            <div class="section-highlighted">
              <?php print render($page['highlighted']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

		<?php if($page['help']):?>
      <div id="help" class="help">
        <div class="container">
          <div class="section-help">
						<?php print render($page['help']); ?>
          </div>
        </div>
      </div>
		<?php endif; ?>

    <div id="main-wrapper" class="main-wrapper">
      <div class="container">
        <div id="section-main" class="section-main">

					<?php if ($page['sidebar_first']): ?>
            <div id="sidebar-first" class="sidebar sidebar-first">
              <div class="section">
								<?php print render($page['sidebar_first']); ?>
              </div>
            </div> <!-- /.section, /#sidebar-first -->
					<?php endif; ?>

					<?php if(!empty($page['sidebar_firs']) && !empty($page['sidebar_second'])){
					  $page_content_class = 'main-content-two-sidebars';
          }elseif(!empty($page['sidebar_firs']) || !empty($page['sidebar_second'])){
						$page_content_class = 'main-content-one-sidebar';
          }else{
						$page_content_class = 'main-content-no-sidebar';
          } ?>
          <div id="content" class="main-content <?php print $page_content_class; ?>">
            <div class="section">
              <a id="main-content"></a>
							<?php print render($title_prefix); ?>
							<?php if ($title): ?><h1 class="title"
                                       id="page-title"><?php print $title; ?></h1><?php endif; ?>
							<?php print render($title_suffix); ?>
							<?php if ($tabs): ?>
                <div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
							<?php print render($page['help']); ?>
							<?php if ($action_links): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
							<?php print render($page['content']); ?>
							<?php print $feed_icons; ?>
            </div>
          </div> <!-- /.section, /#content -->

					<?php if ($page['sidebar_second']): ?>
            <div id="sidebar-second" class="sidebar sidebar-second">
              <div class="section">
								<?php print render($page['sidebar_second']); ?>
              </div>
            </div> <!-- /.section, /#sidebar-second -->
					<?php endif; ?>

        </div>
      </div>
    </div> <!-- /#main, /#main-wrapper -->

    <?php if ($page['footer']): ?>
      <footer id="footer" class="footer">
        <div class="container">
          <div class="section-footer">
						<?php print render($page['footer']); ?>
          </div>
        </div>
      </footer> <!-- /.section, /#footer -->
		<?php endif; ?>
  </div>
</div> <!-- /#page, /#page-wrapper -->