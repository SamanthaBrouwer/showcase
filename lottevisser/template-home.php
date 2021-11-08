<?php
/**
 * Template Name: Homepage
 */

get_header();
?>
    <section id="primary" class="content-area">

      <figure class="spheres spheres-top-left">
        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/spheres-1.svg'); ?>
      </figure>

      <div id="main" class="site-main" role="main">
        <?php
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'notitle' );
          endwhile; // End of the loop.
        ?>
      </div><!-- #main -->
      
      <figure class="spheres spheres-bottom-right">
        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/spheres-1.svg'); ?>
      </figure>

    </section><!-- #primary -->

<?php
get_footer();
