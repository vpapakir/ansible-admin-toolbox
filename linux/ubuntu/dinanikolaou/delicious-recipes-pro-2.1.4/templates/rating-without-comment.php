<?php
/**
 * Template part for rating without comment.
 *
 * Use action hook: delicious_recipes_after_notes
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$global_settings = delicious_recipes_get_global_settings();
$ratings_lbl     = isset( $global_settings['ratingLabel'] ) && '' !== $global_settings['ratingLabel'] ? $global_settings['ratingLabel'] : __( 'Rate this recipe', 'delicious-recipes-pro' );
?>

<div
	id="rating-without-comment"
	class="rating-without-comment" 
	data-post-id="<?php the_ID(); ?>"
	data-nonce="<?php echo esc_attr( wp_create_nonce( 'delicious-recipes-rating-without-review' ) ); ?>"
	data-label="<?php echo esc_attr( $ratings_lbl ); ?>">
	<label class="rating-without-comment-label"><?php echo esc_html( $ratings_lbl ); ?>: </label>
	<div class="rating-buttons-set"></div>
	<div class="rating-message-box"></div>
</div>
<?php
