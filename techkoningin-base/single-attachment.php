<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Techkoningin_Base
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
		<div id="main" class="site-main" role="main" itemprop="mainContentOfPage">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	get_sidebar( 'sidebar-1' );
endif;
get_footer();
