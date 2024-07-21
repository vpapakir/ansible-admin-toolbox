<?php
/**
 * Class Delicious Recipes Pro updater class.
 *
 * @package Delicious Recipes Pro
 */
/**
 * Class defination
 */
class Delicious_Recipes_Pro_Updater {

	/**
	 * Download ID
	 *
	 * @var integer
	 */
	private $download_id = 1333;

	/**
	 * EDD API URL
	 *
	 * @var string
	 */
	private $edd_api_url = 'https://wpdelicious.com/';

	/**
	 * Plugin Slug
	 *
	 * @var string
	 */
	private $plugin_slug = 'delicious-recipes-pro/delicious-recipes-pro.php';

	/**
	 * Class Constructor
	 */
	public function __construct() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Init hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'admin_menu', array( $this, 'license_page' ), 20 );
		add_action( 'admin_init', array( $this, 'initialize_updater' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_notices', array( $this, 'notices_handler' ) );
	}

	/**
	 * Register Settings
	 *
	 * @return void
	 */
	public function register_settings() {
		// creates our settings in the options table
		register_setting(
			'delicious_recipes_pro_license',
			'delicious_recipes_pro_license',
			array(
				'sanitize_callback' => array( $this, 'sanitize_license' ),
			)
		);

		// If License activation request.
		if ( isset( $_REQUEST['edd_license_activate'] ) ) {
			$this->activate_license();
		}

		// If License deactivation request.
		if ( isset( $_REQUEST['edd_license_deactivate'] ) ) {
			$this->deactivate_license();
		}
	}

	/**
	 * Notices Handler
	 *
	 * @return void
	 */
	public function notices_handler() {
		$this->plugin_activation_notice();
	}

	/**
	 * Plugin activation notice
	 *
	 * @return void
	 */
	public function plugin_activation_notice() {
		// global $current_user;
		$add_license      = get_option( 'delicious_recipes_pro_license' );
		$activate_license = isset( $add_license['license_status'] ) && ! empty( $add_license['license_status'] ) ? $add_license['license_status'] : '';
		$statuses         = array( 'invalid', 'inactive', 'expired', 'disabled', 'site_inactive', '' );

		if ( empty( $add_license['license_key'] ) || in_array( $activate_license, $statuses, true ) ) { ?>
			<div class="notice notice-info is-dismissible">
				<p><?php esc_html_e( 'Activate Plugin License ( Delicious Recipes Pro ) to enjoy the full benefits of using the plugin. An active plugin comes with effortless updates whenever new features are released, top notch and guaranteed latest plugin support.', 'delicious-recipes-pro' ); ?>
				</p>
				<p>
					<span style="color:red;"><?php esc_html_e( 'Please Activate Plugin License!', 'delicious-recipes-pro' ); ?></span> - <a href="<?php echo esc_url( admin_url( 'admin.php?page=delicious_recipes_pro_license' ) ); ?>"><u><?php esc_html_e( 'Click here to enter your license key', 'delicious-recipes-pro' ); ?></u></a> - <?php esc_html_e( 'if there is an error, please contact us at ', 'delicious-recipes-pro' ); ?><a href="mailto:support@wpdelicious.com" target="_blank">support@wpdelicious.com</a> - <a href="<?php echo esc_url( 'https://wpdelicious.com/docs/how-to-activate-the-license-key/' ); ?>" target="_blank"><u><?php esc_html_e( 'How to activate the plugin license', 'delicious-recipes-pro' ); ?></u></a>.
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Get version
	 *
	 * @return void
	 */
	public function get_version( $addon ) {
		$update_cache    = get_site_transient( 'update_plugins' );
		$update_cache    = is_object( $update_cache ) ? $update_cache : new stdClass();
		$license_options = get_option( 'delicious_recipes_pro_license', array() );
		$license_key     = isset( $license_options['license_key'] ) ? $license_options['license_key'] : '';

		if ( ! empty( $update_cache->response[ $addon->filepath ] ) ) {
			$response = $update_cache->response[ $addon->filepath ];
		} else {
			$verify_ssl = $this->verify_ssl();

			$addon_slug = $addon->slug;
			// Request to get current version.
			$response = wp_remote_post(
				$this->edd_api_url,
				array(
					'timeout'   => 15,
					'sslverify' => $verify_ssl,
					'body'      => array(
						'edd_action' => 'get_version',
						'license'    => $license_key,
						'item_id'    => $this->download_id,
						'version'    => DELICIOUS_RECIPES_PRO_VERSION,
						'author'     => __( 'WP Delicious', 'delicious-recipes-pro' ),
						'url'        => home_url(),
						'beta'       => false,
					),
				)
			);
			if ( ! is_wp_error( $response ) ) {
				$response = json_decode( wp_remote_retrieve_body( $response ) );

				if ( version_compare( $addon->version, $response->new_version, '<' ) ) {
					$update_cache->response[ $addon->filepath ] = $response;
				}
				$update_cache->last_checked                = time();
				$update_cache->checked[ $addon->filepath ] = $addon->version;

				set_site_transient( 'update_plugins', $update_cache );
			}
		}

		return $response;
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function sanitize_license( $license ) {
		$option = get_option( 'delicious_recipes_pro_license' );

		if ( isset( $_POST['edd_license_activate'] ) && $_POST['edd_license_activate'] == 'Activate License' ) {
			$license['license_key']    = $option['license_key'];
			$license['license_status'] = isset( $license['license_status'] ) ? $license['license_status'] : 'valid';
		}

		if ( isset( $_POST['edd_license_deactivate'] ) && $_POST['edd_license_deactivate'] == 'Deactivate License' ) {

			$old = $option['license_key'];
			if ( $old && $old != $license['license_key'] ) {
				$arr['license_status'] = '';
				$dr_license_new_status = array_merge_recursive( $option, $arr );

				update_option( 'delicious_recipes_pro_license', $dr_license_new_status );

				$license['license_key']    = $option['license_key'];
				$license['license_status'] = '';
			}
		}

		if ( isset( $_POST['submit'] ) ) {
			$license['license_key'] = isset( $_POST['delicious_recipes_pro_license']['license_key'] ) ? esc_attr( $_POST['delicious_recipes_pro_license']['license_key'] ) : false;
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => $license['license_key'],
				'item_id'    => $this->download_id, // The ID of the item in EDD
				'url'        => home_url(),
			);

			// Call the custom API.
			$response = wp_remote_post(
				$this->edd_api_url,
				array(
					'timeout'   => 15,
					'sslverify' => $this->verify_ssl(),
					'body'      => $api_params,
				)
			);

			$license_response_data = json_decode( wp_remote_retrieve_body( $response ) );
			if ( isset( $license_response_data->license ) ) {
				$license_data['license_status'] = $license_response_data->license;
				$license['license_status'] = $license_response_data->license;
			}
		}
		return $license;
	}

	/**
	 * Is license active checks.
	 *
	 * @return boolean
	 */
	public function is_license_active() {
		return true;
	}

	/**
	 * Activate License
	 *
	 * @return void
	 */
	public function activate_license() {
		// listen for our activate button to be clicked
		// run a quick security check
		if ( ! check_admin_referer( 'delicious_recipes_pro_license_nonce', 'delicious_recipes_pro_license_nonce' ) ) {
			return; // get out if we didn't click the Activate button
		}

		$license_data = get_option( 'delicious_recipes_pro_license', array() );
		$license_key  = isset( $license_data['license_key'] ) ? $license_data['license_key'] : '';

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license_key,
			'item_id'    => $this->download_id, // The ID of the item in EDD
			'url'        => home_url(),
		);

		// Call the custom API.
		$response = wp_remote_post(
			$this->edd_api_url,
			array(
				'timeout'   => 15,
				'sslverify' => $this->verify_ssl(),
				'body'      => $api_params,
			)
		);
		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			$message = ( is_wp_error( $response ) && ( $response->get_error_message() ) != '' ) ? $response->get_error_message() : __( 'An error occurred, please try again.', 'delicious-recipes-pro' );

		} else {

			$license_response_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( ! $license_response_data->success ) {
				$message = $this->response_messages( $license_response_data->error, $license_response_data );
			}
		}

		if ( isset( $license_response_data->license ) ) {
			$license_data['license_status'] = $license_response_data->license;
			update_option( 'delicious_recipes_pro_license', $license_data );
		}
		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {
			$base_url = admin_url( 'admin.php?page=delicious_recipes_pro_license' );

			$redirect_url = add_query_arg(
				array(
					'dr_license_error_msg' => urlencode( $message ),
				),
				$base_url
			);
			wp_safe_redirect( $redirect_url );
			exit();
		}

		wp_redirect( admin_url( 'admin.php?page=delicious_recipes_pro_license' ) );
		exit();
	}

	public function deactivate_license() {

		if ( isset( $_POST['edd_license_deactivate'] ) ) {
			// run a quick security check
			if ( ! check_admin_referer( 'delicious_recipes_pro_license_nonce', 'delicious_recipes_pro_license_nonce' ) ) {
				return;
			}

			$license_data = get_option( 'delicious_recipes_pro_license', array() );
			$license_key  = isset( $license_data['license_key'] ) ? $license_data['license_key'] : '';

			// data to send in our API request
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $license_key,
				'item_id'    => $this->download_id, // The ID of the item in EDD
				'url'        => home_url(),
			);

			// Call the custom API.
			$response = wp_remote_post(
				$this->edd_api_url,
				array(
					'timeout'   => 15,
					'sslverify' => $this->verify_ssl(),
					'body'      => $api_params,
				)
			);

			$license_data['license_status'] = 'invalid';
			update_option( 'delicious_recipes_pro_license', $license_data );

			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
				$message = ( is_wp_error( $response ) && ( $response->get_error_message() ) != '' ) ? $response->get_error_message() : __( 'An error occurred, please try again.', 'delicious-recipes-pro' );
			} else {
				$response = json_decode( wp_remote_retrieve_body( $response ) );

			}

			wp_redirect( admin_url( 'admin.php?page=delicious_recipes_pro_license' ) );
			exit();
		}

	}

	/**
	 * Get Response messages
	 *
	 * @return void
	 */
	function response_messages( $code, $response = null ) {
		switch ( $code ) {
			case 'expired':
				$message = sprintf(
					__( 'Your license for %1$s extension expired on %2$s. To ensure you get features and security updates, having an active license is strongly recommended, and in some cases required.', 'delicious-recipes-pro' ),
					$response->item_name,
					wp_date( get_option( 'date_format' ), strtotime( $response->expires, current_time( 'timestamp' ) ) )
				);
				break;

			case 'disabled':
			case 'revoked':
				$message = __( 'Your license key has been disabled.', 'delicious-recipes-pro' );
				break;

			case 'missing':
				$message = __( 'Invalid license key supplied. Please check if you have entered correct license key.', 'delicious-recipes-pro' );
				break;

			case 'invalid':
			case 'site_inactive':
				$message = __( 'Your license is not active for this URL.', 'delicious-recipes-pro' );
				break;

			case 'item_name_mismatch':
				$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'delicious-recipes-pro' ), EDD_SAMPLE_ITEM_NAME );
				break;

			case 'no_activations_left':
				$message = __( 'Your license key has reached its activation limit.', 'delicious-recipes-pro' );
				break;

			default:
				$message = __( 'An error occurred, please try again.', 'delicious-recipes-pro' );
				break;
		}

		return $message;
	}

	/**
	 * Includes
	 *
	 * @return void
	 */
	public function includes() {
		if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
			include plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/updater/EDD_SL_Plugin_Updater.php';
		}
	}

	/**
	 * Initialize EDD.
	 *
	 * @return void
	 */
	public function initialize_updater() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$dr_pro_license = get_option( 'delicious_recipes_pro_license', array() );

		if ( ! isset( $dr_pro_license['license_key'] ) || empty( $dr_pro_license['license_key'] ) ) {
			return;
		}

		// setup the updater
		$edd_updater = new EDD_SL_Plugin_Updater(
			$this->edd_api_url,
			DELICIOUS_RECIPES_PRO_PLUGIN_FILE,
			array(
				'version' => DELICIOUS_RECIPES_PRO_VERSION, // current version number
				'license' => $dr_pro_license['license_key'], // license key (used get_option above to retrieve from DB)
				'item_id' => $this->download_id, // ID of the product
				'author'  => __( 'WP Delicious', 'delicious-recipes-pro' ), // author of this plugin
				'beta'    => false,
			)
		);
	}

	/**
	 * Check License Status.
	 *
	 * @return void
	 */
	public function check_license() {
		$verify_ssl      = $this->verify_ssl();
		$license_options = get_option( 'delicious_recipes_pro_license', array() );

		// Strings.
		$strings = array(
			'theme-license'             => __( 'Getting Started', 'delicious-recipes-pro' ),
			'enter-key'                 => __( 'Enter your theme license key.', 'delicious-recipes-pro' ),
			'license-key'               => __( 'License Key', 'delicious-recipes-pro' ),
			'license-action'            => __( 'License Action', 'delicious-recipes-pro' ),
			'deactivate-license'        => __( 'Deactivate License', 'delicious-recipes-pro' ),
			'activate-license'          => __( 'Activate License', 'delicious-recipes-pro' ),
			'status-unknown'            => __( 'License status is unknown.', 'delicious-recipes-pro' ),
			'renew'                     => __( 'Renew?', 'delicious-recipes-pro' ),
			'unlimited'                 => __( 'unlimited', 'delicious-recipes-pro' ),
			'license-key-is-active'     => __( 'License key is active.', 'delicious-recipes-pro' ),
			'expires%s'                 => __( 'Expires %s.', 'delicious-recipes-pro' ),
			'expires-never'             => __( 'Lifetime License.', 'delicious-recipes-pro' ),
			'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'delicious-recipes-pro' ),
			'license-key-expired-%s'    => __( 'License key expired %s.', 'delicious-recipes-pro' ),
			'license-key-expired'       => __( 'License key has expired.', 'delicious-recipes-pro' ),
			'license-keys-do-not-match' => __( 'License keys do not match.', 'delicious-recipes-pro' ),
			'license-is-inactive'       => __( 'License is inactive.', 'delicious-recipes-pro' ),
			'license-key-is-disabled'   => __( 'License key is disabled.', 'delicious-recipes-pro' ),
			'site-is-inactive'          => __( 'Site is inactive.', 'delicious-recipes-pro' ),
			'license-status-unknown'    => __( 'License status is unknown.', 'delicious-recipes-pro' ),
			'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'delicious-recipes-pro' ),
			'update-available'          => __( '<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'delicious-recipes-pro' ),
		);

		$license_status = array(
			'status'  => '',
			'message' => '',
		);

		$response = wp_remote_post(
			$this->edd_api_url,
			array(
				'timeout'   => 15,
				'sslverify' => $verify_ssl,
				'body'      => array(
					'edd_action' => 'check_license',
					'license'    => isset( $license_options['license_key'] ) ? $license_options['license_key'] : '',
					'item_id'    => $this->download_id,
					'version'    => DELICIOUS_RECIPES_PRO_VERSION,
					'slug'       => 'delicious-recipes-pro',
					'author'     => __( 'WP Delicious', 'delicious-recipes-pro' ), // author of this plugin
					'url'        => home_url(),
					'beta'       => false,
				),
			)
		);
		// make sure the response came back okay.
		if ( ! is_wp_error( $response ) && 200 == wp_remote_retrieve_response_code( $response ) ) {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// If response doesn't include license data, return.
			if ( ! isset( $license_data->license ) ) {
				$message = $strings['license-status-unknown'];
				return $message;
			}

			// Get expire date.
			$expires = false;
			if ( isset( $license_data->expires ) && 'lifetime' !== $license_data->expires ) {
				$expires    = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
				$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
			} elseif ( isset( $license_data->expires ) && 'lifetime' === $license_data->expires ) {
				$expires = 'lifetime';
			}

			// Get site counts.
			$site_count = isset( $license_data->site_count ) ? $license_data->site_count : '';

			/**
			 * Resolved license limit issue.
			 *
			 * @since 1.6.0
			 */
			$license_limit = isset( $license_data->license_limit ) ? $license_data->license_limit : '';

			// If unlimited.
			if ( 0 === $license_limit ) {
				$license_limit = $strings['unlimited'];
			}

			if ( 'valid' === $license_data->license ) {
				$message = $strings['license-key-is-active'] . ' ';
				if ( isset( $expires ) && 'lifetime' !== $expires ) {
					$message .= sprintf( $strings['expires%s'], $expires ) . ' ';
				}
				if ( isset( $expires ) && 'lifetime' === $expires ) {
					$message .= $strings['expires-never'] . ' ';
				}
				if ( isset( $license_data->site_count ) && isset( $license_data->license_limit ) ) {
					$message .= sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
				}
			} elseif ( 'expired' === $license_data->license ) {
				if ( $expires ) {
					$message = sprintf( $strings['license-key-expired-%s'], $expires );
				} else {
					$message = $strings['license-key-expired'];
				}
				if ( $renew_link ) {
					$message .= ' ' . $renew_link;
				}
			} elseif ( 'invalid' === $license_data->license ) {
				$message = $strings['license-keys-do-not-match'];
			} elseif ( 'inactive' === $license_data->license ) {
				$message = $strings['license-is-inactive'];
			} elseif ( 'disabled' === $license_data->license ) {
				$message = $strings['license-key-is-disabled'];
			} elseif ( 'site_inactive' === $license_data->license ) {
				$message = $strings['site-is-inactive'];
			} else {
				$message = $strings['license-status-unknown'];
			}

			$license_status['status']  = $license_data->license;
			$license_status['message'] = $message;
		}
		return $license_status;
	}

	/**
	 * Constructs a renewal link
	 *
	 * @since 1.0.0
	 */
	function get_renewal_link() {

		$license_options = get_option( 'delicious_recipes_pro_license', array() );

		// If download_id was passed in the config, a renewal link can be constructed
		$license_key = isset( $license_options['license_key'] ) ? $license_options['license_key'] : '';
		if ( '' != $this->download_id && $license_key ) {
			$url  = esc_url( $this->edd_api_url );
			$url .= 'checkout/?edd_license_key=' . $license_key . '&download_id=' . $this->download_id;
			return $url;
		}

		// Otherwise return the edd_api_url
		return $this->edd_api_url;

	}

	/**
	 * Should verify ssl or not.
	 *
	 * @return bool
	 * @since 5.0.0
	 */
	public function verify_ssl() {
		return (bool) apply_filters( 'edd_sl_api_request_verify_ssl', true );
	}

	/**
	 * License Page
	 *
	 * @return void
	 */
	public function license_page() {
		add_submenu_page(
			'delicious-recipes',
			__( 'Plugin License', 'delicious-recipes-pro' ),
			__( 'License Activation', 'delicious-recipes-pro' ),
			'manage_options',
			'delicious_recipes_pro_license',
			function() {
				include_once plugin_dir_path( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . '/includes/updater/license-page.php';
			},
			90
		);
	}
}
