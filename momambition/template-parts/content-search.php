<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-overview'); ?>>
  <?php if (has_post_thumbnail()): ?>
    <figure class="post-thumbnail">
      <?php the_post_thumbnail(); ?>
    </figure>
  <?php endif; ?>

	<header class="post-header">
    <div class="post-category">
      <p>
        <?php
          foreach((get_the_category()) as $category) {
            echo '<a href="' . get_category_link($category) . '" class="post-category-name">' . $category->cat_name . '</a><span class="post-category-separator"> / </span>';
          }
        ?>
      </p>
    </div>

		<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="post-meta entry-meta">
			<?php techkoningin_base_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="post-content entry-summary">
		<?php
      echo '<p>' . substr(get_the_excerpt(), 0,200) . '…</p>';
      echo '<a class="post-read-more btn btn-primary" href="' . esc_url( get_permalink() ) . '">Lees verder</a>';
    ?>
	</div><!-- .entry-summary -->

	<!-- <footer class="entry-footer">
		<?php techkoningin_base_entry_footer(); ?>
	</footer>.entry-footer -->
</article><!-- #post-## -->
