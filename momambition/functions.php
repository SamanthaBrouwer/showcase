<?php

function techkoningin_base_child_scripts() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_script( 'navbar', get_stylesheet_directory_uri() . '/js/navbar.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'techkoningin_base_child_scripts', 11);

register_nav_menus( array(
  'header-social' => esc_html__( 'Header Social', 'techkoningin-child' ),
  'footer-social' => esc_html__( 'Footer Social', 'techkoningin-child' ),
) );

function techkoningin_base_child_widgets_init() {
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar Blog', 'techkoningin-child' ),
      'id'            => 'sidebar-blog',
      'description'   => esc_html__( 'Add widgets here.', 'techkoningin-child' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
      'name'          => esc_html__( 'Blog pagina\'s: Nieuwsbrief', 'techkoningin-child' ),
      'id'            => 'blog-newsletter',
      'description'   => esc_html__( 'Add newsletter widget here.', 'techkoningin-child' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
      'name'          => esc_html__( 'Blog pagina\'s: Categorieën', 'techkoningin-child' ),
      'id'            => 'blog-categories',
      'description'   => esc_html__( 'Add category widget here.', 'techkoningin-child' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'techkoningin_base_child_widgets_init' );

// Remove predefined gradients
function tk_disable_gutenberg_gradient_presets() {
	add_theme_support( 'editor-gradient-presets', [] );
}
add_action( 'after_setup_theme', 'tk_disable_gutenberg_gradient_presets' );

// Then add our own gradients
function tk_add_custom_gutenberg_gradient_presets() {
	add_theme_support(
		'editor-gradient-presets',
		[
			[
				'name' => esc_html__( 'Primary to Light', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-primary-color) 35%, var(--ccp-light-gray-color) 35.3%)',
				'slug' => 'primary-to-light'
			],
      [
				'name' => esc_html__( 'Primary to Light (centered)', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-primary-color) 50%, var(--ccp-light-gray-color) 50.1%)',
				'slug' => 'primary-to-light-centered'
			],
      [
				'name' => esc_html__( 'Secondary to Light', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-secondary-color) 25%, var(--ccp-light-gray-color) 25.3%)',
				'slug' => 'secondary-to-light'
			],
			[
				'name' => esc_html__( 'Secondary to Light (centered)', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-secondary-color) 50%, var(--ccp-light-gray-color) 50.1%)',
				'slug' => 'secondary-to-light-centered'
			],
      [
				'name' => esc_html__( 'Light to Primary', 'tk'),
				'gradient' => 'linear-gradient(176.5deg, var(--ccp-light-gray-color) 25%, var(--ccp-primary-color) 25.3%)',
				'slug' => 'light-to-primary'
			],
      [
				'name' => esc_html__( 'Primary to Light (recht)', 'tk'),
				'gradient' => 'linear-gradient(180deg, var(--ccp-primary-color) 80%, var(--ccp-light-gray-color) 80%)',
				'slug' => 'primary-to-light-straight'
			],
      [
				'name' => esc_html__( 'Secondary to Light (recht)', 'tk'),
				'gradient' => 'linear-gradient(180deg, var(--ccp-secondary-color) 80%, var(--ccp-light-gray-color) 80%)',
				'slug' => 'secondary-to-light-straight'
			]
		]
	);
}
add_action( 'after_setup_theme', 'tk_add_custom_gutenberg_gradient_presets' );

// Add our own gutenberg stylesheet
function tk_gutenberg_css(){
  
  add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
	add_editor_style( 'style-editor.css' ); // tries to include style-editor.css directly from your theme folder
  
}
add_action( 'after_setup_theme', 'tk_gutenberg_css' );

add_action( 'enqueue_block_editor_assets', function() {
  wp_enqueue_style( 'style-editor', get_stylesheet_directory_uri() . "/style-editor.css", false, '1.0', 'all' );
} );

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

register_block_style(
  'core/image', [
    'name'         => 'ma-image-single-primary',
    'label'        => 'Momambition Single Image (Primary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/image', [
    'name'         => 'ma-image-single-secondary',
    'label'        => 'Momambition Single Image (Secondary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/image', [
    'name'         => 'ma-image-single-light',
    'label'        => 'Momambition Single Image (Light)',
    'style_handle' => 'style-editor',
  ]
);

// Gallery
register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-right-primary',
    'label'        => 'Momambition Multiple Images Right (Primary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-right-secondary',
    'label'        => 'Momambition Multiple Images Right (Secondary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-right-light',
    'label'        => 'Momambition Multiple Images Right (Light)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-left-primary',
    'label'        => 'Momambition Multiple Images Left (Primary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-left-secondary',
    'label'        => 'Momambition Multiple Images Left (Secondary)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/gallery', [
    'name'         => 'ma-image-multiple-left-light',
    'label'        => 'Momambition Multiple Images Left (Light)',
    'style_handle' => 'style-editor',
  ]
);

// Headings
register_block_style(
  'core/heading', [
    'name'         => 'ma-heading-bon-vivant',
    'label'        => 'Heading Bon Vivant',
    'style_handle' => 'style-editor',
  ]
);

// Groups
register_block_style(
  'core/group', [
    'name'         => 'ma-group-panther',
    'label'        => 'Momambition Panter Print',
    'style_handle' => 'style-editor',
  ]
);