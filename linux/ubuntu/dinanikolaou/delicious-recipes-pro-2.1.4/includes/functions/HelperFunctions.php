<?php
/**
 * Helper functions for our plugin.
 *
 * @package Delicious_Recipes_Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wrapper for _doing_it_wrong().
 *
 * @since  1.0.0
 * @param string $function Function used.
 * @param string $message Message to log.
 * @param string $version Version the message was added in.
 */
function delicious_recipes_pro_doing_it_wrong( $function, $message, $version ) {
	// @codingStandardsIgnoreStart
	$message .= ' Backtrace: ' . wp_debug_backtrace_summary();
	
	_doing_it_wrong( $function, $message, $version );
	// @codingStandardsIgnoreEnd
}

/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 * yourtheme/$template_path/$template_name
 * yourtheme/$template_name
 * $default_path/$template_name
 *
 * @since 1.0.0
 *
 * @param string $template_name Template name.
 * @param string $template_path Template path. (default: '').
 * @param string $default_path Default path. (default: '').
 *
 * @return string Template path.
 */
function delicious_recipes_pro_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = DEL_RECIPE_PRO()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = DEL_RECIPE_PRO()->plugin_path() . '/templates/';
	}

	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name,
		)
	);

	// Get default template.
	if ( ! $template || DELICIOUS_RECIPES_PRO_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}

	// Return what we found.
	return apply_filters( 'wp_delicious_pro_locate_template', $template, $template_name, $template_path );
}

/**
 * Get other templates (e.g. article attributes) passing attributes and including the file.
 *
 * @since 1.0.0
 *
 * @param string $template_name   Template name.
 * @param array  $args            Arguments. (default: array).
 * @param string $template_path   Template path. (default: '').
 * @param string $default_path    Default path. (default: '').
 */
function delicious_recipes_pro_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	$cache_key = sanitize_key( implode( '-', array( 'template', $template_name, $template_path, $default_path, DELICIOUS_RECIPES_PRO_VERSION ) ) );
	$template  = (string) wp_cache_get( $cache_key, 'delicious-recipes-pro' );

	if ( ! $template ) {
		$template = delicious_recipes_pro_locate_template( $template_name, $template_path, $default_path );
		wp_cache_set( $cache_key, $template, 'delicious-recipes-pro' );
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$filter_template = apply_filters( 'wp_delicious_pro_get_template', $template, $template_name, $args, $template_path, $default_path );

	if ( $filter_template !== $template ) {
		if ( ! file_exists( $filter_template ) ) {
			/* translators: %s template */
			delicious_recipes_pro_doing_it_wrong( __FUNCTION__, sprintf( __( '%s does not exist.', 'delicious-recipes-pro' ), '<code>' . $template . '</code>' ), '1.0.0' );
			return;
		}
		$template = $filter_template;
	}

	$action_args = array(
		'template_name' => $template_name,
		'template_path' => $template_path,
		'located'       => $template,
		'args'          => $args,
	);

	if ( ! empty( $args ) && is_array( $args ) ) {
		if ( isset( $args['action_args'] ) ) {
			delicious_recipes_pro_doing_it_wrong(
				__FUNCTION__,
				__( 'action_args should not be overwritten when calling delicious_recipes_pro_get_template.', 'delicious-recipes-pro' ),
				'1.0.0'
			);
			unset( $args['action_args'] );
		}
		extract( $args );
	}

	do_action( 'wp_delicious_pro_before_template_part', $action_args['template_name'], $action_args['template_path'], $action_args['located'], $action_args['args'] );

	if ( file_exists( $action_args['located'] ) ) {
		include $action_args['located'];
	}

	do_action( 'wp_delicious_pro_after_template_part', $action_args['template_name'], $action_args['template_path'], $action_args['located'], $action_args['args'] );
}

/**
 * Get template part.
 *
 * DELICIOUS_RECIPES_PRO_TEMPLATE_DEBUG_MODE will prevent overrides in themes from taking priority.
 *
 * @param mixed  $slug Template slug.
 * @param string $name Template name (default: '').
 */
function delicious_recipes_pro_get_template_part( $slug, $name = '' ) {
	$cache_key = sanitize_key( implode( '-', array( 'template-part', $slug, $name, DELICIOUS_RECIPES_PRO_VERSION ) ) );
	$template  = (string) wp_cache_get( $cache_key, 'delicious-recipes-pro' );

	if ( ! $template ) {
		if ( $name ) {
			$template = DELICIOUS_RECIPES_PRO_TEMPLATE_DEBUG_MODE ? '' : locate_template(
				array(
					"{$slug}-{$name}.php",
					DEL_RECIPE_PRO()->template_path() . "{$slug}-{$name}.php",
				)
			);

			if ( ! $template ) {
				$fallback = DEL_RECIPE_PRO()->plugin_path() . "/templates/{$slug}-{$name}.php";
				$template = file_exists( $fallback ) ? $fallback : '';
			}
		}

		if ( ! $template ) {
			// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/delicious-recipes/slug.php.
			$template = DELICIOUS_RECIPES_PRO_TEMPLATE_DEBUG_MODE ? '' : locate_template(
				array(
					"{$slug}.php",
					DEL_RECIPE_PRO()->template_path() . "{$slug}.php",
				)
			);
		}

		wp_cache_set( $cache_key, $template, 'delicious-recipes' );
	}

	// Allow 3rd party plugins to filter template file from their plugin.
	$template = apply_filters( 'wp_delicious_pro_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 * Like delicious_recipes_pro_get_template, but return the HTML instaed of outputting.
 *
 * @see delicious_recipes_pro_get_template
 * @since 1.0.0
 *
 * @param string $template_name Template name.
 * @param array  $args           Arguments. (default: array).
 * @param string $template_path Template path. (default: '').
 * @param string $default_path  Default path. (default: '').
 *
 * @return string.
 */
function delicious_recipes_pro_get_template_html( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	ob_start();
	delicious_recipes_pro_get_template( $template_name, $args, $template_path, $default_path );
	return ob_get_clean();
}

/**
 * Set dashboard images
 *
 * @param boolean $image_url
 * @param boolean $id
 * @param string  $name
 * @return void
 */
function delicious_recipes_pro_set_custom_image( $image_url = false, $id = false, $call_func = 'featured_image', $key = false ) {

	if ( $image_url && $id ) :

		$_uploads     = wp_upload_dir();
		$_wp_filetype = wp_check_filetype( $image_url, null );
		$file_ext     = isset( $_wp_filetype['ext'] ) ? $_wp_filetype['ext'] : '.jpg';

		if ( $call_func == 'direction_image' && is_int( $key ) ) {
			$recipe_image_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/images/recipes/' . $id . '/instructions';
			$file_name        = basename( $image_url, '.' . $file_ext );
			$_image_file      = $recipe_image_dir . '/recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;
			$_file_name       = 'recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;

		} elseif ( $call_func == 'gallery_image' && is_int( $key ) ) {
			$recipe_image_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/images/recipes/' . $id . '/gallery';
			$file_name        = basename( $image_url, '.' . $file_ext );
			$_image_file      = $recipe_image_dir . '/recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;
			$_file_name       = 'recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;

		} elseif ( $call_func == 'review_image' && is_int( $key ) ) {
			$recipe_image_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/images/recipes/' . $id . '/reviews';
			$file_name        = basename( $image_url, '.' . $file_ext );
			$_image_file      = $recipe_image_dir . '/recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;
			$_file_name       = 'recipe_' . $id . '_' . $key . '_' . $file_name . '.' . $file_ext;

		} else {
			$recipe_image_dir = trailingslashit( $_uploads['basedir'] ) . 'delicious-recipes/images/recipes/';
			$_image_file      = $recipe_image_dir . '/recipe_' . $id . '.' . $file_ext;
			$_file_name       = 'recipe_' . $id . '.' . $file_ext;
		}

		if ( wp_mkdir_p( $recipe_image_dir ) ) :

			if ( file_exists( $image_url ) || file_exists( $_image_file ) ) :

				if ( file_exists( $_image_file ) ) :
					unlink( $_image_file );
				endif;

				if ( file_exists( $image_url ) ) :
					rename( $image_url, $_image_file );
				endif;

			endif;

		endif;

		$attachment = array(
			'post_mime_type' => $_wp_filetype['type'],
			'post_title'     => sanitize_file_name( $_file_name ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		);

		$attach_id = wp_insert_attachment( $attachment, $_image_file );

		if ( defined( 'ABSPATH' ) && file_exists( ABSPATH . 'wp-admin/includes/image.php' ) ) :

			require_once ABSPATH . 'wp-admin/includes/image.php';

			$attach_data       = wp_generate_attachment_metadata( $attach_id, $_image_file );
			$update_attachment = wp_update_attachment_metadata( $attach_id, $attach_data );

			return $attach_id;

		endif;

	endif;

	return false;

}

/**
 * Get Email Templates content.
 */
function delicious_recipes_pro_get_template_content( $email_template_type = 'new_submission', $template = '', $sendto = 'customer', $default_content = false ) {
	$settings = get_option( 'delicious_recipe_settings', array() );

	$templates = array(
		'new_submission'   => array(
			'customer' => delicious_recipes_get_array_values_by_index( $settings, 'newRecipeSubmissionContent', '' ),
		),
		'recipe_published' => array(
			'customer' => delicious_recipes_get_array_values_by_index( $settings, 'recipePublishedContent', '' ),
		),
	);

	$content = empty( $templates[ $email_template_type ][ $sendto ] ) || ( $default_content )
				? '' : $templates[ $email_template_type ][ $sendto ];

	if ( ! empty( $content ) ) {
		return $content;
	}

	if ( empty( $template ) ) {
		switch ( $email_template_type ) {
			case 'new_submission':
				$template = 'emails/new-recipe-submission.php';
				break;
			case 'recipe_published':
				$template = 'emails/recipe-published.php';
				break;
			default:
				$template = 'emails/new-recipe-submission.php';
				break;
		}
	}

	return delicious_recipes_pro_get_template_html( $template );
}

/**
 * Is_recipe_pro_shortcode - Returns true when viewing a recipe shortcode page.
 *
 * @return bool
 */
function is_recipe_pro_shortcode() {
	return delicious_recipes_post_content_has_shortcode( 'dr_guest_recipe_submission' );
}

/**
 * Check if an equipment is featured equipment.
 *
 * @param [type] $equipment_id
 * @return boolean
 */
function delicious_recipes_pro_is_equipment_featured( $equipment_id ) {
	if ( ! $equipment_id ) {
		return false;
	}
	$featured = get_post_meta( $equipment_id, 'wp_delicious_featured_equipment', true );
	return ! empty( $featured ) && 'yes' === $featured;
}

/**
 * Get a list of featured equipments.
 */
function delicious_recipes_pro_get_featured_equipments() {
	$args = array(
		'post_type'   => DELICIOUS_RECIPES_EQUIPMENT_POST_TYPE,
		'numberposts' => -1,
	);

	$equipments = get_posts( $args );

	$equipments_array = array();
	foreach ( $equipments as $equipment ) {
		if ( delicious_recipes_pro_is_equipment_featured( $equipment->ID ) ) {
			$equipments_array[] = $equipment->ID;
		}
	}

	return apply_filters( 'wp_delicious_featured_equipments', $equipments_array, $args );
}

function delicious_recipes_pro_social_share( $post_id ) {
	if ( ! $post_id ) {
		global $post;
		$post_id = $post->ID;
	}
	$social_share = apply_filters( 'delicious_recipes_social_share', array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'reddit', 'email' ) );

	if ( $social_share ) {
		?>
		<ul class="social-icons">
			<?php
			foreach ( $social_share as $share ) {
				switch ( $share ) {
					case 'facebook':
						?>
						<li>
							<a href="<?php echo esc_url( 'https://www.facebook.com/sharer.php?u=' . get_the_permalink( $post_id ) ); ?>" rel="nofollow noopener" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<g id="Group_5931" data-name="Group 5931" transform="translate(-937.023 -1068)">
										<rect id="Rectangle_1365" data-name="Rectangle 1365" width="40" height="40"
											transform="translate(937.023 1068)" fill="#3b5998" />
										<path id="facebook"
											d="M126.94,8.518h1.753v7.217a.258.258,0,0,0,.258.258h2.973a.258.258,0,0,0,.258-.258V8.552H134.2a.258.258,0,0,0,.256-.228l.306-2.657a.258.258,0,0,0-.256-.287h-2.321V3.713c0-.5.27-.757.8-.757H134.5a.258.258,0,0,0,.258-.258V.26A.258.258,0,0,0,134.5,0h-2.092l-.1,0a4.009,4.009,0,0,0-2.621.988,2.748,2.748,0,0,0-.914,2.443V5.379h-1.84a.258.258,0,0,0-.258.258V8.26A.258.258,0,0,0,126.94,8.518Z"
											transform="translate(826.341 1080)" fill="#fff" />
									</g>
								</svg>
							</a>
						</li>
						<?php
						break;

					case 'twitter':
						?>
						<li>
							<a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?text=' . get_the_title( $post_id ) ) . '&nbsp;' . get_the_permalink( $post_id ); ?>" rel="nofollow noopener" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<g id="Group_5929" data-name="Group 5929" transform="translate(-861.023 -1068)">
										<rect id="Rectangle_1363" data-name="Rectangle 1363" width="40" height="40"
											transform="translate(861.023 1068)" fill="#2ca5db" />
										<path id="FontAwsome_twitter_" data-name="FontAwsome (twitter)"
											d="M13.891,51.216c.01.138.01.275.01.413a8.966,8.966,0,0,1-9.028,9.028A8.967,8.967,0,0,1,0,59.231a6.562,6.562,0,0,0,.766.039,6.355,6.355,0,0,0,3.939-1.356,3.179,3.179,0,0,1-2.967-2.2,4,4,0,0,0,.6.049,3.356,3.356,0,0,0,.835-.108A3.173,3.173,0,0,1,.629,52.542V52.5a3.2,3.2,0,0,0,1.434.4,3.178,3.178,0,0,1-.982-4.244,9.019,9.019,0,0,0,6.543,3.32,3.582,3.582,0,0,1-.079-.727,3.176,3.176,0,0,1,5.491-2.171,6.247,6.247,0,0,0,2.014-.766,3.164,3.164,0,0,1-1.395,1.749,6.362,6.362,0,0,0,1.827-.491A6.821,6.821,0,0,1,13.891,51.216Z"
											transform="translate(873.024 1033.918)" fill="#fff" />
									</g>
								</svg>
							</a>
						</li>
						<?php
						break;

					case 'linkedin':
						?>
						<li>
							<a href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $post_id ) . '&title=' . get_the_title( $post_id ) ); ?>" rel="nofollow noopener" target="_blank">
								<svg id="linkedin" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<rect id="Rectangle_1383" data-name="Rectangle 1383" width="40" height="40" fill="#0084b1"/>
									<g id="Group_5973" data-name="Group 5973" transform="translate(11.477 11.497)">
										<path id="Path_30700" data-name="Path 30700" d="M70.906,69.215a2.044,2.044,0,1,1-2.059,2.041A2.053,2.053,0,0,1,70.906,69.215Z" transform="translate(-68.847 -69.215)" fill="#fff"/>
										<path id="Path_30701" data-name="Path 30701" d="M77.161,186.023h-2.4a.563.563,0,0,1-.563-.563V175.234a.563.563,0,0,1,.563-.563h2.4a.563.563,0,0,1,.563.563V185.46A.563.563,0,0,1,77.161,186.023Z" transform="translate(-73.914 -169.019)" fill="#fff"/>
										<path id="Path_30702" data-name="Path 30702" d="M192.519,173.143a3.881,3.881,0,0,0-3.881-3.881h-.615A3.453,3.453,0,0,0,185,171.045l-.032,0v-1.255a.234.234,0,0,0-.234-.234h-2.99a.234.234,0,0,0-.234.234V180.67a.234.234,0,0,0,.234.234H184.8a.234.234,0,0,0,.234-.234v-6.288a1.993,1.993,0,0,1,1.954-2,1.977,1.977,0,0,1,2,1.977v6.314a.234.234,0,0,0,.234.234h3.063a.234.234,0,0,0,.234-.234v-7.529Z" transform="translate(-175.474 -163.9)" fill="#fff"/>
									</g>
								</svg>
							</a>
						</li>
						<?php
						break;

					case 'pinterest':
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ) );
						if ( $image ) :
							?>
						<li>
							<a href="<?php echo esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink( $post_id ) . ' &media=' . $image[0] . '&description=' . get_the_title( $post_id ) ); ?>" rel="nofollow noopener" target="_blank" data-pin-do="none" data-pin-custom="true">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<g id="Group_5928" data-name="Group 5928" transform="translate(-901.023 -1068)">
										<rect id="Rectangle_1364" data-name="Rectangle 1364" width="40" height="40"
											transform="translate(901.023 1068)" fill="#c8232c" />
										<path id="Path_30693" data-name="Path 30693"
											d="M31.506,12.124a13.8,13.8,0,0,1-2.382,5.021.227.227,0,0,1-.305.048.344.344,0,0,1-.346-.333,22.208,22.208,0,0,1,.869-7.607,13.725,13.725,0,0,1,.516-1.381,2.564,2.564,0,0,1,.648-3.149,1.369,1.369,0,0,1,2.29.539c.4,1.282-.03,2.979-.512,4.475.21.119.383.282.618.4a2.136,2.136,0,0,0,1.893.044,2.044,2.044,0,0,0,.526-.333,4.587,4.587,0,0,0,.78-1.3c.081-.244.153-.5.224-.753a4.1,4.1,0,0,0-2.84-4.889A3.991,3.991,0,0,0,28.816,4.27a4.877,4.877,0,0,0-.478,3.478,2.29,2.29,0,0,1,.312,1.415.7.7,0,0,1-.119.234.958.958,0,0,1-1.313.088,1.49,1.49,0,0,1-.387-.468c-1.649-1.612-.339-5.245.9-6.7A6.947,6.947,0,0,1,36.243.84a6.769,6.769,0,0,1,2.684,8.326C37.79,11.8,34.139,13.495,31.506,12.124Z"
											transform="translate(887.967 1079)" fill="#fff" />
									</g>
								</svg>
							</a>
						</li>
							<?php
						endif;
						break;

					case 'email':
						?>
						<li>
							<a href="<?php echo esc_url( 'mailto:?Subject=' . get_the_title( $post_id ) . '&Body=' . get_the_permalink( $post_id ) ); ?>" rel="nofollow noopener" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<g id="email" transform="translate(-368 -96)">
										<rect id="Rectangle_1384" data-name="Rectangle 1384" width="40" height="40" transform="translate(368 96)" fill="#00416a"/>
										<g id="_002-email" data-name="002-email" transform="translate(379.211 29.958)">
										<g id="Group_5975" data-name="Group 5975" transform="translate(0 80)">
											<g id="Group_5974" data-name="Group 5974">
											<path id="Path_30703" data-name="Path 30703" d="M16.479,80H1.1A1.1,1.1,0,0,0,0,81.1v.625l8.789,3.722,8.789-3.723V81.1A1.1,1.1,0,0,0,16.479,80Z" transform="translate(0 -80)" fill="#fff"/>
											</g>
										</g>
										<g id="Group_5977" data-name="Group 5977" transform="translate(0 82.917)">
											<g id="Group_5976" data-name="Group 5976">
											<path id="Path_30704" data-name="Path 30704" d="M9,168.591a.544.544,0,0,1-.428,0L0,164.96v8.069a1.1,1.1,0,0,0,1.1,1.1h15.38a1.1,1.1,0,0,0,1.1-1.1V164.96Z" transform="translate(0 -164.96)" fill="#fff"/>
											</g>
										</g>
										</g>
									</g>
								</svg>
							</a>
						</li>
						<?php
						break;

					case 'reddit':
						?>
						<li>
							<a href="<?php echo esc_url( 'http://www.reddit.com/submit?url=' . get_the_permalink( $post_id ) . '&title=' . get_the_title( $post_id ) ); ?>" rel="nofollow noopener" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<g id="reddit" transform="translate(-490 -98)">
										<rect id="Rectangle_1385" data-name="Rectangle 1385" width="40" height="40" transform="translate(490 98)" fill="#ff5722"/>
										<path id="reddit-2" data-name="reddit" d="M16.716,7.4a2.1,2.1,0,0,0-1.5.64,10.083,10.083,0,0,0-5.437-1.7l1.1-5.021,3.5.8a1.569,1.569,0,0,0,1.554,1.578,1.6,1.6,0,1,0-1.4-2.31L10.664.516A.37.37,0,0,0,10.228.8L9.022,6.338a10.208,10.208,0,0,0-5.4,1.722A2.1,2.1,0,0,0,2.1,7.4a2.122,2.122,0,0,0-.908,4.027,4.569,4.569,0,0,0-.1.994c0,3.371,3.743,6.1,8.339,6.1,4.615,0,8.358-2.732,8.358-6.1a3.908,3.908,0,0,0-.122-1.01A2.123,2.123,0,0,0,16.716,7.4ZM4.39,11.645a1.564,1.564,0,1,1,1.574,1.578A1.58,1.58,0,0,1,4.39,11.645Zm8.5,3.761c-1.443,1.464-5.515,1.464-6.959,0a.38.38,0,1,1,.524-.551c1.1,1.147,4.758,1.166,5.908,0a.381.381,0,0,1,.528.551Zm-.032-2.18a1.587,1.587,0,1,1,1.574-1.576A1.568,1.568,0,0,1,12.854,13.226Z" transform="translate(500.594 108.986)" fill="#fff"/>
									</g>
								</svg>
							</a>
						</li>
						<?php
						break;
				}
			}
			?>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'delicious_recipes_comments' ) ) {

	/**
	 * Output the Review comments template.
	 *
	 * @param WP_Comment $comment Comment object.
	 * @param array      $args Arguments.
	 * @param int        $depth Depth.
	 */
	function delicious_recipes_comments( $comment, $args, $depth ) {
		if ( empty( trim( $comment->comment_content ) ) ) {
			return;
		}
		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$GLOBALS['comment'] = $comment;
		delicious_recipes_pro_get_template(
			'recipe/review/all-reviews.php',
			array(
				'comment' => $comment,
				'args'    => $args,
				'depth'   => $depth,
			)
		);
	}
}

if ( ! function_exists( 'delicious_recipes_questions' ) ) {

	/**
	 * Output the Review questions template.
	 *
	 * @param WP_Comment $comment Comment object.
	 * @param array      $args Arguments.
	 * @param int        $depth Depth.
	 */
	function delicious_recipes_questions( $comment, $args, $depth ) {
		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$GLOBALS['comment'] = $comment;
		delicious_recipes_pro_get_template(
			'recipe/review/all-questions.php',
			array(
				'comment' => $comment,
				'args'    => $args,
				'depth'   => $depth,
			)
		);
	}
}

/**
 * Get average rating.
 *
 * @param [type] $id - Recipe ID
 * @return void
 */
function delicious_recipes_pro_get_average_rating( $id ) {
	$args     = array(
		'meta_key'   => 'rating',
		'orderby'    => 'meta_value_num',
		'order'      => 'DESC',
		'meta_query' => array(
			array(
				'key'     => 'rating',
				'compare' => 'EXISTS',
			),
		),
	);
	$comments = get_approved_comments( $id, $args );

	if ( $comments ) {
		$i           = 0;
		$total       = 0;
		$one_stars   = 0;
		$two_stars   = 0;
		$three_stars = 0;
		$four_stars  = 0;
		$five_stars  = 0;

		foreach ( $comments as $comment ) {
			$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
			if ( isset( $rate ) && '' !== $rate && 0 != $rate ) {
				$i++;
				$total += $rate;

				$one_stars   = 1 == absint( $rate ) ? $one_stars += 1 : $one_stars;
				$two_stars   = 2 == absint( $rate ) ? $two_stars += 1 : $two_stars;
				$three_stars = 3 == absint( $rate ) ? $three_stars += 1 : $three_stars;
				$four_stars  = 4 == absint( $rate ) ? $four_stars += 1 : $four_stars;
				$five_stars  = 5 == absint( $rate ) ? $five_stars += 1 : $five_stars;
			}
		}

		$rating_data = array(

			'aggregate_rating'    => round( $total / $i, 1 ),
			'total_ratings'       => $i,
			'one_stars'           => $one_stars,
			'two_stars'           => $two_stars,
			'three_stars'         => $three_stars,
			'four_stars'          => $four_stars,
			'five_stars'          => $five_stars,
			'one_stars_percent'   => $one_stars / $i * 100,
			'two_stars_percent'   => $two_stars / $i * 100,
			'three_stars_percent' => $three_stars / $i * 100,
			'four_stars_percent'  => $four_stars / $i * 100,
			'five_stars_percent'  => $five_stars / $i * 100,

		);

		return $rating_data;
	} else {
		return false;
	}
}

/**
 * Get count of users input for would you recommend recipe and did you make this recipe.
 *
 * @param [type] $id - Recipe ID
 * @return void
 */
function delicious_recipes_pro_get_input_count( $id ) {
	

	$comments = get_comments( array( 'post_id' => $id ));

	if ( $comments ) {
		$recommend_count   = 0;
		$not_recommend   = 0;
		$made_recipe_count = 0;
		$not_made_recipe = 0;

		foreach ( $comments as $comment ) {
			$recommend = get_comment_meta( $comment->comment_ID, 'would_recommend_recipe', true );
			$made      = get_comment_meta( $comment->comment_ID, 'did_make_recipe', true );

			if ( isset( $recommend ) && '' !== $recommend ) {
				$recommend_count = 'yes' == $recommend ? $recommend_count += 1 : $recommend_count;
				$not_recommend = 'no' == $recommend ? $not_recommend += 1 : $not_recommend;
			}

			if ( isset( $made ) && '' !== $made ) {
				$made_recipe_count = 'yes' == $made ? $made_recipe_count += 1 : $made_recipe_count;
				$not_made_recipe = 'no' == $made ? $not_made_recipe += 1 : $not_made_recipe;
			}
		}

		$input_data = array(
			'recommend_count'      => $recommend_count,
			'not_recommend'        => $not_recommend,
			'made_recipe_count'    => $made_recipe_count,
			'not_made_recipe'  	   => $not_made_recipe,
		);

		return $input_data;
	} else {
		return false;
	}
}

/**
 * Get a list of recipes.
 */
function delicious_recipes_pro_get_all_recipes() {
	$args = array(
		'post_type'   => DELICIOUS_RECIPE_POST_TYPE,
		'numberposts' => -1,
	);

	$recipes = get_posts( $args );

	$recipes_array = array();
	foreach ( $recipes as $recipe ) {

		$comments_array = array();
		$comments       = get_comments(
			array(
				'post_type' => DELICIOUS_RECIPE_POST_TYPE,
				'post_id'   => $recipe->ID,
				'status'    => 'hold, approve, spam, trash, all',
			)
		);
		foreach ( $comments as $comment ) {

			$comments_array[] = array(
				'commentid'     => $comment->comment_ID,
				'approve_nonce' => esc_html( '_wpnonce=' . wp_create_nonce( "approve-comment_$comment->comment_ID" ) ),
				'delete_nonce'  => esc_html( '_wpnonce=' . wp_create_nonce( "delete-comment_$comment->comment_ID" ) ),
			);
		}
		$recipes_array[] = array(
			'id'        => $recipe->ID,
			'title'     => esc_html( get_the_title( $recipe->ID ) ),
			'permalink' => esc_url( get_the_permalink( $recipe->ID ) ),
			'comments'  => $comments_array,
		);
	}

	return apply_filters( 'wp_delicious_recipes_all_recipes', $recipes_array, $args );
}

/**
 * Get a list of recipes.
 */
function delicious_recipes_pro_get_favorite_recipes( $paged = 1, $total_favorites = false ) {
	$paged = $paged ? absint( $paged ) : get_query_var( 'paged', 1 );
	$args  = array(
		'post_type'      => DELICIOUS_RECIPE_POST_TYPE,
		'posts_per_page' => 10,
		'post_status'    => 'publish',
		'meta_key'       => '_delicious_recipes_wishlists',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_delicious_recipes_wishlists',
				'compare' => '>',
				'value'   => 0,
			),
		),
		'paged'          => $paged,
	);

	if ( $total_favorites ) {
		$args['posts_per_page'] = -1;
	}

	$recipes_query = new WP_Query( $args );
	$recipes       = $recipes_query->get_posts();

	$recipes_array = array();
	$total         = 0;
	foreach ( $recipes as $recipe ) {

		$wishlists_count = get_post_meta( $recipe->ID, '_delicious_recipes_wishlists', true );
		$wishlists_count = isset( $wishlists_count ) && $wishlists_count ? absint( $wishlists_count ) : 0;

		$recipes_array['recipes'][] = array(
			'id'             => $recipe->ID,
			'title'          => esc_html( get_the_title( $recipe->ID ) ),
			'permalink'      => esc_url( get_the_permalink( $recipe->ID ) ),
			'thumbnail'      => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
			'edit_link'      => esc_url( get_edit_post_link( $recipe->ID ) ),
			'wishlist_count' => $wishlists_count,
		);
		$total                     += $wishlists_count;
	}

	$recipes_array['total_pages']  = $recipes_query->max_num_pages;
	$recipes_array['current_page'] = $paged;

	wp_reset_postdata();

	if ( $total_favorites ) {
		return $total;
	} else {
		return apply_filters( 'wp_delicious_added_to_wishlist_recipes', $recipes_array, $args );
	}

}

/**
 * Get a list of recipes.
 */
function delicious_recipes_pro_get_user_submitted_recipes( $paged = 1, $total_submitted = false ) {
	$paged = $paged ? absint( $paged ) : get_query_var( 'paged', 1 );
	$args  = array(
		'post_type'      => DELICIOUS_RECIPE_POST_TYPE,
		'posts_per_page' => 10,
		'post_status'    => 'all',
		'meta_query'     => array(
			array(
				'key'   => '_dr_user_submission_recipe',
				'value' => 'yes',
			),
		),
		'paged'          => $paged,
	);

	if ( $total_submitted ) {
		$args['posts_per_page'] = -1;
	}

	$recipes_query = new WP_Query( $args );
	$recipes       = $recipes_query->get_posts();

	$recipes_array = array();
	$total         = 0;
	foreach ( $recipes as $recipe ) {

		$recipes_array['recipes'][] = array(
			'id'        => $recipe->ID,
			'title'     => esc_html( get_the_title( $recipe->ID ) ),
			'permalink' => esc_url( get_the_permalink( $recipe->ID ) ),
			'thumbnail' => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
			'edit_link' => esc_url( get_edit_post_link( $recipe->ID ) ),
			'status'    => get_post_status( $recipe->ID ),
		);
		$total++;
	}

	$recipes_array['total_pages']  = $recipes_query->max_num_pages;
	$recipes_array['current_page'] = $paged;

	wp_reset_postdata();

	if ( $total_submitted ) {
		return $total;
	} else {
		return apply_filters( 'wp_delicious_user_submitted_recipes', $recipes_array, $args );
	}

}

/**
 * Get a list of pending recipes.
 */
function delicious_recipes_pro_get_pending_recipes( $total_pending = false ) {
	$args = array(
		'post_type'   => DELICIOUS_RECIPE_POST_TYPE,
		'numberposts' => -1,
		'post_status' => 'pending',
		'meta_query'  => array(
			array(
				'key'   => '_dr_user_submission_recipe',
				'value' => 'yes',
			),
		),
	);

	$recipes = get_posts( $args );

	$recipes_array = array();
	foreach ( $recipes as $recipe ) {

		$recipes_array[] = array(
			'id'        => $recipe->ID,
			'title'     => esc_html( get_the_title( $recipe->ID ) ),
			'permalink' => esc_url( get_the_permalink( $recipe->ID ) ),
			'thumbnail' => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
			'edit_link' => esc_url( get_edit_post_link( $recipe->ID ) ),
			'status'    => get_post_status( $recipe->ID ),
		);
	}

	if ( $total_pending ) {
		return count( $recipes_array );
	} else {
		return apply_filters( 'wp_delicious_user_submitted_pending_recipes', $recipes_array, $args );
	}

}

/**
 * Get a list of popular recipes by views.
 */
function delicious_recipes_pro_get_popular_recipes( $paged ) {
	$paged = $paged ? absint( $paged ) : get_query_var( 'paged', 1 );
	$args  = array(
		'post_type'      => DELICIOUS_RECIPE_POST_TYPE,
		'posts_per_page' => 10,
		'post_status'    => 'publish',
		'meta_key'       => '_delicious_recipes_view_count',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_delicious_recipes_view_count',
				'compare' => '>',
				'value'   => 0,
			),
		),
		'paged'          => $paged,
	);

	$recipes_query = new WP_Query( $args );
	$recipes       = $recipes_query->get_posts();

	$recipes_array = array();
	foreach ( $recipes as $recipe ) {
		$views_count = get_post_meta( $recipe->ID, '_delicious_recipes_view_count', true );
		$views_count = isset( $views_count ) && $views_count ? $views_count : 0;

		$recipes_array['recipes'][] = array(
			'id'          => $recipe->ID,
			'title'       => esc_html( get_the_title( $recipe->ID ) ),
			'permalink'   => esc_url( get_the_permalink( $recipe->ID ) ),
			'thumbnail'   => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
			'edit_link'   => esc_url( get_edit_post_link( $recipe->ID ) ),
			'views_count' => $views_count,
		);
	}
	$recipes_array['total_pages']  = $recipes_query->max_num_pages;
	$recipes_array['current_page'] = $paged;

	wp_reset_postdata();

	return apply_filters( 'wp_delicious_popular_recipes', $recipes_array, $args );

}

/**
 * Get a list of top rated recipes.
 */
function delicious_recipes_pro_get_top_rated_recipes( $paged = 1, $total_rated = false ) {
	$comment_args = array(
		'post_type'     => DELICIOUS_RECIPE_POST_TYPE,
		'numberposts'   => -1,
		'post_status'   => 'publish',
		'orderby'       => 'comment_count',
		'order'         => 'DESC',
		'comment_count' => array(
			'value'   => 0,
			'compare' => '>',
		),
	);

	$recipes = get_posts( $comment_args );

	$top_rated_recipes = array();
	$total             = 0;

	foreach ( $recipes as $recipe ) {
		$rating       = delicious_recipes_get_average_rating( $recipe->ID );
		$rating_count = delicious_recipes_get_average_rating( $recipe->ID, true );
		if ( $rating_count ) {
			$top_rated_recipes[] = array(
				'id'           => $recipe->ID,
				'rating'       => $rating,
				'rating_count' => $rating_count,
			);
			$total              += $rating_count;
		}
	}

	if ( $total_rated ) {
		return $total;
	}

	usort(
		$top_rated_recipes,
		function ( $a, $b ) {
			if ( $a['rating_count'] === $b['rating_count'] ) {
				return $b['rating'] > $a['rating'] ? 1 : -1;
			}
			return $b['rating_count'] > $a['rating_count'] ? 1 : -1;
		}
	);

	// asort( $top_rated_recipes );
	$top_rated_recipes = array_column( $top_rated_recipes, 'id' );

	$paged = $paged ? absint( $paged ) : get_query_var( 'paged', 1 );
	$args  = array(
		'post_type'      => DELICIOUS_RECIPE_POST_TYPE,
		'posts_per_page' => 10,
		'post_status'    => 'publish',
		'post__in'       => $top_rated_recipes,
		'orderby'        => 'post__in',
		'paged'          => $paged,
	);

	$recipes_query = new WP_Query( $args );
	$recipes       = $recipes_query->get_posts();

	$recipes_array = array();
	foreach ( $recipes as $recipe ) {

		$rating       = delicious_recipes_get_average_rating( $recipe->ID );
		$rating_count = delicious_recipes_get_average_rating( $recipe->ID, true );
		// $total_rating_count = delicious_recipes_get_average_rating( $recipe->ID, false, true );

		$recipes_array['recipes'][] = array(
			'id'           => $recipe->ID,
			'title'        => esc_html( get_the_title( $recipe->ID ) ),
			'permalink'    => esc_url( get_the_permalink( $recipe->ID ) ),
			'thumbnail'    => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
			'edit_link'    => esc_url( get_edit_post_link( $recipe->ID ) ),
			'rating'       => $rating,
			'rating_count' => $rating_count,
		);
	}

	$recipes_array['total_pages']  = $recipes_query->max_num_pages;
	$recipes_array['current_page'] = $paged;

	wp_reset_postdata();

	return apply_filters( 'wp_delicious_user_top_rated_recipes', $recipes_array, $args );

}

/**
 * Get a list of liked recipes.
 */
function delicious_recipes_pro_get_liked_recipes( $total_likes = false ) {
	$args = array(
		'post_type'   => DELICIOUS_RECIPE_POST_TYPE,
		'numberposts' => 10,
		'post_status' => 'publish',
		'meta_key'    => '_recipe_likes',
		'orderby'     => 'meta_value_num',
		'order'       => 'DESC',
		'meta_query'  => array(
			array(
				'key'     => '_recipe_likes',
				'compare' => 'EXISTS',
			),
		),
	);

	if ( $total_likes ) {
		$args['numberposts'] = -1;
	}

	$recipes = get_posts( $args );

	$recipes_array = array();
	$total         = 0;
	foreach ( $recipes as $recipe ) {

		$likes_count = get_post_meta( $recipe->ID, '_recipe_likes', true );
		$likes_count = isset( $likes_count ) && $likes_count ? absint( $likes_count ) : 0;

		if ( $likes_count > 0 ) {
			$recipes_array[] = array(
				'id'          => $recipe->ID,
				'title'       => esc_html( get_the_title( $recipe->ID ) ),
				'permalink'   => esc_url( get_the_permalink( $recipe->ID ) ),
				'thumbnail'   => has_post_thumbnail( $recipe->ID ) ? get_the_post_thumbnail_url( $recipe->ID ) : '',
				'edit_link'   => esc_url( get_edit_post_link( $recipe->ID ) ),
				'likes_count' => $likes_count,
			);
			$total          += $likes_count;
		}
	}

	if ( $total_likes ) {
		return $total;
	} else {
		return apply_filters( 'wp_delicious_liked_recipes', $recipes_array, $args );
	}

}

/**
 * Get recipe analytics.
 */
function delicious_recipes_pro_get_recipes_analytics() {

	$recipes_array = array();
	$current_user  = wp_get_current_user();

	if ( is_user_logged_in() ) {
		$recipes_array = array(
			'logged_user'               => esc_html( $current_user->display_name ),
			'total_recipes'             => wp_count_posts( DELICIOUS_RECIPE_POST_TYPE )->publish,
			'total_likes'               => delicious_recipes_pro_get_liked_recipes( true ),
			'total_favorites'           => delicious_recipes_pro_get_favorite_recipes( 1, true ),
			'total_ratings'             => delicious_recipes_pro_get_top_rated_recipes( 1, true ),
			'total_recipe_submissions'  => delicious_recipes_pro_get_user_submitted_recipes( 1, true ),
			'total_pending_submissions' => delicious_recipes_pro_get_pending_recipes( true ),
		);
	}

	return apply_filters( 'wp_delicious_recipe_analytics', $recipes_array );
}

/**
 * Determines if we're looking at the submisions view.
 */
function delicious_recipes_pro_get_submission_attributes() {
	$attrs = 'class=""';

	if ( filter_input( INPUT_GET, 'submission' ) ) {
		$attrs = 'class="current" aria-current="page"';
	}

	return $attrs;
}

/**
 * Determines how many submission posts exist in the database.
 */
function delicious_recipes_pro_filter_submission_results( $count = false ) {
	$args = array(
		'post_type'   => DELICIOUS_RECIPE_POST_TYPE,
		'numberposts' => -1,
		'post_status' => array( 'publish', 'pending', 'draft' ),
		'meta_query'  => array(
			array(
				'key'   => '_dr_user_submission_recipe',
				'value' => 'yes',
			),
		),
		'orderby'     => 'date',
		'order'       => 'DESC',
	);

	if ( ! $count ) {
		$args['author'] = get_current_user_id();
	}

	$recipes = get_posts( $args );

	if ( $count ) {
		return count( $recipes );
	}

	$recipes_array = array();
	foreach ( $recipes as $recipe ) {

		$recipes_array[] = array(
			'id'        => $recipe->ID,
			'title'     => esc_html( get_the_title( $recipe->ID ) ),
			'permalink' => esc_url( get_the_permalink( $recipe->ID ) ),
			'edit_link' => esc_url( get_edit_post_link( $recipe->ID ) ),
			'status'    => get_post_status( $recipe->ID ),
		);
	}

	return $recipes_array;
}

/**
 * Get Related Recipes Posts Content.
 */
function delicious_recipes_pro_get_related_recipes_content() {
	global $post;
	if ( ! is_recipe() ) {
		return;
	}

	$global_settings  = delicious_recipes_get_global_settings();
	$section_title    = isset( $global_settings['relatedSectionTitle'] ) ? $global_settings['relatedSectionTitle'] : __( 'Related Recipes', 'delicious-recipes-pro' );
	$tax_filter       = isset( $global_settings['relatedFilter'] ) ? $global_settings['relatedFilter'] : 'recipe-course';
	$show_thumbnail   = isset( $global_settings['showThumbnail']['0'] ) && 'yes' === $global_settings['showThumbnail']['0'] ? true : false;
	$related_per_page = isset( $global_settings['noofRelatedRecipes'] ) ? $global_settings['noofRelatedRecipes'] : 3;
	$show_fullwidth   = isset( $global_settings['fullwidthRelatedSection']['0'] ) && 'yes' === $global_settings['fullwidthRelatedSection']['0'] ? true : false;

	$args = array(
		'post_type'      => DELICIOUS_RECIPE_POST_TYPE,
		'posts_status'   => 'publish',
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => $related_per_page,
		'tax_query'      => array(
			array(
				'taxonomy' => $tax_filter,
				'field'    => 'term_id',
				'terms'    => wp_get_post_terms( $post->ID, $tax_filter, array( 'fields' => 'ids' ) ),
			),
		),
	);

	$related_recipes = new \WP_Query( $args );
	if ( ! $related_recipes->have_posts() ) {
		return;
	}

	ob_start();
	?>
	<div class="dr-related-recipes dr-related-posts-splide <?php echo $show_fullwidth ? 'full-width' : ''; ?>" data-id="<?php echo esc_attr( $post->ID ); ?>">
		<div class="dr-related-recipes__title"><?php echo esc_html( $section_title ); ?></div>
		<div class="splide dr-related-splide dr-related-splide-<?php echo esc_attr( $post->ID ); ?>">
			<div class="splide__track">
				<div class="splide__list dr-related-recipes__list">
					<?php
						$i = 1;
					while ( $related_recipes->have_posts() ) {
						$related_recipes->the_post();
						$data = array(
							'thumbnail' => $show_thumbnail,
							'i'         => $i,
							'count'     => $related_recipes->post_count,
						);

						delicious_recipes_pro_get_template( 'related-recipes.php', $data );
						$i++;
					}
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
	<?php

	$related_recipes_content = ob_get_clean();
	return $related_recipes_content;
}

function delicious_recipes_pro_insert_after_paragraph( $related_content, $paragraph_id, $content ) {
	$closing_p            = '</p>';
	$paragraphs           = explode( $closing_p, $content );
	$last_paragraph_index = count( $paragraphs );

	foreach ( $paragraphs as $index => $paragraph ) {
		if ( trim( $paragraph ) ) {
			$paragraphs[ $index ] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[ $index ] .= $related_content;

		} elseif ( $last_paragraph_index + $paragraph_id == $index + 1 ) {
			$paragraphs[ $index ] .= $related_content;
		}
	}

	return implode( '', $paragraphs );
}
