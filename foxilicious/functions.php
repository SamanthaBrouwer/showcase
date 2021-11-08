<?php

function techkoningin_base_child_scripts() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_script( 'mobile-nav', get_stylesheet_directory_uri() . '/js/mobile-nav.js', array(), false, true );
  wp_enqueue_script( 'recipe-index-infinite-scroll', get_stylesheet_directory_uri() . '/js/recipe-index-infinite-scroll.js' );
	wp_enqueue_script( 'sticky-header', get_stylesheet_directory_uri() . '/js/sticky-header.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'techkoningin_base_child_scripts', 11 );

// Register new menus
register_nav_menus( array(
  'header-social' => esc_html__( 'Header Social', 'techkoningin-base' ),
  'footer-social' => esc_html__( 'Footer Social', 'techkoningin-base' ),
  'recipe-index' => esc_html__( 'Recipe Index', 'techkoningin-base' ),
) );

/**
 * Register widget areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function techkoningin_base_child_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Above footer (full page width)', 'techkoningin-base' ),
    'id'            => 'footer-widget-full-width',
    'description'   => esc_html__( 'Add widgets here.', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Above footer (container width)', 'techkoningin-base' ),
    'id'            => 'footer-widget-container-width',
    'description'   => esc_html__( 'Add widgets here.', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer navigation area', 'techkoningin-base' ),
    'id'            => 'footer-nav-area',
    'description'   => esc_html__( 'Add custom footer navigation here.', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Recipe page', 'techkoningin-base' ),
    'id'            => 'sidebar-recipe-page',
    'description'   => esc_html__( 'This sidebar is only visible on the recipe page', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Category + Search results page', 'techkoningin-base' ),
    'id'            => 'sidebar-category-search',
    'description'   => esc_html__( 'This sidebar is only visible on the categories and search results pages', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Widget Area Homepage (below posts (first))', 'techkoningin-base' ),
    'id'            => 'sidebar-home-below-posts-first',
    'description'   => esc_html__( 'This widget area is only visible on the homepage, below the posts (first area, above the second one)', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Widget Area Homepage (below posts (second))', 'techkoningin-base' ),
    'id'            => 'sidebar-home-below-posts-second',
    'description'   => esc_html__( 'This widget area is only visible on the homepage, below the posts (second area, below the first one', 'techkoningin-base' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'techkoningin_base_child_widgets_init' );

// Add our own gutenberg stylesheet
function tk_gutenberg_css() {

	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );

}

add_action( 'after_setup_theme', 'tk_gutenberg_css' );

add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style( 'style-editor', get_stylesheet_directory_uri() . "/style-editor.css", false, '1.0', 'all' );
} );

// Remove predefined gradients
function tk_disable_gutenberg_gradient_presets() {
	add_theme_support( 'editor-gradient-presets', [] );
}

add_action( 'after_setup_theme', 'tk_disable_gutenberg_gradient_presets' );

/* -- Remove these comments if you want to use custom gradient backgrounds
// Then add our own gradients
function tk_add_custom_gutenberg_gradient_presets() {
	add_theme_support(
		'editor-gradient-presets',
		[
			[
				'name' => esc_html__( 'Primary to Light', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-primary-color) 35%, var(--ccp-light-gray-color) 35.3%)',
				'slug' => 'primary-to-light'
      ]
		]
	);
}
add_action( 'after_setup_theme', 'tk_add_custom_gutenberg_gradient_presets' );
*/

// Register Gutenberg block styles
// Single images
register_block_style(
	'core/image', [
		'name'         => 'image-single-landscape',
		'label'        => 'Landscape',
		'style_handle' => 'style-editor',
	]
);

register_block_style(
	'core/image', [
		'name'         => 'image-single-portrait',
		'label'        => 'Portrait',
		'style_handle' => 'style-editor',
	]
);

register_block_style(
	'core/image', [
		'name'         => 'image-single-square',
		'label'        => 'Square',
		'style_handle' => 'style-editor',
	]
);


/**
 * Registers custom query vars.
 *
 * @param array $vars The existing query vars.
 *
 * @return array The query vars.
 */
function tk_add_recipe_query_vars( $vars ) {
	$vars = array_merge( $vars, [ 'course', 'cuisine' ] );

	return $vars;
}

add_filter( 'query_vars', 'tk_add_recipe_query_vars' );

/**
 * Manipulate the query to return recipes based on whether or not the user has applied search filters.
 *
 * @param WP_Query $query The query.
 *
 * @return void
 */
function tk_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	$tax_query = [];

	if ( ! empty( get_query_var( 'course' ) ) ) {
		$tax_query[] = [
			'taxonomy' => 'wprm_course',
			'field'    => 'slug',
			'terms'    => [ get_query_var( 'course' ) ],
		];
	}

	if ( ! empty( get_query_var( 'cuisine' ) ) ) {
		$tax_query[] = [
			'taxonomy' => 'wprm_cuisine',
			'field'    => 'slug',
			'terms'    => [ get_query_var( 'cuisine' ) ],
		];
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
	}

	if ( count( $tax_query ) > 0 ) {
		$query->set( 'post_type', [ 'post', 'wprm_recipe' ] );
		$query->set( 'tax_query', $tax_query );
	}
}

add_action( 'pre_get_posts', 'tk_pre_get_posts', 1 );

/**
 * Creates a dropdown based on the passed taxonomy.
 *
 * @param string $taxonomy               The taxonomy to create the list for.
 * @param string $field_name             The name of the dropdown field.
 * @param string $field_placeholder_text The placeholder text of the dropdown.
 *
 * @return string The dropdown output.
 */
function create_dropdown( $taxonomy, $field_name, $field_placeholder_text ) {
	$select = '';
	$terms  = get_terms( $taxonomy, [ 'hide_empty' => true ] );

	if ( is_array( $terms ) ) {
		$selected = get_query_var( $field_name );

		$select .= sprintf(
			'<select class="form-control" name="%s"><option value="" %s>%s</option>',
			$field_name,
			empty( $selected ) ? 'selected="selected"' : '',
			$field_placeholder_text
		);

		foreach ( $terms as $term ) {
			$select .= sprintf(
				'<option value="%s" %s>%s</option>',
				$term->slug,
				$selected === $term->slug ? 'selected="selected"' : '',
				$term->name
			);
		}

		$select .= '</select>';
	}

	return $select;
}

if ( ! function_exists( 'techkoningin_child_base_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function techkoningin_child_base_posted_on() {
    // $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    //       $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    // }

    // $time_string = sprintf( $time_string,
    //   esc_attr( get_the_date( 'c' ) ),
    //   esc_html( get_the_date() )
    // );

    // $posted_on = sprintf(
    //   esc_html_x( 'Gepubliceerd op %s', 'post date', 'techkoningin-base' ),
    //   '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    // );

    $byline = sprintf(
      esc_html_x( 'door %s', 'post author', 'techkoningin-base' ),
      '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    // echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> | ' . $byline . '</span>'; // WPCS: XSS OK.
    echo '<span class="byline">' . $byline . '</span>';
  }
endif;

/*
Checks for a yoast primary category, if it exists move the category to the first position in the $categories array.
*/
function yoast_primary_cat_as_first_cat($categories) {

	// Check if yoast exists and get the primary category
	if ($categories && class_exists('WPSEO_Primary_Term') ) {

			// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
			$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );

			// If no error is returned, get primary yoast term
			$primary_cat_term_id = (!is_wp_error($term)) ? $term->term_id : null;

			// Loop all categories
			if($primary_cat_term_id !== null) {
					foreach ($categories as $i => $category) {

							// Move the primary category to the top of the array
							if($category->term_id === $primary_cat_term_id) {

									$out = array_splice($categories, $i, 1);
									array_splice($categories, 0, 0, $out);

									break;
							}
					}
			}
	}

	return $categories;
}
add_filter( 'get_the_categories', 'yoast_primary_cat_as_first_cat' );

// Remove "Category:", "Tag:", "Author:" from the_archive_title
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) { //for custom post types
		$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
});

/**
 * Creates a custom search query output based on the custom query variables.
 *
 * @return string The custom search query.
 */
function tk_get_search_query() {
	$search_query = get_search_query();

	$query_vars = array_filter( [
		get_query_var( 'course' ),
		get_query_var( 'cuisine' ),
		get_query_var( 'ingredients' ),
		$search_query,
	] );

	return implode( ', ', $query_vars );
}

/**
 * Removes the Uncategorized category from the post results.
 *
 * @param WP_Query $query The query to change.
 *
 * @return mixed|void The changed query.
 */
function tk_exclude_category_results( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	$query->set( 'cat', '-1' );

	return $query;
}

add_filter( 'pre_get_posts', 'tk_exclude_category_results' );

/**
 * Excludeds the Uncategorized category from the sidebar widget.
 *
 * @param array $args The arguments to pass along.
 *
 * @return array The category arguments.
 */
function tk_exclude_uncategorized_from_widget( $args ) {
	$exclude_arr = [ 1 ];

	if ( isset( $cat_args['exclude'] ) && ! empty( $cat_args['exclude'] ) ) {
		$exclude_arr = array_unique( array_merge( explode( ',', $cat_args['exclude'] ), $exclude_arr ) );
	}
	$cat_args['exclude'] = implode( ',', $exclude_arr );

	return $cat_args;
}

add_filter( 'widget_categories_args', 'tk_exclude_uncategorized_from_widget', 10, 1 );
