<?php
/**
 * Recipe floating bar template.
 *
 * @package Delicious_Recipes_Pro
 */

defined( 'ABSPATH' ) || exit;

$global_settings      = delicious_recipes_get_global_settings();
// echo '<pre>';
// print_r($global_settings);
// echo '</pre>';
// die;
$enable_ratings       = isset( $global_settings['enableRatings']['0'] ) && 'yes' === $global_settings['enableRatings']['0'] ? true : false;
$ratings_lbl          = isset( $global_settings['ratingLabel'] ) && '' !== $global_settings['ratingLabel'] ? $global_settings['ratingLabel'] : __( 'Rate this recipe', 'delicious-recipes-pro' );
$enable_review_images = isset( $global_settings['enableReviewImages']['0'] ) && 'yes' === $global_settings['enableReviewImages']['0'] ? true : false;

$enable_review_tags = isset( $global_settings['enableReviewTags']['0'] ) && 'yes' === $global_settings['enableReviewTags']['0'] ? true : false;
if ( $enable_review_tags ) {
	$review_tags = get_option( 'delicious_recipes_review_tags' );
}

$enable_would_you_recommend = isset( $global_settings['enableWouldYouRecommend']['0'] ) && 'yes' === $global_settings['enableWouldYouRecommend']['0'] ? true : false;
$would_you_recommend_label  = isset( $global_settings['wouldYouRecommendLabel'] ) && '' !== $global_settings['wouldYouRecommendLabel'] ? $global_settings['wouldYouRecommendLabel'] : __( 'Would you recommend this recipe?', 'delicious-recipes-pro' );

$enable_did_you_make = isset( $global_settings['enableDidYouMake']['0'] ) && 'yes' === $global_settings['enableDidYouMake']['0'] ? true : false;
$did_you_make_label  = isset( $global_settings['didYouMakeLabel'] ) && '' !== $global_settings['didYouMakeLabel'] ? $global_settings['didYouMakeLabel'] : __( 'Did you make this recipe?', 'delicious-recipes-pro' );

$enableRecaptchaForComments = isset( $global_settings['enableRecaptchaForComments']['0'] ) && 'yes' === $global_settings['enableRecaptchaForComments']['0'] ? true : false;
$recaptchaVersion = $global_settings['recpatchaVersion'];

$rating_fields = '<div class="comment-form-rating"><label for="rating">' . esc_html( $ratings_lbl ) . '</label>
<fieldset id="dr-comment-rating-field" class="dr-comment-rating">
    <div class="dr-comment-form-rating"></div>
    <input type="hidden" required="required" name="rating" value="0" >
</fieldset>
<div class="rating-value-word"></div>
</div>';

$commenter    = wp_get_current_commenter();
$comment_form = array(
	/* translators: %s is recipe title */
	'title_reply'         => esc_html__( 'Rate this recipe', 'delicious-recipes-pro' ),
	/* translators: %s is recipe title */
	'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'delicious-recipes-pro' ),
	'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
	'title_reply_after'   => '</span>',
	'comment_notes_after' => '',
	'label_submit'        => esc_html__( 'Submit Review', 'delicious-recipes-pro' ),
	'logged_in_as'        => '',
	'comment_field'       => '',
);

$name_email_required = (bool) get_option( 'require_name_email', 1 );
$fields              = array(
	'author' => array(
		'label'       => __( 'Your Name', 'delicious-recipes-pro' ),
		'type'        => 'text',
		'value'       => $commenter['comment_author'],
		'required'    => $name_email_required,
		'placeholder' => __( 'Name', 'delicious-recipes-pro' ),
	),
	'email'  => array(
		'label'       => __( 'Your Email', 'delicious-recipes-pro' ),
		'type'        => 'email',
		'value'       => $commenter['comment_author_email'],
		'required'    => $name_email_required,
		'placeholder' => __( 'Email', 'delicious-recipes-pro' ),
	),
);

$comment_form['fields'] = array();

foreach ( $fields as $key => $field ) {
	$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
	$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

	if ( $field['required'] ) {
		$field_html .= '&nbsp;<span class="required">*</span>';
	}

	$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' placeholder="' . esc_attr( $field['placeholder'] ) . '" /></p>';

	$comment_form['fields'][ $key ] = $field_html;
}

if ( $enable_ratings ) {
	$comment_form['comment_field'] = $rating_fields;
}

if ( $enable_review_tags && ! empty( $review_tags ) ) {
	$review_tags_display = '';
	foreach ( $review_tags as $tags ) {
		$review_tags_display .= '<a data-tag="' . $tags . '">' . $tags . '</a>';
	}
}

$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your Reviews', 'delicious-recipes-pro' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required placeholder="' . esc_html__( 'Write your review', 'delicious-recipes-pro' ) . '"></textarea></p>';

// Insert custom suggestions before the comment field.
if ( $enable_review_tags && ! empty( $review_tags ) ) {
	$custom_suggestions = '
		<div class="dr-tags" id="select-menu">
			<span class="dr-meta-title">Add tags for review:</span>
			<span id="tags">
			' . $review_tags_display . '
			</span>';
	if ( count( $review_tags ) > 6 ) {
		$custom_suggestions .= '<a class="show-more" id="dr-show-more">Show More</a>';
	}
	$custom_suggestions            .= '
			<input type="hidden" id="recipe-tags" name="recipe-tags" value="">
		</div>
		';
	$comment_form['comment_field'] .= $custom_suggestions;
}

if ( $enable_did_you_make ) {
	$comment_form['comment_field'] .= '<div class="did-you-make-recipe yes-no-switch" >
		<label>' . esc_html( $did_you_make_label ) . '</label>
		<input type="hidden" id="did-make-recipe" name="did-make-recipe" value="">
		<div class="yes-no-buttons">
			<button class="yes-btn" type="button" id="did-make-recipe-yes" name="did-make-recipe">' . esc_html__( 'Yes', 'delicious-recipes-pro' ) . '</button>
			<button class="no-btn" type="button" id="did-make-recipe-no" name="did-make-recipe">' . esc_html__( 'No', 'delicious-recipes-pro' ) . '</button>
		</div>
	</div>';
}

if ( $enable_review_images ) {
	$comment_form['comment_field'] .= '<div class="dr-form-field" style="display: none"><label for="rating">' . esc_html__( 'Upload Your Images', 'delicious-recipes-pro' ) . '</label>
    <div id="uploadFiles" class="dr-input-wrap dr-review-img-holder dropzone">
        <input type="hidden" name="review_images[]" value="">
        <input type="hidden" name="review_images_nonce" value="' . wp_create_nonce( 'delicious-recipes-review-images-nonce' ) . '">
    </div></div>';
}

if ( $enable_would_you_recommend ) {
	$comment_form['comment_field'] .= '<div class="would-you-recommend-recipe yes-no-switch">
	<label>' . esc_html( $would_you_recommend_label ) . '</label>
	<input type="hidden" id="would-recommend-recipe" name="would-recommend-recipe" value="">
    <div class="yes-no-buttons">
		<button class="yes-btn" type="button" id="would-recommend-recipe-yes" name="would-recommend-recipe">' . esc_html__( 'Yes', 'delicious-recipes-pro' ) . '</button>
		<button class="no-btn" type="button" id="would-recommend-recipe-no" name="would-recommend-recipe">' . esc_html__( 'No', 'delicious-recipes-pro' ) . '</button>
	</div>
</div>';
}

if ( $enableRecaptchaForComments && $recaptchaVersion === 'v2' ) {
	$comment_form['comment_field'] .= '<div class="g-recaptcha" data-sitekey="' . esc_attr( $global_settings['recaptchaSiteKey'] ) . '" data-widget-id="recaptcha-review"></div>';
}

comment_form( apply_filters( 'delicious_recipes_review_comment_form_args', $comment_form ) );
