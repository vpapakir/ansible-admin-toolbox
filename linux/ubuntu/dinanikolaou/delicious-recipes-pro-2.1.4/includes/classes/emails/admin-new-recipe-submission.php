<?php
/**
 * Class Admin_New_Recipe_Submission file.
 *
 * @package Delicious_Recipes_Pro
 * @since  1.2.0
 */

use WP_Delicious\EmailHelpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Admin_New_Recipe_Submission', false ) ) :

	/**
	 * New Recipe Submission.
	 *
	 * An email sent to the admin when a recipe is submitted.
	 *
	 * @class       Admin_New_Recipe_Submission
	 * @extends     EmailHelpers
	 */
	class Admin_New_Recipe_Submission extends EmailHelpers {

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
			$this->template_html = 'emails/admin-new-recipe-submission.php';
			$this->placeholders  = array(
				'{username}'    => '',
				'{recipe_id}'   => '',
				'{recipe_link}' => '',
			);

			// Call parent constructor.
			parent::__construct();

			$this->recipient = $this->get_recipient();
		}

		/**
		 * Get email addresses.
		 *
		 * @return string
		 */
		public function get_recipient() {
			$recipients = delicious_recipes_get_array_values_by_index( $this->settings, 'emailAddresses', '' );
			$recipients = array_map( 'trim', explode( ',', $recipients ) );
			$recipients = array_filter( $recipients, 'is_email' );
			$recipients = $recipients ? implode( ', ', $recipients ) : get_option( 'admin_email' );
			return $recipients;
		}

		/**
		 * Get email subject.
		 *
		 * @return string
		 */
		public function get_default_subject() {
			$subject = __( '[{site_title}]: New recipe submission has been received!', 'delicious-recipes-pro' );
			return $subject;
		}

		/**
		 * Trigger.
		 *
		 * @param int $user_id User ID.
		 * @param int $recipe_id Recipe ID.
		 */
		public function trigger( $user_id, $recipe_id ) {

			if ( $user_id ) {
				$this->object = new \WP_User( $user_id );

				$this->user_login                    = stripslashes( $this->object->user_login );
				$this->user_email                    = stripslashes( $this->object->user_email );
				$this->placeholders['{username}']    = $this->user_login;
				$this->placeholders['{recipe_id}']   = $recipe_id;
				$this->placeholders['{recipe_link}'] = esc_url( get_edit_post_link( $recipe_id ) );

			}

			if ( $this->get_recipient() ) {
				$this->send(
					$this->get_recipient(),
					$this->get_subject(),
					$this->get_content(),
					$this->get_headers(),
					$this->get_attachments()
				);
			}

		}

		/**
		 * Get content html.
		 *
		 * @return string
		 */
		public function get_content_html() {
			ob_start();

			$this->email_header();

			echo wpautop( wptexturize( delicious_recipes_pro_get_template_html( $this->template_html ) ) );

			$this->email_footer();

			return ob_get_clean();
		}

	}

endif;
