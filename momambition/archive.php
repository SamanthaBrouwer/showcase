<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin_Base
 */

get_header(); ?>

</div> <!-- end of .row -->

<div class="entry-content">
  <div class="wp-block-group has-ccp-white-color has-ccp-secondary-background-color has-text-color has-background">
    <div class="wp-block-group__inner-container">
      <?php if ( is_active_sidebar( 'blog-newsletter' )) : ?>
        <div class="col"><?php dynamic_sidebar( 'blog-newsletter' ); ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="wp-block-group has-primary-to-light-gradient-background has-background">
    <div class="row">

      <div class="col-12">
          <?php
            the_archive_title( '<h1 class="page-title has-text-align-center is-style-ma-heading-bon-vivant has-ccp-light-gray-color has-text-color">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
          ?>

        <!-- <h2 class="has-text-align-center is-style-ma-heading-bon-vivant has-ccp-light-gray-color has-text-color">The journal</h2>
        <h2 class="has-text-align-center has-ccp-white-color has-text-color"><?php single_post_title(); ?></h2> -->
      </div>

      <section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-blog' )) : print 'col-lg-9'; endif; ?>">
        <div id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) : ?>

          <?php
          /* Start the Loop */
          while ( have_posts() ) : the_post();

            /*
            * Include the Post-Format-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
            get_template_part( 'template-parts/content', get_post_format() );

          endwhile;

          the_posts_pagination();

        else :

          get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        </div><!-- #main -->
      </section><!-- #primary -->

      <?php
      if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
        <aside class="sidebar widget-area col-sm-12 col-lg-3" role="complementary">
          <?php dynamic_sidebar( 'sidebar-blog' ); ?>
        </aside>
      <?php endif; ?>

    </div> <!-- /.row -->
  </div> <!-- /.wp-block-group -->
</div> <!-- /.entry-content -->
<div class="row"> <!-- Do NOT close - closes in footer() -->

<?php
get_footer();