<!DOCTYPE html>
<html <?php language_attributes(); ?> id="parallax_scrolling">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


  <?php wp_head(); ?>
</head>
<?php
$Verito = new Verito(); ?>

<body <?php body_class(); ?>>

  <div id="page" class="page">

    <header>
      <div class="header-container">
        <div class="header-top d-none d-md-block d-lg-block d-xl-block">
          <div class="container">
            <div class="row">
              <div class="col-12 ">
                <!-- Header Top Links -->
                <?php if (has_nav_menu('toplinks')) { ?>
                  <div class="toplinks">
                    <div class="links">
                      <?php echo verito_top_navigation(); ?>
                    </div>
                  </div>
                <?php } ?>
                <!-- End Header Top Links -->
              </div>
            </div>
          </div>
        </div>
        <div id="navbar" class="header-bottom">
          <div class="container">
            <div class="row">
              <div class="col-md-2 col-sm-12 logo-block">
                <?php verito_logo_image(); ?>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12">
                <nav class="navcls">
                  <div class="mm-toggle-wrap">
                    <div class="mm-toggle mobile-toggle"><i class="fa fa-bars"></i><span class="mm-label"><?php esc_attr_e('Menu', 'verito'); ?></span> </div>
                  </div>
                  <?php if (has_nav_menu('main_menu')) { ?>
                    <div class="nav-inner">
                      <div class="mgk-main-menu">
                        <div id="main-menu">
                          <?php echo verito_main_menu(); ?>
                        </div>
                      </div>
                    </div>
                  <?php  } ?>
                </nav>
              </div>
              <div class="col-md-2 d-none d-md-block d-lg-block d-xl-block search-wrapper">
              <ul class="navbar-right">
                <li>
                  <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.png" alt="">
                    <div class="search-container">
                      <?php echo verito_search_form(); ?>
                    </div>
                  </div>
                </li>
                <li>
                  <div>
                    <a href="<?php echo get_home_url()?>/login" target="_self">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/user.png" alt="">
                    </a>
                  </div>       
                </li>
              </ul>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>