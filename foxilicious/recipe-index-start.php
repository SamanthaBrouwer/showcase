<?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div class="wpz_breadcrumbs">','</div>' );
    }
?>

<div class="recipe-index-menu">
    <?php if ( has_nav_menu( 'recipe-index' ) ) { ?>
        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-index', 'theme_location' => 'recipe-index', 'depth' => '1' ) ); ?>
    <?php } ?>

</div>

<h2 class="entry-title recipe-index-entry-title"><?php the_title(); ?></h2>

<?php
    global $post;
    $content = $post->post_content;

echo '<div class="recipe-description-top">'.$content.'</div>'; ?>

<div class="clear"></div>