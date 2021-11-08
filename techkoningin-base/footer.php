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
              <div class="col-md-3 footer-social"><?php dynamic_sidebar( 'footer-1' ); ?></div>
            <?php endif; ?>

            <div class="col-md footer-nav">
              <?php
                wp_nav_menu(array(
                  'theme_location'  => 'footer',
                  'container'       => 'div',
                  'container_class' => 'd-flex justify-content-md-end',
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
            <div class="col-md-4 footer-widget">
              <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                <?php dynamic_sidebar( 'footer-2' ); ?>
              <?php endif; ?>

              <div class="footer-copyright">
                &copy; <a href="https://techkoningin.nl/">de Techkoningin</a> <?php echo date('Y'); ?>
              </div>
            </div>

            <?php
              $args = array( 
                'numberposts' => '2', 
                'post_status' => 'publish',
                'post_type' => 'post'
              );
              $recent_posts = wp_get_recent_posts( $args );
              foreach( $recent_posts as $recent ){
                  printf( '
                    <div class="col-12 col-md-4">
                      <div class="recent-post">
                        <h3 class="recent-post-title"><a href="%1$s">%2$s</a></h3>
                        <span class="recent-post-date">Laatste bericht %3$s</span>
                        <div class="recent-post-body">%4$s</div>
                        <a href="%1$s" class="recent-post-btn btn btn-primary">Lees verder</a>
                      </div>
                    </div>',
                      esc_url( get_permalink( $recent['ID'] ) ),
                      apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
                      apply_filters( 'the_date', date('d-m-Y', strtotime($recent['post_date'])), $recent['ID'] ),
                      apply_filters( 'the_content', wp_trim_words($recent['post_content'], 25, '...'), $recent['ID'] )
                  );
              }?>
          </div> 

        </div>
      </footer>
    <?php endif; ?>

  </div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>