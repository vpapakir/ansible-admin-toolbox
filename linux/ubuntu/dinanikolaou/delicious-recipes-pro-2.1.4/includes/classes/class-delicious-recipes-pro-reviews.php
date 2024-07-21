<?php

/**
 * Analytics Dashboard.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Analytics Dashboard page to display important plugin links and changelogs.
 */
class Delicious_Recipes_Pro_Reviews {



	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'add_reviews_menu' ), 20 );

		// Preprocess rating and set comment type.
		add_filter( 'preprocess_comment', array( $this, 'preprocess_comment' ), 0 );
		// Save ratings and review images.
		add_action( 'comment_post', array( $this, 'save_comment' ) );
		// Support avatars for `question` comment type.
		add_filter( 'get_avatar_comment_types', array( $this, 'add_avatar_for_question_comment_type' ) );

		add_action( 'add_meta_boxes_comment', array( $this, 'extend_comment_add_meta_box' ) );
		add_action( 'edit_comment', array( $this, 'extend_comment_edit_metafields' ) );
	}

	/**
	 * Add menu for Analytics Dashboard
	 */
	public function add_reviews_menu() {
		add_submenu_page(
			'delicious-recipes',
			__( 'Reviews', 'delicious-recipes-pro' ),
			__( 'Reviews', 'delicious-recipes-pro' ),
			'manage_options',
			'delicious_recipes_reviews',
			array( $this, 'display_reviews_menu_page' ),
			10
		);
	}

	/**
	 * Callback page.
	 *
	 * @return void
	 */
	public function display_reviews_menu_page() {
		echo '<div id="dr_recipe_reviews"></div>';
	}

	/**
	 * Validate the comment ratings.
	 *
	 * @param  array $comment_data Comment data.
	 * @return array
	 */
	public static function preprocess_comment( $comment_data ) {

		// If posting a comment (not trackback etc) and not logged in.
		if ( ! is_admin() && isset( $_POST['comment_post_ID'], $_POST['rating'], $comment_data['comment_type'] ) && DELICIOUS_RECIPE_POST_TYPE === get_post_type( absint( $_POST['comment_post_ID'] ) ) && empty( $_POST['rating'] ) ) { // WPCS: input var ok, CSRF ok.
			wp_die( esc_html__( 'Please rate the recipe.', 'delicious-recipes-pro' ) );
			exit;
		}

		// Update comment type.
		if ( ! is_admin() && isset( $_POST['comment_post_ID'], $_POST['comment_type'] ) && DELICIOUS_RECIPE_POST_TYPE === get_post_type( absint( $_POST['comment_post_ID'] ) ) ) { // WPCS: input var ok, CSRF ok.
			$comment_data['comment_type'] = 'question';
		}
		return $comment_data;
	}

	/**
	 * Save comment form.
	 *
	 * @return void
	 */
	public function save_comment( $comment_id ) {

		if ( isset( $_POST['rating'], $_POST['comment_post_ID'] ) && DELICIOUS_RECIPE_POST_TYPE === get_post_type( absint( $_POST['comment_post_ID'] ) ) ) { // WPCS: input var ok, CSRF ok.
			// wp_set_comment_status( $comment_id, 'hold' );

			if ( ! $_POST['rating'] || $_POST['rating'] > 5 || $_POST['rating'] < 0 ) { // WPCS: input var ok, CSRF ok, sanitization ok.
				return;
			}
			if ( empty( $_POST['comment_parent'] ) ) {
				add_comment_meta( $comment_id, 'rating', floatval( $_POST['rating'] ), true ); // WPCS: input var ok, CSRF ok.
			}

			if ( isset( $_POST['review_images'] ) && ! is_object( $_POST['review_images'] ) && ! empty( $_POST['review_images'] ) ) { // WPCS: input var ok, CSRF ok, sanitization ok.
				$attach_id_array = json_decode( $_POST['review_images'][0], true );
				add_comment_meta( $comment_id, 'gallery_images', $attach_id_array );
			}

			if ( isset( $_POST['did-make-recipe'] ) ) {
				$did_make_recipe = sanitize_text_field( $_POST['did-make-recipe'] );
				add_comment_meta( $comment_id, 'did_make_recipe', $did_make_recipe );
			}

			if ( isset( $_POST['would-recommend-recipe'] ) ) {
				$would_recommend_recipe = sanitize_text_field( $_POST['would-recommend-recipe'] );
				add_comment_meta( $comment_id, 'would_recommend_recipe', $would_recommend_recipe );
			}

			if ( isset( $_POST['recipe-tags'] ) ) {
				$recipe_tags_array     = $_POST['recipe-tags'];
				$recipe_tags_sanitized = sanitize_text_field( $recipe_tags_array );
				add_comment_meta( $comment_id, 'recipe_tags', $recipe_tags_sanitized );
			}
		}
	}

	/**
	 * Make sure WP displays avatars for comments with the `question` type.
	 *
	 * @since  1.0
	 * @param  array $comment_types Comment types.
	 * @return array
	 */
	public static function add_avatar_for_question_comment_type( $comment_types ) {
		return array_merge( $comment_types, array( 'question' ) );
	}

	// Add an edit option in comment edit screen
	public function extend_comment_add_meta_box( $comment ) {
		$global_settings = delicious_recipes_get_global_settings();
		$enable_ratings  = isset( $global_settings['enableRatings']['0'] ) && 'yes' === $global_settings['enableRatings']['0'] ? true : false;

		if ( get_post_type( $comment->comment_post_ID ) == DELICIOUS_RECIPE_POST_TYPE && 'comment' === $comment->comment_type && $enable_ratings ) {
			add_meta_box( 'title', __( 'Reviews - WP Delicious', 'delicious-recipes-pro' ), array( $this, 'extend_comment_meta_box' ), 'comment', 'normal', 'high' );
		}
	}

	public function extend_comment_meta_box( $comment ) {
		$global_settings      = delicious_recipes_get_global_settings();
		$enable_ratings       = isset( $global_settings['enableRatings']['0'] ) && 'yes' === $global_settings['enableRatings']['0'] ? true : false;
		$enable_review_images = isset( $global_settings['enableReviewImages']['0'] ) && 'yes' === $global_settings['enableReviewImages']['0'] ? true : false;

		$rating         = get_comment_meta( $comment->comment_ID, 'rating', true );
		$gallery_images = get_comment_meta( $comment->comment_ID, 'gallery_images', true );
		wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
		if ( $enable_ratings ) {
			?>
			<div class="dr-rating-fields-container">
				<label><?php esc_html_e( 'Rating', 'delicious-recipes-pro' ); ?></label>
				<span>
					<fieldset id="dr-comment-rating-field" class="dr-comment-rating">
						<div data-rateyo-rating="<?php echo esc_attr( $rating ); ?>" class="dr-comment-form-rating"></div>
						<input type="hidden" required="required" name="rating" value="<?php echo esc_attr( $rating ); ?>">
					</fieldset>
				</span>
			</div>
			<hr>
			<?php
		}

		if ( $enable_review_images && ! empty( $gallery_images ) ) {
			?>
			<div class="dr-upload-review-image-container">
				<label><?php esc_html_e( 'Gallery Images', 'delicious-recipes-pro' ); ?></label>
				<span>
					<fieldset>
						<button type="button" class='dr-review-add-images button button-secondary' data-uploader-title='<?php esc_html_e( 'Add image to gallery', 'delicious-recipes-pro' ); ?>' data-uploader-button-text='<?php esc_html_e( 'Add Image(s)', 'delicious-recipes-pro' ); ?>'>
							<?php esc_html_e( 'Add Image(s)', 'delicious-recipes-pro' ); ?>
						</button>
						<ul class="dr-recipe-review-gallery">
							<?php
							foreach ( $gallery_images as $key => $val ) {
								$image = wp_get_attachment_image_src( $val );
								?>
								<li>
									<input type="hidden" class="recipe-gallery" name="gallery_images[]" value="<?php echo esc_attr( intval( $val ) ); ?> ">
									<img class="dr-image-preview" src="<?php echo esc_url( $image[0] ); ?>">
									<div class="dr-gal-btns">
										<button type="button" class="dr-change" data-uploader-title="<?php esc_html_e( 'Change Image', 'delicious-recipes-pro' ); ?>" data-uploader-button-text="<?php esc_html_e( 'Change image', 'delicious-recipes-pro' ); ?>" title="<?php esc_html_e( 'Change Image', 'delicious-recipes-pro' ); ?>">
											<?php esc_html_e( 'Replace', 'delicious-recipes-pro' ); ?>
										</button>
										<button type="button" class="dr-delete">
											<?php esc_html_e( 'Delete', 'delicious-recipes-pro' ); ?>
										</button>
									</div>
								</li>
								<?php
							}
							?>
						</ul>
					</fieldset>
				</span>
			</div>
			<?php
		}
	}

	// Update comment meta data from comment edit screen
	public function extend_comment_edit_metafields( $comment_id ) {
		$comment = get_comment( $comment_id );
		if ( get_post_type( $comment->comment_post_ID ) == DELICIOUS_RECIPE_POST_TYPE ) {
			if ( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) {
				return;
			}

			if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '' ) ) :
				$rating = wp_filter_nohtml_kses( $_POST['rating'] );
				update_comment_meta( $comment_id, 'rating', $rating );
			else :
				delete_comment_meta( $comment_id, 'rating' );
			endif;

			if ( ( isset( $_POST['gallery_images'] ) ) && ( $_POST['gallery_images'] != '' ) ) :
				$gallery_images = array_map( 'sanitize_text_field', wp_unslash( $_POST['gallery_images'] ) );
				update_comment_meta( $comment_id, 'gallery_images', $gallery_images );
			else :
				delete_comment_meta( $comment_id, 'gallery_images' );
			endif;

			$status = wp_get_comment_status( $comment_id );
			if ( 'approved' === $status ) {
				wp_set_comment_status( $comment_id, 'approved' );
			} else {
				wp_set_comment_status( $comment_id, 'hold' );
			}
		}
	}
}
new Delicious_Recipes_Pro_Reviews();
