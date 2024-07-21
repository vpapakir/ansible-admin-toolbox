<?php
/**
 * Class Recipe_Published file.
 *
 * @package Delicious_Recipes_Pro
 * @since  1.0.0
 */

use WP_Delicious\EmailHelpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Recipe_Published', false ) ) :

	/**
	 * New Recipe Submission.
	 *
	 * An email sent to the customer and admin when a recipe is submitted.
	 *
	 * @class       Recipe_Published
	 * @extends     EmailHelpers
	 */
	class Recipe_Published extends EmailHelpers {

		/**
		 * User login name.
		 *
		 * @var string
		 */
		public $user_login;

		/**
		 * User email.
		 *
		 * @var string
		 */
		public $user_email;

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->template_html = 'emails/recipe-published.php';
			$this->placeholders  = array(
				'{username}'    => '',
				'{recipe_id}'   => '',
				'{recipe_link}' => '',
			);

			// Call parent constructor.
			parent::__construct();
		}

		/**
		 * Get email subject.
		 *
		 * @return string
		 */
		public function get_default_subject() {
			$subject = delicious_recipes_get_array_values_by_index( $this->settings, 'recipePublishedSubject', '' );
			$subject = empty( $subject ) ? __( 'Your recipe submission has been published!', 'delicious-recipes-pro' ) : $subject;
			return $subject;
		}

		/**
		 * Trigger.
		 *
		 * @param int    $user_id User ID.
		 * @param string $user_pass User password.
		 * @param bool   $password_generated Whether the password was generated automatically or not.
		 */
		public function trigger( $user_id, $recipe_id ) {

			if ( $user_id ) {
				$this->object = new \WP_User( $user_id );

				$this->user_login                    = stripslashes( $this->object->user_login );
				$this->user_email                    = stripslashes( $this->object->user_email );
				$this->recipient                     = $this->user_email;
				$this->placeholders['{username}']    = $this->user_login;
				$this->placeholders['{recipe_id}']   = $recipe_id;
				$this->placeholders['{recipe_link}'] = esc_url( get_permalink( $recipe_id ) );

			}

			$email_already_sent = get_post_meta( $recipe_id, '_dr_recipe_published_email_sent', true );

			if ( 'true' === $email_already_sent ) {
				return;
			}

			if ( $this->get_recipient() ) {
				$this->send(
					$this->get_recipient(),
					$this->get_subject(),
					$this->get_content(),
					$this->get_headers(),
					$this->get_attachments()
				);

				update_post_meta( $recipe_id, '_dr_recipe_published_email_sent', 'true' );
			}

		}

		/**
		 * Get content html.
		 *
		 * @return string
		 */
		public function get_content_html() {

			$custom = delicious_recipes_pro_get_template_content( 'recipe_published', $this->template_html );

			$content = $custom ? $custom : delicious_recipes_pro_get_template_html( $this->template_html );

			ob_start();

			$this->email_header();

			echo wpautop( wptexturize( $content ) );

			$this->email_footer();

			return ob_get_clean();
		}

	}

endif;
