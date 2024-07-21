<?php
/**
 * The template to display the reviewers star rating in reviews
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
$rating = floatval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

$global_toggles  = delicious_recipes_get_global_toggles_and_labels();

if ( 0 < $rating && $global_toggles['enable_ratings'] ) {
	?>
    <div class="dr-star-ratings-wrapper">
        <div class="dr-star-ratings">
            <div data-rateyo-read-only="true" data-rateyo-rating="<?php echo esc_attr( $rating ) ?>" class="dr-comment-form-rating"></div>
        </div>
    </div>
    <?php
}
