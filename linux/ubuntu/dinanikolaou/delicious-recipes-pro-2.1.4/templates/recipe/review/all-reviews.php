<?php
/**
 * All Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container dr-comment">

		<?php
		/**
		 * The delicious_recipes_review_before hook
		 *
		 * @hooked display_review_gravatar - 10
		 */
		do_action( 'delicious_recipes_review_before', $comment );
		?>

		<div class="comment-text dr-comment-details">

			<?php
			/**
			 * The delicious_recipes_review_before_comment_meta hook.
			 *
			 * @hooked display_review_title - 10
			 */
			do_action( 'delicious_recipes_review_before_comment_meta', $comment );

			/**
			 * The delicious_recipes_review_meta hook.
			 *
			 * @hooked display_review_rating - 10
			 */
			do_action( 'delicious_recipes_review_meta', $comment );

			/**
			 * The delicious_recipes_review_before_comment_text hook.
			 *
			 * @hooked display_review_meta - 10
			 */
			do_action( 'delicious_recipes_review_before_comment_text', $comment );

			/**
			 * The delicious_review_questions_value hook
			 *
			 * @hooked display_review_questions_value - 20
			 */
			do_action( 'delicious_review_questions_value', $comment );

			/**
			 * The delicious_recipes_review_comment_text hook
			 *
			 * @hooked display_review_comment_text - 10
			 */
			do_action( 'delicious_recipes_review_comment_text', $comment );

			/**
			 * The delicious_recipes_review_review_gallery hook.
			 *
			 * @hooked display_review_gallery - 10
			 */
			do_action( 'delicious_recipes_review_review_gallery', $comment );

			/**
			 * The delicious_recipe_tags hook
			 *
			 * @hooked display_recipe_tags - 20
			 */
			do_action( 'delicious_recipe_tags', $comment );

			/**
			 * The delicious_recipes_review_after_comment_text hook.
			 *
			 * @hooked display_review_reply_link - 10
			 */
			do_action( 'delicious_recipes_review_after_comment_text', $comment, $args, $depth );
			?>

		</div>
	</div>
</li>
