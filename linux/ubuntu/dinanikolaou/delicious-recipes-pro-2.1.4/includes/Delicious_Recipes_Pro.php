<?php
/**
 * Main Delicious_Recipes_Pro class
 *
 * @package Delicious_Recipes_Pro
 */
namespace DR_PRO;

defined( 'ABSPATH' ) || exit;

/**
 * Main Delicious_Recipes_Pro Cass.
 *
 * @class Delicious_Recipes_Pro
 */
final class Delicious_Recipes_Pro {
	/**
	 * Delicious_Recipes_Pro verison.
	 *
	 * @var string
	 */
	public $version;

	/**
	 * The single instance of the class.
	 *
	 * @var Delicious_Recipes_Pro
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	/**
	 * Global settings instance.
	 *
	 * @var GlobalSettings
	 */
	public $global_settings;

	/**
	 * Admin settings instance.
	 *
	 * @var Delicious_Recipes_Pro_Admin
	 */
	public $admin_settings;

	/**
	 * Public instance.
	 *
	 * @var Delicious_Recipes_Pro_Public
	 */
	public $public;

	/**
	 * SEO instance.
	 *
	 * @var Delicious_SEO
	 */
	public $seo;

	/**
	 * Delicious_Recipes_Pro_Updater instance.
	 *
	 * @var Delicious_Recipes_Pro_Updater
	 */
	public $updater;

	/**
	 * Main Delicious_Recipes_Pro Instance.
	 *
	 * Ensures only one instance of Delicious_Recipes_Pro is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see RISHI_CMPN()
	 * @return Delicious_Recipes_Pro - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Delicious_Recipes_Pro Constructor.
	 */
	public function __construct() {

		$this->_defineConstants();
		$this->init_hooks();

		add_action( 'delicious_recipes_free_loaded', array( $this, 'includes' ) );
	}

	/**
	 * Init Hooks.
	 *
	 * @return void
	 */
	public function init_hooks() {
		register_activation_hook( DELICIOUS_RECIPES_PRO_PLUGIN_FILE, array( $this, 'activate' ) );
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded_actions' ) );
		add_action( 'admin_notices', array( $this, 'maybe_disable_plugin' ) );
	}

	/**
	 * Activation hook for WP Appointment plugin.
	 *
	 * @return void
	 */
	public function activate() {
		global $wp_roles;

		if ( class_exists( 'WP_Roles' ) ) {
			if ( ! isset( $wp_roles ) ) {
				$wp_roles = new WP_Roles();
			}
		}

		if ( is_object( $wp_roles ) ) {
			// Edit Recipes.
			$wp_roles->add_cap( 'delicious_recipes_subscriber', 'edit_delicious_recipes' );
		}
	}

	/**
	 * When WP has loaded all plugins, trigger the 'Delicious_Recipes_Pro_loaded; hook.
	 *
	 * This ensures 'Delicious_Recipes_Pro_loaded' is called only after all the other plugins
	 * are loaded, to avoid issues caused by plugin directory naming changing
	 * the load order.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function onPluginLoaded() {
		do_action( 'Delicious_Recipes_Pro_loaded' );
	}

	/**
	 * Define WTE_FORM_EDITOR Constants.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function _defineConstants() {
		$this->define( 'DELICIOUS_RECIPES_PRO_PLUGIN_NAME', 'delicious-recipes-pro' );
		$this->define( 'DELICIOUS_RECIPES_PRO_ABSPATH', dirname( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/' );
		$this->define( 'DELICIOUS_RECIPES_PRO_VERSION', $this->version );
		$this->define( 'DELICIOUS_RECIPES_PRO_PLUGIN_URL', $this->plugin_url() );
		$this->define( 'DELICIOUS_RECIPES_PRO_TEMPLATE_DEBUG_MODE', false );
		$this->define( 'DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE', 'equipment' );
		$this->define( 'DELICIOUS_RECIPES_PRO_MINIMUM_DR_VERSION', '1.3.0' );
	}

	public function plugins_loaded_actions() {

	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name       Constant name.
	 * @param string|bool $value      Constant value.
	 * @return void
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required files.
	 *
	 * @return void
	 */
	public function includes() {
		if ( $this->meets_requirements() ) {
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-recipe-controller.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-equipment-controller.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-analytics-dashboard.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-ingredient-links.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-reviews.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-analytics-controller.php';
			require plugin_dir_path( __FILE__ ) . '/updater/class-delicious-recipes-pro-updater.php';
			$this->admin_settings = new Delicious_Recipes_Pro_Admin();
			if ( $this->is_request( 'frontend' ) ) {
				$this->public = new Delicious_Recipes_Pro_Public();
			}

			if ( $this->is_request( 'admin' ) ) {
				$this->updater = new \Delicious_Recipes_Pro_Updater();
			}

			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-ingredients-links-controller.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-unit-conversion-controller.php';

			$global_settings = delicious_recipes_get_global_settings();
			if ( isset( $global_settings['recaptchaEnabledForRecipe'] ) && is_array( $global_settings['recaptchaEnabledForRecipe'] ) && in_array( 'yes', $global_settings['recaptchaEnabledForRecipe'], true ) ) {
				require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-recipe-submission-controller.php';
			}
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-ingredients-image-controller.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-rest-review-tags-controller.php';
			require plugin_dir_path( __FILE__ ) . '/classes/class-delicious-recipes-pro-exit-intent-controller.php';

		}
	}

	/**
	 * Init Delicious_Recipes_Pro when WordPress initializes.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		// Set up localization.
		$this->loadPluginTextdomain();
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 1.0.0
	 *
	 * Note: the first-loaded translation file overrides any following ones -
	 * - if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/delicious-recipes-pro/delicious-recipes-pro-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/delicious-recipes-pro-LOCALE.mo
	 */
	public function loadPluginTextdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'delicious-recipes-pro' );

		unload_textdomain( 'delicious-recipes-pro' );
		load_textdomain( 'delicious-recipes-pro', WP_LANG_DIR . '/delicious-recipes-pro/delicious-recipes-pro-' . $locale . '.mo' );
		load_plugin_textdomain(
			'delicious-recipes-pro',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	/**
	 * Get the plugin URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) );
	}

	/**
	 * Get the template path.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function template_path() {
		return apply_filters( 'drpro_template_path', '/delicious-recipes-pro/' );
	}

	/**
	 * Output error message and disable plugin if requirements are not met.
	 *
	 * This fires on admin_notices.
	 *
	 * @since 1.0.0
	 */
	public function maybe_disable_plugin() {

		if ( ! $this->meets_requirements() ) {

			if ( ! function_exists( 'DEL_RECIPE' ) ) {

				if ( file_exists( WP_PLUGIN_DIR . '/delicious-recipes/delicious-recipes.php' ) ) {
					$notice_title = __( 'Activate Delicious Recipes', 'delicious-recipes-pro' );
					$notice_url   = wp_nonce_url( 'plugins.php?action=activate&plugin=delicious-recipes/delicious-recipes.php&plugin_status=all&paged=1', 'activate-plugin_delicious-recipes/delicious-recipes.php' );
				} else {
					$notice_title = __( 'Install Delicious Recipes', 'delicious-recipes-pro' );
					$notice_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=delicious-recipes' ), 'install-plugin_delicious-recipes' );
				}

				$notice = wp_kses_post(
					sprintf(
					/* translators: 1: Plugin name, 2: Delicious Recipes, 3: Delicious Recipes installation link. */
						__( '%1$s requires %2$s to be installed and activated to function properly. %3$s', 'delicious-recipes-pro' ),
						'<p style="margin: 0 0 8px"><strong>' . __( 'Delicious Recipes Pro', 'delicious-recipes-pro' ) . '</strong>',
						'<strong>' . __( 'Delicious Recipes', 'delicious-recipes-pro' ) . '</strong>',
						'</p><a class="button button-primary button-large" href="' . esc_url( $notice_url ) . '">' . $notice_title . '</a>'
					)
				);

			} elseif ( ! defined( 'DELICIOUS_RECIPES_VERSION' ) || version_compare( DELICIOUS_RECIPES_VERSION, DELICIOUS_RECIPES_PRO_MINIMUM_DR_VERSION, '<' ) ) {

				$notice = sprintf(
					/* translators: 1: Plugin name, 2: Delicious Recipes, 3: Required Delicious Recipes version. */
					esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'delicious-recipes-pro' ),
					'<strong>' . esc_html__( 'Delicious Recipes Pro', 'delicious-recipes-pro' ) . '</strong>',
					'<strong>' . esc_html__( 'Delicious Recipes', 'delicious-recipes-pro' ) . '</strong>',
					DELICIOUS_RECIPES_PRO_MINIMUM_DR_VERSION
				);

			}

			printf( '<div class="notice notice-warning is-dismissible" style="padding: 13px 16px">%1$s</div>', $notice );
		}
	}

	/**
	 * Check if all plugin requirements are met.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if requirements are met, otherwise false.
	 */
	private function meets_requirements() {
		return ( function_exists( 'DEL_RECIPE' ) && defined( 'DELICIOUS_RECIPES_VERSION' ) && version_compare( DELICIOUS_RECIPES_VERSION, DELICIOUS_RECIPES_PRO_MINIMUM_DR_VERSION, '>=' ) );
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

}
