<?php
/**
 * AJAX Functions.
 *
 * @package DELICIOUS_RECIPES_PRO
 * @subpackage  DELICIOUS_RECIPES_PRO
 */

namespace DR_PRO;

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class AjaxFunctions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {
		// Initialize hooks.
		$this->init_hooks();

		// Allow 3rd party to remove hooks.
		do_action( 'wfe_ajaxfunctions_unhook', $this );
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {
		add_action( 'wp_ajax_delicious_recipes_featured_image_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_nopriv_delicious_recipes_featured_image_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_delicious_recipes_instructions_image_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_nopriv_delicious_recipes_instructions_image_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_delicious_recipes_gallery_images_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_nopriv_delicious_recipes_gallery_images_upload', array( $this, 'upload_recipe_image' ) );
		add_action( 'wp_ajax_delicious_recipes_review_images_upload', array( $this, 'upload_recipe_review_images' ) );
		add_action( 'wp_ajax_nopriv_delicious_recipes_review_images_upload', array( $this, 'upload_recipe_review_images' ) );

		// Ajax for adding featured equipment meta
		add_action( 'wp_ajax_featured_equipment', array( $this, 'featured_equipment_admin_ajax' ) );
	}

	/**
	 * Upload recipe image.
	 *
	 * @return void
	 */
	public static function upload_recipe_image() {

		$nonce_verified = false;

		if ( $_REQUEST['action'] && 'delicious_recipes_featured_image_upload' === $_REQUEST['action'] ) {
			$nonce_verified = wp_verify_nonce( $_REQUEST['nonce'], 'delicious-recipes-featured-image-nonce' );
		}

		if ( $_REQUEST['action'] && 'delicious_recipes_instructions_image_upload' === $_REQUEST['action'] ) {
			$nonce_verified = wp_verify_nonce( $_REQUEST['nonce'], 'delicious-recipes-instructions-image-nonce' );
		}

		if ( $_REQUEST['action'] && 'delicious_recipes_gallery_images_upload' === $_REQUEST['action'] ) {
			$nonce_verified = wp_verify_nonce( $_REQUEST['nonce'], 'delicious-recipes-gallery-images-nonce' );
		}

		if ( ! empty( $_FILES ) && $nonce_verified ) :

			$allowed_filetypes = array( 'image/jpeg', 'image/png', 'image/gif', 'image/webp' );

			$_uploads   = wp_upload_dir();
			$dr_tmp_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/tmp';
			$dr_tmp_url = str_replace( array( 'http://', 'https://' ), '//', trailingslashit( $_uploads['baseurl'] ) . 'delicious-recipes/tmp' );

			$source      = $_FILES['file']['tmp_name'];
			$salt        = md5( $_FILES['file']['name'] . time() );
			$file_name   = $salt . '-' . $_FILES['file']['name'];
			$destination = trailingslashit( $dr_tmp_dir ) . $file_name;

			$upload_url        = trailingslashit( $dr_tmp_url ) . $file_name;
			$uploaded_filetype = wp_check_filetype( basename( $destination ), null );

			$uploaded_filesize = $_FILES['file']['size'];
			$max_upload_size   = wp_max_upload_size();

			if ( $uploaded_filesize > $max_upload_size ) {
				wp_send_json_error( array( 'message' => __( 'File size too large.', 'delicious-recipes-pro' ) ) );
			}

			if ( ! in_array( $uploaded_filetype['type'], $allowed_filetypes ) ) {
				wp_send_json_error( array( 'message' => __( 'Unsupported file type uploaded.', 'delicious-recipes-pro' ) ) );
			}

			if ( wp_mkdir_p( $dr_tmp_dir ) ) :
				if ( move_uploaded_file( $source, $destination ) ) :

					$file_array = array(
						'file' => $destination,
						'url'  => $upload_url,
						'type' => $uploaded_filetype,
					);
					echo json_encode( $file_array );
					wp_die();

				endif;
			endif;
		endif;

		wp_send_json_error( __( 'Invalid request. Nonce verification failed.', 'delicious-recipes-pro' ) );
	}

	/**
	 * Upload recipe image.
	 *
	 * @return void
	 */
	public static function upload_recipe_review_images() {

		$nonce_verified = false;

		if ( $_REQUEST['action'] && 'delicious_recipes_review_images_upload' === $_REQUEST['action'] ) {
			$nonce_verified = wp_verify_nonce( $_REQUEST['nonce'], 'delicious-recipes-review-images-nonce' );
		}

		$recipe_id = isset( $_REQUEST['recipe_id'] ) ? absint( $_REQUEST['recipe_id'] ) : false;

		if ( ! empty( $_FILES ) && $nonce_verified && $recipe_id ) :

			$allowed_filetypes = array( 'image/jpeg', 'image/png', 'image/gif', 'image/webp' );

			$_uploads   = wp_upload_dir();
			$dr_tmp_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/tmp';
			$dr_tmp_url = str_replace( array( 'http://', 'https://' ), '//', trailingslashit( $_uploads['baseurl'] ) . 'delicious-recipes/tmp' );

			$files         = $_FILES['gallery'];
			$review_images = array();
			foreach ( $files['name'] as $key => $value ) {
				$source      = $files['tmp_name'][ $key ];
				$salt        = md5( $files['name'][ $key ] . time() );
				$file_name   = $salt . '-' . $files['name'][ $key ];
				$destination = trailingslashit( $dr_tmp_dir ) . $file_name;

				$upload_url        = trailingslashit( $dr_tmp_url ) . $file_name;
				$uploaded_filetype = wp_check_filetype( basename( $destination ), null );

				$uploaded_filesize = $files['size'][ $key ];
				$max_upload_size   = wp_max_upload_size();

				if ( $uploaded_filesize > $max_upload_size ) {
					wp_send_json_error( array( 'message' => __( 'File size too large.', 'delicious-recipes-pro' ) ) );
				}

				if ( ! in_array( $uploaded_filetype['type'], $allowed_filetypes ) ) {
					wp_send_json_error( array( 'message' => __( 'Unsupported file type uploaded.', 'delicious-recipes-pro' ) ) );
				}

				if ( wp_mkdir_p( $dr_tmp_dir ) ) :
					if ( move_uploaded_file( $source, $destination ) ) :

						$file_array      = array(
							'file' => $destination,
							'url'  => $upload_url,
							'type' => $uploaded_filetype,
						);
						$image_file      = sanitize_text_field( wp_normalize_path( $destination ) );
						$attachment_id   = delicious_recipes_pro_set_custom_image( $image_file, $recipe_id, 'review_image', $key );
						$review_images[] = $attachment_id;

					endif;
				endif;
			}
			echo json_encode( array( 'attachment_ids' => $review_images ) );
			wp_die();

		endif;

		wp_send_json_error( __( 'Invalid request. Nonce verification failed.', 'delicious-recipes-pro' ) );
	}

	/**
	 * Ajax for adding featured equipment meta
	 * */
	public function featured_equipment_admin_ajax() {
		if ( ! wp_verify_nonce( $_POST['nonce'], 'wp_delicious_featured_equipment_nonce' ) ) {
			exit( 'invalid' );
		}

		header( 'Content-Type: application/json' );
		$post_id         = intval( $_POST['post_id'] );
		$featured_status = esc_attr( get_post_meta( $post_id, 'wp_delicious_featured_equipment', true ) );
		$new_status      = $featured_status == 'yes' ? 'no' : 'yes';
		update_post_meta( $post_id, 'wp_delicious_featured_equipment', $new_status );
		echo json_encode(
			array(
				'ID'         => $post_id,
				'new_status' => $new_status,
			)
		);
		die();
	}

}
new AjaxFunctions();
