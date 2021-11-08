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
    <header id="navbar-small" class="social-header navbar-small">
      <div class="container">
        <?php get_search_form(); ?>

          <?php
            wp_nav_menu(array(
              'theme_location'  => 'primary',
              'container'       => 'div',
              'container_id'    => 'main-nav-small',
              'container_class' => 'main-nav navbar-expand-lg justify-content-center',
              'menu_id'         => false,
              'menu_class'      => 'navbar-nav align-items-center',
              'depth'           => 3,
              'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
              'walker'          => new wp_bootstrap_navwalker()
            ));
  
            wp_nav_menu(array(
              'theme_location'  => 'header-social',
              'container'       => 'div',
              'container_id'    => 'social-nav',
              'container_class' => 'social-nav ml-2',
              'menu_id'         => false,
              'menu_class'      => 'navbar-nav',
              'depth'           => 3,
              'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
              'walker'          => new wp_bootstrap_navwalker()
            ));
          ?>
      </div>
    </header>
    
    <header id="navbar-large" class="site-header navbar-large" role="banner">
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

          <button class="navbar-toggler" type="button" data-toggle="collapse" 
                  data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa fa-bars"></span>
          </button>
          
          <div class="navbar-body">  
            <?php
              wp_nav_menu(array(
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'main-nav collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
              ));
            ?>
          </div>              
        </nav>
      </div>
    </header>

    
    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <?php endif; ?>