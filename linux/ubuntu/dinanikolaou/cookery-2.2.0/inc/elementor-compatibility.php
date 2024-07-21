<?php 
/**
 * Elementor activation
 */

function cookery_elementor_support(){
	update_option( 'elementor_cpt_support', array( 'blossom-portfolio', 'post','page', 'recipe' ) );
	update_option( 'elementor_default_generic_fonts', 'Noto Serif' );
}
add_action( 'after_switch_theme', 'cookery_elementor_support' );

/**
 * Filter to alter Default Font and Default Color
 */
function cookery_elementor_defaults( $config ) {

	$primary_font    = get_theme_mod( 'primary_font', 'Questrial' );
	$secondary_font  = get_theme_mod( 'secondary_font', 'Noto Serif' );
	$primary_color   = get_theme_mod( 'primary_color', '#2db68d' ); 
	$secondary_color = get_theme_mod( 'secondary_color', '#e84e3b' ); 

	$config['default_schemes']['color']['items'] = [
		'1' => $primary_color,
		'2' => $secondary_color,
		'3' => '#171717',
		'4' => $primary_color
	];

	$config['default_schemes']['typography']['items'] = [
		'1' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'2' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'3' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'4' => array(
			'font_family' => $secondary_font,
	        'font_weight' => '600',
		)];

	$config['i18n']['global_colors'] = __( 'Cookery Color', 'cookery' );
	$config['i18n']['global_fonts']  = __( 'Cookery Fonts', 'cookery' );

	return $config;
}
add_filter('elementor/editor/localize_settings', 'cookery_elementor_defaults', 99 );