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

<body <?php body_class(); ?>>
  <div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>

  <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <header class="site-header" role="banner">
      <div class="container-fluid">
        <nav class="navbar p-0">
          <div class="navbar-brand">
              <?php
                switch(get_page_template_slug()) {
                  case 'template-blue.php':
                    $logo = 'lv-logo-blue.jpg';
                    break;
                  case 'template-home.php':
                  case 'template-pink.php':
                    $logo = 'lv-logo-pink.jpg';
                    break;
                  default:
                    $logo = 'lv-logo.svg';
                }
              ?>
              <a href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/' . $logo ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
              </a>
          </div>

          <button class="navbar-toggler" type="button" aria-label="Toggle navigation" onclick="toggleNav()">
            <span class="navbar-toggler-icon fa fa-bars"></span>
          </button>
        </nav>
      </div>

      <div id="mobile-menu" class="mobile-menu">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" onclick="toggleNav()">
          <span class="navbar-toggler-icon fas fa-times"></span>
        </button>
        <?php
            wp_nav_menu(array(
              'theme_location'  => 'primary',
              'container'       => 'div',
              'container_id'    => 'main-nav',
              'container_class' => 'mobile-menu-container',
              'menu_id'         => false,
              'menu_class'      => 'navbar-nav',
              'depth'           => 3,
              'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
              'walker'          => new wp_bootstrap_navwalker()
            ));
          ?>
      </div>
    </header>

    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <?php endif; ?>