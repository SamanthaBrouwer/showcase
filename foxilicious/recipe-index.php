<?php
/*
Template Name: Recipe Index (Infinite Scroll)
*/
?>
<?php get_header(); ?>


<section id="primary" class="content-area col-sm-12 <?php if (is_active_sidebar( 'sidebar-recipe-page' )) : print 'col-lg-8'; endif; ?>">
    <main id="main" class="site-main food-index-main" role="main">

    <section class="content-area">

        <?php get_template_part( 'recipe-index-start' ); ?>

        <?php
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            $args = array(
                'paged' => $paged,
                'post_type' => 'post',
                'posts_per_page' => 12,
                'ignore_sticky_posts' => true
            );

            /* Exclude categories */
            // if ( is_array( option::get( 'index_exclude_cat' ) ) && count(option::get('index_exclude_cat'))){
            //     $exclude_cats = implode(",-", (array) option::get('index_exclude_cat'));
            //     $exclude_cats = '-' . $exclude_cats;

            //     $args['cat'] = $exclude_cats;
            // }

            $wp_query = new WP_Query( $args );

            if ( $wp_query->have_posts() ) : ?>

            <script type="text/javascript">
                var wpz_currPage = <?php echo $paged; ?>,
                    wpz_maxPages = <?php echo $wp_query->max_num_pages; ?>,
                    wpz_pagingURL = '<?php echo trailingslashit(get_permalink()); ?>page/';
            </script>

            <section id="recent-posts" class="foodica-index row">

                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                    <?php get_template_part('content-index'); ?>

                <?php endwhile; ?>

            </section>

            <?php get_template_part( 'pagination' ); ?>

        <?php else: ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>


    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php if ( is_active_sidebar( 'sidebar-recipe-page' ) ) : ?>
  <aside class="sidebar col-lg-4">
    <?php dynamic_sidebar( 'sidebar-recipe-page' ); ?>
  </aside>
<?php endif;

get_footer();
