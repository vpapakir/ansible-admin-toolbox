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
class Delicious_Recipes_Pro_Admin{

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
		do_action( 'wp_delicious_admin_unhook', $this );
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
		// Admin Scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		// Admin Script Translations
		add_action( 'enqueue_block_editor_assets', array( $this, 'get_editor_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'set_script_translations' ), 99999999999 );

		add_filter( 'delicious_recipes_global_settings_defaults', array( $this, 'global_settings_defaults' ) );

		// register post type.
		add_action( 'init', array( $this, 'register_post_types' ) );

		// Add meta box.
		add_action( 'add_meta_boxes', array( $this, 'add_new_equipment_metabox' ) );

		// Add ADMIN COLUMN - HEADERS
		add_filter( 'manage_edit-equipment_columns', array( $this, 'equipment_columns' ) );

		// ADMIN COLUMN - Featured CONTENT
		add_action( 'manage_equipment_posts_custom_column', array( $this, 'featured_equipments' ), 10, 2 );

		// Add Submissions(count) view in recipe
		add_filter( 'views_edit-recipe', array( $this, 'add_submissions_view' ), 10, 1 );

		// Add custom query var
		add_filter( 'query_vars', array( $this, 'add_meta_query_vars' ) );

		// Manipulate query
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts_submission_query' ) );
	}

	/**
	 * Enqueue Admin Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		$screen         = get_current_screen();
		$global_deps    = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/global.asset.php';
		$recipe_deps    = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/recipe.asset.php';
		$equipment_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/equipment.asset.php';
		$analytics_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/analytics.asset.php';

		wp_enqueue_media();

		wp_enqueue_style( 'delicious-recipes-pro-admin', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/admin/css/delicious-recipes-pro-admin.css', array(), DELICIOUS_RECIPES_PRO_VERSION, 'all' );
		wp_enqueue_style( 'delicious-recipes-pro-admin-styles', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/adminCSS.css', array(), DELICIOUS_RECIPES_PRO_VERSION, 'all' );

		wp_enqueue_script( 'delicious-recipes-pro-admin', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/admin/js/delicious-recipes-pro-admin.js', array( 'jquery' ), DELICIOUS_RECIPES_PRO_VERSION, true );

		if ( strpos( $screen->id, '_page_delicious_recipes_global_settings' ) > 0 ) {

			// Recipe global screen assets.
			wp_register_script( 'delicious-recipes-pro-global-settings', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/global.js', $global_deps['dependencies'], $global_deps['version'], true );

			$default_templates = array(
				'newRecipeSubmissionContent' => delicious_recipes_pro_get_template_content( 'new_submission', 'emails/new-recipe-submission.php', 'customer', true ),
				'recipePublishedContent'     => delicious_recipes_pro_get_template_content( 'recipe_published', 'emails/recipe-published.php', 'customer', true ),
			);

			// Add localization vars.
			wp_localize_script(
				'delicious-recipes-pro-global-settings',
				'DeliciousRecipesPro',
				array(
					'siteURL'          => esc_url( home_url( '/' ) ),
					'pluginUrl'        => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
					'defaultTemplates' => $default_templates,
				)
			);
			wp_enqueue_script( 'delicious-recipes-pro-global-settings' );


		}

		if ( $screen->post_type == DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE ) {
			// Equipment screen assets.
			wp_register_script( 'delicious-recipes-pro-equipment-settings', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/equipment.js', $equipment_deps['dependencies'], $equipment_deps['version'], true );

			// Add localization vars.
			wp_localize_script(
				'delicious-recipes-pro-equipment-settings',
				'DeliciousRecipesPro',
				array(
					'siteURL'   => esc_url( home_url( '/' ) ),
					'pluginUrl' => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
				)
			);
			wp_enqueue_script( 'delicious-recipes-pro-equipment-settings' );

			wp_enqueue_style( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.css', array(), '2.1.4', 'all' );

			wp_enqueue_script( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.js', array( 'jquery' ), '2.1.4', true );
		}

		if ( $screen->post_type == DELICIOUS_RECIPE_POST_TYPE ) {
			// recipe screen assets.
			wp_register_script( 'delicious-recipes-pro-recipe-settings', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/recipe.js', $recipe_deps['dependencies'], $recipe_deps['version'], true );

			// Add localization vars.
			wp_localize_script(
				'delicious-recipes-pro-recipe-settings',
				'DeliciousRecipeSettings',
				array(
					'siteURL'   => esc_url( home_url( '/' ) ),
					'pluginUrl' => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
				)
			);
			wp_enqueue_script( 'delicious-recipes-pro-recipe-settings' );
		}

		if ( strpos( $screen->id, '_page_delicious_recipes_reviews' ) > 0 || 'comment' === $screen->id ) {

			wp_enqueue_style( 'jquery-rateyo', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/jquery-rateyo/jquery.rateyo.min.css', array(), '2.3.2', 'all' );
			wp_enqueue_script( 'jquery-rateyo', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/jquery-rateyo/jquery.rateyo.min.js', array( 'jquery' ), '2.3.2', true );
		}

		if ( isset( $screen->id ) && strpos( $screen->id, '_page_delicious_recipes_analytics_dashboard' ) > 0 ) {

			wp_enqueue_style( 'delicious-recipes-pro-analytics', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/admin/css/delicious-recipes-pro-analytics.css', array(), DELICIOUS_RECIPES_PRO_VERSION, 'all' );

			wp_register_script( 'delicious-recipes-analytics', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/analytics.js', $analytics_deps['dependencies'], $analytics_deps['version'], true );

			// Add localization vars.
			wp_localize_script(
				'delicious-recipes-analytics',
				'DeliciousRecipesAnalytics',
				array(
					'ajaxURL'   => esc_url( admin_url( 'admin-ajax.php' ) ),
					'siteURL'   => esc_url( home_url( '/' ) ),
					'adminURL'  => esc_url( admin_url() ),
					'pluginUrl' => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
					'greetings' => array(
						'morning'   => __( 'Good Morning', 'delicious-recipes-pro' ),
						'afternoon' => __( 'Good Afternoon', 'delicious-recipes-pro' ),
						'evening'   => __( 'Good Evening', 'delicious-recipes-pro' ),
					),
				)
			);
			wp_enqueue_script( 'delicious-recipes-analytics' );
		}

		if ( isset( $screen->id ) && strpos( $screen->id, '_page_delicious_recipes_reviews' ) > 0 ) {

			$reviews_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/reviews.asset.php';

			wp_register_script( 'delicious-recipes-reviews', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/reviews.js', $reviews_deps['dependencies'], $reviews_deps['version'], true );

			// Add localization vars.
			wp_localize_script(
				'delicious-recipes-reviews',
				'DeliciousRecipesReviews',
				array(
					'ajaxURL'        => esc_url( admin_url( 'admin-ajax.php' ) ),
					'siteURL'        => esc_url( home_url( '/' ) ),
					'adminURL'       => esc_url( admin_url() ),
					'pluginUrl'      => esc_url( plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) ),
					'userID'         => get_current_user_id(),
					'allRecipes'     => delicious_recipes_pro_get_all_recipes(),
					'globalSettings' => delicious_recipes_get_global_settings(),
				)
			);

			wp_enqueue_script( 'delicious-recipes-reviews' );

		}

		if ( isset( $screen->id ) && strpos( $screen->id, '_page_delicious_recipes_auto_link_ingredients' ) > 0 ) {
			$auto_link_ingredients_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/autoLinkIngredients.asset.php';

			wp_register_script( 'delicious-recipes-ingredient-links', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/autoLinkIngredients.js', $auto_link_ingredients_deps['dependencies'], $auto_link_ingredients_deps['version'], true );
			wp_localize_script(
				'delicious-recipes-ingredient-links',
				'deliciousRecipesIngredientLinks',
				array(
					'pluginURL' => plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ),
					'siteURL'   => get_site_url(),
					'nonce'     => wp_create_nonce( 'delicious_recipes_auto_link_ingredients' ),
				)
			);
			wp_enqueue_script( 'delicious-recipes-ingredient-links' );
			wp_enqueue_style( 'delicious-recipes-ingredient-links', plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/autoLinkIngredients.css', array( 'wp-components' ), DELICIOUS_RECIPES_PRO_VERSION, 'all' );
			wp_enqueue_style( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.css', array(), '2.1.4', 'all' );
			wp_enqueue_script( 'toastr', plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) . 'assets/lib/toastr/toastr.min.js', array( 'jquery' ), '2.1.4', true );
		}
	}

	/**
	 * Enqueue Block Editor Assets.
	 */
	public function get_editor_assets() {
		$blocks_deps = include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/blocksJS.asset.php';
		// Scripts.
		wp_enqueue_script(
			'delicious-recipes-pro-block-js', // Handle.
			plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/build/blocksJS.js',
			$blocks_deps['dependencies'],
			$blocks_deps['version'],
			true
		);
	}

	/**
	 * Set Script Translations
	 *
	 * @return void
	 */
	public function set_script_translations() {
		wp_set_script_translations( 'delicious-recipes-pro-global-settings', 'delicious-recipes-pro' ); // Global Settings.
		wp_set_script_translations( 'delicious-recipes-pro-recipe-settings', 'delicious-recipes-pro' ); // Recipe Settings.
		wp_set_script_translations( 'delicious-recipes-pro-equipment-settings', 'delicious-recipes-pro' ); // Equipment Settings.
		wp_set_script_translations( 'delicious-recipes-analytics', 'delicious-recipes-pro' ); // Analytics Settings.
		wp_set_script_translations( 'delicious-recipes-reviews', 'delicious-recipes-pro' ); // Review Listings.
		wp_set_script_translations( 'delicious-recipes-pro-block-js', 'delicious-recipes-pro' ); // Block Editor.
		wp_set_script_translations( 'delicious-recipes-ingredient-links', 'delicious-recipes-pro' ); // Ingredient Links.
	}

	/**
	 * Get default global settings values.
	 *
	 * @return void
	 */
	public function global_settings_defaults( $global_defaults = array() ) {

		$pro_defaults = apply_filters(
			'delicious_recipes_global_settings_pro_defaults',
			array(
				// Additional Ingredients fields.
				'showIngredientsImage'          => array(),
				'displayUnitConversion'         => array(),
				'defaultUnitSystem'             => 'usCustomary',

				'enableRecipeSubmission'        => array(
					'0' => 'yes',
				),
				'recipeSubmissionGuideline'     => '',
				'recipeDisclaimer'              => '',
				'enableNotification'            => array(
					'0' => 'yes',
				),
				'emailAddresses'                => '',
				'enablePendingMode'             => array(
					'0' => 'yes',
				),
				'enableGuestMode'               => array(
					'0' => 'yes',
				),
				'allowDeleteRecipe'             => array(),
				// Email Templates fields
				'newRecipeSubmissionSubject'    => __( 'Your recipe submission has been received!', 'delicious-recipes-pro' ),
				'newRecipeSubmissionContent'    => '',
				'recipePublishedSubject'        => __( 'Your recipe submission has been published!', 'delicious-recipes-pro' ),
				'recipePublishedContent'        => '',

				'recipeFieldsOrder'             => array(
					'0' => array(
						'id'           => 'recipe-details',
						'sectionTitle' => __( 'Recipe Details', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'1' => array(
						'id'           => 'recipe-info',
						'sectionTitle' => __( 'Recipe Card Information', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'2' => array(
						'id'           => 'recipe-ingredients',
						'sectionTitle' => __( 'Ingredients', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'3' => array(
						'id'           => 'recipe-instructions',
						'sectionTitle' => __( 'Instruction', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'4' => array(
						'id'           => 'recipe-gallery',
						'sectionTitle' => __( 'Gallery', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'5' => array(
						'id'           => 'recipe-nutrition',
						'sectionTitle' => __( 'Nutrition Facts', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
					'6' => array(
						'id'           => 'recipe-notes',
						'sectionTitle' => __( 'Notes', 'delicious-recipes-pro' ),
						'enable'       => array( '0' => 'yes' ),
					),
				),
				'enableCookMode'                => array(
					'0' => 'yes',
				),
				'enableFloatingBar'             => array(
					'0' => 'yes',
				),
				'floatingBarToggles'            => array(
					'0' => array(
						'label'  => __( 'Start Reading Mode', 'delicious-recipes-pro' ),
						'key'    => 'startReadingMode',
						'id'     => 'dr-reading-mode',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'1' => array(
						'label'  => __( 'Start Timer', 'delicious-recipes-pro' ),
						'key'    => 'startTimer',
						'id'     => 'dr-start-timer',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'2' => array(
						'label'  => __( 'Share', 'delicious-recipes-pro' ),
						'key'    => 'socialShare',
						'id'     => 'dr-social-share',
						'enable' => array(
							'0' => 'yes',
						),
					),
				),
				'enableEquipments'              => array(
					'0' => 'yes',
				),
				'equipmentLayout'               => 'grid',
				'equipmentPerRow'               => 3,
				'enableQuestions'               => array(
					'0' => 'yes',
				),
				'enableRatingsWithoutComment'   => array(
					'0' => 'yes',
				),
				'ratingForceComment'            => '1',
				'enableReviewImages'            => array(
					'0' => 'yes',
				),
				'relatedRecipes'                => array(),
				'relatedSectionTitle'           => __( 'Related Recipes', 'delicious-recipes-pro' ),
				'relatedFilter'                 => 'recipe-course',
				'showThumbnail'                 => array(
					'0' => 'yes',
				),
				'fullwidthRelatedSection'       => array(),
				'showAfterParagraph'            => 3,
				'noofRelatedRecipes'            => 3,
				'autoloadRecipes'               => array(),
				'autoloadPerPage'               => 4,
				'autoloadFilter'                => 'prev',
				'affiliateDisclosure'           => '',
				'enableDisclosureSingle'        => array(),
				'disclosureLocation'            => 'top',
				'enableDisclosureEquipment'     => array(),
				'enableDisclosureRecipeCard'    => array(),
				'emojiReactions'                => array(),
				'enableUniqueReactions'         => array(
					'0' => 'yes',
				),
				'emojiSectionTitle'             => __( "What's Your Reaction?", 'delicious-recipes-pro' ),
				'emojiReactionsList'            => array(
					'0'  => array(
						'label'  => __( 'Reaction - Yummy', 'delicious-recipes-pro' ),
						'id'     => 'yummy',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'1'  => array(
						'label'  => __( 'Reaction - Love', 'delicious-recipes-pro' ),
						'id'     => 'love',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'2'  => array(
						'label'  => __( 'Reaction - Wow', 'delicious-recipes-pro' ),
						'id'     => 'wow',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'3'  => array(
						'label'  => __( 'Reaction - Happy', 'delicious-recipes-pro' ),
						'id'     => 'happy',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'4'  => array(
						'label'  => __( 'Reaction - Sad', 'delicious-recipes-pro' ),
						'id'     => 'sad',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'5'  => array(
						'label'  => __( 'Reaction - Yay', 'delicious-recipes-pro' ),
						'id'     => 'yay',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'6'  => array(
						'label'  => __( 'Reaction - Rolf', 'delicious-recipes-pro' ),
						'id'     => 'rolf',
						'enable' => array(),
					),
					'7'  => array(
						'label'  => __( 'Reaction - Smiling', 'delicious-recipes-pro' ),
						'id'     => 'smiling',
						'enable' => array(),
					),
					'8'  => array(
						'label'  => __( 'Reaction - Sleepy', 'delicious-recipes-pro' ),
						'id'     => 'sleepy',
						'enable' => array(),
					),
					'9'  => array(
						'label'  => __( 'Reaction - Angry', 'delicious-recipes-pro' ),
						'id'     => 'angry',
						'enable' => array(),
					),
					'10' => array(
						'label'  => __( 'Reaction - Dead', 'delicious-recipes-pro' ),
						'id'     => 'dead',
						'enable' => array(
							'0' => 'yes',
						),
					),
					'11' => array(
						'label'  => __( 'Reaction - Wink', 'delicious-recipes-pro' ),
						'id'     => 'wink',
						'enable' => array(),
					),
				),
				'emojiIconSize'                 => '48',
				'emojiLocation'                 => 'center',

				// for ratings review.
				'enableWouldYouRecommend'       => array(),
				'enableDidYouMake'              => array(),
				'enableReviewTags'              => array(),
				'reviewTags'                    => array(),
				'wouldYouRecommendLabel'        => 'Would you recommend this recipe?',
				'didYouMakeLabel'               => 'Did you make this recipe?',
				'enableExitIntent'              => array(),

				// for nutrition calculator.
				'enableAutoNutritionCalculator' => array(),
				'nutritionCalculatorAppId'      => '',
				'nutritionCalculatorAppKey'     => '',

				//for CTA
				'globalCTAImage'                => array(),
				'globalCTALink'                 => '',
				'globalCTAOpenInNewTab'         => array(),
				'globalCTAAttributes'           => array(),
			)
		);

		$global_defaults = array_merge( $global_defaults, $pro_defaults );

		return $global_defaults;
	}

	/**
	 * Add equipment post type.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_post_types() {

		// Post Type labels.
		$labels = array(
			'name'               => _x( 'Equipment', 'post type general name', 'delicious-recipes-pro' ),
			'singular_name'      => _x( 'Equipment', 'post type singular name', 'delicious-recipes-pro' ),
			'menu_name'          => _x( 'Equipment', 'admin menu', 'delicious-recipes-pro' ),
			'name_admin_bar'     => _x( 'Equipment', 'add new on admin bar', 'delicious-recipes-pro' ),
			'add_new'            => _x( 'Add New', 'Equipment', 'delicious-recipes-pro' ),
			'add_new_item'       => __( 'Add New Equipment', 'delicious-recipes-pro' ),
			'new_item'           => __( 'New Equipment', 'delicious-recipes-pro' ),
			'edit_item'          => __( 'Edit Equipment', 'delicious-recipes-pro' ),
			'view_item'          => __( 'View Equipment', 'delicious-recipes-pro' ),
			'all_items'          => __( 'Equipment', 'delicious-recipes-pro' ),
			'search_items'       => __( 'Search Equipment', 'delicious-recipes-pro' ),
			'parent_item_colon'  => __( 'Parent Equipment:', 'delicious-recipes-pro' ),
			'not_found'          => __( 'No Equipment found.', 'delicious-recipes-pro' ),
			'not_found_in_trash' => __( 'No Equipment found in Trash.', 'delicious-recipes-pro' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'delicious-recipes-pro' ),
			'public'             => false,
			'menu_icon'          => '',
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => 'delicious-recipes',
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'equipment',
				'with_front' => true,
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 30,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);

		register_post_type( DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE, $args );

		if ( 'yes' === get_option( 'delicious_recipes_queue_flush_rewrite_rules' ) ) {
			update_option( 'delicious_recipes_queue_flush_rewrite_rules', 'no' );
			flush_rewrite_rules();
		}
	}

	/**
	 * Add new equipment metabox.
	 *
	 * @return void
	 */
	public function add_new_equipment_metabox() {
		add_meta_box(
			'delicious_recipes_equipment_metabox',
			__( 'Equipment Settings', 'delicious-recipes-pro' ),
			array( $this, 'equipment_mb_callback' ),
			DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE,
			'normal',
			'high'
		);
	}

	/**
	 * Equipment Metabox Callback.
	 *
	 * @return void
	 */
	public function equipment_mb_callback( $post ) {
		?>
			<div id="delicious-recipe-equipment" data-rest-nonce="<?php echo wp_create_nonce( 'wp_rest' ); ?>" data-post-id="<?php echo esc_attr( $post->ID ); ?>"></div>
		<?php
	}

	/**
	 * Customize Admin column.
	 *
	 * @param  Array $equipment_columns List of columns.
	 * @return Array                  [description]
	 */
	public function equipment_columns( $equipment_columns ) {
		$equipment_columns['featured'] = __( 'Featured', 'delicious-recipes-pro' );
		return $equipment_columns;
	}

	/**
	 * Add data to custom column.
	 *
	 * @param  String $column_name Custom column name.
	 * @param  int    $id          Post ID.
	 */
	public function featured_equipments( $column_name, $id ) {
		switch ( $column_name ) {
			case 'featured':
				$featured = get_post_meta( $id, 'wp_delicious_featured_equipment', true );
				$featured = ( isset( $featured ) && '' != $featured ) ? $featured : 'no';

				$icon_class = ' dashicons-star-empty ';
				if ( ! empty( $featured ) && 'yes' === $featured ) {
					$icon_class = ' dashicons-star-filled ';
				}
				$nonce = wp_create_nonce( 'wp_delicious_featured_equipment_nonce' );
				printf( '<a href="#" class="dr-featured-equipment dashicons %s" data-post-id="%d"  data-nonce="%s"></a>', $icon_class, $id, $nonce );
				break;
			default:
				break;
		} // end switch
	}

	/**
	 * Renders all of the submission recipes in 'All Recipes' page of WordPress.
	 *
	 * @return views
	 */
	public function add_submissions_view( $views ) {
		$view_name = 'Submissions';

		// Build the anchor for the 'Submissions' view and push it to the $views array.
		array_push(
			$views,
			sprintf(
				'
				<a href="%1$s" %2$s>%3$s <span class="count">(%4$s)</span></a>',
				add_query_arg(
					array(
						'post_type'   => DELICIOUS_RECIPE_POST_TYPE,
						'post_status' => 'all',
						'submission'  => 1,
					),
					'edit.php'
				),
				delicious_recipes_pro_get_submission_attributes(),
				$view_name,
				delicious_recipes_pro_filter_submission_results( true )
			)
		);

		return $views;
	}

	/**
	 * Adds submission as query_vars.
	 */
	public function add_meta_query_vars( $vars ) {
		$vars[] = 'submission';
		return $vars;
	}

	/**
	 * Determines if we're looking at submision query_var and sets meta query.
	 */
	public function pre_get_posts_submission_query( $query ) {
		if ( is_admin() && $query->is_main_query() && $query->is_post_type_archive( DELICIOUS_RECIPE_POST_TYPE ) && isset( $_GET['submission'] ) ) {
			$query->set(
				'meta_query',
				array(
					array(
						'key'   => '_dr_user_submission_recipe',
						'value' => 'yes',
					),
				)
			);
		}
	}
}
