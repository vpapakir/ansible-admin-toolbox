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
$gallery_images = get_comment_meta( $comment->comment_ID, 'gallery_images', true );

$global_settings      = delicious_recipes_get_global_settings();
$enable_review_images = isset( $global_settings['enableReviewImages']['0'] ) && 'yes' === $global_settings['enableReviewImages']['0'] ? true : false;

if ( isset( $gallery_images ) && ! is_object( $gallery_images ) && ! empty( $gallery_images ) && $enable_review_images ) {
	?>
    <div class="dr-comment-images">
        <?php
        foreach ( $gallery_images as $key => $id ) {
            $image_thumbnail = wp_get_attachment_image( $id, 'thumbnail' );
            $image_full = wp_get_attachment_image_url( $id, 'full' );
            if ( ! empty( $image_thumbnail ) ) {
                ?>
                <a href="<?php echo $image_full; ?>">
                    <?php echo $image_thumbnail; ?>
                </a>
                <?php
            }
        }
        ?>
    </div>
    <?php
}
