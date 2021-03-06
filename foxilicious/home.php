<?php
get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
		<main id="main" class="site-main row" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

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

		<?php if ( is_active_sidebar( 'sidebar-home-below-posts-first' ) ) : ?>
			<div class="widget-area widget-area-home">
				<?php dynamic_sidebar( 'sidebar-home-below-posts-first' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-home-below-posts-second' ) ) : ?>
			<div class="widget-area widget-area-home">
				<?php dynamic_sidebar( 'sidebar-home-below-posts-second' ); ?>
			</div>
		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

if ( is_active_sidebar( 'sidebar-1' ) ) :
	get_sidebar( 'sidebar-1' );
endif;

get_footer();
