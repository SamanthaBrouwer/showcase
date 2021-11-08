<?php
/*
Template Name: Recipe Index (Group by Category)
*/

?>
<?php get_header(); ?>

<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-recipe-page' )) : print 'col-lg-8'; endif; ?>">
    <main id="main" class="site-main food-index-main" role="main">

        <?php get_template_part( 'recipe-index-start' ); ?>

        <?php
            /* Exclude categories */
            // $index_exclude_cat =  option::get('index_exclude_cat');

            $cat_args = array(
                // 'exclude'  => $index_exclude_cat,
                'taxonomy' => 'category',
                // 'orderby' => 'term_order',
                // 'hierarchical' => false,
                // 'order'   => 'ASC'
            );

        	$terms = get_terms($cat_args);

            foreach ($terms as $term) {
                $cat_id= $term->term_id;

                echo '<h2 class="section-title">'.$term->name.'</h2>';

                $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                $args = array(
                    'paged' => $paged,
                    'cat' => $cat_id,
                    // 'posts_per_page' => option::get('index_group_posts')
                    'posts_per_page' => 3
                );
				
                $wp_query = new WP_Query( $args );
				
                ?>

                <?php if ( $wp_query->have_posts() ) : ?>

                    <section id="recent-posts" class="foodica-index recipe_index_cat row">

                        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						
                            <?php get_template_part('content-index'); ?>

                        <?php endwhile; ?>

                        <div class="readmore_button mx-auto">
														
                            <a class="btn btn-primary" href="<?php echo get_category_link( $cat_id ); ?>"><?php _e('Meer ', 'techkoningin-base'); echo $term->name; ?>...</a>
                        </div>

                    </section>

                <?php endif;?>

            <?php } ?>

            <?php wp_reset_query(); ?>


    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php if ( is_active_sidebar( 'sidebar-recipe-page' ) ) : ?>
  <aside class="sidebar col-lg-4">
    <?php dynamic_sidebar( 'sidebar-recipe-page' ); ?>
  </aside>
<?php endif;

get_footer();
