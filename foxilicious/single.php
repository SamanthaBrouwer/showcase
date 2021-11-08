<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Techkoningin-Base
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
    ?>

    <div class="post-nav">
      <?php
        $previous_post = get_previous_post();
        $next_post = get_next_post();

        if ( $previous_post != NULL ) { ?>
          <div class="post-nav-container post-nav-prev">
            <?php if ( has_post_thumbnail( $previous_post->ID ) ) {
              echo '<a href="' . get_permalink( $previous_post->ID ) . '" title="' . esc_attr( get_the_title($previous_post->ID) ) . '" class="post-nav-link">';
              echo get_the_post_thumbnail( $previous_post->ID, 'post-nav-thumbnail' );
              echo '</a>';
            } ?>
            <a class="post-nav-title" href="<?php echo get_permalink($previous_post->ID); ?>" title="<?php echo get_the_title($previous_post->ID); ?>"><?php echo get_the_title($previous_post->ID); ?></a>
          </div><?php
        }

        if ( $next_post != NULL ) { ?>
          <div class="post-nav-container post-nav-next">
            <a class="post-nav-title" href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo get_the_title($next_post->ID); ?>"><?php echo get_the_title($next_post->ID); ?></a>
            <?php if ( has_post_thumbnail( $next_post->ID ) ) {
              echo '<a href="' . get_permalink( $next_post->ID ) . '" title="' . esc_attr( get_the_title($next_post->ID) ) . '" class="post-nav-link">';
              echo get_the_post_thumbnail( $next_post->ID, 'post-nav-thumbnail' );
              echo '</a>';
            } ?>
          </div><?php
        }
      ?>
    </div>

    <?php
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
