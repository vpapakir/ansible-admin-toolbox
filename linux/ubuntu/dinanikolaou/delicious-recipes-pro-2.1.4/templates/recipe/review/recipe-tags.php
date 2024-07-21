<?php
/**
 * The template to display the reviewers selected recipe tags
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/review-rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $comment;
$global_settings  = delicious_recipes_get_global_settings();
$recipe_tags_string = get_comment_meta( $comment->comment_ID, 'recipe_tags', true );
$enable_review_tags = isset( $global_settings['enableReviewTags']['0'] ) && 'yes' === $global_settings['enableReviewTags']['0'] ? true : false;


if ( $recipe_tags_string && $enable_review_tags) {
	$recipe_tags = explode( ',', $recipe_tags_string );
	?>
	<div class="dr-tags">
		<?php foreach ( $recipe_tags as $tag ) : ?>
			<span class="dr-tag"><?php echo esc_html( $tag ); ?></span>
		<?php endforeach; ?>
	</div>
	<?php
}
