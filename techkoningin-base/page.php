<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin_Base
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

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
	</section><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	get_sidebar( 'sidebar-1' );
endif;
get_footer();
