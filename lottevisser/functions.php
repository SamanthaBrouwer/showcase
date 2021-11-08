<?php

function techkoningin_base_child_scripts() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_script( 'mobile-menu', get_stylesheet_directory_uri() . '/js/mobile-menu.js' );
}
add_action( 'wp_enqueue_scripts', 'techkoningin_base_child_scripts', 11);

// Add our own gutenberg stylesheet
function tk_gutenberg_css() {
  
  add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
  
}
add_action( 'after_setup_theme', 'tk_gutenberg_css' );

add_action( 'enqueue_block_editor_assets', function() {
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
  'core/heading', [
    'name'         => 'heading-simplicity',
    'label'        => 'Simplicity (geen achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-salmon',
    'label'        => 'Simplicity (zalm achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-light-blue',
    'label'        => 'Simplicity (lichtblauwe achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-soft-green',
    'label'        => 'Simplicity (zachtgroene achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-pink',
    'label'        => 'Simplicity (roze achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-blue',
    'label'        => 'Simplicity (blauwe achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-green',
    'label'        => 'Simplicity (groene achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

register_block_style(
  'core/heading', [
    'name'         => 'heading-simplicity-orange',
    'label'        => 'Simplicity (oranje achtergrond)',
    'style_handle' => 'style-editor',
  ]
);

// Add block patterns
function techkoningin_child_register_block_patterns() {
	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
    register_block_pattern(
			'lottevisser/block-page',
			array(
				'title'       => __( 'Standaard indeling pagina', 'textdomain' ),
				'description' => _x( 'Standaard indeling pagina', 'Block pattern description', 'textdomain' ),
				'content'     => "<!-- wp:group {\"className\":\"block-lv-page\"} -->\n<div class=\"wp-block-group block-lv-page\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover -->\n<div class=\"wp-block-cover has-background-dim\"><div class=\"wp-block-cover__inner-container\"></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:heading {\"className\":\"is-style-heading-simplicity\"} -->\n<h2 class=\"is-style-heading-simplicity\">In de natuur<br>schuilt een oerkracht,<br>die wij als mens zijn<br>kwijt geraakt</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p><em>In de natuur schuilt een oerkracht die wij als mensen kwijt zijn geraakt. Het vermogen om stil te staan, om even met je beide voeten in de grond te staan en je te realiseren dat je daar gewoon mag staan. Want 'zijn' is al genoeg.</em></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Diezelfde oerkracht schuilt in theater. Theater bezit de kracht om het publiek een spiegel voor te houden. Het zorgt ervoor dat een groep mensen voor even met niets anders bezig is dan met wat er op het podium gebeurt en met de collectieve ervaring. Die collectieve ervaring van niet te gaan, niet op weg te zijn, maar even stil te zitten en iets met volledige aandacht te beleven.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"is-style-heading-simplicity-salmon\"} -->\n<h2 class=\"has-text-align-center is-style-heading-simplicity-salmon\">maar even<br>stil zitten</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"is-style-heading-simplicity-light-blue\"} -->\n<h2 class=\"has-text-align-center is-style-heading-simplicity-light-blue\">KWETSBAAR</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'categories'  => array( 'lottevisser' ),
			)
    );
	}
}
add_action( 'init', 'techkoningin_child_register_block_patterns' );
