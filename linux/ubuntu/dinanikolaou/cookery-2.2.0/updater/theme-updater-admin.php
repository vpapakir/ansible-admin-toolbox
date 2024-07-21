<?php
/**
 * Theme updater admin page and functions.
 *
 * @package EDD Sample Theme
 */
#[AllowDynamicProperties]
class EDD_Theme_Updater_Admin {

	/**
	 * Variables required for the theme updater
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $remote_api_url = null;
	protected $theme_slug = null;
	protected $version = null;
	protected $author = null;
	protected $download_id = null;
	protected $renew_url = null;
	protected $strings = null;

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	function __construct( $config = array(), $strings = array() ) {

		$config = wp_parse_args(
			$config,
			array(
				'remote_api_url' => 'https://easydigitaldownloads.com',
				'theme_slug'     => get_template(),
				'item_name'      => '',
				'license'        => '',
				'version'        => '',
				'author'         => '',
				'download_id'    => '',
				'renew_url'      => '',
				'beta'           => false,
				'item_id'        => '',
			)
		);

		/**
		 * Fires after the theme $config is setup.
		 *
		 * @since x.x.x
		 *
		 * @param array $config Array of EDD SL theme data.
		 */
		do_action( 'post_edd_sl_theme_updater_setup', $config );

		// Set config arguments
		$this->remote_api_url = $config['remote_api_url'];
		$this->item_name      = $config['item_name'];
		$this->theme_slug     = sanitize_key( $config['theme_slug'] );
		$this->version        = $config['version'];
		$this->author         = $config['author'];
		$this->download_id    = $config['download_id'];
		$this->renew_url      = $config['renew_url'];
		$this->beta           = $config['beta'];
		$this->item_id        = $config['item_id'];

		// Populate version fallback
		if ( '' == $config['version'] ) {
			$theme = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}

		// Strings passed in from the updater config
		$this->strings = $strings;

		add_action( 'init', array( $this, 'updater' ) );
		add_action( 'admin_init', array( $this, 'register_option' ) );
		// add_action( 'update_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 10, 2 );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );

		$this->init_hooks();
	}

	/**
	 * Creates the updater class.
	 *
	 * since 1.0.0
	 */
	public function updater() {

		// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
		$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
		if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
			return;
		}

		/* If there is no valid license key status, don't allow updates. */
		if ( get_option( $this->theme_slug . '_license_key_status', false) != 'valid' ) {
			return;
		}

		if ( !class_exists( 'EDD_Theme_Updater' ) ) {
			// Load our custom theme updater
			include( dirname( __FILE__ ) . '/theme-updater-class.php' );
		}

		new EDD_Theme_Updater(
			array(
				'remote_api_url' => $this->remote_api_url,
				'version'        => $this->version,
				'license'        => trim( get_option( $this->theme_slug . '_license_key' ) ),
				'item_name'      => $this->item_name,
				'author'         => $this->author,
				'beta'           => $this->beta,
				'item_id'        => $this->item_id,
				'theme_slug'     => $this->theme_slug,
			),
			$this->strings
		);
	}

	/**
     * Init hooks
     *
     * @return void
     */
    public function init_hooks() {
		add_action( 'wp_ajax_cp_control_activate_license', [ $this, 'activate_license' ] );
		add_action( 'wp_ajax_cp_control_deactivate_license', [ $this, 'deactivate_license' ] );
		add_action( 'wp_ajax_cp_get_license_status', [ $this, 'get_license_status' ] );
		add_action( 'wp_ajax_cp_reset_license_status', [ $this, 'reset_license' ] );
    }


	/**
	 * Registers the option used to store the license key in the options table.
	 *
	 * since 1.0.0
	 */
	function register_option() {
		register_setting(
			$this->theme_slug . '-license',
			$this->theme_slug . '_license_key',
			array( $this, 'sanitize_license' )
		);
	}

	/**
	 * Sanitizes the license key.
	 *
	 * since 1.0.0
	 *
	 * @param string $new License key that was submitted.
	 * @return string $new Sanitized license key.
	 */
	function sanitize_license( $new ) {

		$old = get_option( $this->theme_slug . '_license_key' );

		if ( $old && $old != $new ) {
			// New license has been entered, so must reactivate
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		return $new;
	}

	/**
	 * Makes a call to the API.
	 *
	 * @since 1.0.0
	 *
	 * @param array $api_params to be used for wp_remote_get.
	 * @return array $response decoded JSON response.
	 */
	 function get_api_response( $api_params ) {

		// Call the custom API.
		$verify_ssl = (bool) apply_filters( 'edd_sl_api_request_verify_ssl', true );
		$response   = wp_remote_post( $this->remote_api_url, array( 'timeout' => 15, 'sslverify' => $verify_ssl, 'body' => $api_params ) );

		return $response;
	 }

	/**
	 * Activates the license key.
	 *
	 * @since 1.0.0
	 */
	function activate_license() {
		$license_input = filter_input( INPUT_GET, 'cpLicenseKey' );
		$nonce = filter_input( INPUT_GET, 'security' );

		if ( ! wp_verify_nonce( $nonce, 'cookery_license_nonce' ) ) {
			wp_send_json_error( [ 'message' => 'Nonce Verification Failed', 'status' => $this->check_license() ] );
		}

		if ( isset( $license_input ) ) {
			update_option( $this->theme_slug . '_license_key', $license_input );
		}

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url(),
			'item_id'    => $this->item_id,
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'cookery' );
			}

			$base_url = admin_url( 'admin.php?page=' . $this->theme_slug . '-dashboard' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			if ( ! headers_sent() ) {
				wp_redirect( $redirect );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {
				$message = $this->response_messages( $license_data->error, $license_data );
			}

		}

		// $response->license will be either "active" or "inactive"
		if ( $license_data && isset( $license_data->license ) ) {
			update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {
			wp_send_json_error( [ 'message' => $message, 'status' => $this->check_license() ] );
		}

		wp_send_json_success( [ 'license' => $license, 'status' => $this->check_license() ] );
	}

	/**
	 * Deactivates the license key.
	 *
	 * @since 1.0.0
	 */
	function deactivate_license() {

		// Retrieve the license from the database.
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => rawurlencode( $this->item_name ),
			'url'        => home_url(),
			'item_id'    => $this->item_id,
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'cookery' );
			}

			$base_url = admin_url( 'admin.php?page=' . $this->theme_slug . '-dashboard' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			if ( ! headers_sent() ) {
				wp_redirect( $redirect );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			if ( $license_data && ( $license_data->license == 'deactivated' ) ) {
				delete_option( $this->theme_slug . '_license_key_status' );
				delete_transient( $this->theme_slug . '_license_message' );
			}

		}

		wp_send_json_success( [ 'license' => $license, 'status' => $this->check_license() ] );
	}

	/**
	 * Get Response messages
	 *
	 * @return void
	 */
	function response_messages( $code, $response= null ) {
		$strings = $this->strings;
		// Get expire date
		$expires = false;
		if ( isset( $response->expires ) && 'lifetime' != $response->expires ) {
			$expires = date_i18n( get_option( 'date_format' ), strtotime( $response->expires, current_time( 'timestamp' ) ) );
			$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
		} elseif ( isset( $response->expires ) && 'lifetime' == $response->expires ) {
			$expires = 'lifetime';
		}
		switch ( $code ) {
			case 'expired' :
				if ( $expires ) {
					$message = sprintf( $strings['license-key-expired-new-%s'], '<b>'.$expires.'</b>' );
				} else {
					$message = $strings['license-key-expired'];
				}
				if ( $renew_link ) {
					$message .= ' ' . '<span class="renewal-link-notice">'.$renew_link.'</span>';
				}
				break;

			case 'disabled':
				$message = $strings['license-key-is-disabled-new'];
				if ( $renew_link ) {
					$message .= ' ' . '<span class="renewal-link-notice">'.$renew_link.'</span>';
				}
				break;

			case 'revoked' :

				$message = __( 'Your license key has been disabled.', 'cookery' );
				break;

			case 'missing' :

				$message = __( 'Invalid license.', 'cookery' );
				break;

			case 'invalid' :
				$message = $strings['license-keys-do-not-match'];
				break;
			
			case 'site_inactive' :
				$message = $strings['site-is-inactive'];
				break;

			case 'item_name_mismatch' :

				$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'cookery' ), $this->item_name );
				break;

			case 'no_activations_left':

				$message = __( 'Your license key has reached its activation limit.', 'cookery' );
				break;

			default :

				$message = __( 'An error occurred, please try again.', 'cookery' );
				break;
		}
	
		return $message;
	}

	/**
	 * Constructs a renewal link
	 *
	 * @since 1.0.0
	 */
	function get_renewal_link() {

		// If a renewal link was passed in the config, use that
		if ( '' != $this->renew_url ) {
			return $this->renew_url;
		}

		// If download_id was passed in the config, a renewal link can be constructed
		$license_key = trim( get_option( $this->theme_slug . '_license_key', false ) );
		if ( '' != $this->download_id && $license_key ) {
			$url = esc_url( $this->remote_api_url );
			$url .= '/checkout/?edd_license_key=' . $license_key . '&download_id=' . $this->download_id;
			return $url;
		}

		// Otherwise return the remote_api_url
		return $this->remote_api_url;

	}

	public function get_license_status() {
		$license_key = get_option( 'cookery_license_key', '' );
		$license_status   = $this->check_license();

		return wp_send_json_success( [ 'license' => $license_key, 'status' => $license_status ] );
	}

	public function reset_license() {
		update_option( 'cookery_license_key', '' );
	}

	/**
	 * Checks if license is valid and gets expire date.
	 *
	 * @since 1.0.0
	 *
	 * @return string $message License status message.
	 */
	function check_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;

		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => rawurlencode( $this->item_name ),
			'url'        => home_url(),
			'item_id'    => $this->item_id,
		);

		$license_status = [
			'status' => '',
			'message' => ''
		];

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			$license_status = [
				'status'  => 'invalid',   //When the response is blocked by the firewall
				'message' => sprintf(__('The response is blocked by the firewall. Please contact %s.', 'cookery'), '<a href="https://blossomthemes.com/support-ticket/?utm_source=cookery&utm_medium=dashboard&utm_campaign=support" target="_blank">our support</a>')
			];
			
			update_option( $this->theme_slug . '_license_key_status', $license_status['status'] ); //Make sure to update license status when firewall is blocked.

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// If response doesn't include license data, return
			if ( !isset( $license_data->license ) ) {
				$message = $strings['license-status-unknown'];
				return $message;
			}

			// We need to update the license status at the same time the message is updated
			if ( $license_data && isset( $license_data->license ) ) {
				update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			}
			// Get expire date
			$expires = false;
			if ( isset( $license_data->expires ) && 'lifetime' != $license_data->expires ) {
				$expires = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
				$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
			} elseif ( isset( $license_data->expires ) && 'lifetime' == $license_data->expires ) {
				$expires = 'lifetime';
			}

			// Get site counts
			$site_count = isset($license_data->site_count) ? $license_data->site_count : '';
			$license_limit = isset($license_data->license_limit) ? $license_data->license_limit : '';

			// If unlimited
			if ( 0 == $license_limit ) {
				$license_limit = $strings['unlimited'];
			}
			//its a unique message that will be send to the valid users before 7 days before expiration
			$seven_days_message = '';
			if ( $license_data->license == 'valid' ) {
				if( $expires != 'lifetime' ){
					$seven_days_message = sprintf( $strings['license-key-expired-before-seven-%s'], '<b>'.$expires.'</b>' );
				}
				$message = $strings['license-key-is-active'] . ' ';
				if ( isset( $expires ) && 'lifetime' != $expires ) {
					$message .= sprintf( $strings['expires%s'], $expires ) . ' ';
				}
				if ( isset( $expires ) && 'lifetime' == $expires ) {
					$message .= $strings['expires-never'] . ' ';
				}
				if ( $site_count && $license_limit ) {
					$message .= sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
				}
			} else if ( $license_data->license == 'expired' ) {
				if ( $expires ) {
					$message = sprintf( $strings['license-key-expired-new-%s'], '<b>'.$expires.'</b>' );
				} else {
					$message = $strings['license-key-expired'];
				}
				if ( $renew_link ) {
					$message .= ' ' . '<span class="renewal-link-notice">'.$renew_link.'</span>';
				}
			} else if ( $license_data->license == 'invalid' ) {
				$message = $strings['license-keys-do-not-match'];
			} else if ( $license_data->license == 'inactive' ) {
				$message = $strings['license-is-inactive'];
			} else if ( $license_data->license == 'disabled' ) {
				$message = $strings['license-key-is-disabled-new'];
				if ( $renew_link ) {
					$message .= ' ' . '<span class="renewal-link-notice">'.$renew_link.'</span>';
				}
			} else if ( $license_data->license == 'site_inactive' ) {
				// Site is inactive
				$message = $strings['site-is-inactive'];
			} else {
				$message = $strings['enter-key'];
			}

			$license_status['status']  = $license_data->license;
			$license_status['message'] = $message;
			$license_status['expiry'] = [
				'expiry_date' => $expires,
				'renew_link'  => $this->get_renewal_link(),
				'message'     => $message,
				'seven_days_message' => ( isset( $seven_days_message ) && !empty( $seven_days_message ) ) ? $seven_days_message : '',
			];
		}
		//Save license details in the options table
		update_option( $this->theme_slug . '_license_details', $license_status );
		return $license_status;
	}

	/**
	 * Disable requests to wp.org repository for this theme.
	 *
	 * @since 1.0.0
	 */
	function disable_wporg_request( $r, $url ) {

		// If it's not a theme update request, bail.
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
 			return $r;
 		}

 		// Decode the JSON response
 		$themes = json_decode( $r['body']['themes'] );

 		// Remove the active parent and child themes from the check
 		$parent = get_option( 'template' );
 		$child = get_option( 'stylesheet' );
 		unset( $themes->themes->$parent );
 		unset( $themes->themes->$child );

 		// Encode the updated JSON response
 		$r['body']['themes'] = json_encode( $themes );

 		return $r;
	}

}

/**
 * This is a means of catching errors from the activation method above and displyaing it to the customer
 */
function edd_sample_theme_admin_notices() {
	if ( isset( $_GET['sl_theme_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch( $_GET['sl_theme_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo $message; ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:

				break;

		}
	}
}
add_action( 'admin_notices', 'edd_sample_theme_admin_notices' );