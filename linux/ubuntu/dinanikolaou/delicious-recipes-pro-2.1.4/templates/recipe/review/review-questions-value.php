<?php
/**
 * The template to display the reviewers would you recommend and did you make recipe answers
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
$did_make_recipe = get_comment_meta( $comment->comment_ID, 'did_make_recipe', true );
$would_recommend_recipe = get_comment_meta( $comment->comment_ID, 'would_recommend_recipe', true );
$enable_would_you_recommend = isset( $global_settings['enableWouldYouRecommend']['0'] ) && 'yes' === $global_settings['enableWouldYouRecommend']['0'] ? true : false;
$enable_did_you_make = isset( $global_settings['enableDidYouMake']['0'] ) && 'yes' === $global_settings['enableDidYouMake']['0'] ? true : false;

?>
<div class="wpdelicious-recommend-recipe-made">
<?php
if ( $did_make_recipe == 'yes' && $enable_did_you_make ) {
    ?>
    <span class="wpdelicious-made selected">Made this recipe</span>
    <?php
}

if ( $would_recommend_recipe == 'yes' && $enable_would_you_recommend ) {
    ?>
    <span class="wpdelicious-recommend selected">Recommends this recipe</span>
    <?php
}
?>
</div>
<?php
