<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Techkoningin_Base
*/

?>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- #content -->

      <?php if ( is_active_sidebar( 'footer-widget-full-width' )) : ?>
        <aside class="container-fluid footer-widget-full-width"><?php dynamic_sidebar( 'footer-widget-full-width' ); ?></aside>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'footer-widget-container-width' )) : ?>
        <aside class="container footer-widget-container-width"><?php dynamic_sidebar( 'footer-widget-container-width' ); ?></aside>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'footer-nav-area' )) : ?>
        <footer class="site-footer" role="contentinfo">
          <div class="container">
            <div class="row justify-content-between">
              <?php dynamic_sidebar( 'footer-nav-area' ); ?>
            </div>
          </div>
        </footer>
      <?php endif; ?>

      <footer class="site-footer-sub">
        <div class="container">
          <div class="footer-nav d-flex justify-content-between">
            <?php
              wp_nav_menu(array(
                'theme_location'  => 'footer',
                'container'       => 'div',
                'container_class' => 'footer-nav-main',
                'menu_id'         => false,
                'menu_class'      => 'nav',
                'depth'           => 1,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
              ));

              wp_nav_menu(array(
                'theme_location'  => 'footer-social',
                'container'       => 'div',
                'container_class' => 'footer-nav-social',
                'menu_id'         => false,
                'menu_class'      => 'nav',
                'depth'           => 1,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
              ));
            ?>
          </div>
        </div>
      </footer>
    <?php endif; ?>

  </div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>