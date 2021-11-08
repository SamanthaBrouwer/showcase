<?php
/**
 * Display detail author of current post
 * Use in single post
 *
 * @since 1.0
 */
?>
<div class="post-author">
  <figure class="author-avatar">
    <?php if (function_exists('get_simple_local_avatar')) {
      if (get_simple_local_avatar( get_the_author_meta( 'ID' ))) {
        echo get_simple_local_avatar( get_the_author_meta( 'ID' ), '100' );
      } else {
        echo get_avatar( get_the_author_meta( 'email' ), '100' );
      }
    } else {
      echo get_avatar( get_the_author_meta( 'email' ), '100' );
    }	?>
  </figure>

  <div class="author-description">
    <h4 class="author-title"><?php the_author_posts_link(); ?></h4>
    <p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
    <div class="author-links">
      <?php if ( get_the_author_meta( 'user_url' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="<?php the_author_meta( 'user_url'); ?>"><i class="fas fa-globe"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="http://facebook.com/<?php echo esc_attr( the_author_meta( 'facebook' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="http://twitter.com/<?php echo esc_attr( the_author_meta( 'twitter' ) ); ?>"><i class="fab fa-twitter"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'instagram' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="http://instagram.com/<?php echo esc_attr( the_author_meta( 'instagram' ) ); ?>"><i class="fab fa-instagram"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="http://pinterest.com/<?php echo esc_attr( the_author_meta( 'pinterest' ) ); ?>"><i class="fab fa-pinterest"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'tumblr' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="http://<?php echo esc_attr( the_author_meta( 'tumblr' ) ); ?>.tumblr.com/"><i class="fab fa-tumblr"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'linkedin' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'soundcloud' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'soundcloud' ) ); ?>"><i class="fab fa-soundcloud"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
        <a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'youtube' ) ); ?>"><i class="fab fa-youtube"></i></a>
      <?php endif; ?>
      <?php if ( get_the_author_meta( 'email' ) ) : ?>
        <a rel="nofollow" class="author-social" href="mailto:<?php echo esc_attr( the_author_meta( 'email' ) ); ?>"><i class="fas fa-envelope"></i></a>
      <?php endif; ?>
    </div>
  </div>
</div>