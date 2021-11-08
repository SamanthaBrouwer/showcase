<?php
/**
 * Techkoningin Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Techkoningin_Base
 */

if ( ! function_exists( 'techkoningin_base_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function techkoningin_base_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Techkoningin Base, use a find and replace
	 * to change 'techkoningin-base' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'techkoningin-base', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'techkoningin-base' ),
		'footer' => esc_html__( 'Footer', 'techkoningin-base' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'techkoningin_base_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function techkoningin_base_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'techkoningin_base_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'techkoningin_base_setup' );


/**
 * Add Welcome message to dashboard
 */
function techkoningin_base_reminder(){
        $theme_page_url = 'https://afterimagedesigns.com/techkoningin-base/?dashboard=1';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to Techkoningin Base Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'techkoningin-base' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'techkoningin_base_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function techkoningin_base_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'techkoningin_base_content_width', 1170 );
}
add_action( 'after_setup_theme', 'techkoningin_base_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function techkoningin_base_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'techkoningin-base' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'techkoningin-base' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'techkoningin-base' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'techkoningin-base' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'techkoningin-base' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'techkoningin-base' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'techkoningin_base_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function techkoningin_base_scripts() {
	// load bootstrap css
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'techkoningin-base-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'techkoningin-base-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.15.1/css/all.css' );
    } else {
        wp_enqueue_style( 'techkoningin-base-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'techkoningin-base-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }
	// load bootstrap css
	// load AItheme styles
	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('techkoningin-base-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), '', true );
    	wp_enqueue_script('techkoningin-base-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('techkoningin-base-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('techkoningin-base-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    }
    wp_enqueue_script('techkoningin-base-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
	wp_enqueue_script( 'techkoningin-base-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'techkoningin_base_scripts', 10);

function techkoningin_base_styles() {
  // load Techkoningin Base styles
  wp_enqueue_style( 'techkoningin-base-style', get_stylesheet_uri() );
  if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
      wp_enqueue_style( 'techkoningin-base-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
  }
  if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
      wp_enqueue_style( 'techkoningin-base-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
  }
}
add_action( 'wp_enqueue_scripts', 'techkoningin_base_styles', 12);


/**
 * Add Preload for CDN scripts and stylesheet
 */
function techkoningin_base_preload( $hints, $relation_type ){
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
} 

add_filter( 'wp_resource_hints', 'techkoningin_base_preload', 10, 2 );



function techkoningin_base_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "techkoningin-base" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "techkoningin-base" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "techkoningin-base" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'techkoningin_base_password_form' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

/**
 * Add Schema.org markup
 * 
 * @link https://www.longren.io/add-schema-org-markup-to-any-wordpress-theme/
 */
function techkoningin_base_schema_org() {
    $schema = 'http://schema.org/';

    // Is single post
    if (is_single()) {
        $type = "Article";
    }

    // Is author page
    elseif ( is_author() ) {
        $type = 'ProfilePage';
    }
    
    // Is search results page
    elseif ( is_search() ) {
        $type = 'SearchResultsPage';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

// Register block pattern category
function techkoningin_register_block_categories() {
	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
		register_block_pattern_category(
			'techkoningin',
			array( 'label' => _x( 'Techkoningin Blokken', 'Block pattern category', 'textdomain' ) )
		);

	}
}
add_action( 'init', 'techkoningin_register_block_categories' );

// Add block patterns
function techkoningin_register_block_patterns() {
	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
    register_block_pattern(
			'techkoningin/block-cards',
			array(
				'title'       => __( 'Block Cards', 'textdomain' ),
				'description' => _x( 'A three column block with cards, displaying an image, title, text and button.', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-cards\"} -->\n<div class=\"wp-block-group block-cards\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading -->\n<h2>Titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>lacinia magna. Curabitur vestibulum ante et sem dapibus feugiat. Cras ac dolor gravida, congue leo eu, volutpat enim. Proin ut dolor ultricies, elementum ligula id, placerat arcu. Etiam scelerisque luctus elementum.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Lees verder</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading -->\n<h2>Titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Proin volutpat pharetra lacus in rutrum. Cras augue orci, euismod nec finibus ultricies, placerat nec mauris. In semper nec diam vel blandit. Phasellus vitae risus rhoncus, porta quam non, lobortis diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Lees verder</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading -->\n<h2>Titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Proin volutpat pharetra lacus in rutrum. Cras augue orci, euismod nec finibus ultricies, placerat nec mauris. In semper nec diam vel blandit. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Lees verder</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
    );

    register_block_pattern(
			'techkoningin/block-text-image-left',
			array(
				'title'       => __( 'Block Text Image (Image displayed left)', 'textdomain' ),
				'description' => _x( 'A normal two column block with an image (displayed left).', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-text-image\"} -->\n<div class=\"wp-block-group block-text-image\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Blok titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Mauris est justo, malesuada non mauris vel, dictum blandit tortor. Quisque lobortis diam non interdum tempor. Vestibulum eu tincidunt risus. Sed porta ligula sem, eget posuere metus pharetra sed. Etiam dui tellus, mattis eget pretium ut, pellentesque quis turpis. Praesent ac massa sed nunc placerat tincidunt. Suspendisse potenti.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Button</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
    );
     
    register_block_pattern(
			'techkoningin/block-text-image-right',
			array(
				'title'       => __( 'Block Text Image (Image displayed right)', 'textdomain' ),
				'description' => _x( 'A normal two column block with an image (displayed right).', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-text-image\"} -->\n<div class=\"wp-block-group block-text-image\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Blok titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Mauris est justo, malesuada non mauris vel, dictum blandit tortor. Quisque lobortis diam non interdum tempor. Vestibulum eu tincidunt risus. Sed porta ligula sem, eget posuere metus pharetra sed. Etiam dui tellus, mattis eget pretium ut, pellentesque quis turpis. Praesent ac massa sed nunc placerat tincidunt. Suspendisse potenti.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Button</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
    );
    
		register_block_pattern(
			'techkoningin/block-text-image-full',
			array(
				'title'       => __( 'Block Text Image Full', 'textdomain' ),
				'description' => _x( 'A two column block with an image fully stretched over top, bottom and to the side of the viewport.', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-text-image-full block-text-image-full-left\"} -->\n<div class=\"wp-block-group block-text-image-full block-text-image-full-left\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Subtitel van dit blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading -->\n<h2>Titel blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in pretium urna. Nulla sagittis fringilla maximus. Aenean ornare mi vel ullamcorper finibus. Fusce erat urna, ullamcorper vel lectus id, tincidunt egestas urna. Aliquam egestas dictum lorem sit amet placerat. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">klik lees verder</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
    );
    
    register_block_pattern(
			'techkoningin/block-text-image-half',
			array(
				'title'       => __( 'Block Text Image Half (Image displayed right)', 'textdomain' ),
				'description' => _x( 'A two column block with an image that\'s partly displayed underneath the text.', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-text-image-half block-text-image-half-right\"} -->\n<div class=\"wp-block-group block-text-image-half block-text-image-half-right\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Subtitel blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading -->\n<h2>Hoofdtitel blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Mauris est justo, malesuada non mauris vel, dictum blandit tortor. Quisque lobortis diam non interdum tempor. Vestibulum eu tincidunt risus. Sed porta ligula sem, eget posuere metus pharetra sed. Etiam dui tellus, mattis eget pretium ut, pellentesque quis turpis. Praesent ac massa sed nunc placerat tincidunt. Suspendisse potenti.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Button</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
    );
     
    register_block_pattern(
			'techkoningin/block-text-image-half-alt',
			array(
				'title'       => __( 'Block Text Image Half Alternative (Image displayed right)', 'textdomain' ),
				'description' => _x( 'A two column block with an image that\'s partly displayed underneath the text. Alternative version.', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-text-image-half-alt block-text-image-half-right\"} -->\n<div class=\"wp-block-group block-text-image-half-alt block-text-image-half-right\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Subtitel blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading -->\n<h2>Hoofdtitel blok</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Mauris est justo, malesuada non mauris vel, dictum blandit tortor. Quisque lobortis diam non interdum tempor. Vestibulum eu tincidunt risus. Sed porta ligula sem, eget posuere metus pharetra sed. Etiam dui tellus, mattis eget pretium ut, pellentesque quis turpis. Praesent ac massa sed nunc placerat tincidunt. Suspendisse potenti.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"#\">Button</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'techkoningin' ),
			)
		);
		
    register_block_pattern(
			'techkoningin/block-hero',
			array(
				'title'       => __( 'Block Hero - to be used as page header', 'textdomain' ),
				'description' => _x( 'Page hero header.', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:cover {\"className\":\"block-hero\"} -->\n<div class=\"wp-block-cover has-background-dim block-hero\"><div class=\"wp-block-cover__inner-container\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Titel</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Vul dit tekstblok met jouw gewenste tekst.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:cover -->",
				'categories'  => array( 'techkoningin' ),
			)
    );
	}
}
add_action( 'init', 'techkoningin_register_block_patterns' );
