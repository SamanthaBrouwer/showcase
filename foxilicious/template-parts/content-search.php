<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-overview col-6 col-md-4'); ?>>
  <div class="post-container entry-container">
    <?php if (has_post_thumbnail()): ?>
      <a href="<?php echo esc_url( get_permalink() ) ?>">
        <figure class="post-thumbnail entry-thumbnail">
          <?php the_post_thumbnail(); ?>
        </figure>
      </a>
    <?php endif; ?>

    <div class="post-category entry-category">
      <?php
        echo '<span class="post-category-name entry-category-name">' . get_the_category()[0]->name . '</span>';
      ?>
    </div>

    <header class="post-header entry-header">
      <?php
        the_title( '<h2 class="post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>
    </header><!-- .post-header -->
  </div>
</article><!-- #post-## -->