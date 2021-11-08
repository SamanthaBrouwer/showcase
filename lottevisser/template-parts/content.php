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
    <header class="post-header">
      <div class="post-category">
        <p>
          <?php
            foreach((get_the_category()) as $category) {
              echo '<span class="post-category-name">' . $category->cat_name . '<span class="post-category-separator">, </span></span>';
            }
          ?>
        </p>
      </div>
      <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
    </header><!-- .post-header -->

    <div class="post-container">
      <?php
        

        if ( 'post' === get_post_type() ) : ?>
          <div class="post-meta">
            <?php techkoningin_base_posted_on(); ?>
          </div><!-- .post-meta -->
          <?php
        endif; ?>

      <figure class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
      </figure>

      <div class="post-content">
        <?php
          the_content();

          $byline = sprintf(
            esc_html_x( 'Geschreven door %s', 'post author', 'techkoningin-base' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
          );

          print '<div class="post-content-author">' . $byline . '</div>';

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
    <div class="row">
      <div class="col-md-6 post-thumbnail-container">
        <figure class="post-thumbnail">
          <?php the_post_thumbnail(); ?>
        </figure>
      </div>

      <div class="col-md-6 post-container">
        <header class="post-header">
          <div class="post-category">
            <p>
              <?php
                foreach((get_the_category()) as $category) {
                  echo '<span class="post-category-name">' . $category->cat_name . '<span class="post-category-separator">, </span></span>';
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

      </div>
    </div>
  </article><!-- #post-## -->
<?php endif; ?>