<?php
/**
 * REST API: Delicious_Recipes_Pro_REST_Recipe_Controller class
 *
 * @package WP Delicious API Core
 * @subpackage API Core
 * @since 1.0.0
 */

/**
 * Core base controller for managing and interacting with Recipes.
 *
 * @since 1.0.0
 */
class Delicious_Recipes_Pro_REST_Recipe_Controller {

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
			'/' . $this->base_name . '/usrdb',
			array(
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'post_frontend_submissions' ),
					'permission_callback' => array( $this, 'frontend_submissions_permissions_check' ),
				),
				// Register our schema callback.
				'schema' => array( $this, 'get_item_schema' ),
			)
		);

		register_rest_route(
			$this->namespace,
			'/' . $this->base_name . '/usrdb/(?P<id>[\d]+)',
			array(
				// Notice how we are registering multiple endpoints the 'schema' equates to an OPTIONS request.
				array(
					'methods'             => 'GET',
					'callback'            => array( $this, 'get_frontend_submission' ),
					'permission_callback' => array( $this, 'frontend_submissions_permissions_check' ),
				),
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'update_frontend_submission' ),
					'permission_callback' => array( $this, 'frontend_submissions_permissions_check' ),
				),
				// Register our schema callback.
				'schema' => array( $this, 'get_item_schema' ),
			)
		);

		register_rest_route(
			$this->namespace,
			'/' . $this->base_name . '/usrdb/recipes',
			array(
				array(
					'methods'             => 'GET',
					'callback'            => array( $this, 'get_frontend_submissions' ),
					'permission_callback' => array( $this, 'frontend_submissions_permissions_check' ),
				),
				// Register our schema callback.
				'schema' => array( $this, 'get_item_schema' ),
			)
		);
	}

	/**
	 * Grabs a single recipe.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function post_frontend_submissions( $request ) {

		$submissiondata = $request->get_json_params();

		if ( ! isset( $submissiondata['nonce'] ) && ! wp_verify_nonce( $submissiondata['nonce'], 'wp_rest' ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Nonce verification failed.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$global_settings     = delicious_recipes_get_global_settings();
		$enable_pending_mode = isset( $global_settings['enablePendingMode']['0'] ) && 'yes' === $global_settings['enablePendingMode']['0'] ? true : false;
		$status              = $enable_pending_mode ? 'pending' : 'publish';
		$disable_email       = false;
		$recipe_author       = get_current_user_id();

		if ( isset( $submissiondata['draft'] ) && $submissiondata['draft'] ) {
			$disable_email = true;
			$status        = 'draft';
		}

		$formdata = isset( $submissiondata['formdata'] ) ? $submissiondata['formdata'] : false;

		if ( $formdata ) {

			$user_recipe = array(
				'post_title'   => sanitize_text_field( $formdata['title'] ),
				'post_content' => wp_kses_post( $formdata['description'] ),
				'post_status'  => $status,
				'post_type'    => DELICIOUS_RECIPE_POST_TYPE,
				'post_author'  => $recipe_author,
			);

			$user_recipe_id = wp_insert_post( $user_recipe );

			// Set recipe taxonomy terms.
			if ( isset( $formdata['cookingMethods'] ) && $formdata['cookingMethods'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['cookingMethods'], 'recipe-cooking-method', false );
			}

			if ( isset( $formdata['cuisines'] ) && $formdata['cuisines'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['cuisines'], 'recipe-cuisine', false );
			}

			if ( isset( $formdata['courses'] ) && $formdata['courses'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['courses'], 'recipe-course', false );
			}

			if ( isset( $formdata['recipeKeys'] ) && $formdata['recipeKeys'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['recipeKeys'], 'recipe-key', false );
			}

			if ( isset( $formdata['recipeBadges'] ) && $formdata['recipeBadges'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['recipeBadges'], 'recipe-badge', false );
			}

			if ( isset( $formdata['recipeDietaries'] ) && $formdata['recipeDietaries'] ) {
				wp_set_object_terms( $user_recipe_id, $formdata['recipeDietaries'], 'recipe-dietary', false );
			}

			// Featured Image.
			if ( isset( $formdata['featuredImage'] ) && $formdata['featuredImage'] ) {
				$image_file    = sanitize_text_field( wp_normalize_path( $formdata['featuredImage'] ) );
				$attachment_id = delicious_recipes_pro_set_custom_image( $image_file, $user_recipe_id, 'featured_image' );
				set_post_thumbnail( $user_recipe_id, intval( $attachment_id ) );
				$formdata['featuredImage']    = $attachment_id;
				$formdata['featuredImageUrl'] = get_the_post_thumbnail_url( $user_recipe_id );
			} else {
				delete_post_thumbnail( $user_recipe_id );
			}

			if ( ! isset( $user_recipe_id ) ) {
				return rest_ensure_response(
					array(
						'success' => false,
						'message' => __( 'Recipe not found by ID.', 'delicious-recipes-pro' ),
						'data'    => array(),
					)
				);
			}

			$id   = (int) $user_recipe_id;
			$post = get_post( $id );

			$data = array(
				'success'   => true,
				'message'   => __( 'Recipe Settings Saved Successfully.', 'delicious-recipes-pro' ),
				'post_url'  => get_the_permalink( $id ),
				'recipe_id' => $id,
			);

			if ( empty( $post ) ) {
				return rest_ensure_response(
					array(
						'success' => false,
						'message' => __( 'Recipe not found by ID.', 'delicious-recipes-pro' ),
						'data'    => array(),
					)
				);
			}

			// Set Instructions Image.
			if ( isset( $formdata['recipeInstructions'] ) && $formdata['recipeInstructions'] ) {
				foreach ( $formdata['recipeInstructions'] as $index => $section ) :
					foreach ( $section['instruction'] as $key => $dir ) :
						if ( isset( $dir['image'] ) && ! empty( $dir['image'] ) ) :
							$image_file = sanitize_text_field( wp_normalize_path( $dir['image'] ) );
							if ( $image_file ) {
								$attachment_id = delicious_recipes_pro_set_custom_image( $image_file, $id, 'direction_image', $key );
								$formdata['recipeInstructions'][ $index ]['instruction'][ $key ]['image']         = $attachment_id;
								$formdata['recipeInstructions'][ $index ]['instruction'][ $key ]['image_preview'] = wp_get_attachment_image_url( $attachment_id );
							}
						endif;
					endforeach;
				endforeach;
			}

			// Set Gallery Images.
			if ( isset( $formdata['imageGalleryImages'] ) && $formdata['imageGalleryImages'] ) {
				foreach ( $formdata['imageGalleryImages'] as $key => $image ) :
					$image_file = isset( $image['imageID'] ) ? sanitize_text_field( wp_normalize_path( $image['imageID'] ) ) : false;
					if ( $image_file ) :
						$attachment_id                                        = delicious_recipes_pro_set_custom_image( $image_file, $id, 'gallery_image', $key );
						$formdata['imageGalleryImages'][ $key ]['imageID']    = $attachment_id;
						$formdata['imageGalleryImages'][ $key ]['previewURL'] = wp_get_attachment_image_url( $attachment_id );
					endif;
				endforeach;
			}

			// Sanitize data and update.
			$sanitized_recipe_metas = delicious_recipes_sanitize_metas( $formdata );
			update_post_meta( $id, 'delicious_recipes_metadata', $sanitized_recipe_metas );

			// update seasons.
			if ( isset( $formdata['bestSeason'] ) ) {
				update_post_meta( $id, '_dr_best_season', sanitize_text_field( $formdata['bestSeason'] ) );
			}

			// update difficulty levels.
			if ( isset( $formdata['difficultyLevel'] ) ) {
				update_post_meta( $id, '_dr_difficulty_level', sanitize_text_field( $formdata['difficultyLevel'] ) );
			}

			// update ingredients.
			$ingredients = delicious_recipes_get_single_ingredients( $id );

			if ( ! empty( $ingredients ) && is_array( $ingredients ) ) {
				$ingredients = array_map( 'sanitize_text_field', $ingredients );
				update_post_meta( $id, '_dr_recipe_ingredients', $ingredients );

				$ingredient_count = count( $ingredients );
				update_post_meta( $id, '_dr_ingredient_count', absint( $ingredient_count ) );
			}

			// update recipe submission meta.
			update_post_meta( $id, '_dr_user_submission_recipe', 'yes' );

			// send new recipe submission email.
			do_action( 'delicious_recipes_frontend_recipe_submitted', $recipe_author, $id, $disable_email );

			// Return all of our post response data.
			return $data;
		}

	}

	/**
	 * Update a single recipe if valid id is provided.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function update_frontend_submission( $request ) {

		$submissiondata = $request->get_json_params();

		if ( ! isset( $submissiondata['nonce'] ) && ! wp_verify_nonce( $submissiondata['nonce'], 'wp_rest' ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Nonce verification failed.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		if ( ! isset( $request['id'] ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Recipe not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$id   = (int) $request['id'];
		$post = get_post( $id );

		$status        = isset( $submissiondata['submitReview'] ) && $submissiondata['submitReview'] ? 'pending' : $post->post_status;
		$disable_email = isset( $submissiondata['submitReview'] ) && $submissiondata['submitReview'] ? false : true;
		$recipe_author = get_current_user_id();

		$formdata = isset( $submissiondata['formdata'] ) ? $submissiondata['formdata'] : false;

		$data = array(
			'success'  => true,
			'message'  => __( 'Recipe Settings Saved Successfully.', 'delicious-recipes-pro' ),
			'post_url' => get_the_permalink( $id ),
		);

		if ( empty( $post ) || ! $formdata ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Recipe not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$user_recipe = array(
			'ID'           => $id,
			'post_title'   => sanitize_text_field( $formdata['title'] ),
			'post_content' => wp_kses_post( $formdata['description'] ),
			'post_type'    => DELICIOUS_RECIPE_POST_TYPE,
			'post_author'  => get_current_user_id(),
			'post_status'  => $status,
		);

		wp_update_post( $user_recipe );

		// Set recipe taxonomy terms.
		if ( isset( $formdata['cookingMethods'] ) && $formdata['cookingMethods'] ) {
			wp_set_object_terms( $id, $formdata['cookingMethods'], 'recipe-cooking-method', false );
		}

		if ( isset( $formdata['cuisines'] ) && $formdata['cuisines'] ) {
			wp_set_object_terms( $id, $formdata['cuisines'], 'recipe-cuisine', false );
		}

		if ( isset( $formdata['courses'] ) && $formdata['courses'] ) {
			wp_set_object_terms( $id, $formdata['courses'], 'recipe-course', false );
		}

		if ( isset( $formdata['recipeKeys'] ) && $formdata['recipeKeys'] ) {
			wp_set_object_terms( $id, $formdata['recipeKeys'], 'recipe-key', false );
		}

		if ( isset( $formdata['recipeBadges'] ) && $formdata['recipeBadges'] ) {
			wp_set_object_terms( $id, $formdata['recipeBadges'], 'recipe-badge', false );
		}

		if ( isset( $formdata['recipeDietaries'] ) && $formdata['recipeDietaries'] ) {
			wp_set_object_terms( $id, $formdata['recipeDietaries'], 'recipe-dietary', false );
		}

		// Featured Image.
		if ( isset( $formdata['featuredImage'] ) && $formdata['featuredImage'] ) {
			$image_file = sanitize_text_field( wp_normalize_path( $formdata['featuredImage'] ) );
			if ( $image_file && ! absint( $image_file ) ) {
				$attachment_id = delicious_recipes_pro_set_custom_image( $image_file, $id, 'featured_image' );
				set_post_thumbnail( $id, intval( $attachment_id ) );
				$formdata['featuredImage']    = $attachment_id;
				$formdata['featuredImageUrl'] = get_the_post_thumbnail_url( $id );
			}
		} else {
			delete_post_thumbnail( $id );
		}

		// Set Instructions Image.
		if ( isset( $formdata['recipeInstructions'] ) && $formdata['recipeInstructions'] ) {
			foreach ( $formdata['recipeInstructions'] as $index => $section ) :
				foreach ( $section['instruction'] as $key => $dir ) :
					if ( isset( $dir['image'] ) && ! empty( $dir['image'] ) ) :
						$image_file = sanitize_text_field( wp_normalize_path( $dir['image'] ) );
						if ( $image_file && ! absint( $image_file ) ) {
							$attachment_id = delicious_recipes_pro_set_custom_image( $image_file, $id, 'direction_image', $key );
							$formdata['recipeInstructions'][ $index ]['instruction'][ $key ]['image']         = $attachment_id;
							$formdata['recipeInstructions'][ $index ]['instruction'][ $key ]['image_preview'] = wp_get_attachment_image_url( $attachment_id );
						}
					endif;
				endforeach;
			endforeach;
		}

		// Set Gallery Images.
		if ( isset( $formdata['imageGalleryImages'] ) && $formdata['imageGalleryImages'] ) {
			foreach ( $formdata['imageGalleryImages'] as $key => $image ) :
				$image_file = isset( $image['imageID'] ) ? sanitize_text_field( wp_normalize_path( $image['imageID'] ) ) : false;
				if ( $image_file && ! absint( $image_file ) ) :
					$attachment_id                                        = delicious_recipes_pro_set_custom_image( $image_file, $id, 'gallery_image', $key );
					$formdata['imageGalleryImages'][ $key ]['imageID']    = $attachment_id;
					$formdata['imageGalleryImages'][ $key ]['previewURL'] = wp_get_attachment_image_url( $attachment_id );
				endif;
			endforeach;
		}

		// Sanitize data and update.
		$sanitized_recipe_metas = delicious_recipes_sanitize_metas( $formdata );
		update_post_meta( $id, 'delicious_recipes_metadata', $sanitized_recipe_metas );

		// update seasons.
		if ( isset( $formdata['bestSeason'] ) ) {
			update_post_meta( $id, '_dr_best_season', sanitize_text_field( $formdata['bestSeason'] ) );
		}

		// update difficulty levels.
		if ( isset( $formdata['difficultyLevel'] ) ) {
			update_post_meta( $id, '_dr_difficulty_level', sanitize_text_field( $formdata['difficultyLevel'] ) );
		}

		// update ingredients.
		$ingredients = delicious_recipes_get_single_ingredients( $id );

		if ( ! empty( $ingredients ) && is_array( $ingredients ) ) {
			$ingredients = array_map( 'sanitize_text_field', $ingredients );
			update_post_meta( $id, '_dr_recipe_ingredients', $ingredients );

			$ingredient_count = count( $ingredients );
			update_post_meta( $id, '_dr_ingredient_count', absint( $ingredient_count ) );
		}

		// send new recipe submission email.
		do_action( 'delicious_recipes_frontend_recipe_submitted', $recipe_author, $id, $disable_email );

		// Return all of our post response data.
		return $data;
	}

	/**
	 * Grabs User Submission recipes.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_frontend_submissions( $request ) {

		$data = array(
			'success' => true,
			'message' => __( 'Recipe Submissions Found.', 'delicious-recipes-pro' ),
		);

		$response     = $this->prepare_submissions_for_response( $request );
		$data['data'] = $this->prepare_response_for_collection( $response );

		if ( empty( $data['data']['recipe_submissions'] ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Recipe Submissions not found.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		// Return all of our post response data.
		return $data;
	}

	/**
	 * Matches the post data to the schema we want.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function prepare_submissions_for_response( $request ) {

		$schema = $this->get_item_schema( $request );
		$fields = $this->get_fields_for_response( $request );

		$recipe_submissions = delicious_recipes_pro_filter_submission_results();

		$data = array(
			'recipe_submissions' => $recipe_submissions,
		);

		return rest_ensure_response( $data );
	}

	/**
	 * Check permissions for the posts.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function frontend_submissions_permissions_check( $request ) {
		// Check edit prevlages.
		if ( ! current_user_can( 'edit_delicious_recipes' ) ) {
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
	 * Grabs a single user recipe if valid id is provided.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_frontend_submission( $request ) {
		$id   = (int) $request['id'];
		$post = get_post( $id );

		$data = array(
			'success' => true,
			'message' => __( 'Recipe Found.', 'delicious-recipes-pro' ),
		);
		if ( empty( $post ) ) {
			return rest_ensure_response(
				array(
					'success' => false,
					'message' => __( 'Recipe not found by ID.', 'delicious-recipes-pro' ),
					'data'    => array(),
				)
			);
		}

		$response     = $this->prepare_item_for_response( $post, $request );
		$data['data'] = $this->prepare_response_for_collection( $response );
		// Return all of our post response data.
		return $data;
	}

	/**
	 * Matches the post data to the schema we want.
	 *
	 * @param WP_Post         $post The comment object whose response is being prepared.
	 * @param WP_REST_Request $request Current request.
	 */
	public function prepare_item_for_response( $post, $request ) {

		$schema = $this->get_item_schema( $request );
		$fields = $this->get_fields_for_response( $request );

		$recipe_metas = get_post_meta( $post->ID, 'delicious_recipes_metadata', true );

		$data = array(
			'id'            => $post->ID,
			'recipe_metas'  => $recipe_metas,
			'recipe_status' => get_post_status( $post->ID ),
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
			'title'      => DELICIOUS_RECIPE_POST_TYPE,
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
 * Register our REST API routes.
 */
function delicious_recipe_pro_register_recipe_rest_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Recipe_Controller( DELICIOUS_RECIPE_POST_TYPE );
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipe_pro_register_recipe_rest_routes' );
