<?php
/**
 * REST API: Delicious_Recipes_Pro_Unit_Conversion class
 *
 * @package Delicious_Recipes_Pro
 * @subpackage API Core
 * @since 2.1.2
 */

/**
 * Core base controller for managing unit conversion.
 *
 * @since 2.1.2
 */
class Delicious_Recipes_Pro_REST_Unit_Conversion_Controller {

	/**
	 * The namespace of this controller's route.
	 *
	 * @since 2.1.2
	 * @var string
	 */
	protected $namespace = 'deliciousrecipe/v1';

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/unit-conversion',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'get_unit_conversion' ),
				'permission_callback' => array( $this, 'get_unit_conversion_permissions_check' ),
			)
		);
	}

	/**
	 * Check permissions for the get_unit_conversion method.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_unit_conversion_permissions_check( $request ) {
		if ( ! current_user_can( 'read' ) ) {
			return new WP_Error(
				'rest_forbidden',
				esc_html__( 'You do not have permissions to access this endpoint.', 'delicious-recipes-pro' ),
				array( 'status' => $this->authorization_status_code() )
			);
		}
		return true;
	}

	/**
	 * Sets the HTTP status code for authorization.
	 *
	 * @return $status_code
	 */
	public function authorization_status_code() {
		$status_code = 401;
		if ( is_user_logged_in() ) {
			$status_code = 403;
		}

		return $status_code;
	}

	/**
	 * Get unit conversion.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function get_unit_conversion( $request ) {
		$global_settings = get_option( 'delicious_recipe_settings', array() );
		wp_send_json_success(
			array(
				'global_settings' => $global_settings,
			)
		);
	}
}

/**
 * Register the Unit Conversion REST API controller.
 */
function delicious_recipes_pro_register_unit_conversion_controller() {
	$controller = new Delicious_Recipes_Pro_REST_Unit_Conversion_Controller();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_pro_register_unit_conversion_controller' );
