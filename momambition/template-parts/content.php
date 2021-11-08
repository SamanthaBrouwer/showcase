<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin-Base
 */

?>
<?php if ( is_single() ) : ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
    <div class="post-container">
      <div class="post-category">
        <p>
          <?php
            foreach((get_the_category()) as $category) {
              echo '<a href="' . get_category_link($category) . '" class="post-category-name">' . $category->cat_name . '</a><span class="post-category-separator"> / </span>';
            }
          ?>
        </p>
      </div>

      <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

      <?php
      if ( 'post' === get_post_type() ) : ?>
        <div class="post-meta">
          <?php techkoningin_base_posted_on(); ?>
        </div><!-- .post-meta -->
      <?php endif; ?>
        
      <div class="post-content">
        <?php
          the_content();

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techkoningin-base' ),
            'after'  => '</div>',
          ) );
        ?>
      </div><!-- .post-content -->
    </div>
  </article><!-- #post-## -->
  
<?php else : ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-overview'); ?>>
    <figure class="post-thumbnail">
      <?php the_post_thumbnail(); ?>
    </figure>

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

      <?php
      the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

      if ( 'post' === get_post_type() ) : ?>
      <div class="post-meta">
        <?php techkoningin_base_posted_on(); ?>
      </div><!-- .post-meta -->
      <?php
      endif; ?>
    </header><!-- .post-header -->

    <div class="post-content">
      <?php
        echo '<p>' . substr(get_the_excerpt(), 0,200) . '…</p>';
        echo '<a class="post-read-more btn btn-primary" href="' . esc_url( get_permalink() ) . '">Lees verder</a>';

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techkoningin-base' ),
          'after'  => '</div>',
        ) );
      ?>
    </div><!-- .post-content -->

  </article><!-- #post-## -->
<?php endif; ?>