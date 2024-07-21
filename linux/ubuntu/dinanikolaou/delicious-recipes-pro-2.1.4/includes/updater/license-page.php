<?php
/**
 * Pluigin license Paged
 *
 * @package Delicious_Recipes_Pro
 */
$license            = get_option( 'delicious_recipes_pro_license' );
$updater            = new Delicious_Recipes_Pro_Updater();
$activation_message = '';
$msg_color          = '';
$updater_license    = $updater->check_license();

if ( $updater_license['status'] === 'valid' ) {
	$activation_message = sprintf( __( 'Your license key for %1$s is activated on this site.', 'delicious-recipes-pro' ), 'Delicious Recipes Pro' );
	$msg_color          = 'style="color:#11b411"';
} elseif ( isset( $license['license_key'] ) && ! empty( $license['license_key'] ) ) {
	$activation_message = isset( $_GET['dr_license_error_msg'] ) ? $_GET['dr_license_error_msg'] : sprintf( __( 'Your license key for %1$s is not activated on this site yet. Please activate.', 'delicious-recipes-pro' ), 'Delicious Recipes Pro' );
	$msg_color          = 'style="color:#f66757"';
}
?>
<div id="dr-pro-license-wrapper" class="dr-pro-activation">
	<form class="dr-form-block" method="post" action="options.php">
		<?php wp_nonce_field( 'delicious_recipes_pro_license_nonce', 'delicious_recipes_pro_license_nonce' ); ?>
		<?php settings_fields( 'delicious_recipes_pro_license' ); ?>
		<div class="dr-title-wrap">
			<h2 class="dr-title"><?php esc_html_e( 'Delicious Recipes Pro License Key', 'delicious-recipes-pro' ); ?></h2>
		</div>
		<div class="dr-pro-license dr-field dr-floated items-start">
			<div class="dr-label-wrap">
				<label for="dr-license-key-input" class="dr-field-label"><?php _e( 'Activate License Key', 'delicious-recipes-pro' ); ?></label>
				<span class="dr-tooltip">
				<?php echo sprintf( __( "To enable automatic updates for Delicious Recipes Pro, please activate your license key. If you don't have a License, you can purchase it from %1\$shere%2\$s.%3\$s%4\$s If you have already purchased it, you can find your license key on %5\$syour dashboard%6\$s. If you face any issue activating the license key, please reach out to our %7\$ssupport team.%8\$s", 'delicious-recipes-pro' ), '<a target="_blank" href="https://wpdelicious.com/pricing/">', '</a>', '<br/>', '<br/>', '<a target="_blank" href="https://wpdelicious.com/my-account/">', '</a>', '<a target="_blank" href="https://wpdelicious.com/support-ticket/">', '</a>' ); ?>
				</span>
			</div>
			<div class="dr-input-wrap dr-field">
				<span class="dr-license-message">
					<strong><?php echo wp_kses_post( $updater_license['message'] ); ?></strong>
				</span>
				<input id="dr-license-key-input" name="delicious_recipes_pro_license[license_key]" value="<?php echo isset( $license['license_key'] ) ? esc_html( $license['license_key'] ) : ''; ?>" class="dr-license-key-txt" type="text" placeholder="<?php _e( 'Enter your license key', 'delicious-recipes-pro' ); ?>" tabindex="1">
				<span <?php echo $msg_color; ?> class="dr-tooltip"><?php echo esc_html( $activation_message ); ?></span>
				<div class="dr-submit-group">
					<?php if ( $updater_license['status'] == 'valid' ) { ?>
						<input type="submit" class="dr-btn dr-btn-deactive deactivate-license" name="edd_license_deactivate" value="<?php echo esc_html__( 'Deactivate', 'delicious-recipes-pro' ); ?>"/>
					<?php } elseif ( isset( $license['license_key'] ) && ! empty( $license['license_key'] ) ) { ?>
						<input type="submit" class="dr-btn dr-btn-active activate-license" name="edd_license_activate" value="<?php echo esc_html__( 'Activate', 'delicious-recipes-pro' ); ?>"/>
					<?php } ?>
					<input id="submit" type="submit" name="submit" value="<?php echo esc_attr__( 'Save', 'delicious-recipes-pro' ); ?>">
				</div>
			</div>
		</div>
	</form>
</div>
