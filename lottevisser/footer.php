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

      <footer class="site-footer" role="contentinfo">
        <?php if ( is_active_sidebar( 'footer-1' )) : ?>
          <div class="site-footer-widget"><?php dynamic_sidebar( 'footer-1' ); ?></div>
        <?php endif; ?>
      </footer>
    <?php endif; ?>

  </div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>