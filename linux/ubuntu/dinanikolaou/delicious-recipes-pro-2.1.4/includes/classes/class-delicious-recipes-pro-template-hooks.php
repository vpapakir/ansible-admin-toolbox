<?php
/**
 * Frontend Template Hooks
 *
 * @package Delicious_Recipes_Pro
 */
class Delicious_Recipes_Pro_Template_Hooks {

	private static $_instance = null;

	private function __construct() {
		$this->init_hooks();

	}

	public static function get_instance() {
		if ( null === self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Initialization hooks.
	 *
	 * @return void
	 */
	private function init_hooks() {

		// Single recipe page hooks.
		$this->init_single_recipe_hooks();

	}

	/**
	 * Recipe single page template hooks.
	 *
	 * @return void
	 */
	private function init_single_recipe_hooks() {
		// Recipe Main Card hooks.
		add_action( 'delicious_recipes_after_instructions', array( $this, 'recipe_main_equipments' ), 10 );

		/**
		 * Reviews
		 *
		 * @see display_review_gravatar()
		 * @see display_review_title()
		 * @see display_review_rating()
		 * @see display_review_meta()
		 * @see display_review_comment_text()
		 * @see display_review_gallery()
		 * @see display_review_reply_link()
		 */
		add_filter( 'comments_template', array( $this, 'comments_template_loader' ) );
		add_action( 'delicious_recipes_review_before', array( $this, 'display_review_gravatar' ), 10 );
		add_action( 'delicious_recipes_review_before_comment_meta', array( $this, 'display_review_title' ), 10 );
		add_action( 'delicious_recipes_review_meta', array( $this, 'display_review_rating' ), 10 );
		add_action( 'delicious_recipes_review_before_comment_text', array( $this, 'display_review_meta' ), 10 );
		add_action( 'delicious_recipes_review_comment_text', array( $this, 'display_review_comment_text' ), 10 );
		add_action( 'delicious_recipes_review_review_gallery', array( $this, 'display_review_gallery' ), 10 );
		add_action( 'delicious_recipes_review_after_comment_text', array( $this, 'display_review_reply_link' ), 10, 3 );
		add_action( 'delicious_recipes_single_before_content_start', array( $this, 'display_top_affiliate_disclosure' ), 20 );
		add_action( 'delicious_recipes_single_after_content_end', array( $this, 'display_bottom_affiliate_disclosure' ), 10 );

		add_action( 'delicious_recipes_after_notes', array( $this, 'display_rating_without_comment' ), 20 );
		add_action( 'delicious_review_questions_value', array( $this, 'display_review_questions_value' ), 20 );
		add_action( 'delicious_recipe_tags', array( $this, 'display_recipe_tags' ), 20 );

		// CTA.
		add_action( 'delicious_recipes_cta_image', array( $this, 'recipe_cta_image' ), 45 );
	}

	public function display_rating_without_comment() {

		if ( ! comments_open() ) {
			return;
		}

		delicious_recipes_pro_get_template( 'rating-without-comment.php' );
	}

	/**
	 * Get recipe equipments template.
	 *
	 * @return void
	 */
	public function recipe_main_equipments() {
		delicious_recipes_pro_get_template( 'recipe/equipments.php' );
	}

	/**
	 * Get recipe cta image template.
	 *
	 * @return void
	 */
	public function recipe_cta_image() {
		delicious_recipes_pro_get_template( 'recipe/cta-image.php' );
	}

	/**
	 * Load comments template.
	 *
	 * @param string $template template to load.
	 * @return string
	 */
	public static function comments_template_loader( $template ) {
		if ( get_post_type() !== DELICIOUS_RECIPE_POST_TYPE ) {
			return $template;
		}

		return delicious_recipes_pro_locate_template( 'single-recipe-reviews.php' );
	}

	/**
	 * Display the review authors gravatar
	 *
	 * @param array $comment WP_Comment.
	 * @return void
	 */
	public function display_review_gravatar( $comment ) {
		?>
		<div class="dr-comment-img-wrap">
			<div class="img">
				<?php echo get_avatar( $comment, apply_filters( 'delicious_recipes_review_gravatar_size', '60' ), '' ); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Display the reviewers name
	 *
	 * @return void
	 */
	public function display_review_title() {
		delicious_recipes_pro_get_template( 'recipe/review/review-title.php' );
	}

	/**
	 * Display the reviewers star rating
	 *
	 * @return void
	 */
	public function display_review_rating() {
		if ( post_type_supports( DELICIOUS_RECIPE_POST_TYPE, 'comments' ) ) {
			delicious_recipes_pro_get_template( 'recipe/review/review-rating.php' );
		}
	}

	/**
	 * Display the review authors meta (review date)
	 *
	 * @return void
	 */
	public function display_review_meta() {
		delicious_recipes_pro_get_template( 'recipe/review/review-meta.php' );
	}

	/**
	 * Display the did you make and would you recommend recipe buttons
	 *
	 * @return void
	 */
	public function display_review_questions_value() {
		delicious_recipes_pro_get_template( 'recipe/review/review-questions-value.php' );
	}

	/**
	 * Display the review content.
	 */
	function display_review_comment_text() {
		echo '<div class="description dr-comment-content">';
			comment_text();
		echo '</div>';
	}

	/**
	 * Display the review authors gallery images
	 *
	 * @return void
	 */
	public function display_review_gallery() {
		delicious_recipes_pro_get_template( 'recipe/review/review-gallery.php' );
	}

	/**
	 * Display the recipe tags
	 *
	 * @return void
	 */
	public function display_recipe_tags() {
		delicious_recipes_pro_get_template( 'recipe/review/recipe-tags.php' );
	}

	/**
	 * Display the review reply link
	 *
	 * @return void
	 */
	public function display_review_reply_link( $comment, $args, $depth ) {
		global $recipe;
		$comment_type = $comment->comment_type;
		$respond_id   = 'question' === $comment_type ? 'dr-comment-qa-' . $recipe->ID : 'dr-comment-review-' . $recipe->ID;
		?>
		<div class="reply dr-comment-reply-btn-wrap">
			<button type="button" class="dr-comment-reply-btn <?php echo esc_attr( $comment_type ); ?>">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'respond_id' => $respond_id,
							'reply_text' => __( 'Reply', 'delicious-recipes-pro' ),
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
						)
					)
				);
				?>
			</button>
		</div>
		<?php
	}

	/**
	 * Display the affiliate disclosure
	 *
	 * @return void
	 */
	public function display_top_affiliate_disclosure() {
		$global_settings    = delicious_recipes_get_global_settings();
		$enable_disclosure  = isset( $global_settings['enableDisclosureSingle']['0'] ) && 'yes' === $global_settings['enableDisclosureSingle']['0'] ? true : false;
		$location           = isset( $global_settings['disclosureLocation'] ) && $global_settings['disclosureLocation'] ? $global_settings['disclosureLocation'] : 'top';
		$disclosure_content = isset( $global_settings['affiliateDisclosure'] ) && $global_settings['affiliateDisclosure'] ? $global_settings['affiliateDisclosure'] : '';

		if ( ! $enable_disclosure || ! $disclosure_content || $location !== 'top' ) {
			return;
		}

		$data = array(
			'disclosure_content' => $disclosure_content,
		);

		delicious_recipes_pro_get_template( 'affiliate-disclosure.php', $data );
	}

	/**
	 * Display the affiliate disclosure
	 *
	 * @return void
	 */
	public function display_bottom_affiliate_disclosure() {
		$global_settings    = delicious_recipes_get_global_settings();
		$enable_disclosure  = isset( $global_settings['enableDisclosureSingle']['0'] ) && 'yes' === $global_settings['enableDisclosureSingle']['0'] ? true : false;
		$location           = isset( $global_settings['disclosureLocation'] ) && $global_settings['disclosureLocation'] ? $global_settings['disclosureLocation'] : 'top';
		$disclosure_content = isset( $global_settings['affiliateDisclosure'] ) && $global_settings['affiliateDisclosure'] ? $global_settings['affiliateDisclosure'] : '';

		if ( ! $enable_disclosure || ! $disclosure_content || $location !== 'bottom' ) {
			return;
		}

		$data = array(
			'disclosure_content' => $disclosure_content,
		);

		delicious_recipes_pro_get_template( 'affiliate-disclosure.php', $data );
	}

}

Delicious_Recipes_Pro_Template_Hooks::get_instance();
