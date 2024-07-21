<?php
/**
 * Admin area settings and hooks.
 *
 * @package DR_PRO
 * @subpackage  DR_PRO
 */

namespace DR_PRO;

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class Delicious_Recipes_Pro_Public {

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
		$this->includes();

		// Allow 3rd party to remove hooks.
		do_action( 'wp_delicious_pro_public_unhook', $this );
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

		add_action( 'init', array( 'Delicious_Recipes_Pro_Shortcodes', 'init' ), 99999999 );

		// Public Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'set_translation_scripts' ), 99999999999 );
		add_filter( 'delicious_recipes_user_dashboard_menus', array( $this, 'filter_ud_menus' ) );
		add_filter( 'delicious_recipes_user_dashboard_svgs', array( $this, 'ud_menu_svgs' ) );
		// Add dynamic CSS.
		add_action( 'wp_head', array( $this, 'load_dynamic_css' ), 99 );

		// Hooks for sending emails.
		add_action( 'delicious_recipes_frontend_recipe_submitted', array( $this, 'new_recipe_submission' ), 20, 3 );
		add_action( 'transition_post_status', array( $this, 'track_recipe_published' ), 10, 3 );

		// Adds the floating bar to single recipe
		add_action( 'wp_footer', array( $this, 'get_floating_bar' ) );

		// Remove comments hooks and filter
		add_action(
			'wp_delicious_public_unhook',
			function( $instance ) {
				remove_action( 'comment_form_logged_in_after', array( $instance, 'dr_comment_form_rating_fields' ), 10, 1 );
				remove_action( 'comment_form_after_fields', array( $instance, 'dr_comment_form_rating_fields' ), 10, 1 );
				remove_action( 'comment_post', array( $instance, 'dr_save_comment_rating' ), 10, 1 );
				remove_filter( 'comment_text', array( $instance, 'dr_add_comment_review_after_text' ) );
			}
		);

		// Add the related posts content on recipe page.
		add_filter( 'the_content', array( $this, 'insert_related_recipes_content' ) );

	}

	public function set_translation_scripts() {
		wp_set_script_translations( 'dr-pro-usr-dashboard', 'delicious-recipes-pro' );
		wp_set_script_translations( 'delicious-recipes-pro', 'delicious-recipes-pro' );
	}

	/**
	 * Includes
	 *
	 * @return void
	 */
	private function includes() {
		if ( $this->is_request( 'frontend' ) ) {
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-shortcodes.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-template-hooks.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-emojis.php';
		}
	}

	/**
	 * Enqueue Public Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'delicious-recipes-pro', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/public/css/delicious-recipes-pro-public.css', array(), DELICIOUS_RECIPES_PRO_VERSION, 'all' );
		wp_enqueue_style( 'delicious-recipes-pro-new', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/publicCSS.css', array(), DELICIOUS_RECIPES_PRO_VERSION, 'all' );

		if ( is_recipe() ) {
			wp_enqueue_style( 'dropzone', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/dropzone/dropzone.min.css', array(), '5.9.2', 'all' );
			wp_enqueue_script( 'dropzone', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/dropzone/dropzone.min.js', array(), '5.9.2', true );
			wp_add_inline_script( 'dropzone', 'Dropzone.autoDiscover = false;' );
			wp_enqueue_style( 'magnific-popup', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/lib/magnific-popup/magnific-popup.min.css', array(), '1.1.0', 'all' );
			wp_enqueue_script( 'magnific-popup', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/lib/magnific-popup/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
		}

		$pro_ud_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/usrdashboard.asset.php';

		// Recipe usrdashboard screen assets.
		wp_register_script( 'dr-pro-usr-dashboard', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/usrdashboard.js', $pro_ud_deps['dependencies'], $pro_ud_deps['version'], true );

		$max_upload_size = delicious_recipes_get_max_upload_size();
		$global_settings = delicious_recipes_get_global_settings();

		// Add localization vars.
		wp_localize_script(
			'dr-pro-usr-dashboard',
			'DeliciousRecipesProUD',
			array(
				'siteURL'                => esc_url( home_url( '/' ) ),
				'pluginUrl'              => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
				'ajaxURL'                => admin_url( 'admin-ajax.php' ),
				'featuredImageNonce'     => wp_create_nonce( 'delicious-recipes-featured-image-nonce' ),
				'instructionsImageNonce' => wp_create_nonce( 'delicious-recipes-instructions-image-nonce' ),
				'galleryImagesNonce'     => wp_create_nonce( 'delicious-recipes-gallery-images-nonce' ),
				'maxUploadSize'          => esc_html( $max_upload_size ),
				'globalSettings'         => $global_settings,
				'maxUploadSizeBytes'     => wp_max_upload_size(),
			)
		);
		wp_enqueue_script( 'dr-pro-usr-dashboard' );

		wp_enqueue_script( 'infinite-scroll', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/infinite-scroll/infinite-scroll.pkgd.min.js', array( 'jquery' ), '4.0.1', true );

		if ( ! is_admin() && is_recipe() ) {
			wp_enqueue_script( 'delicious-recipes-pro', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/publicJS.js', array( 'jquery', 'wp-util' ), '', true );
			wp_enqueue_style( 'delicious-recipes-pro-public', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/publicJS.css', array(), '', 'all' );
		}

		$enable_autoload  = isset( $global_settings['autoloadRecipes']['0'] ) && 'yes' === $global_settings['autoloadRecipes']['0'] ? true : false;
		$autoload_perpage = isset( $global_settings['autoloadPerPage'] ) && $global_settings['autoloadPerPage'] ? absint( $global_settings['autoloadPerPage'] ) : 4;
		$autoload_filter  = isset( $global_settings['autoloadFilter'] ) && $global_settings['autoloadFilter'] ? esc_attr( $global_settings['autoloadFilter'] ) : 'prev';
		$enable_reaction  = isset( $global_settings['emojiReactions']['0'] ) && 'yes' === $global_settings['emojiReactions']['0'] ? true : false;

		$delicious_recipes_pro = array(
			'ajax_url'              => admin_url( 'admin-ajax.php' ),
			'upload_review_pic_msg' => __( 'Click here or Drop new images to upload your recipe review pictures', 'delicious-recipes-pro' ),
			'enable_autoload'       => $enable_autoload,
			'autoload_perpage'      => $autoload_perpage,
			'autoload_filter'       => $autoload_filter,
			'autoload_selector'     => apply_filters( 'wp_delicious_autoload_selector', '.wpdelicious-outer-wrapper .content-area' ),
			'autoload_append'       => apply_filters( 'wp_delicious_autoload_append_selector', '.dr-single-recipe' ),
			'enable_reaction'       => $enable_reaction,
		);

		wp_localize_script( 'delicious-recipes-pro', 'delicious_recipes_pro', $delicious_recipes_pro );

		wp_enqueue_style( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.css', array(), '2.1.4', 'all' );

		wp_enqueue_script( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.js', array( 'jquery' ), '2.1.4', true );

	}

	/**
	 * What type of request is this?
	 *
	 * @param  string $type admin, ajax, cron or frontend.
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();
			case 'ajax':
				return defined( 'DOING_AJAX' );
			case 'cron':
				return defined( 'DOING_CRON' );
			case 'frontend':
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}

	/**
	 * Get default global settings values.
	 *
	 * @return void
	 */
	public function filter_ud_menus( $dashboard_tabs = array() ) {

		$global_settings        = delicious_recipes_get_global_settings();
		$enableRecipeSubmission = isset( $global_settings['enableRecipeSubmission']['0'] ) && 'yes' === $global_settings['enableRecipeSubmission']['0'] ? true : false;

		if ( $enableRecipeSubmission ) {
			$user_dashboard_tabs = apply_filters(
				'delicious_recipes_pro_user_dashboard_tabs',
				array(
					'recipe-submission' => array(
						'menu_title'      => __( 'Submit Recipe', 'delicious-recipes-pro' ),
						'menu_class'      => 'dr-ud_tab recipe-submission',
						'menu_content_cb' => array( $this, 'recipe_submission' ),
						'priority'        => 8,
						'svg'             => delicious_recipes_get_svg( 'recipe-submission', 'dashboard', '#000000' ),
					),
					'my-recipes'        => array(
						'menu_title'      => __( 'My Recipes', 'delicious-recipes-pro' ),
						'menu_class'      => 'dr-ud_tab my-recipes',
						'menu_content_cb' => array( $this, 'user_recipes' ),
						'priority'        => 9,
						'svg'             => delicious_recipes_get_svg( 'my-recipes', 'dashboard', '#000000' ),
					),
				)
			);

			$dashboard_tabs = array_merge( $dashboard_tabs, $user_dashboard_tabs );
		}
		return $dashboard_tabs;
	}

	/**
	 * UD svgs.
	 *
	 * @return void
	 */
	public function ud_menu_svgs( $dashboard_svgs = array() ) {

		$user_dashboard_svgs = array(
			'recipe-submission' => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="15.139" viewBox="0 0 14 15.139"><defs>recipe-submission</defs><path id="Path_30799" data-name="Path 30799" d="M41.91,34.562a.91.91,0,0,1-1.283,0l-4.49-4.49V41.041a.9.9,0,0,1-.9.9h-.1a.9.9,0,0,1-.9-.9V30.071l-4.522,4.49a.907.907,0,0,1-1.283-1.283l6.286-6.286a.62.62,0,0,1,.9,0l6.286,6.286A.91.91,0,0,1,41.91,34.562Z" transform="translate(-28.175 -26.8)" fill="#374757" opacity="0.8" /></svg>',

			'my-recipes'        => '<svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="16.754" viewBox="0 0 17.5 16.754"><defs>my-recipes</defs><g id="Group_6112" data-name="Group 6112" transform="translate(0.5 0.5)"><path id="Path_30800" data-name="Path 30800" d="M20.9,80.3v1.961a.659.659,0,0,0,.659.659h8.8a.659.659,0,0,0,.659-.659V80.3Z" transform="translate(-17.708 -67.166)" fill="#fff"
			stroke="rgba(0,0,0,0)" stroke-width="1" /><path id="Path_30801" data-name="Path 30801" d="M15.183,6.2a3.5,3.5,0,0,0-1.215.208,3.788,3.788,0,0,0-6.454,0A3.574,3.574,0,0,0,6.3,6.2a3.8,3.8,0,0,0-.607,7.547v2.672H15.808V13.744A3.8,3.8,0,0,0,15.183,6.2Z" transform="translate(-2.5 -4.6)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-width="1" />
			</g></svg>',
		);

		$dashboard_svgs = array_merge( $dashboard_svgs, $user_dashboard_svgs );

		return $dashboard_svgs;
	}

	/**
	 * Recipe submission form UI
	 *
	 * @return void
	 */
	public function recipe_submission() {
		echo '<div id="dr-pro-submit-recipe" data-rest-nonce="' . wp_create_nonce( 'wp_rest' ) . '" data-guest-mode="' . false . '"></div>';
	}

	/**
	 * Recipe Listing in User Dahboard.
	 *
	 * @return void
	 */
	public function user_recipes() {
		echo '<div id="dr-pro-urlist" data-rest-nonce="' . wp_create_nonce( 'wp_rest' ) . '"></div>';
	}

	/**
	 * Load Dynamic CSS values.
	 *
	 * @return void
	 */
	public function load_dynamic_css() {

		if ( is_recipe_pro_shortcode() ) {
			delicious_recipes_get_template( 'global/dynamic-css.php' );
		}
	}

	/**
	 * New Recipe submission notification email.
	 *
	 * @param int   $customer_id  Customer ID.
	 * @param array $recipe_id    Recipe ID.
	 */
	public function new_recipe_submission( $customer_id, $recipe_id, $disable_email = false ) {

		$global_settings    = delicious_recipes_get_global_settings();
		$enableNotification = isset( $global_settings['enableNotification']['0'] ) && 'yes' === $global_settings['enableNotification']['0'] ? true : false;

		if ( ! $customer_id || ! $enableNotification || $disable_email ) {
			return;
		}

		// Email Notification to Admin
		include plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/classes/emails/admin-new-recipe-submission.php';
		$email = new \Admin_New_Recipe_Submission();
		$email->trigger( $customer_id, $recipe_id );

		$enablePendingMode = isset( $global_settings['enablePendingMode']['0'] ) && 'yes' === $global_settings['enablePendingMode']['0'] ? true : false;

		// Email Notification to Customer
		if ( $enablePendingMode ) {
			include plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/classes/emails/new-recipe-submission.php';
			$email = new \New_Recipe_Submission();
			$email->trigger( $customer_id, $recipe_id );
		} else {
			include plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/classes/emails/recipe-published.php';
			$email = new \Recipe_Published();
			$email->trigger( $customer_id, $recipe_id );
		}

	}

	/**
	 * Send a recipe published email when a recipe is published.
	 *
	 * @param string $new_status New post_status.
	 * @param string $old_status Previous post_status.
	 * @param object $post WordPress post.
	 */
	public function track_recipe_published( $new_status, $old_status, $post ) {
		$global_settings    = delicious_recipes_get_global_settings();
		$enableNotification = isset( $global_settings['enableNotification']['0'] ) && 'yes' === $global_settings['enableNotification']['0'] ? true : false;

		if (
			DELICIOUS_RECIPE_POST_TYPE !== $post->post_type ||
			'publish' !== $new_status ||
			'publish' === $old_status ||
			! $enableNotification ||
			! user_can( $post->post_author, 'edit_delicious_recipes' )
		) {
			return;
		}

		// Email Notification to Customer
		include plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/classes/emails/recipe-published.php';
		$email = new \Recipe_Published();
		$email->trigger( $post->post_author, $post->ID );
	}

	/*
	 * Adds the floating bar to single recipe
	 */
	function get_floating_bar() {

		$global_settings   = delicious_recipes_get_global_settings();
		$enableFloatingBar = isset( $global_settings['enableFloatingBar']['0'] ) && 'yes' === $global_settings['enableFloatingBar']['0'] ? true : false;

		if ( ! is_recipe() || ! $enableFloatingBar ) {
			return;
		}

		if ( isset( $_GET['print_recipe'] ) && 'true' == $_GET['print_recipe'] ) {
			return;
		}

		ob_start();

			delicious_recipes_pro_get_template( 'recipe/floating-bar.php' );

			delicious_recipes_pro_get_template( 'recipe/exit-reading-mode.php' );

		echo ob_get_clean();

	}

	/**
	 * Insert Related Recipes Posts Content into the single recipe page.
	 */
	public function insert_related_recipes_content( $content ) {
		if ( ! is_recipe() ) {
			return $content;
		}

		$global_settings        = delicious_recipes_get_global_settings();
		$enable_related_recipes = isset( $global_settings['relatedRecipes']['0'] ) && 'yes' === $global_settings['relatedRecipes']['0'] ? true : false;
		if ( ! $enable_related_recipes ) {
			return $content;
		}

		$show_after      = isset( $global_settings['showAfterParagraph'] ) ? absint( $global_settings['showAfterParagraph'] ) : 3;
		$paragraph_count = substr_count( $content, '</p>' );
		$paragraph_id    = $paragraph_count < $show_after ? -1 : $show_after;

		if ( ( $paragraph_count < $show_after ) || $show_after == 0 ) {
			$content = delicious_recipes_pro_get_related_recipes_content() . $content;
		} else {
			$content = delicious_recipes_pro_insert_after_paragraph( delicious_recipes_pro_get_related_recipes_content(), $paragraph_id, $content );
		}

		return $content;
	}

}
