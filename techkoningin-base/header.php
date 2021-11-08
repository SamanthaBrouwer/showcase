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
<html <?php techkoningin_base_schema_org(); ?> <?php language_attributes(); ?>>
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
    <header class="site-header navbar-static-top" role="banner">
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
          
          <?php
            wp_nav_menu(array(
              'theme_location'  => 'primary',
              'container'       => 'div',
              'container_id'    => 'main-nav',
              'container_class' => 'collapse navbar-collapse justify-content-end',
              'menu_id'         => false,
              'menu_class'      => 'navbar-nav',
              'depth'           => 3,
              'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
              'walker'          => new wp_bootstrap_navwalker()
            ));
          ?>
              
        </nav>
      </div>
    </header>

    <?php if(!get_theme_mod( 'header_banner_visibility' )): ?>
      <div class="page-sub-header" <?php if(has_post_thumbnail($post->ID)) { ?>style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');" <?php } ?>>
      
        <div class="container">

          <div class="row justify-content-end">
            <div class="col-auto">
              <?php get_search_form(); ?>
            </div>
          </div>
          

          <?php the_title( '<h1 class="header-title">', '</h1>' ); ?>

          <p>
            <?php
              if (get_theme_mod( 'header_banner_tagline_setting' )){
                echo get_theme_mod( 'header_banner_tagline_setting' );
              } else {
                echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
              }
            ?>
          </p>
        </div>
      </div> 
    <?php endif; ?>
    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <?php endif; ?>