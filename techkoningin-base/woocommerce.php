<?php
/**
 * The template for displaying Woocommerce Product
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techkoningin_Base
 */

get_header(); ?>

    <section id="primary" class="content-area col-sm-12 col-md-12 <?php if (is_active_sidebar( 'sidebar-1' )) : print 'col-lg-8'; endif; ?>">
        <div id="main" class="site-main" role="main" itemprop="mainContentOfPage">

            <?php woocommerce_content(); ?>

        </div><!-- #main -->
    </section><!-- #primary -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	get_sidebar( 'sidebar-1' );
endif;
get_footer();
