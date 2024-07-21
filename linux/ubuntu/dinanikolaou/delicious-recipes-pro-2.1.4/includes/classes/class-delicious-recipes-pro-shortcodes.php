<?php
/**
 * WP Delicious Pro Shortcodes.
 *
 * @package Delicious_Recipes_Pro
 * @since 1.0.0
 */
defined( 'ABSPATH' ) || exit;
/**
 * Shortcodes handler.
 */
class Delicious_Recipes_Pro_Shortcodes {

	/**
	 * Init shortcodes.
	 */
	public static function init() {
		$shortcodes = array(
			'dr_guest_recipe_submission' => __CLASS__ . '::guest_recipe_submission',
			'dr_recipe_equipments'       => __CLASS__ . '::recipe_equipments',
			'DR_AFFILIATE_DISCLOSURE'    => __CLASS__ . '::affiliate_disclosure',
		);

		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode( apply_filters( "{$shortcode}_shortcode_tag", $shortcode ), $function );
		}
	}

	/**
	 * Add Guest Recipe Submission shortcode.
	 *
	 * @return string
	 */
	public static function guest_recipe_submission() {

		// If REST_REQUEST is defined (by WordPress) and is a TRUE, then it's a REST API request.
		$is_rest_route = ( defined( 'REST_REQUEST' ) && REST_REQUEST );
		if (
			( is_admin() && ! $is_rest_route ) || // admin and AJAX (via admin-ajax.php) requests
			( ! is_admin() && $is_rest_route )    // REST requests only
		) {
			return '';
		}

		$global_settings        = delicious_recipes_get_global_settings();
		$enableRecipeSubmission = isset( $global_settings['enableRecipeSubmission']['0'] ) && 'yes' === $global_settings['enableRecipeSubmission']['0'] ? true : false;
		$enableGuestMode        = isset( $global_settings['enableGuestMode']['0'] ) && 'yes' === $global_settings['enableGuestMode']['0'] ? true : false;

		if ( $enableRecipeSubmission && $enableGuestMode ) {

			if ( ! is_user_logged_in() ) {
				// Get user login.
				delicious_recipes_get_template( 'account/form-login.php' );
			} else {
				ob_start();
				$output = '<div id="dr-pro-submit-recipe" class="dr-guest-recipe-submission" data-rest-nonce="' . wp_create_nonce( 'wp_rest' ) . '" data-guest-mode="' . true . '">' . ob_get_clean() . '</div>';
				return $output;
			}
		}

	}

	/**
	 * Add Equipments listing shortcode.
	 *
	 * @return string
	 */
	public static function recipe_equipments( $atts ) {

		$atts = shortcode_atts(
			array(
				'num_posts' => -1,
			),
			$atts,
			'dr_recipe_equipments'
		);

		// If REST_REQUEST is defined (by WordPress) and is a TRUE, then it's a REST API request.
		$is_rest_route = ( defined( 'REST_REQUEST' ) && REST_REQUEST );
		if (
			( is_admin() && ! $is_rest_route ) || // admin and AJAX (via admin-ajax.php) requests
			( ! is_admin() && $is_rest_route )    // REST requests only
		) {
			return '';
		}

		$global_settings    = delicious_recipes_get_global_settings();
		$enable_disclosure  = isset( $global_settings['enableDisclosureEquipment']['0'] ) && 'yes' === $global_settings['enableDisclosureEquipment']['0'] ? true : false;
		$disclosure_content = isset( $global_settings['affiliateDisclosure'] ) && $global_settings['affiliateDisclosure'] ? $global_settings['affiliateDisclosure'] : '';
		$per_row            = isset( $global_settings['equipmentPerRow'] ) && ! empty( $global_settings['equipmentPerRow'] )
				? $global_settings['equipmentPerRow'] : 3;
		$layout             = isset( $global_settings['equipmentLayout'] ) && ! empty( $global_settings['equipmentLayout'] )
				&& 'list' === $global_settings['equipmentLayout'] ? 'view-mode-list' : 'view-mode-grid per-row-' . $per_row . '';

		$cat = get_theme_mod( 'exclude_categories' );
		if ( $cat ) {
			$cat = array_diff( array_unique( $cat ), array( '' ) );
		}

		$args = array(
			'post_type'           => DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE,
			'post_status'         => 'publish',
			'posts_per_page'      => -1 == $atts['num_posts'] ? $atts['num_posts'] : absint( $atts['num_posts'] ),
			'ignore_sticky_posts' => true,
			'category__not_in'    => $cat,
		);

		$recipe_equipments = new WP_Query( $args );

		ob_start();

		if ( $enable_disclosure && $disclosure_content ) {
			$data = array(
				'disclosure_content' => $disclosure_content,
			);

			delicious_recipes_pro_get_template( 'affiliate-disclosure.php', $data );
		}

		?><div class="dr-equipment-list-wrapper <?php echo esc_attr( $layout ); ?>">
		<?php
		while ( $recipe_equipments->have_posts() ) {
			$recipe_equipments->the_post();
			delicious_recipes_pro_get_template( 'equipments-grid.php' );
		}
		?>
		</div>
		<?php
		wp_reset_postdata();

		return ob_get_clean();
	}

	/**
	 * Add Affiliate Disclosure shortcode.
	 *
	 * @return string
	 */
	public static function affiliate_disclosure() {
		// If REST_REQUEST is defined (by WordPress) and is a TRUE, then it's a REST API request.
		$is_rest_route = ( defined( 'REST_REQUEST' ) && REST_REQUEST );
		if (
			( is_admin() && ! $is_rest_route ) || // admin and AJAX (via admin-ajax.php) requests
			( ! is_admin() && $is_rest_route )    // REST requests only
		) {
			return '';
		}

		$global_settings    = delicious_recipes_get_global_settings();
		$disclosure_content = isset( $global_settings['affiliateDisclosure'] ) && $global_settings['affiliateDisclosure'] ? $global_settings['affiliateDisclosure'] : '';

		if ( ! $disclosure_content ) {
			return;
		}

		$data = array(
			'disclosure_content' => $disclosure_content,
		);

		delicious_recipes_pro_get_template( 'affiliate-disclosure.php', $data );
	}

}
