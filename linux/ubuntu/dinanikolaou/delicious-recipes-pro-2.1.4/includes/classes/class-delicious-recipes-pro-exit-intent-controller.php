<?php
/**
 * REST API: Delicious_Recipes_Pro_Exit_Intent_Controller class
 *
 * @package Delicious_Recipes_Pro
 * @subpackage API Core
 * @since 2.1.2
 */

/**
 * Core base controller for getting users data for exit intent.
 *
 * @since 1.6.5
 */

class Delicious_Recipes_Pro_Exit_Intent_Controller {

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
            '/exit-intent',
            array(
                array(
                    'methods'             => WP_REST_Server::EDITABLE,
                    'callback'            => array( $this, 'post_users_data' ),
                    'permission_callback' => '__return_true',
                ),
            )
        );
    }

    /**
     * Post Users Data.
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_REST_Response
     */
    public function post_users_data( $request ) {
		$formdata      = $request->get_json_params();
		$user_email    = wp_get_current_user()->user_email;

        $post_id = sanitize_text_field( $formdata['post_id'] );
        $ip = sanitize_text_field( $formdata['ip'] );

		$comments = get_comments();
		$found = false;
        if ( comments_open() ){
            foreach ($comments as $comment) {
                if ($user_email === $comment->comment_author_email && $post_id === $comment->comment_post_ID) {
                    $found = true;
                    break;
                } else if ($ip === $comment->comment_author_IP && $post_id === $comment->comment_post_ID) {
                    $found = true;
                    break;
                }
            }
        }

		$data = array(
			'success' => true,
			'message' => __( 'Success', 'delicious-recipes-pro' ),
			'data'    => $found,
		);

		return $data;
	}
}

/**
 * Register the Exit Intent REST API controller.
 */
function delicious_recipes_pro_exit_intent_controller() {
    $controller = new Delicious_Recipes_Pro_Exit_Intent_Controller();
    $controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_pro_exit_intent_controller' );

