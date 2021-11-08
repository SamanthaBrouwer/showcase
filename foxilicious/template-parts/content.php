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
      <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
      
      <?php if (has_post_thumbnail()): ?>
        <figure class="post-thumbnail">
          <?php the_post_thumbnail(); ?>
        </figure>
      <?php endif; ?>


      <?php if ( 'post' === get_post_type() ) : ?>
        <div class="post-meta">
          <?php printf( '<span class="entry-author">%s ', __( 'Written by', 'techkoningin-child' ) ); the_author_posts_link(); print('</span>'); ?>
          <span class="entry-date"><?php _e( 'Published on', 'techkoningin-child' ); ?> <?php printf( '<time class="entry-date" datetime="%1$s">%2$s</time> ', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) ); ?></span>
          <span class="entry-category"><?php _e( 'in', 'techkoningin-child' ); ?> <?php the_category( ', ' ); ?></span>
          <?php edit_post_link( __( 'Edit', 'techkoningin-child' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .post-meta -->
      <?php endif; ?>
    </header><!-- .post-header -->

    <div class="post-container">
      <div class="post-content">
        <?php
          the_content();

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techkoningin-child' ),
            'after'  => '</div>',
          ) );
        ?>
      </div><!-- .post-content -->
    </div>

    <footer class="post-footer">
      <?php the_tags( '<div class="post-tags">' . __( '<h4>Tags</h4>', 'techkoningin-child' ). ' ', ' ',  '</div>'  ); ?>

      <div class="post-share">
        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" target="_blank" title="<?php esc_attr_e( 'Tweet this on Twitter', 'wpzoom' ); ?>" class="twitter">Tweet</a>
        <a href="https://facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="_blank" title="<?php esc_attr_e( 'Share this on Facebook', 'wpzoom' ); ?>" class="facebook">Share</a>
        <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" data-pin-custom="true" target="_blank" count-layout="vertical" title="<?php esc_attr_e( 'Pin it to Pinterest', 'wpzoom' ); ?>" class="pinterest pin-it-button">Pin it</a>
        <a href="javascript:window.print()" title="<?php esc_attr_e( 'Print this Page', 'wpzoom' ); ?>" class="print">Print</a>
      </div>

      <div class="post-author">
        <div class="post-author-container">
          <figure class="author-avatar">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 90 ); ?>
          </figure>

          <div class="author-description">
            <h3 class="author-title author"><?php the_author_posts_link(); ?></h3>
            <div class="author_links">
              <?php if ( get_the_author_meta( 'facebook_url' ) ) { ?><a class="author_facebook" href="<?php the_author_meta( 'facebook_url' ); ?>" title="Facebook Profile" target="_blank"></a><?php } ?>
              <?php if ( get_the_author_meta( 'twitter' ) ) { ?><a class="author_twitter" href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter" target="_blank"></a><?php } ?>
              <?php if ( get_the_author_meta( 'instagram_url' ) ) { ?><a class="author_instagram" href="https://instagram.com/<?php the_author_meta( 'instagram_url' ); ?>" title="Instagram" target="_blank"></a><?php } ?>
            </div>
            <p class="author-bio">
              <?php the_author_meta( 'description' ); ?>
            </p>
          </div>
        </div>
      </div>
    </footer>
  </article><!-- #post-## -->

<?php else : ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-overview col-6 col-md-4'); ?>>
    <div class="post-container">
      <?php if (has_post_thumbnail()): ?>
        <a href="<?php echo esc_url( get_permalink() ) ?>">
          <figure class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
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
  </article><!-- #post-## -->
<?php endif; ?>
