<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Techkoningin_Base
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122325434-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122325434-1');
</script>
<body <?php body_class(); ?>>
  <div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
  <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <header id="siteHeader" class="site-header navbar-static-top" role="banner">
      <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
          <div class="navbar-brand">
            <?php if ( get_theme_mod( 'techkoningin_base_logo' ) ): ?>
              <a href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="<?php echo esc_url(get_theme_mod( 'techkoningin_base_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
              </a>
            <?php else : ?>
              <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
            <?php endif; ?>     
          </div>
          
          <div id="main-nav" class="navbar-container">
            <button class="navbar-toggler d-lg-none" type="button" onclick="toggleNav()" aria-label="Toggle navigation">
              <i class="fas fa-times"></i>
            </button>
            <?php
              wp_nav_menu(array(
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_id'    => false,
                'container_class' => 'header-nav-main',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
              ));
              
              wp_nav_menu(array(
                'theme_location'  => 'header-social',
                'container'       => 'div',
                'container_class' => 'header-nav-social ml-lg-auto',
                'menu_id'         => false,
                'menu_class'      => 'nav',
                'depth'           => 1,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
              ));
            ?>
          </div>

          <button class="navbar-toggler" type="button" onclick="toggleNav()" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa fa-bars"></span>
          </button>

          <div class="search-toggler-container">
            <a class="search-toggler btn btn-open toggleSearch" id="searchToggler" href="#" aria-label="Toggle search">
              <i class="fas fa-search toggleSearch"></i>
            </a>

            <div id="searchPopover" class="search-popover" style="display: none;">
              <?php get_search_form(); ?>
            </div>

            <div id="searchPopoverBackground" class="search-popover-background" style="display: none;"></div>
          </div>
        </nav>
      </div>
    </header>

    <?php if(!get_theme_mod( 'header_banner_visibility' )): ?>
      <div class="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
      
        <div class="container">

          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
              <div class="extended-search">
                <?php
                  if (get_theme_mod( 'header_banner_title_setting' )){
                    echo '<h2 class="extended-search-heading">' . esc_attr( get_theme_mod( 'header_banner_title_setting' ) ) . '</h2>';
                  }

                  if (get_theme_mod( 'header_banner_tagline_setting' )){
                    echo '<p>' . get_theme_mod( 'header_banner_tagline_setting' ) . '</p>';
                  }

                  get_search_form();
                ?>
              </div>
            </div>
          </div>
        </div>
      </div> 
    <?php endif; ?>
    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <?php endif; ?>
