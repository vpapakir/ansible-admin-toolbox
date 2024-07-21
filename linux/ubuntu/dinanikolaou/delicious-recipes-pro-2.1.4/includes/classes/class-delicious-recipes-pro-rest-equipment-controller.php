<?php
/**
 * REST API: Delicious_Recipes_Pro_REST_Equipment_Controller class
 *
 * @package WP Delicious API Core
 * @subpackage API Core
 * @since 1.0.0
 */

/**
 * Core base controller for managing and interacting with Equipments.
 *
 * @since 1.0.0
 */
class Delicious_Recipes_Pro_REST_Equipment_Controller {

	/**
	 * Base name of the post type.
	 *
	 * @var string
	 */
	protected $base_name;

	/**
	 * Namespace for the post type.
	 *
	 * @var string
	 */
	protected $namespace;

	/**
	 * Constructor
	 *
	 * @param string $post_type Post type name.
	 */
	public function __construct( $post_type ) {
		$this->base_name = $post_type;
		$this->namespace = 'deliciousrecipe/v1';
	}

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/' . $this->base_name . '/(?P<id>[\d]+)',
			array(
				// Notice how we are registering multiple endpoints the 'schema' equates to an OPTIONS request.
				array(
					'methods'             => 'GET',
					'callback'            => array( $this, 'get_equipment' ),
					'permission_callback' => array( $this, 'get_equipment_permissions_check' ),
				),
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'post_equipment' ),
					'permission_callback' => array( $this, 'post_equipment_permissions_check' ),
				),
				// Register our schema callback.
				'schema' => array( $this, 'get_item_schema' ),
			)
		);
	}

	/**
	 * Grabs a single Enquiry if vald id is provided.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function post_equipment( $request ) {

		if ( ! isset( $request['id'] ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Equipment not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$id   = (int) $request['id'];
		$post = get_post( $id );

		$data = array(
			'success'  => true,
			'message'  => __( 'Equipment Settings Saved Successfully.', 'delicious-recipes-pro' ),
			'post_url' => get_the_permalink( $id ),
		);
		if ( empty( $post ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Equipment not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$formdata = $request->get_json_params();

		// Sanitize data and update.
		$sanitized_metas = delicious_recipes_sanitize_metas( $formdata );
		update_post_meta( $id, 'delicious_recipes_equipment_metadata', $sanitized_metas );

		// Return all of our post response data.
		return $data;
	}

	/**
	 * Check permissions for the posts.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_equipment_permissions_check( $request ) {
		if ( ! current_user_can( 'read' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
		}
		return true;
	}

	/**
	 * Check permissions for the posts.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function post_equipment_permissions_check( $request ) {
		// Check edit prevlages.
		if ( ! current_user_can( 'edit_posts' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
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
	 * Grabs a single Equipment if valid id is provided.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_equipment( $request ) {
		$id   = (int) $request['id'];
		$post = get_post( $id );

		$data = array(
			'success' => true,
			'message' => __( 'Equipment Found.', 'delicious-recipes-pro' ),
		);
		if ( empty( $post ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Equipment not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$response     = $this->prepare_equipment_for_response( $post, $request );
		$data['data'] = $this->prepare_response_for_collection( $response );
		// Return all of our post response data.
		return $data;
	}

	/**
	 * Matches the post data to the schema we want.
	 *
	 * @param WP_Post         $post The comment object whose response is being prepared.
	 * @param WP_REST_Request $request Request object.
	 */
	public function prepare_equipment_for_response( $post, $request ) {

		$schema = $this->get_item_schema( $request );
		$fields = $this->get_fields_for_response( $request );

		$equipment_metas = get_post_meta( $post->ID, 'delicious_recipes_equipment_metadata', true );

		$data = array(
			'id'              => $post->ID,
			'equipment_metas' => $equipment_metas,
		);

		return rest_ensure_response( $data );
	}

	/**
	 * Prepare a response for inserting into a collection of responses.
	 *
	 * This is copied from WP_REST_Controller class in the WP REST API v2 plugin.
	 *
	 * @param WP_REST_Response $response Response object.
	 * @return array Response data, ready for insertion into collection data.
	 */
	public function prepare_response_for_collection( $response ) {
		if ( ! ( $response instanceof WP_REST_Response ) ) {
			return $response;
		}

		$data   = (array) $response->get_data();
		$server = rest_get_server();

		if ( method_exists( $server, 'get_compact_response_links' ) ) {
			$links = call_user_func( array( $server, 'get_compact_response_links' ), $response );
		} else {
			$links = call_user_func( array( $server, 'get_response_links' ), $response );
		}

		if ( ! empty( $links ) ) {
			$data['_links'] = $links;
		}

		return $data;
	}

	/**
	 * Gets an array of fields to be included on the response.
	 *
	 * Included fields are based on item schema and `_fields=` request argument.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return array Fields to be included in the response.
	 */
	public function get_fields_for_response( $request ) {
		$schema = $this->get_item_schema();
		$fields = isset( $schema['properties'] ) ? array_keys( $schema['properties'] ) : array();

		return $fields;
	}

	/**
	 * Get our sample schema for a post.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_item_schema( $request = null ) {
		$schema = array(
			// This tells the spec of JSON Schema we are using which is draft 4.
			'$schema'    => 'http://json-schema.org/draft-04/schema#',
			// The title property marks the identity of the resource.
			'title'      => DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE,
			'type'       => 'object',
			// In JSON Schema you can specify object properties in the properties attribute.
			'properties' => array(
				'id'           => array(
					'description' => __( 'Unique identifier for the object.', 'delicious-recipes-pro' ),
					'type'        => 'integer',
					'context'     => array( 'view', 'edit', 'embed' ),
					'readonly'    => true,
				),
				'date'         => array(
					'description' => __( "The date the object was published, in the site's timezone.", 'delicious-recipes-pro' ),
					'type'        => 'string',
					'format'      => 'date-time',
					'context'     => array( 'view', 'edit', 'embed' ),
				),
				'title'        => array(
					'description' => __( 'The title for the object.', 'delicious-recipes-pro' ),
					'type'        => 'object',
					'context'     => array( 'view', 'edit', 'embed' ),
					'arg_options' => array(
						'sanitize_callback' => null,   // Note: sanitization implemented in self::prepare_item_for_database().
						'validate_callback' => null,   // Note: validation implemented in self::prepare_item_for_database().
					),
					'properties'  => array(
						'raw'      => array(
							'description' => __( 'Title for the object, as it exists in the database.', 'delicious-recipes-pro' ),
							'type'        => 'string',
							'context'     => array( 'edit' ),
						),
						'rendered' => array(
							'description' => __( 'HTML title for the object, transformed for display.', 'delicious-recipes-pro' ),
							'type'        => 'string',
							'context'     => array( 'view', 'edit', 'embed' ),
							'readonly'    => true,
						),
					),
				),
				'link'         => array(
					'description' => __( 'URL to the object.', 'delicious-recipes-pro' ),
					'type'        => 'string',
					'format'      => 'uri',
					'context'     => array( 'view', 'edit', 'embed' ),
					'readonly'    => true,
				),
				'modified'     => array(
					'description' => __( "The date the object was last modified, in the site's timezone.", 'delicious-recipes-pro' ),
					'type'        => 'string',
					'format'      => 'date-time',
					'context'     => array( 'view', 'edit' ),
					'readonly'    => true,
				),
				'modified_gmt' => array(
					'description' => __( 'The date the object was last modified, as GMT.', 'delicious-recipes-pro' ),
					'type'        => 'string',
					'format'      => 'date-time',
					'context'     => array( 'view', 'edit' ),
					'readonly'    => true,
				),
				'status'       => array(
					'description' => __( 'A named status for the object.', 'delicious-recipes-pro' ),
					'type'        => 'string',
					'enum'        => array_keys( get_post_stati( array( 'internal' => false ) ) ),
					'context'     => array( 'view', 'edit' ),
				),
				'type'         => array(
					'description' => __( 'Type of Post for the object.', 'delicious-recipes-pro' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit', 'embed' ),
					'readonly'    => true,
				),
			),
		);

		return $this->add_additional_fields_schema( $schema );
	}

	/**
	 * Adds the schema from additional fields to a schema array.
	 *
	 * The type of object is inferred from the passed schema.
	 *
	 * @since 1.0.0
	 *
	 * @param array $schema Schema array.
	 * @return array Modified Schema array.
	 */
	protected function add_additional_fields_schema( $schema ) {
		if ( empty( $schema['title'] ) ) {
			return $schema;
		}

		// Can't use $this->get_object_type otherwise we cause an inf loop.
		$object_type = $schema['title'];

		return $schema;
	}

}

/**
 * Register the REST API routes.
 */
function delicious_recipe_pro_register_equipment_rest_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Equipment_Controller( DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE );
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipe_pro_register_equipment_rest_routes' );
