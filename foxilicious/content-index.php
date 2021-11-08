<article id="post-<?php the_ID(); ?>" <?php post_class('regular-post post-overview col-6 col-md-4'); ?>>
  <div class="post-container">
    <?php 
    $size = 'loop-portrait';

    if (has_post_thumbnail()): ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <figure class="post-thumbnail">
          <?php the_post_thumbnail($size); ?>
        </figure>
      </a>
    <?php endif; ?>

    <div class="post-category">
      <?php
        echo '<span class="post-category-name">' . get_the_category()[0]->name . '</span>';
      ?>
    </div>

    <header class="post-header">
      <?php
        the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>
    </header><!-- .post-header -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->