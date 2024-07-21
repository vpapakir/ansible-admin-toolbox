<?php
/**
 * REST API: Delicious_Recipes_REST_Review_Tags_Controller class
 *
 * @package WP Delicious API Core
 * @since 1.6.4
 */

/**
 * Core class used to implement the Delicious Recipes REST API Review Tags Controller.
 *
 * @since 1.6.4
 */

class Delicious_Recipes_Pro_REST_Review_Tags_Controller {

	/**
	 * The namespace of this controller's route.
	 *
	 * @var string
	 */
	protected $namespace = 'deliciousrecipe/v1';

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @return void
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/review-tags',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_review_tags' ),
					'permission_callback' => array( $this, 'get_review_tags_permissions_check' ),
				),
				array(
					'methods'             => WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'update_review_tags' ),
					'permission_callback' => array( $this, 'update_review_tags_permissions_check' ),
				),
			)
		);
	}

	/**
	 * Check if a given request has access to get review tags.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function get_review_tags_permissions_check( $request ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new \WP_Error(
				'rest_forbidden_context',
				esc_html__( 'You cannot get review tags.', 'delicious-recipes-pro' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}
		return true;
	}

	/**
	 * Check if a given request has access to update review tags.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function update_review_tags_permissions_check( $request ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new \WP_Error(
				'rest_forbidden_context',
				esc_html__( 'You cannot update review tags.', 'delicious-recipes-pro' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}
		return true;
	}

	/**
	 * Sets Authorization Status Code.
	 *
	 * @return $status
	 */
	public function rest_authorization_required_code() {
		$status = 401;

		if ( is_user_logged_in() ) {
			$status = 403;
		}

		return $status;
	}

	/**
	 * Get review tags.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function get_review_tags( $request ) {
		$default_review_tags = array(
			__( 'Delicious', 'delicious-recipes-pro' ),
			__( 'Spicy', 'delicious-recipes-pro' ),
			__( 'Sweet', 'delicious-recipes-pro' ),
			__( 'Crispy', 'delicious-recipes-pro' ),
			__( 'Budget-Friendly', 'delicious-recipes-pro' ),
			__( 'Refreshing', 'delicious-recipes-pro' ),
			__( 'Quick and Easy', 'delicious-recipes-pro' ),
			__( 'Yummy', 'delicious-recipes-pro' ),
			__( 'Energizing', 'delicious-recipes-pro' ),
			__( 'Family Favorite', 'delicious-recipes-pro' ),
			__( 'Savory', 'delicious-recipes-pro' ),
			__( 'Snackable', 'delicious-recipes-pro' ),
			__( 'Flavorful', 'delicious-recipes-pro' ),
			__( 'Crunchy', 'delicious-recipes-pro' ),
			__( 'Great flavors', 'delicious-recipes-pro' ),
			__( 'Crowd-pleaser', 'delicious-recipes-pro' ),
			__( 'Might try again', 'delicious-recipes-pro' ),
		);
		$review_tags         = get_option( 'delicious_recipes_review_tags' );
		if ( ! $review_tags || empty( $review_tags ) ) {
			update_option( 'delicious_recipes_review_tags', $default_review_tags );
			return rest_ensure_response(
				array(
					'success' => true,
					'message' => __( 'No additional review tags found.', 'delicious-recipes-pro' ),
					'data'    => $default_review_tags,
				)
			);
		} else {
			$data = array(
				'success' => true,
				'message' => __( 'Review tags found.', 'delicious-recipes-pro' ),
				'data'    => $review_tags,
			);
			return $data;
		}
	}

	/**
	 * Update review tags.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function update_review_tags( $request ) {
		$formdata      = $request->get_json_params();
		$decoded_array = json_decode( $formdata, true );
		update_option( 'delicious_recipes_review_tags', $decoded_array );

		$data = array(
			'success' => true,
			'message' => __( 'Review tags updated.', 'delicious-recipes-pro' ),
			'data'    => $decoded_array,
		);

		return $data;
	}
}

/**
 * Register the Delicious Recipes REST API Review Tags Controller.
 */
function delicious_recipes_register_review_tags_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Review_Tags_Controller();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_register_review_tags_routes' );
