<?php
/**
 * Rest API: Delicious_Recipes_Pro_REST_Ingredients_Links_Controller class
 *
 * @package WP Delicious API Core
 * @subpackage API Core
 * @since 1.6.1
 */

/**
 * Core base controller for managing and interacting with Ingredients Links via the REST API.
 *
 * @since 1.6.1
 */
class Delicious_Recipes_Pro_REST_Ingredients_Links_Controller {

	/**
	 * The namespace of this controller's route.
	 *
	 * @var string
	 */
	protected $namespace = 'deliciousrecipe/v1';

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/ingredient_links',
			array(
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_ingredients_links' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
				),
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'update_ingredients_links' ),
					'permission_callback' => array( $this, 'update_settings_permissions_check' ),
				),
			)
		);
	}

	/**
	 * Check permissions for the posts.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! current_user_can( 'read' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
		}
		return true;
	}

	/**
	 * Check permissions for the settings update.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function update_settings_permissions_check( $request ) {
		// Check manage_options prevlages.
		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot update the site settings.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
		}
		return true;
	}

	/**
	 * Sets Authorization Status Code.
	 *
	 * @return $status
	 */
	public function authorization_status_code() {
		$status = 401;

		if ( is_user_logged_in() ) {
			$status = 403;
		}

		return $status;
	}

	/**
	 * Grabs the ingredients links stored in the database.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function get_ingredients_links( $request ) {
		$ingredients_links = get_option( 'delicious_recipes_auto_link_ingredients' );
		if ( empty( $ingredients_links ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'No ingredients links found.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$data = array(
			'success' => true,
			'message' => __( 'Ingredients links found.', 'delicious-recipes-pro' ),
			'data'    => $ingredients_links,
		);
		return $data;

	}

	/**
	 * Updates the ingredients links stored in the database.
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function update_ingredients_links( $request ) {
		$formdata = $request->get_json_params();

		update_option( 'delicious_recipes_auto_link_ingredients', $formdata );

		$data = array(
			'success' => true,
			'message' => __( 'Ingredients links updated.', 'delicious-recipes-pro' ),
			'data'    => $formdata,
		);

		return $data;
	}
}

/**
 * Register the Ingredients Links REST API routes.
 */
function delicious_recipes_register_ingredients_links_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Ingredients_Links_Controller();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_register_ingredients_links_routes' );
