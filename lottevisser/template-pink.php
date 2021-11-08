<?php
/**
 * Template Name: Roze/oranje (roze logo)
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
    <div class="spheres spheres-top-center">
      <figure class="sphere sphere-left">
        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/sphere-3.svg'); ?>
      </figure>
      <figure class="sphere sphere-right">
      <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/sphere-3.svg'); ?>
      </figure>
      <figure class="sphere sphere-bottom">
      <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/sphere-3.svg'); ?>
      </figure>
    </div>

		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

    <figure class="spheres spheres-bottom-left">
    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/spheres-1.svg'); ?>
    </figure>

    <div class="spheres spheres-bottom-right">
      <figure class="sphere sphere-top">
      <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/sphere-1.svg'); ?>
      </figure>
      <figure class="sphere sphere-bottom">
      <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/sphere-2.svg'); ?>
      </figure>
    </div>
	</section><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	get_sidebar( 'sidebar-1' );
endif;
get_footer();
