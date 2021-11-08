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

      <footer class="site-footer <?php echo techkoningin_base_bg_class(); ?>" role="contentinfo">
        <div class="container">
          <div class="row">
            <?php if ( is_active_sidebar( 'footer-1' )) : ?>
              <div class="col"><?php dynamic_sidebar( 'footer-1' ); ?></div>
            <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-auto footer-nav">
              <?php
                wp_nav_menu(array(
                  'theme_location'  => 'footer',
                  'container'       => 'div',
                  'container_class' => 'd-flex justify-content-center',
                  'menu_id'         => false,
                  'menu_class'      => 'nav',
                  'depth'           => 1,
                  'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                  'walker'          => new wp_bootstrap_navwalker()
                ));
              ?>
            </div>
          </div>
          
          <div class="row">
            <div class="col-auto footer-nav-social">
              <?php
                wp_nav_menu(array(
                  'theme_location'  => 'footer-social',
                  'container'       => 'div',
                  'container_class' => 'd-flex justify-content-center',
                  'menu_id'         => false,
                  'menu_class'      => 'nav',
                  'depth'           => 1,
                  'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                  'walker'          => new wp_bootstrap_navwalker()
                ));
              ?>
            </div>
          </div>
        </div>
      </footer>

      <footer class="site-footer-sub">
        <div class="container">
          <div class="footer-copyright">
            &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?> | Ontwikkeling door <a href="https://techkoningin.nl/">de Techkoningin</a> 
          </div>
        </div>
      </footer>
      

    <?php endif; ?>

  </div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>