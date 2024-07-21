<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Cookery
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://blossomthemes.com', // Site where EDD is hosted
		'item_name'      => 'Cookery', // Name of theme
		'theme_slug'     => 'cookery', // Theme slug
		'version'        => '2.2.0', // The current version of this theme
		'author'         => 'Blossom Themes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
		'item_id'        => '',
	),

	// Strings
	$strings = array(
		'theme-license'                       => __( 'Getting Started', 'cookery' ),
		'enter-key'                           => __( 'Enter your theme license key.', 'cookery' ),
		'license-key'                         => __( 'License Key', 'cookery' ),
		'license-action'                      => __( 'License Action', 'cookery' ),
		'deactivate-license'                  => __( 'Deactivate License', 'cookery' ),
		'activate-license'                    => __( 'Activate License', 'cookery' ),
		'status-unknown'                      => __( 'License status is unknown.', 'cookery' ),
		'renew'                               => __( 'Renew Your License Key', 'cookery' ),
		'unlimited'                           => __( 'unlimited', 'cookery' ),
		'license-key-is-active'               => __( 'License key is active.', 'cookery' ),
		'expires%s'                           => __( 'Expires %s.', 'cookery' ),
		'expires-never'                       => __( 'Lifetime License.', 'cookery' ),
		'%1$s/%2$-sites'                      => __( 'You have %1$s / %2$s sites activated.', 'cookery' ),
		'license-key-expired-%s'              => __( 'License key expired %s.', 'cookery' ),
		'license-key-expired-new-%s'          => __( 'Your license key expired on %s. To continue using the theme and receive updates and support, please renew your license key.', 'cookery' ),
		'license-key-expired-before-seven-%s' => __( 'Your license key will expire on %s. If your subscription is set to auto-renew, no action is needed. An active license is required to use the theme. If you have previously cancelled the subscription, please renew your license key to continue using the theme.', 'cookery' ),
		'license-key-expired'                 => __( 'License key has expired.', 'cookery' ),
		'license-keys-do-not-match'           => __( 'License keys do not match.', 'cookery' ),
		'license-is-inactive'                 => __( 'License is inactive.', 'cookery' ),
		'license-key-is-disabled'             => __( 'License key is disabled.', 'cookery' ),
		'license-key-is-disabled-new'         => __( 'Your current license key disabled. To continue receiving the latest updates and support, please renew your license.', 'cookery' ),
		'site-is-inactive'                    => __( 'Site is inactive.', 'cookery' ),
		'license-status-unknown'              => __( 'License status is unknown.', 'cookery' ),
		'update-notice'                       => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'cookery' ),
		'update-available'                    => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'cookery' ),
	)

);


if( ! function_exists( 'cookery_activate_notice' ) ) :
/**
*
* Theme activation notice
*/
function cookery_activate_notice() {
	global $current_user;
	$theme_list         = wp_get_theme( 'cookery' );
	$add_license        = get_option( 'cookery_license_key' );    
	$activate_license   = get_option( 'cookery_license_key_status' );
	$statuses           = array( 'invalid', 'inactive', 'expired', 'disabled', 'site_inactive' ); 

	if( $theme_list->exists() && ( empty( $add_license ) || in_array( $activate_license, $statuses ) ) ) { ?>
		<div class="notice notice-warning noticemain activate-license-notice is-dismissible">
			<div class="warningwrp">
				<div class="icon-svg-holder">
				<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="3" y="3" width="40" height="40" rx="20" fill="#FBE6BE"/>
					<rect x="3" y="3" width="40" height="40" rx="20" stroke="#FEF1D9" stroke-width="6"/>
					<path d="M16.3337 24.6667L17.6459 29.9155C17.6828 30.0631 17.7012 30.137 17.7231 30.2014C17.9363 30.831 18.5033 31.2736 19.1658 31.3278C19.2336 31.3334 19.3097 31.3334 19.4618 31.3334C19.6524 31.3334 19.7476 31.3334 19.8279 31.3256C20.6212 31.2487 21.2489 30.6209 21.3259 29.8276C21.3337 29.7474 21.3337 29.6521 21.3337 29.4615V17.5834M28.417 24.25C30.0278 24.25 31.3337 22.9442 31.3337 21.3334C31.3337 19.7226 30.0278 18.4167 28.417 18.4167M21.542 17.5834H18.417C16.3459 17.5834 14.667 19.2623 14.667 21.3334C14.667 23.4045 16.3459 25.0834 18.417 25.0834H21.542C23.014 25.0834 24.8147 25.8725 26.2039 26.6298C27.0143 27.0715 27.4196 27.2924 27.685 27.2599C27.9311 27.2298 28.1172 27.1193 28.2614 26.9176C28.417 26.7002 28.417 26.2651 28.417 25.3948V17.272C28.417 16.4017 28.417 15.9666 28.2614 15.7491C28.1172 15.5475 27.9311 15.437 27.685 15.4068C27.4196 15.3743 27.0143 15.5952 26.2039 16.037C24.8147 16.7943 23.014 17.5834 21.542 17.5834Z" stroke="#EF9400" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				</div>
				<div class="content-holder">
					<h3 class="activate-heading"><?php esc_html_e( 'Activate Your License Key','cookery' ); ?></h3>
					<p><?php esc_html_e( 'Please activate your license key to enjoy the benefits of the Pro version. An active license key is required to receive the theme updates and support. ', 'cookery' ); ?>
					</p>
					<span>
						<a class="activate-button" href="<?php echo esc_url( admin_url() . "admin.php?page=cookery-dashboard#license" ); ?>">
							<?php esc_html_e( 'Click here to activate', 'cookery' ); ?>
						</a>
					</span> 
				</div>
			</div>
		</div>  
		<?php
	}
}
endif;
add_action( 'admin_notices', 'cookery_activate_notice' );


if( ! function_exists( 'cookery_expired_notice' ) ) :
	/**
	* Expired Notice
	*/
	function cookery_expired_notice() {
		$updater_data     = get_option( 'cookery_license_details', [] );
		$theme_list       = wp_get_theme( 'cookery' );
		$add_license      = get_option( 'cookery_license_key' );
		$activate_license = get_option( 'cookery_license_key_status' );
	
		if( $theme_list->exists() && 
			!empty( $add_license ) && 
			( $activate_license === 'expired' || $activate_license === 'disabled' ) ) 
			{
			if( $activate_license === 'expired' ){
				$textmessage = __( "Expired","cookery" ); 
			}elseif(  $activate_license === 'disabled' ){
				$textmessage = __( "Disabled","cookery" ); 
			}else{
				$textmessage = '';
			}
			?>
			<div class="notice notice-error noticemain expired-license-notice is-dismissible">
				<div class="warningwrp">
					<div class="icon-svg-holder">
					<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="3" y="3" width="40" height="40" rx="20" fill="#FFD7D9"/>
						<rect x="3" y="3" width="40" height="40" rx="20" stroke="#FFE1E3" stroke-width="6"/>
						<path d="M16.3337 24.6667L17.6459 29.9155C17.6828 30.0631 17.7012 30.137 17.7231 30.2014C17.9363 30.831 18.5033 31.2736 19.1658 31.3278C19.2336 31.3334 19.3097 31.3334 19.4618 31.3334C19.6524 31.3334 19.7476 31.3334 19.8279 31.3256C20.6212 31.2487 21.2489 30.6209 21.3259 29.8276C21.3337 29.7474 21.3337 29.6521 21.3337 29.4615V17.5834M28.417 24.25C30.0278 24.25 31.3337 22.9442 31.3337 21.3334C31.3337 19.7226 30.0278 18.4167 28.417 18.4167M21.542 17.5834H18.417C16.3459 17.5834 14.667 19.2623 14.667 21.3334C14.667 23.4045 16.3459 25.0834 18.417 25.0834H21.542C23.014 25.0834 24.8147 25.8725 26.2039 26.6298C27.0143 27.0715 27.4196 27.2924 27.685 27.2599C27.9311 27.2298 28.1172 27.1193 28.2614 26.9176C28.417 26.7002 28.417 26.2651 28.417 25.3948V17.272C28.417 16.4017 28.417 15.9666 28.2614 15.7491C28.1172 15.5475 27.9311 15.437 27.685 15.4068C27.4196 15.3743 27.0143 15.5952 26.2039 16.037C24.8147 16.7943 23.014 17.5834 21.542 17.5834Z" stroke="#D92D20" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="content-holder">
						<h3 class="activate-heading"><?php echo sprintf( __( 'Your License Key is %s','cookery' ),$textmessage  ) ; ?></h3>
						<?php if( isset( $updater_data['message'] ) && !empty( $updater_data['message'] ) ) echo '<span>'. wp_kses_post( $updater_data['message'] ) .'</span>'; ?>
					</div>
				</div>
			</div>  
			<?php
		}
	}
endif;
add_action( 'admin_notices', 'cookery_expired_notice' );

if( ! function_exists( 'cookery_check_expired_notice' ) ) :
	/**
	* Expired Notice
	*/
	function cookery_check_expired_notice() {

		$updater_data = get_option( 'cookery_license_details', [] );
		$expiry_date  = isset( $updater_data['expiry']['expiry_date'] ) ? $updater_data['expiry']['expiry_date'] : '';

		// Get the current date
		$current_date = current_time('timestamp');
		
		// Calculate the date 7 days before the expiration date
		$expiration_date_timestamp = strtotime($expiry_date);

		$seven_days_before_expiration = strtotime('-6 days', $expiration_date_timestamp);

		// If the current date is within 7 days of the expiration date, display the admin notice
		if ($current_date >= $seven_days_before_expiration && $current_date <= $expiration_date_timestamp) {
			add_action('admin_notices', 'cookery_license_expiration_notice');
		}
	}
endif;
add_action('admin_init', 'cookery_check_expired_notice');

function cookery_license_expiration_notice() {
	$updater_data       = get_option( 'cookery_license_details', [] );
	$theme_list         = wp_get_theme( 'cookery' );
	$license_key        = get_option( 'cookery_license_key' );
	$seven_days_message = ( isset($updater_data['expiry']['seven_days_message'] ) && !empty(($updater_data['expiry']['seven_days_message'] )) ) ?$updater_data['expiry']['seven_days_message'] : '';
	$renew              = ( isset($updater_data['expiry']['renew_link'] ) && !empty(($updater_data['expiry']['renew_link'] )) ) ?$updater_data['expiry']['renew_link'] : '';
	
	if( $theme_list->exists() && !empty( $license_key ) ){
		?>
		<div class="notice notice-error noticemain expired-license-notice is-dismissible">
			<div class="warningwrp">
				<div class="icon-svg-holder">
				<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="3" y="3" width="40" height="40" rx="20" fill="#FFD7D9"/>
					<rect x="3" y="3" width="40" height="40" rx="20" stroke="#FFE1E3" stroke-width="6"/>
					<path d="M16.3337 24.6667L17.6459 29.9155C17.6828 30.0631 17.7012 30.137 17.7231 30.2014C17.9363 30.831 18.5033 31.2736 19.1658 31.3278C19.2336 31.3334 19.3097 31.3334 19.4618 31.3334C19.6524 31.3334 19.7476 31.3334 19.8279 31.3256C20.6212 31.2487 21.2489 30.6209 21.3259 29.8276C21.3337 29.7474 21.3337 29.6521 21.3337 29.4615V17.5834M28.417 24.25C30.0278 24.25 31.3337 22.9442 31.3337 21.3334C31.3337 19.7226 30.0278 18.4167 28.417 18.4167M21.542 17.5834H18.417C16.3459 17.5834 14.667 19.2623 14.667 21.3334C14.667 23.4045 16.3459 25.0834 18.417 25.0834H21.542C23.014 25.0834 24.8147 25.8725 26.2039 26.6298C27.0143 27.0715 27.4196 27.2924 27.685 27.2599C27.9311 27.2298 28.1172 27.1193 28.2614 26.9176C28.417 26.7002 28.417 26.2651 28.417 25.3948V17.272C28.417 16.4017 28.417 15.9666 28.2614 15.7491C28.1172 15.5475 27.9311 15.437 27.685 15.4068C27.4196 15.3743 27.0143 15.5952 26.2039 16.037C24.8147 16.7943 23.014 17.5834 21.542 17.5834Z" stroke="#D92D20" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
				<div class="content-holder">
					<h3 class="activate-heading"><?php echo __( 'License Key will expire soon','cookery' ); ?></h3>
					<?php 
						echo '<span>'. wp_kses_post( $seven_days_message );
						if( $renew ) echo sprintf( __( '%1$s %2$s %3$s','cookery' ), '<span class="renewal-link-notice">', '<a target="_blank" href='.esc_url( $renew ).'>Renew Your License Key</a>', '</span>' );
						echo '</span>'; 
					?>
				</div>
			</div>
		</div>  
		<?php
	}
}
