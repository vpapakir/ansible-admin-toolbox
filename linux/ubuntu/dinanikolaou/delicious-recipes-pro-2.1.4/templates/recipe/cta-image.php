<?php
/**
 * Recipe CTA Image template.
 *
 * @package Delicious_Recipes_Pro
 */

$global_settings            = delicious_recipes_get_global_settings();
$global_cta_image           = isset( $global_settings['globalCTAImage'] ) && $global_settings['globalCTAImage'] ? $global_settings['globalCTAImage'] : '';
$global_cta_link            = isset( $global_settings['globalCTALink'] ) && $global_settings['globalCTALink'] ? $global_settings['globalCTALink'] : '';
$global_cta_open_in_new_tab = isset( $global_settings['globalCTAOpenInNewTab'] ) && array( 'yes' ) === $global_settings['globalCTAOpenInNewTab'] ? true : false;
$global_cta_attributes      = isset( $global_settings['globalCTAAttributes'] ) && $global_settings['globalCTAAttributes'] ? $global_settings['globalCTAAttributes'] : '';

$recipe_meta                = get_post_meta( get_the_ID(), 'delicious_recipes_metadata', true );
$recipe_cta_image           = isset( $recipe_meta['recipeCTAImage'] ) && $recipe_meta['recipeCTAImage'] ? $recipe_meta['recipeCTAImage'] : $global_cta_image;
$recipe_cta_link            = isset( $recipe_meta['recipeCTALink'] ) && $recipe_meta['recipeCTALink'] ? $recipe_meta['recipeCTALink'] : $global_cta_link;
$recipe_cta_open_in_new_tab = isset( $recipe_meta['recipeCTAOpenInNewTab'] ) && array( 'yes' ) === $recipe_meta['recipeCTAOpenInNewTab'] ? true : $global_cta_open_in_new_tab;
$recipe_cta_attributes      = isset( $recipe_meta['recipeCTAAttributes'] ) && $recipe_meta['recipeCTAAttributes'] ? $recipe_meta['recipeCTAAttributes'] : $global_cta_attributes;
$download                   = false;
if ( is_array( $global_cta_attributes ) && in_array( 'download', $recipe_cta_attributes, true ) ) {
	$download = true;
}
$override_global_cta = isset( $recipe_meta['overrideGlobalCTA'] ) && array( 'yes' ) === $recipe_meta['overrideGlobalCTA'] ? true : false;

if ( ! function_exists( 'generate_attributes_string' ) ) {
	/**
	 * Generate attributes string.
	 *
	 * @param array $attributes Attributes array.
	 * @return string
	 */
	function generate_attributes_string( $attributes ) {
		$attr_string = '';
		foreach ( $attributes as $key => $value ) {
			$attr_string .= esc_attr( $value ) . ' ';
		}
		return trim( $attr_string );
	}
}

if ( $override_global_cta && ! empty( $recipe_cta_image['imageLink'] ) ) {
	$cta_attributes = generate_attributes_string( $recipe_cta_attributes );
	$cta_image      = sprintf(
		'<a href="%1$s" target="%2$s" rel="%3$s" %6$s><img src="%4$s" alt="%5$s"></a>',
		esc_url( $recipe_cta_link ),
		$recipe_cta_open_in_new_tab ? '_blank' : '_self',
		$cta_attributes,
		esc_url( $recipe_cta_image['imageLink'] ),
		esc_attr( $recipe_cta_image['imageAlt'], 'delicious-recipes-pro' ),
		$download ? 'download' : ''
	);
} elseif ( ! empty( $global_cta_image['imageLink'] ) ) {
	$cta_attributes = generate_attributes_string( $global_cta_attributes );
	$cta_image      = sprintf(
		'<a href="%1$s" target="%2$s" rel="%3$s" %6$s><img src="%4$s" alt="%5$s"></a>',
		esc_url( $global_cta_link ),
		$global_cta_open_in_new_tab ? '_blank' : '_self',
		$cta_attributes,
		esc_url( $global_cta_image['imageLink'] ),
		esc_attr( $global_cta_image['imageAlt'], 'delicious-recipes-pro' ),
		$download ? 'download' : ''
	);
}

if ( isset( $cta_image ) && '' !== $cta_image ) {
	?>
		<div>
			<?php echo wp_kses_post( $cta_image ); ?>
		</div>
	<?php
}
