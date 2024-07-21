<?php
/**
 * REST API: Delicious_Recipes_REST_Recipe_Submission_Controller class
 *
 * @package WP Delicious API Core
 * @since 1.6.1
 */

/**
 * Core class used to implement the Delicious Recipes REST API Recipe Submission Controller.
 *
 * @since 1.6.1
 */
class Delicious_Recipes_Pro_REST_Recipe_Submission_Controller {

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
			'/recipe-recaptcha',
			array(
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'recipe_recaptcha' ),
					'permission_callback' => array( $this, 'recipe_recaptcha_permissions_check' ),
				),
			)
		);
	}

	/**
	 * Check if a given request has access to submit a recipe.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function recipe_recaptcha_permissions_check( $request ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new \WP_Error(
				'rest_forbidden_context',
				esc_html__( 'You cannot submit a recipe.', 'delicious-recipes-pro' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}
		return true;
	}

	/**
	 * Submit a recipe.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @throws Exception If the Google reCAPTCHA validation fails.
	 */
	public function recipe_recaptcha( $request ) {
		$global_settings          = delicious_recipes_get_global_settings();
		$google_recaptcha_enabled = false;
		if ( isset( $global_settings['recaptchaEnabledForRecipe'] ) && is_array( $global_settings['recaptchaEnabledForRecipe'] ) && isset( $global_settings['recaptchaEnabledForRecipe'][0] ) && 'yes' === $global_settings['recaptchaEnabledForRecipe'][0] ) {
			$google_recaptcha_enabled = true;
		}

		if ( $google_recaptcha_enabled ) {
			$form_response = $request->get_json_params();
			$google_token  = isset( $form_response['googleToken'] ) ? $form_response['googleToken'] : false;

			$google_secret = isset( $global_settings['recaptchaSecretKey'] ) && ! empty( $global_settings['recaptchaSecretKey'] ) ? $global_settings['recaptchaSecretKey'] : false;

			if ( $google_recaptcha_enabled && $google_secret ) {
				$google_response = wp_remote_post(
					'https://www.google.com/recaptcha/api/siteverify',
					array(
						'body'    => array(
							'secret'   => $google_secret,
							'response' => $google_token,
						),
						'headers' => array(),
					)
				);

				if ( 200 !== $google_response['response']['code'] ) {
					wp_send_json_error(
						array(
							'success' => false,
							'message' => __( 'Google reCAPTCHA validation failed.', 'delicious-recipes-pro' ),
						)
					);
				} else {
					wp_send_json_success(
						array(
							'success' => true,
							'message' => __( 'Google reCAPTCHA validation successful.', 'delicious-recipes-pro' ),
						)
					);
				}
			}
		}
		wp_send_json_success(
			array(
				'success' => true,
				'message' => __( 'Google reCAPTCHA validation not required.', 'delicious-recipes-pro' ),
			)
		);
	}

}

/**
 * Register the Recipe Submission REST API routes.
 */
function delicious_recipes_register_recipe_rest_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Recipe_Submission_Controller();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_register_recipe_rest_routes' );
