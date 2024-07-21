<?php

/**
 * Display single recipe reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipes-pro/single-recipe-reviews.php.
 *
 * HOWEVER, on occasion Delicious Recipes will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package Delicious_Recipes_Pro\Templates
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

global $recipe;
$global_settings            = delicious_recipes_get_global_settings();
$rating_data                = delicious_recipes_pro_get_average_rating( $recipe->ID );
$enable_questions           = isset( $global_settings['enableQuestions']['0'] ) && 'yes' === $global_settings['enableQuestions']['0'] ? true : false;
$comment_status             = get_post( $recipe->ID )->comment_status;
$comments                   = get_comments(
	array(
		'post_id' => $recipe->ID,
		'status'  => 'approve',     // Change this to the type of comments to be displayed.
	)
);
$input_count                = delicious_recipes_pro_get_input_count( $recipe->ID );
$enable_would_you_recommend = isset( $global_settings['enableWouldYouRecommend']['0'] ) && 'yes' === $global_settings['enableWouldYouRecommend']['0'] ? true : false;
$enable_did_you_make        = isset( $global_settings['enableDidYouMake']['0'] ) && 'yes' === $global_settings['enableDidYouMake']['0'] ? true : false;

if ( 'closed' !== $comment_status ) {
	?>
	<div id="reviews" class="dr-pro-comment-section">
		<div id="comments-<?php echo esc_attr( $recipe->ID ); ?>" class="dr-pro-comment-container comments-area">

			<?php if ( have_comments() && $recipe->rating_count ) : ?>
				<div class="dr-review-ratings">
					<div class="dr-total-user-review">
						<h4 class="dr-review-title"><?php esc_html_e( 'User Reviews', 'delicious-recipes-pro' ); ?></h4>
						<div class="dr-star-ratings-wrapper">
							<div class="dr-star-ratings">
								<div data-rateyo-read-only="true" data-rateyo-rating="<?php echo esc_attr( $recipe->rating ); ?>" class="dr-comment-form-rating"></div>
							</div>
						</div>
						<div class="dr-rating-point">
							<span class="point"><?php echo esc_html( $recipe->rating ); ?></span>
							<?php esc_html_e( 'out of 5', 'delicious-recipes-pro' ); ?>
						</div>
						<span class="dr-ratings-cutomer-count">
							<?php
							/* translators: %1$s: average rating */
							echo esc_html( sprintf( __( 'Based on %1$s ratings', 'delicious-recipes-pro' ), $recipe->rating_count ) );
							?>
						</span>
					</div>
					<div class="dr-ratings-level-list">
						<div class="dr-rating-level">
							<div class="dr-star-ratings-wrapper">
								<div class="dr-rating-point">
									<span><?php esc_html_e( '5 Stars', 'delicious-recipes-pro' ); ?></span>
								</div>
								<div class="dr-star-ratings">
									<div data-rateyo-read-only="true" data-rateyo-rating=5 class="dr-comment-form-rating"></div>
								</div>
							</div>
							<div class="dr-ratings-percent"><?php echo esc_attr( $rating_data['five_stars'] ); ?></div>
						</div>
						<div class="dr-rating-level">
							<div class="dr-star-ratings-wrapper">
								<div class="dr-rating-point">
									<span><?php esc_html_e( '4 Stars', 'delicious-recipes-pro' ); ?></span>
								</div>
								<div class="dr-star-ratings">
									<div data-rateyo-read-only="true" data-rateyo-rating="4" class="dr-comment-form-rating"></div>
								</div>
							</div>
							<div class="dr-ratings-percent"><?php echo esc_attr( $rating_data['four_stars'] ); ?></div>
						</div>
						<div class="dr-rating-level">
							<div class="dr-star-ratings-wrapper">
								<div class="dr-rating-point">
									<span><?php esc_html_e( '3 Stars', 'delicious-recipes-pro' ); ?></span>
								</div>
								<div class="dr-star-ratings">
									<div data-rateyo-read-only="true" data-rateyo-rating="3" class="dr-comment-form-rating"></div>
								</div>
							</div>
							<div class="dr-ratings-percent"><?php echo esc_attr( $rating_data['three_stars'] ); ?></div>
						</div>
						<div class="dr-rating-level">
							<div class="dr-star-ratings-wrapper">
								<div class="dr-rating-point">
									<span><?php esc_html_e( '2 Stars', 'delicious-recipes-pro' ); ?></span>
								</div>
								<div class="dr-star-ratings">
									<div data-rateyo-read-only="true" data-rateyo-rating="2" class="dr-comment-form-rating"></div>
								</div>
							</div>
							<div class="dr-ratings-percent"><?php echo esc_attr( $rating_data['two_stars'] ); ?></div>
						</div>
						<div class="dr-rating-level">
							<div class="dr-star-ratings-wrapper">
								<div class="dr-rating-point">
									<span><?php esc_html_e( '1 Star', 'delicious-recipes-pro' ); ?></span>
								</div>
								<div class="dr-star-ratings">
									<div data-rateyo-read-only="true" data-rateyo-rating="1" class="dr-comment-form-rating"></div>
								</div>
							</div>
							<div class="dr-ratings-percent"><?php echo esc_attr( $rating_data['one_stars'] ); ?></div>
						</div>
					</div>
				</div>

			<?php endif; ?>

			<?php
			if ( $input_count != false && ( $input_count['recommend_count'] >= 1 || $input_count['made_recipe_count'] >= 1 ) ) :
				?>
				<div class="wpdelicious-recommend-recipe-made">
					<?php if ( $input_count['recommend_count'] >= 1 && $enable_would_you_recommend ) : ?>
						<span class="wpdelicious-recommend"><?php echo esc_html( $input_count['recommend_count'] ); ?> <?php esc_html_e( 'people recommend this recipe', 'delicious-recipes-pro' ); ?> </span>
					<?php endif; ?>
					<?php if ( $input_count['made_recipe_count'] >= 1 && $enable_did_you_make ) : ?>
						<span class="wpdelicious-made"><?php echo esc_html( $input_count['made_recipe_count'] ); ?> <?php esc_html_e( 'people made this recipe', 'delicious-recipes-pro' ); ?> </span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="dr-comment-area">
				<div class="dr-comment-form">
					<div class="dr-comment-type-buttons">
						<button type="button" class="dr-form-tab-btn active" data-target=".dr-comment-review">
							<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 6.5L18 10.5M4.5 20.0001H8.5L19 9.50006C19.2626 9.23741 19.471 8.92561 19.6131 8.58245C19.7553 8.23929 19.8284 7.87149 19.8284 7.50006C19.8284 7.12862 19.7553 6.76083 19.6131 6.41767C19.471 6.07451 19.2626 5.7627 19 5.50006C18.7374 5.23741 18.4256 5.02907 18.0824 4.88693C17.7392 4.74479 17.3714 4.67163 17 4.67163C16.6286 4.67163 16.2608 4.74479 15.9176 4.88693C15.5744 5.02907 15.2626 5.23741 15 5.50006L4.5 16.0001V20.0001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							<?php esc_html_e( 'Write a Review', 'delicious-recipes-pro' ); ?>
						</button>
						<?php if ( $enable_questions ) : ?>
							<button type="button" class="dr-form-tab-btn" data-target=".dr-comment-qa">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8 9H16M8 13H14M18 4C18.7956 4 19.5587 4.31607 20.1213 4.87868C20.6839 5.44129 21 6.20435 21 7V15C21 15.7956 20.6839 16.5587 20.1213 17.1213C19.5587 17.6839 18.7956 18 18 18H13L8 21V18H6C5.20435 18 4.44129 17.6839 3.87868 17.1213C3.31607 16.5587 3 15.7956 3 15V7C3 6.20435 3.31607 5.44129 3.87868 4.87868C4.44129 4.31607 5.20435 4 6 4H18Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								<?php esc_html_e( 'Ask a Question', 'delicious-recipes-pro' ); ?>
							</button>
						<?php endif; ?>
					</div>
					<div class="dr-comment-type-content" id="review_form">
						<div class="dr-comment-review">
							<div id="dr-comment-review-<?php echo esc_attr( $recipe->ID ); ?>">
								<?php delicious_recipes_pro_get_template( 'recipe/review/review-form.php' ); ?>
							</div>
						</div>
						<?php if ( $enable_questions ) : ?>
							<div class="dr-comment-qa">
								<div id="dr-comment-qa-<?php echo esc_attr( $recipe->ID ); ?>">
									<?php delicious_recipes_pro_get_template( 'recipe/review/question-form.php' ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( have_comments() ) : ?>
					<div class="dr-comments">
						<div class="dr-comment-list-tab-buttons">
							<button type="button" class="dr-comment-list-btn active" data-target=".commentListReviews"><?php esc_html_e( 'Reviews', 'delicious-recipes-pro' ); ?></button>
							<?php if ( $enable_questions ) : ?>
								<button type="button" class="dr-comment-list-btn" data-target=".commentListQA"><?php esc_html_e( 'Q & A', 'delicious-recipes-pro' ); ?></button>
							<?php endif; ?>
						</div>
						<div class="dr-comment-list-tab-content">
							<div id="commentListReviews" class="commentListReviews">

								<ol class="comment-list dr-comment-list">
									<?php
									wp_list_comments(
										apply_filters(
											'delicious_recipes_review_list_args',
											array(
												'type'     => 'comment',
												'callback' => 'delicious_recipes_comments',
											)
										),
										$comments
									);
									?>
								</ol>

								<?php the_comments_navigation( $recipe->ID ); ?>

							</div>
							<?php if ( $enable_questions ) : ?>
								<div id="commentListQA" class="commentListQA">

									<ol class="comment-list dr-comment-list">
										<?php
										wp_list_comments(
											apply_filters(
												'delicious_recipes_question_list_args',
												array(
													'type' => 'question',
													'callback' => 'delicious_recipes_questions',
												)
											),
											$comments
										);
										?>
									</ol>

									<?php the_comments_navigation( $recipe->ID ); ?>

								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php
					// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open( $recipe->ID ) ) :
						?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'delicious-recipes-pro' ); ?></p>
						<?php
					endif;
				endif;
				?>

			</div>

		</div>
	</div>
	<?php
}
