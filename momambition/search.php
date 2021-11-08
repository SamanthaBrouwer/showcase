<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Techkoningin_Base
 */

get_header(); ?>

</div> <!-- end of .row -->

<div class="entry-content mt-0">
  <div class="wp-block-group has-ccp-white-color has-ccp-secondary-background-color has-text-color has-background">
    <div class="wp-block-group__inner-container">
      <?php if ( is_active_sidebar( 'blog-newsletter' )) : ?>
        <div class="col"><?php dynamic_sidebar( 'blog-newsletter' ); ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="wp-block-group has-secondary-to-light-centered-gradient-background has-background"></div>

  <div class="wp-block-group archive-categories">
    <div class="wp-block-group__inner-container">
      <?php if ( is_active_sidebar( 'blog-categories' )) : ?>
        <div class="col"><?php dynamic_sidebar( 'blog-categories' ); ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="wp-block-group has-primary-to-light-gradient-background has-background">
    <div class="row">

      <?php
        if ( have_posts() ) : ?>

      <div class="col-12">
        <h1 class="page-title has-text-align-center is-style-ma-heading-bon-vivant has-ccp-light-gray-color has-text-color">
          <?php printf( esc_html__( 'Search Results for: %s', 'techkoningin-base' ), '<span>' . get_search_query() . '</span>' ); ?>
        </h2>
      </div>

      <section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-blog' )) : print 'col-lg-9'; endif; ?>">
        <div id="main" class="site-main" role="main">

          <?php
          /* Start the Loop */
          while ( have_posts() ) : the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'search' );

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
