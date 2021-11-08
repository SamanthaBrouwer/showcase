<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Techkoningin-Base
 */

get_header(); ?>

</div> <!-- /.row -->

<header class="wp-block-cover block-hero" style="background-image: url(<?php if ( has_post_thumbnail() ) : echo get_the_post_thumbnail_url(); endif; ?>)">
</header>

<div class="entry-content d-flex">

	<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-blog' )) : print 'col-lg-9'; endif; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			    the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
  <aside class="sidebar widget-area col-sm-12 col-lg-3" role="complementary">
    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
  </aside>
<?php endif; ?>

</div> <!-- /.entry-content -->
<div class="row"> <!-- Do not close - closes in footer -->
<?php get_footer();
