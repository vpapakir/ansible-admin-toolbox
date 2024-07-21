<?php

/**
 * Recipe floating bar template.
 *
 * @package Delicious_Recipes_Pro
 */

defined( 'ABSPATH' ) || exit;

global $recipe, $wp;
$global_toggles  = delicious_recipes_get_global_toggles_and_labels();
$global_settings = delicious_recipes_get_global_settings();

// Print Recipe variables
$the_permalink       = get_the_permalink();
$recipe_servimgs     = isset( $recipe->no_of_servings ) && ! empty( $recipe->no_of_servings ) ? $recipe->no_of_servings : 1;
$the_print_permalink = add_query_arg(
	array(
		'print_recipe'    => 'true',
		'recipe_servings' => absint( $recipe_servimgs ),
	),
	$the_permalink
);

// Add to Favorities variables
$current_user           = wp_get_current_user();
$dashboard_page_exists  = delicious_recipes_get_dashboard_page_id() > 0;
$_user_meta             = get_user_meta( $current_user->ID, 'delicious_recipes_user_meta', true );
$bookmarked             = isset( $_user_meta['wishlists'] ) && in_array( $recipe->ID, $_user_meta['wishlists'] ) ? 'dr-wishlist-is-bookmarked' : '';
$recipe_wishlists_count = isset( $recipe->wishlists_count ) && $recipe->wishlists_count ? number_format( $recipe->wishlists_count, 0 ) : 0;
$add_to_wishlist_lbl    = $bookmarked ? __( 'Added to Favorites', 'delicious-recipes-pro' ) : $global_toggles['add_to_wishlist_lbl'];

$classes = array( 'dr_wishlist__recipe addtowishlist button' );
if ( $bookmarked ) :
	$classes[] = $bookmarked;
endif;
$classes[]        = is_user_logged_in() ? 'dr-bookmark-wishlist' : 'dr-popup-user__registration';
$wishlist_classes = implode( ' ', $classes );

// Recipe Pro Global toggles
$reading_mode     = isset( $global_settings['floatingBarToggles']['0']['enable']['0'] ) && 'yes' === $global_settings['floatingBarToggles']['0']['enable']['0'] ? true : false;
$reading_mode_lbl = isset( $global_settings['floatingBarToggles']['0']['label'] ) && '' != $global_settings['floatingBarToggles']['0']['label'] ? $global_settings['floatingBarToggles']['0']['label'] : __( 'Start Reading Mode', 'delicious-recipes-pro' );

$timer     = isset( $global_settings['floatingBarToggles']['1']['enable']['0'] ) && 'yes' === $global_settings['floatingBarToggles']['1']['enable']['0'] ? true : false;
$timer_lbl = isset( $global_settings['floatingBarToggles']['1']['label'] ) && '' != $global_settings['floatingBarToggles']['1']['label'] ? $global_settings['floatingBarToggles']['1']['label'] : __( 'Start Timer', 'delicious-recipes-pro' );

$share     = isset( $global_settings['floatingBarToggles']['2']['enable']['0'] ) && 'yes' === $global_settings['floatingBarToggles']['2']['enable']['0'] ? true : false;
$share_lbl = isset( $global_settings['floatingBarToggles']['2']['label'] ) && '' != $global_settings['floatingBarToggles']['2']['label'] ? $global_settings['floatingBarToggles']['2']['label'] : __( 'Share', 'delicious-recipes-pro' );

$print_preview_style = isset( $global_settings['printPreviewStyle'] ) ? $global_settings['printPreviewStyle'] : '_self';

?>
<div class="dr-floating-bar-wrapper">
	<div class="dr-floating-menu-wrapper">
		<div class="dr-container container">
			<div class="dr-floating-box">

				<!-- this is for mobile -->
				<div class="drbtnsmobile">
					<?php if ( $global_toggles['enable_print_recipe'] ) : ?>
						<div class="drbxitem">
							<a
							target="<?php echo esc_attr( $print_preview_style ); ?>"
							href="<?php echo esc_url( $the_print_permalink ); ?>" class="printrecipe button dr-single-recipe-print-<?php echo esc_attr( $recipe->ID ); ?>">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="17.228" height="16" viewBox="0 0 17.228 16">
										<path id="print" d="M3.242,26.923V22.87a.074.074,0,0,1,.074-.074h8.1a.075.075,0,0,1,.034.008l.271.112-.028.068.028-.068a.073.073,0,0,1,.028.02l1.813,1.788.117.115-.051.053.052-.053a.074.074,0,0,1,.022.053v2.031A.074.074,0,0,1,13.63,27h-.787a.074.074,0,0,1-.074-.074v-.965H10.687a.074.074,0,0,1-.074-.074s0,0,0-.006v-.389h0V23.734H4.18v3.189A.074.074,0,0,1,4.106,27h-.79a.074.074,0,0,1-.074-.074Zm1.087,5.385h8.548l.017,0a.911.911,0,0,1,.822.561.892.892,0,0,1,.068.329.062.062,0,0,1,0,.017v1.3h1.86a.631.631,0,0,0,.23-.05.669.669,0,0,0,.212-.142.661.661,0,0,0,.142-.212.631.631,0,0,0,.049-.231.124.124,0,0,1,0-.015V28.9a.088.088,0,0,1,0-.016.639.639,0,0,0-.05-.23.659.659,0,0,0-.142-.211.675.675,0,0,0-.212-.143.628.628,0,0,0-.231-.049H1.575l-.016,0a.632.632,0,0,0-.23.05.675.675,0,0,0-.212.143.66.66,0,0,0-.142.211.636.636,0,0,0-.049.231.1.1,0,0,1,0,.014v4.964a.079.079,0,0,1,0,.015.628.628,0,0,0,.05.23.661.661,0,0,0,.142.212.668.668,0,0,0,.212.142.635.635,0,0,0,.231.05H3.419v-1.3a.1.1,0,0,1,0-.017.912.912,0,0,1,.069-.33.923.923,0,0,1,.187-.284l.01-.011a.908.908,0,0,1,.625-.265l.017,0h0Zm9.457,3.144v2.435a.062.062,0,0,1,0,.017.888.888,0,0,1-.069.33.906.906,0,0,1-.821.56l-.017,0H4.329l-.017,0a.912.912,0,0,1-.329-.068.912.912,0,0,1-.492-.491.888.888,0,0,1-.069-.33.062.062,0,0,1,0-.017V35.452H1.575l-.017,0A1.583,1.583,0,0,1-.009,33.883a.076.076,0,0,1,0-.017V28.9a.071.071,0,0,1,0-.017,1.584,1.584,0,0,1,1.567-1.567l.017,0H15.631l.017,0a1.583,1.583,0,0,1,1.567,1.567.071.071,0,0,1,0,.017v4.964a.073.073,0,0,1,0,.017,1.583,1.583,0,0,1-1.567,1.567l-.017,0H13.786ZM12.533,25.02l-.982-.968v.968Zm.315,8.227H4.358v4.612h8.49V33.246Z" transform="translate(0.011 -22.796)" fill="#fff" />
									</svg>
								</i>
								<?php echo esc_html( $global_toggles['print_recipe_lbl'] ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php if ( $share ) : ?>
						<div class="drbxitem">
							<button type="button" class="share" onclick="handleShareLinks()">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="13.627" height="13.617" viewBox="0 0 13.627 13.617">
										<g id="Group_5951" data-name="Group 5951" transform="translate(0.126 0.125)">
											<path id="Path_30596" data-name="Path 30596" d="M154.127,336.862a1.727,1.727,0,0,1-.38-.042,1.681,1.681,0,0,1-1.337-1.636.915.915,0,0,0-.636-.966c-1.426-.755-2.9-1.554-4.369-2.354a.6.6,0,0,0-.346-.1.661.661,0,0,0-.523.255,2.368,2.368,0,0,1-2.587.389,2.486,2.486,0,0,1-1.449-2.386,2.3,2.3,0,0,1,1.454-2.062,2.334,2.334,0,0,1,1.012-.233,2.294,2.294,0,0,1,1.609.654.626.626,0,0,0,.486.215.658.658,0,0,0,.393-.129c1.5-.812,3.046-1.645,4.6-2.472a.629.629,0,0,0,.351-.746,1.715,1.715,0,0,1,1.613-1.749l.11,0c.059,0,.118,0,.177.009a1.731,1.731,0,0,1-.16,3.455l-.092,0a1.612,1.612,0,0,1-.952-.36.588.588,0,0,0-.407-.156.613.613,0,0,0-.358.115c-1.531.827-3.1,1.675-4.678,2.519a.578.578,0,0,0-.326.662c0,.143,0,.348,0,.554,0,.149,0,.3,0,.446a.633.633,0,0,0,.222.472l.031.027,4.833,2.61a.589.589,0,0,0,.285.077.6.6,0,0,0,.384-.151,1.689,1.689,0,0,1,2.163.033,1.733,1.733,0,0,1-1.117,3.057Zm.008-2.824a1.095,1.095,0,0,0-.034,2.189h0a1.112,1.112,0,0,0,1.128-1.074,1.094,1.094,0,0,0-1.094-1.115Zm-9.189-5.667a1.807,1.807,0,1,0,1.8,1.82,1.814,1.814,0,0,0-1.8-1.82Zm9.183-4.238a1.177,1.177,0,1,0,.021,0Z" transform="translate(-142.496 -323.495)" fill="#fff" stroke="#374757" stroke-width="0.25" />
										</g>
									</svg>
								</i>
								<?php echo esc_html( $share_lbl ); ?>
							</button>
						</div>
					<?php endif; ?>

					<?php if ( $global_toggles['enable_add_to_wishlist'] && $recipe && $dashboard_page_exists ) : ?>
						<div class="drbxitem dr-add-to-wishlist-single">
							<div class="dr-recipe-wishlist">
								<span id="dr-wishlist-id-<?php echo esc_attr( $recipe->ID ); ?>" data-recipe-id="<?php echo esc_attr( $recipe->ID ); ?>" class="<?php echo esc_attr( $wishlist_classes ); ?>">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" width="10.72" height="12.37" viewBox="0 0 10.72 12.37">
											<g id="noun_Save_3849318" transform="translate(-6 -5)">
												<g id="Group_5920" data-name="Group 5920" transform="translate(6 5)">
													<path id="Path_30691" data-name="Path 30691" d="M16.308,5h-9.9A.412.412,0,0,0,6,5.412V16.957a.412.412,0,0,0,.676.317l4.684-3.9,4.684,3.9a.412.412,0,0,0,.264.1.418.418,0,0,0,.175-.039.412.412,0,0,0,.237-.374V5.412A.412.412,0,0,0,16.308,5ZM15.9,16.078l-4.272-3.56a.412.412,0,0,0-.528,0l-4.272,3.56V5.825H15.9Z" transform="translate(-6 -5)" fill="#fff" />
												</g>
											</g>
										</svg>
									</i>
									<span class="dr-wishlist-total"><?php echo esc_html( $recipe_wishlists_count ); ?></span>
									<span class="dr-wishlist-info"><?php echo esc_html( $add_to_wishlist_lbl ); ?></span>
								</span>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<!-- this is for desktop -->
				<?php if ( $reading_mode ) : ?>
					<div class="drbxitem order-1-s">
						<button type="button" class="startreadingmode" onclick="startReadingMode()">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="15.196" height="12.869" viewBox="0 0 15.196 12.869">
									<g id="Group_5947" data-name="Group 5947" transform="translate(-3 -4.991)">
										<path id="Path_30697" data-name="Path 30697" d="M17.891,5.912A8.337,8.337,0,0,0,10.6,5.777,8.339,8.339,0,0,0,3.3,5.912a.584.584,0,0,0-.3.513V17.27a.584.584,0,0,0,.864.513,7.38,7.38,0,0,1,6.456,0c.011.006.023.008.033.013s.027.011.041.016l.019.008c.008,0,.014.006.021.008a.594.594,0,0,0,.162.027h0c.012,0,.023,0,.034,0l.044-.006a.61.61,0,0,0,.121-.03l.049-.02h0c.008,0,.016,0,.023-.007a7.371,7.371,0,0,1,6.458,0,.584.584,0,0,0,.868-.517V6.425a.585.585,0,0,0-.3-.513ZM4.169,16.353V6.783a7.326,7.326,0,0,1,5.845.016v9.585a8.371,8.371,0,0,0-5.845-.03Zm12.858,0a8.364,8.364,0,0,0-5.845.032V6.8a7.33,7.33,0,0,1,5.845-.016Z" transform="translate(0)" fill="#fff" />
									</g>
								</svg>
							</i>
							<?php echo esc_html( $reading_mode_lbl ); ?>
						</button>
					</div>
				<?php endif; ?>

				<?php if ( $global_toggles['enable_print_recipe'] ) : ?>
					<div class="drbxitem d-none-mobile">
						<a
						target="<?php echo esc_attr( $print_preview_style ); ?>"
						href="<?php echo esc_url( $the_print_permalink ); ?>" class="printrecipe button dr-single-recipe-print-<?php echo esc_attr( $recipe->ID ); ?>">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="17.228" height="16" viewBox="0 0 17.228 16">
									<path id="print" d="M3.242,26.923V22.87a.074.074,0,0,1,.074-.074h8.1a.075.075,0,0,1,.034.008l.271.112-.028.068.028-.068a.073.073,0,0,1,.028.02l1.813,1.788.117.115-.051.053.052-.053a.074.074,0,0,1,.022.053v2.031A.074.074,0,0,1,13.63,27h-.787a.074.074,0,0,1-.074-.074v-.965H10.687a.074.074,0,0,1-.074-.074s0,0,0-.006v-.389h0V23.734H4.18v3.189A.074.074,0,0,1,4.106,27h-.79a.074.074,0,0,1-.074-.074Zm1.087,5.385h8.548l.017,0a.911.911,0,0,1,.822.561.892.892,0,0,1,.068.329.062.062,0,0,1,0,.017v1.3h1.86a.631.631,0,0,0,.23-.05.669.669,0,0,0,.212-.142.661.661,0,0,0,.142-.212.631.631,0,0,0,.049-.231.124.124,0,0,1,0-.015V28.9a.088.088,0,0,1,0-.016.639.639,0,0,0-.05-.23.659.659,0,0,0-.142-.211.675.675,0,0,0-.212-.143.628.628,0,0,0-.231-.049H1.575l-.016,0a.632.632,0,0,0-.23.05.675.675,0,0,0-.212.143.66.66,0,0,0-.142.211.636.636,0,0,0-.049.231.1.1,0,0,1,0,.014v4.964a.079.079,0,0,1,0,.015.628.628,0,0,0,.05.23.661.661,0,0,0,.142.212.668.668,0,0,0,.212.142.635.635,0,0,0,.231.05H3.419v-1.3a.1.1,0,0,1,0-.017.912.912,0,0,1,.069-.33.923.923,0,0,1,.187-.284l.01-.011a.908.908,0,0,1,.625-.265l.017,0h0Zm9.457,3.144v2.435a.062.062,0,0,1,0,.017.888.888,0,0,1-.069.33.906.906,0,0,1-.821.56l-.017,0H4.329l-.017,0a.912.912,0,0,1-.329-.068.912.912,0,0,1-.492-.491.888.888,0,0,1-.069-.33.062.062,0,0,1,0-.017V35.452H1.575l-.017,0A1.583,1.583,0,0,1-.009,33.883a.076.076,0,0,1,0-.017V28.9a.071.071,0,0,1,0-.017,1.584,1.584,0,0,1,1.567-1.567l.017,0H15.631l.017,0a1.583,1.583,0,0,1,1.567,1.567.071.071,0,0,1,0,.017v4.964a.073.073,0,0,1,0,.017,1.583,1.583,0,0,1-1.567,1.567l-.017,0H13.786ZM12.533,25.02l-.982-.968v.968Zm.315,8.227H4.358v4.612h8.49V33.246Z" transform="translate(0.011 -22.796)" fill="#fff" />
								</svg>
							</i>
							<?php echo esc_html( $global_toggles['print_recipe_lbl'] ); ?>
						</a>
					</div>
				<?php endif; ?>

				<?php if ( $share ) : ?>
					<div class="drbxitem d-none-mobile">
						<button type="button" class="share" onclick="handleShareLinks()">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="13.627" height="13.617" viewBox="0 0 13.627 13.617">
									<g id="Group_5951" data-name="Group 5951" transform="translate(0.126 0.125)">
										<path id="Path_30596" data-name="Path 30596" d="M154.127,336.862a1.727,1.727,0,0,1-.38-.042,1.681,1.681,0,0,1-1.337-1.636.915.915,0,0,0-.636-.966c-1.426-.755-2.9-1.554-4.369-2.354a.6.6,0,0,0-.346-.1.661.661,0,0,0-.523.255,2.368,2.368,0,0,1-2.587.389,2.486,2.486,0,0,1-1.449-2.386,2.3,2.3,0,0,1,1.454-2.062,2.334,2.334,0,0,1,1.012-.233,2.294,2.294,0,0,1,1.609.654.626.626,0,0,0,.486.215.658.658,0,0,0,.393-.129c1.5-.812,3.046-1.645,4.6-2.472a.629.629,0,0,0,.351-.746,1.715,1.715,0,0,1,1.613-1.749l.11,0c.059,0,.118,0,.177.009a1.731,1.731,0,0,1-.16,3.455l-.092,0a1.612,1.612,0,0,1-.952-.36.588.588,0,0,0-.407-.156.613.613,0,0,0-.358.115c-1.531.827-3.1,1.675-4.678,2.519a.578.578,0,0,0-.326.662c0,.143,0,.348,0,.554,0,.149,0,.3,0,.446a.633.633,0,0,0,.222.472l.031.027,4.833,2.61a.589.589,0,0,0,.285.077.6.6,0,0,0,.384-.151,1.689,1.689,0,0,1,2.163.033,1.733,1.733,0,0,1-1.117,3.057Zm.008-2.824a1.095,1.095,0,0,0-.034,2.189h0a1.112,1.112,0,0,0,1.128-1.074,1.094,1.094,0,0,0-1.094-1.115Zm-9.189-5.667a1.807,1.807,0,1,0,1.8,1.82,1.814,1.814,0,0,0-1.8-1.82Zm9.183-4.238a1.177,1.177,0,1,0,.021,0Z" transform="translate(-142.496 -323.495)" fill="#fff" stroke="#374757" stroke-width="0.25" />
									</g>
								</svg>
							</i>
							<?php echo esc_html( $share_lbl ); ?>
						</button>
					</div>
				<?php endif; ?>

				<?php if ( $timer ) : ?>
					<div id="<?php echo esc_attr( $recipe->ID ); ?>" class="drbxitem order-3-s dr-reading-timer-wrapper">
						<div class="dr-time-wrap">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="15.75" viewBox="0 0 14 15.75">
									<g id="noun_timer_3119309" transform="translate(-4 -2)" opacity="0.5">
										<g id="_5" data-name="5" transform="translate(4 2)">
											<path id="Path_30696" data-name="Path 30696" d="M11,3.75a7,7,0,1,0,7,7A7,7,0,0,0,11,3.75Zm0,12.833a5.833,5.833,0,1,1,5.833-5.833A5.833,5.833,0,0,1,11,16.583Zm-2.333-14A.583.583,0,0,1,9.25,2h3.5a.583.583,0,1,1,0,1.167H9.25A.583.583,0,0,1,8.667,2.583Zm5.792,9.549a.583.583,0,0,1-.758.327l-2.917-1.167a.583.583,0,0,1-.368-.542V6.667a.583.583,0,1,1,1.167,0v3.687l2.549,1.021a.583.583,0,0,1,.327.758Z" transform="translate(-4 -2)" fill="#fff" />
										</g>
									</g>
								</svg>
							</i>
							<div class="dr-time-input" id="dr-time-input">
								<input type="number" value="10" min="1" id="dr-recipe-timer" onchange="changeTimer()">
								<span><?php esc_html_e( 'Min', 'delicious-recipes-pro' ); ?></span>
							</div>

							<div class="dr-timer-counter" id="clockdiv" style="display:none">
								<span class="countdown-row countdown-amount" id="clock"></span>
								<audio id="myAudio" src="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/sounds/cookies-are-ready-95956.mp3'; ?>"></audio>
							</div>
						</div>
						<button id="dr-pause-timer-btn" type="button" style="display:none">
							<?php esc_html_e( 'Pause', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-resume-timer-btn" type="button" style="display:none">
							<?php esc_html_e( 'Resume', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-stop-timer-btn" type="button" style="display:none" onclick="stopTimer()">
							<?php esc_html_e( 'Stop', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-start-timer-btn" type="button" class="starttimer" onclick="startTimer()">
							<?php echo esc_html( $timer_lbl ); ?>
						</button>
					</div>
				<?php endif; ?>

				<div class="drbxitem order-4-s drlikeitem">
					<?php
					/**
					 * Recipe Like button
					 */
					do_action( 'delicious_recipes_like_button' );
					?>
				</div>

				<?php if ( $global_toggles['enable_add_to_wishlist'] && $recipe && $dashboard_page_exists ) : ?>
					<div class="drbxitem d-none-mobile dr-add-to-wishlist-single">
						<div class="dr-recipe-wishlist">
							<span id="dr-wishlist-id-<?php echo esc_attr( $recipe->ID ); ?>" data-recipe-id="<?php echo esc_attr( $recipe->ID ); ?>" class="<?php echo esc_attr( $wishlist_classes ); ?>">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="10.72" height="12.37" viewBox="0 0 10.72 12.37">
										<g id="noun_Save_3849318" transform="translate(-6 -5)">
											<g id="Group_5920" data-name="Group 5920" transform="translate(6 5)">
												<path id="Path_30691" data-name="Path 30691" d="M16.308,5h-9.9A.412.412,0,0,0,6,5.412V16.957a.412.412,0,0,0,.676.317l4.684-3.9,4.684,3.9a.412.412,0,0,0,.264.1.418.418,0,0,0,.175-.039.412.412,0,0,0,.237-.374V5.412A.412.412,0,0,0,16.308,5ZM15.9,16.078l-4.272-3.56a.412.412,0,0,0-.528,0l-4.272,3.56V5.825H15.9Z" transform="translate(-6 -5)" fill="#fff" />
											</g>
										</g>
									</svg>
								</i>
								<span class="dr-wishlist-total"><?php echo esc_html( $recipe_wishlists_count ); ?></span>
								<span class="dr-wishlist-info"><?php echo esc_html( $add_to_wishlist_lbl ); ?></span>
							</span>
						</div>
					</div>
				<?php endif; ?>

				<div class="drbxitem d-none-desktop order-2-s drtoggleitem">
					<button id="togglebtn" type="button" class="togglebtn" onclick="handleToggleMoreBtn()">
						<svg xmlns="http://www.w3.org/2000/svg" width="23.519" height="23.519" viewBox="0 0 23.519 23.519">
							<g id="next" transform="translate(0 23.519) rotate(-90)">
								<g id="Group_5973" data-name="Group 5973">
									<path id="Path_30700" data-name="Path 30700" d="M11.759,0A11.759,11.759,0,1,0,23.519,11.759,11.772,11.772,0,0,0,11.759,0Zm3.633,12.452-4.9,4.9a.98.98,0,0,1-1.386-1.386l4.207-4.207L9.107,7.552a.98.98,0,0,1,1.386-1.386l4.9,4.9A.979.979,0,0,1,15.392,12.452Z" fill="#fff" />
								</g>
							</g>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="dr-modal social-share-modal">
		<div class="dr-modal-container">
			<button type="button" class="dr-modal-close" onclick="closeModal()">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44" height="44" viewBox="0 0 44 44">
					<defs>
						<filter id="Ellipse_1345" x="0" y="0" width="44" height="44" filterUnits="userSpaceOnUse">
							<feOffset dy="3" input="SourceAlpha" />
							<feGaussianBlur stdDeviation="3" result="blur" />
							<feFlood flood-color="#232323" flood-opacity="0.059" />
							<feComposite operator="in" in2="blur" />
							<feComposite in="SourceGraphic" />
						</filter>
					</defs>
					<g id="Group_5958" data-name="Group 5958" transform="translate(-661.986 -41)">
						<g transform="matrix(1, 0, 0, 1, 661.99, 41)" filter="url(#Ellipse_1345)">
							<circle id="Ellipse_1345-2" data-name="Ellipse 1345" cx="13" cy="13" r="13" transform="translate(9 6)" fill="#fff" />
						</g>
						<g id="Group_5957" data-name="Group 5957" transform="translate(679.986 56)" opacity="0.3">
							<path id="Path_30698" data-name="Path 30698" d="M1277.947,66.716l8.947,8.947" transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="2" />
							<path id="Path_30699" data-name="Path 30699" d="M1286.893,66.716l-8.947,8.947" transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="2" />
						</g>
					</g>
				</svg>
			</button>
			<div class="dr-modal-header">
				<svg xmlns="http://www.w3.org/2000/svg" width="26.578" height="26.561" viewBox="0 0 26.578 26.561">
					<g id="Group_5926" data-name="Group 5926" transform="translate(0 0)">
						<path id="Path_30596" data-name="Path 30596" d="M165.607,350.056a3.431,3.431,0,0,1-.755-.084,3.34,3.34,0,0,1-2.657-3.25,1.819,1.819,0,0,0-1.265-1.92c-2.833-1.5-5.757-3.087-8.681-4.678a1.2,1.2,0,0,0-.688-.2,1.313,1.313,0,0,0-1.039.507,4.705,4.705,0,0,1-5.14.774,4.94,4.94,0,0,1-2.879-4.742,4.574,4.574,0,0,1,2.889-4.1,4.639,4.639,0,0,1,2.011-.463,4.559,4.559,0,0,1,3.2,1.3,1.245,1.245,0,0,0,.966.427,1.308,1.308,0,0,0,.78-.256c2.979-1.613,6.054-3.269,9.135-4.913a1.25,1.25,0,0,0,.7-1.482,3.408,3.408,0,0,1,3.206-3.476l.219-.008c.118,0,.235.006.351.017a3.44,3.44,0,0,1-.317,6.866l-.183-.006a3.2,3.2,0,0,1-1.891-.715,1.169,1.169,0,0,0-.809-.309,1.218,1.218,0,0,0-.712.228c-3.042,1.642-6.167,3.328-9.3,5.006a1.148,1.148,0,0,0-.648,1.316c.006.284,0,.691,0,1.1,0,.3-.008.59,0,.886a1.257,1.257,0,0,0,.441.938l.062.054,9.6,5.186a1.171,1.171,0,0,0,.566.152,1.191,1.191,0,0,0,.763-.3,3.357,3.357,0,0,1,4.3.065,3.443,3.443,0,0,1-2.219,6.075Zm.016-5.611a2.175,2.175,0,0,0-.067,4.349h0a2.21,2.21,0,0,0,2.241-2.133,2.173,2.173,0,0,0-2.174-2.216Zm-18.259-11.262a3.569,3.569,0,1,0,.009,0Zm18.246-8.421a2.349,2.349,0,1,0,.042,0Z" transform="translate(-142.496 -323.495)" fill="#374757" />
					</g>
				</svg>
				<h2 class="dr-modal-title"><?php esc_html_e( 'Share it on your social network', 'delicious-recipes-pro' ); ?></h2>
				<?php
				/*
					* Get Recipes Social Share
					*/
					delicious_recipes_pro_social_share( $recipe->ID );
				?>
			</div>
			<div class="dr-modal-body">
				<div class="dr-copy-page-url">
					<input value="<?php echo esc_url( $the_permalink ); ?>" class="dr-copy-url" readonly>
					<button type="button" class="dr-copy-btn" onclick="copyLink()">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="10" height="9.999" viewBox="0 0 10 9.999">
								<g id="Group_5934" data-name="Group 5934" transform="translate(-0.083)">
									<path id="Path_30694" data-name="Path 30694" d="M11.617,1.346l-.74-.74a1.792,1.792,0,0,0-2.53,0L6.964,1.989a2.666,2.666,0,0,1,1.155.332l.972-.972a.739.739,0,0,1,1.042,0l.74.74a.741.741,0,0,1,0,1.042l-2.9,2.9a.739.739,0,0,1-1.043,0l-.37-.37A.526.526,0,0,0,5.82,6.4l.37.37a1.792,1.792,0,0,0,2.53,0l2.9-2.9A1.791,1.791,0,0,0,11.617,1.346Z" transform="translate(-2.057 -0.083)" fill="#2db68d" />
									<path id="Path_30695" data-name="Path 30695" d="M3.132,10.442a.738.738,0,0,1-1.042,0l-.74-.74a.738.738,0,0,1,0-1.042l2.9-2.9a.738.738,0,0,1,1.042,0l.37.37A.526.526,0,1,0,6.4,5.39l-.371-.371a1.791,1.791,0,0,0-2.529,0l-2.9,2.9a1.792,1.792,0,0,0,0,2.53l.74.74a1.793,1.793,0,0,0,2.53,0L5.26,9.8A2.68,2.68,0,0,1,4.1,9.471Z" transform="translate(0 -1.709)" fill="#2db68d" />
								</g>
							</svg>
						</i>
						<?php esc_html_e( 'Copy Link', 'delicious-recipes-pro' ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function handleToggleMoreBtn() {
		var toggleBtn = document.getElementById('togglebtn');
		toggleBtn.classList.toggle('dractive')
		var moreBtns = document.querySelector('.drbtnsmobile');
		moreBtns.classList.toggle('dropen')
	}

	function handleShareLinks() {
		document.querySelector('.dr-modal').classList.add('show');
	}

	function closeModal() {
		document.querySelector('.dr-modal').classList.remove('show');
	}

	function copyLink() {
		var copyText = document.querySelector('.dr-copy-url');
		copyText.select();
		copyText.setSelectionRange(0, 99999)
		document.execCommand("copy");
		document.querySelector('.dr-copy-page-url').classList.add('dr-copied');
		setTimeout(function(){ document.querySelector('.dr-copy-page-url').classList.remove('dr-copied'); }, 5000);
	}

	function startReadingMode() {
		document.querySelector('.single-recipe').classList.add('single-recipe-reading-mode');
	}

	let timer = document.getElementById("dr-recipe-timer");
	if(timer){
		let time_in_minutes;

		function changeTimer(e) {
			time_in_minutes = document.getElementById("dr-recipe-timer").value;
		}
		time_in_minutes = document.getElementById("dr-recipe-timer").value;
		let clockdiv = document.getElementById("clockdiv");
		let timerInput = document.getElementById("dr-time-input");
		let stopButton = document.getElementById("dr-stop-timer-btn");
		let startButton = document.getElementById("dr-start-timer-btn");
		let resumeButton = document.getElementById("dr-resume-timer-btn");
		let pauseButton = document.getElementById("dr-pause-timer-btn");
		let current_time, deadline;
		let clock = document.getElementById("clock");
		var paused = false;

		function startTimer() {
			time_in_minutes = document.getElementById("dr-recipe-timer").value;
			current_time = Date.parse(new Date());
			deadline = new Date(current_time + time_in_minutes * 60 * 1000);
			document.getElementById("dr-time-input").style.display = "none";
			document.getElementById("clockdiv").style.display = "block";
			document.getElementById("dr-stop-timer-btn").style.display = "block";
			document.getElementById("dr-start-timer-btn").style.display = "none";
			document.getElementById("dr-pause-timer-btn").style.display = "block";
			run_clock(deadline);
		}

		function stopTimer() {
			document.getElementById("dr-time-input").style.display = "block";
			document.getElementById("clockdiv").style.display = "none";
			document.getElementById("dr-stop-timer-btn").style.display = "none";
			document.getElementById("dr-start-timer-btn").style.display = "block";
			document.getElementById("dr-pause-timer-btn").style.display = "none";
			document.getElementById("dr-resume-timer-btn").style.display = "none";
			reset_clock();
		}

		function time_remaining(endtime) {

			const second = 1000,
				minute = second * 60,
				hour = minute * 60,
				day = hour * 24;

			var t = Date.parse(endtime) - Date.parse(new Date());
			var seconds = Math.floor((t % (minute)) / second);
			var minutes = Math.floor((t % (hour)) / (minute));
			var hours = Math.floor((t % (day)) / (hour));
			var days = Math.floor(t / (day));
			return {
				total: t,
				days: days,
				hours: hours,
				minutes: minutes,
				seconds: seconds
			};
		}

		var timeinterval;

		function run_clock(endtime) {
			function update_clock() {
				var t = time_remaining(endtime);
				clock = document.getElementById("clock");
				if( t.days > 0 ) {
					clock.innerText = t.days + ':' + t.hours + ':' + t.minutes + ':' + t.seconds;
				} else if( t.hours > 0 ) {
					clock.innerText = t.hours + ':' + t.minutes + ':' + t.seconds;
				} else {
					clock.innerText = t.minutes + ':' + t.seconds;
				}
				if (t.total <= 0) {
					clearInterval(timeinterval);
				}
				if(t.total == 6000){
					const audio = document.getElementById('myAudio');
					audio.play();
				}
			}
			update_clock();
			timeinterval = setInterval(update_clock, 1000);
		}

		var time_left;

		function pause_clock() {
			document.getElementById("dr-resume-timer-btn").style.display = "block";
			document.getElementById("dr-pause-timer-btn").style.display = "none";
			paused = true;
			clearInterval(timeinterval);
			time_left = time_remaining(deadline).total;
		}

		function resume_clock() {
			paused = false;
			document.getElementById("dr-resume-timer-btn").style.display = "none";
			document.getElementById("dr-pause-timer-btn").style.display = "block";
			deadline = new Date(Date.parse(new Date()) + time_left);
			run_clock(deadline);
		}

		function reset_clock() {
			time_in_minutes = document.getElementById("dr-recipe-timer").value;
			clearInterval(timeinterval);
			deadline = new Date(current_time + time_in_minutes * 60 * 1000);
			let t = time_remaining(deadline);
			document.getElementById("clock").innerHTML = t.minutes + ":" + t.seconds;
		}

		// handle pause and resume button clicks
		document.getElementById("dr-pause-timer-btn").onclick = pause_clock;
		document.getElementById("dr-resume-timer-btn").onclick = resume_clock;
	}
</script>

<script type="text/html" id="tmpl-floating-bar-tmp">
	<# if ( data ) { #>
	<div class="dr-floating-menu-wrapper">
		<div class="dr-container container">
			<div class="dr-floating-box">
				<!-- this is for mobile -->
				<div class="drbtnsmobile">
					<?php if ( $global_toggles['enable_print_recipe'] ) : ?>
						<# if ( data.path ) { #>
						<div class="drbxitem">
							<a href="{{data.path}}?print_recipe=true" class="printrecipe button">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="17.228" height="16" viewBox="0 0 17.228 16">
										<path id="print" d="M3.242,26.923V22.87a.074.074,0,0,1,.074-.074h8.1a.075.075,0,0,1,.034.008l.271.112-.028.068.028-.068a.073.073,0,0,1,.028.02l1.813,1.788.117.115-.051.053.052-.053a.074.074,0,0,1,.022.053v2.031A.074.074,0,0,1,13.63,27h-.787a.074.074,0,0,1-.074-.074v-.965H10.687a.074.074,0,0,1-.074-.074s0,0,0-.006v-.389h0V23.734H4.18v3.189A.074.074,0,0,1,4.106,27h-.79a.074.074,0,0,1-.074-.074Zm1.087,5.385h8.548l.017,0a.911.911,0,0,1,.822.561.892.892,0,0,1,.068.329.062.062,0,0,1,0,.017v1.3h1.86a.631.631,0,0,0,.23-.05.669.669,0,0,0,.212-.142.661.661,0,0,0,.142-.212.631.631,0,0,0,.049-.231.124.124,0,0,1,0-.015V28.9a.088.088,0,0,1,0-.016.639.639,0,0,0-.05-.23.659.659,0,0,0-.142-.211.675.675,0,0,0-.212-.143.628.628,0,0,0-.231-.049H1.575l-.016,0a.632.632,0,0,0-.23.05.675.675,0,0,0-.212.143.66.66,0,0,0-.142.211.636.636,0,0,0-.049.231.1.1,0,0,1,0,.014v4.964a.079.079,0,0,1,0,.015.628.628,0,0,0,.05.23.661.661,0,0,0,.142.212.668.668,0,0,0,.212.142.635.635,0,0,0,.231.05H3.419v-1.3a.1.1,0,0,1,0-.017.912.912,0,0,1,.069-.33.923.923,0,0,1,.187-.284l.01-.011a.908.908,0,0,1,.625-.265l.017,0h0Zm9.457,3.144v2.435a.062.062,0,0,1,0,.017.888.888,0,0,1-.069.33.906.906,0,0,1-.821.56l-.017,0H4.329l-.017,0a.912.912,0,0,1-.329-.068.912.912,0,0,1-.492-.491.888.888,0,0,1-.069-.33.062.062,0,0,1,0-.017V35.452H1.575l-.017,0A1.583,1.583,0,0,1-.009,33.883a.076.076,0,0,1,0-.017V28.9a.071.071,0,0,1,0-.017,1.584,1.584,0,0,1,1.567-1.567l.017,0H15.631l.017,0a1.583,1.583,0,0,1,1.567,1.567.071.071,0,0,1,0,.017v4.964a.073.073,0,0,1,0,.017,1.583,1.583,0,0,1-1.567,1.567l-.017,0H13.786ZM12.533,25.02l-.982-.968v.968Zm.315,8.227H4.358v4.612h8.49V33.246Z" transform="translate(0.011 -22.796)" fill="#fff" />
									</svg>
								</i>
								<?php echo esc_html( $global_toggles['print_recipe_lbl'] ); ?>
							</a>
						</div>
						<# } #>
					<?php endif; ?>

					<?php if ( $share ) : ?>
						<# if ( data.id && data.path && data.title ) { #>
						<div class="drbxitem">
							<button type="button" class="share" onclick="handleShareLinks()">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="13.627" height="13.617" viewBox="0 0 13.627 13.617">
										<g id="Group_5951" data-name="Group 5951" transform="translate(0.126 0.125)">
											<path id="Path_30596" data-name="Path 30596" d="M154.127,336.862a1.727,1.727,0,0,1-.38-.042,1.681,1.681,0,0,1-1.337-1.636.915.915,0,0,0-.636-.966c-1.426-.755-2.9-1.554-4.369-2.354a.6.6,0,0,0-.346-.1.661.661,0,0,0-.523.255,2.368,2.368,0,0,1-2.587.389,2.486,2.486,0,0,1-1.449-2.386,2.3,2.3,0,0,1,1.454-2.062,2.334,2.334,0,0,1,1.012-.233,2.294,2.294,0,0,1,1.609.654.626.626,0,0,0,.486.215.658.658,0,0,0,.393-.129c1.5-.812,3.046-1.645,4.6-2.472a.629.629,0,0,0,.351-.746,1.715,1.715,0,0,1,1.613-1.749l.11,0c.059,0,.118,0,.177.009a1.731,1.731,0,0,1-.16,3.455l-.092,0a1.612,1.612,0,0,1-.952-.36.588.588,0,0,0-.407-.156.613.613,0,0,0-.358.115c-1.531.827-3.1,1.675-4.678,2.519a.578.578,0,0,0-.326.662c0,.143,0,.348,0,.554,0,.149,0,.3,0,.446a.633.633,0,0,0,.222.472l.031.027,4.833,2.61a.589.589,0,0,0,.285.077.6.6,0,0,0,.384-.151,1.689,1.689,0,0,1,2.163.033,1.733,1.733,0,0,1-1.117,3.057Zm.008-2.824a1.095,1.095,0,0,0-.034,2.189h0a1.112,1.112,0,0,0,1.128-1.074,1.094,1.094,0,0,0-1.094-1.115Zm-9.189-5.667a1.807,1.807,0,1,0,1.8,1.82,1.814,1.814,0,0,0-1.8-1.82Zm9.183-4.238a1.177,1.177,0,1,0,.021,0Z" transform="translate(-142.496 -323.495)" fill="#fff" stroke="#374757" stroke-width="0.25" />
										</g>
									</svg>
								</i>
								<?php echo esc_html( $share_lbl ); ?>
							</button>
						</div>
						<# } #>
					<?php endif; ?>

					<# if ( data.id && data.wishlist ) { #>
					<div class="drbxitem dr-add-to-wishlist-single">
						<div class="dr-recipe-wishlist">
							{{{ data.wishlist }}}
						</div>
					</div>
					<# } #>
				</div>

				<!-- this is for desktop -->
				<?php if ( $reading_mode ) : ?>
					<div class="drbxitem order-1-s">
						<button type="button" class="startreadingmode" onclick="startReadingMode()">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="15.196" height="12.869" viewBox="0 0 15.196 12.869">
									<g id="Group_5947" data-name="Group 5947" transform="translate(-3 -4.991)">
										<path id="Path_30697" data-name="Path 30697" d="M17.891,5.912A8.337,8.337,0,0,0,10.6,5.777,8.339,8.339,0,0,0,3.3,5.912a.584.584,0,0,0-.3.513V17.27a.584.584,0,0,0,.864.513,7.38,7.38,0,0,1,6.456,0c.011.006.023.008.033.013s.027.011.041.016l.019.008c.008,0,.014.006.021.008a.594.594,0,0,0,.162.027h0c.012,0,.023,0,.034,0l.044-.006a.61.61,0,0,0,.121-.03l.049-.02h0c.008,0,.016,0,.023-.007a7.371,7.371,0,0,1,6.458,0,.584.584,0,0,0,.868-.517V6.425a.585.585,0,0,0-.3-.513ZM4.169,16.353V6.783a7.326,7.326,0,0,1,5.845.016v9.585a8.371,8.371,0,0,0-5.845-.03Zm12.858,0a8.364,8.364,0,0,0-5.845.032V6.8a7.33,7.33,0,0,1,5.845-.016Z" transform="translate(0)" fill="#fff" />
									</g>
								</svg>
							</i>
							<?php echo esc_html( $reading_mode_lbl ); ?>
						</button>
					</div>
				<?php endif; ?>

				<?php if ( $global_toggles['enable_print_recipe'] ) : ?>
					<# if ( data.path ) { #>
					<div class="drbxitem d-none-mobile">
						<a href="{{data.path}}?print_recipe=true" class="printrecipe button">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="17.228" height="16" viewBox="0 0 17.228 16">
									<path id="print" d="M3.242,26.923V22.87a.074.074,0,0,1,.074-.074h8.1a.075.075,0,0,1,.034.008l.271.112-.028.068.028-.068a.073.073,0,0,1,.028.02l1.813,1.788.117.115-.051.053.052-.053a.074.074,0,0,1,.022.053v2.031A.074.074,0,0,1,13.63,27h-.787a.074.074,0,0,1-.074-.074v-.965H10.687a.074.074,0,0,1-.074-.074s0,0,0-.006v-.389h0V23.734H4.18v3.189A.074.074,0,0,1,4.106,27h-.79a.074.074,0,0,1-.074-.074Zm1.087,5.385h8.548l.017,0a.911.911,0,0,1,.822.561.892.892,0,0,1,.068.329.062.062,0,0,1,0,.017v1.3h1.86a.631.631,0,0,0,.23-.05.669.669,0,0,0,.212-.142.661.661,0,0,0,.142-.212.631.631,0,0,0,.049-.231.124.124,0,0,1,0-.015V28.9a.088.088,0,0,1,0-.016.639.639,0,0,0-.05-.23.659.659,0,0,0-.142-.211.675.675,0,0,0-.212-.143.628.628,0,0,0-.231-.049H1.575l-.016,0a.632.632,0,0,0-.23.05.675.675,0,0,0-.212.143.66.66,0,0,0-.142.211.636.636,0,0,0-.049.231.1.1,0,0,1,0,.014v4.964a.079.079,0,0,1,0,.015.628.628,0,0,0,.05.23.661.661,0,0,0,.142.212.668.668,0,0,0,.212.142.635.635,0,0,0,.231.05H3.419v-1.3a.1.1,0,0,1,0-.017.912.912,0,0,1,.069-.33.923.923,0,0,1,.187-.284l.01-.011a.908.908,0,0,1,.625-.265l.017,0h0Zm9.457,3.144v2.435a.062.062,0,0,1,0,.017.888.888,0,0,1-.069.33.906.906,0,0,1-.821.56l-.017,0H4.329l-.017,0a.912.912,0,0,1-.329-.068.912.912,0,0,1-.492-.491.888.888,0,0,1-.069-.33.062.062,0,0,1,0-.017V35.452H1.575l-.017,0A1.583,1.583,0,0,1-.009,33.883a.076.076,0,0,1,0-.017V28.9a.071.071,0,0,1,0-.017,1.584,1.584,0,0,1,1.567-1.567l.017,0H15.631l.017,0a1.583,1.583,0,0,1,1.567,1.567.071.071,0,0,1,0,.017v4.964a.073.073,0,0,1,0,.017,1.583,1.583,0,0,1-1.567,1.567l-.017,0H13.786ZM12.533,25.02l-.982-.968v.968Zm.315,8.227H4.358v4.612h8.49V33.246Z" transform="translate(0.011 -22.796)" fill="#fff" />
								</svg>
							</i>
							<?php echo esc_html( $global_toggles['print_recipe_lbl'] ); ?>
						</a>
					</div>
					<# } #>
				<?php endif; ?>

				<?php if ( $share ) : ?>
					<# if ( data.path && data.id && data.title ) { #>
					<div class="drbxitem d-none-mobile">
						<button type="button" class="share" onclick="handleShareLinks()">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="13.627" height="13.617" viewBox="0 0 13.627 13.617">
									<g id="Group_5951" data-name="Group 5951" transform="translate(0.126 0.125)">
										<path id="Path_30596" data-name="Path 30596" d="M154.127,336.862a1.727,1.727,0,0,1-.38-.042,1.681,1.681,0,0,1-1.337-1.636.915.915,0,0,0-.636-.966c-1.426-.755-2.9-1.554-4.369-2.354a.6.6,0,0,0-.346-.1.661.661,0,0,0-.523.255,2.368,2.368,0,0,1-2.587.389,2.486,2.486,0,0,1-1.449-2.386,2.3,2.3,0,0,1,1.454-2.062,2.334,2.334,0,0,1,1.012-.233,2.294,2.294,0,0,1,1.609.654.626.626,0,0,0,.486.215.658.658,0,0,0,.393-.129c1.5-.812,3.046-1.645,4.6-2.472a.629.629,0,0,0,.351-.746,1.715,1.715,0,0,1,1.613-1.749l.11,0c.059,0,.118,0,.177.009a1.731,1.731,0,0,1-.16,3.455l-.092,0a1.612,1.612,0,0,1-.952-.36.588.588,0,0,0-.407-.156.613.613,0,0,0-.358.115c-1.531.827-3.1,1.675-4.678,2.519a.578.578,0,0,0-.326.662c0,.143,0,.348,0,.554,0,.149,0,.3,0,.446a.633.633,0,0,0,.222.472l.031.027,4.833,2.61a.589.589,0,0,0,.285.077.6.6,0,0,0,.384-.151,1.689,1.689,0,0,1,2.163.033,1.733,1.733,0,0,1-1.117,3.057Zm.008-2.824a1.095,1.095,0,0,0-.034,2.189h0a1.112,1.112,0,0,0,1.128-1.074,1.094,1.094,0,0,0-1.094-1.115Zm-9.189-5.667a1.807,1.807,0,1,0,1.8,1.82,1.814,1.814,0,0,0-1.8-1.82Zm9.183-4.238a1.177,1.177,0,1,0,.021,0Z" transform="translate(-142.496 -323.495)" fill="#fff" stroke="#374757" stroke-width="0.25" />
									</g>
								</svg>
							</i>
							<?php echo esc_html( $share_lbl ); ?>
						</button>
					</div>
					<# } #>
				<?php endif; ?>

				<?php if ( $timer ) : ?>
					<# if ( data.id ) { #>
					<div id="{{data.id}}" class="drbxitem order-3-s dr-reading-timer-wrapper">
						<div class="dr-time-wrap">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="15.75" viewBox="0 0 14 15.75">
									<g id="noun_timer_3119309" transform="translate(-4 -2)" opacity="0.5">
										<g id="_5" data-name="5" transform="translate(4 2)">
											<path id="Path_30696" data-name="Path 30696" d="M11,3.75a7,7,0,1,0,7,7A7,7,0,0,0,11,3.75Zm0,12.833a5.833,5.833,0,1,1,5.833-5.833A5.833,5.833,0,0,1,11,16.583Zm-2.333-14A.583.583,0,0,1,9.25,2h3.5a.583.583,0,1,1,0,1.167H9.25A.583.583,0,0,1,8.667,2.583Zm5.792,9.549a.583.583,0,0,1-.758.327l-2.917-1.167a.583.583,0,0,1-.368-.542V6.667a.583.583,0,1,1,1.167,0v3.687l2.549,1.021a.583.583,0,0,1,.327.758Z" transform="translate(-4 -2)" fill="#fff" />
										</g>
									</g>
								</svg>
							</i>
							<div class="dr-time-input" id="dr-time-input">
								<input type="number" value="10" min="1" id="dr-recipe-timer" onchange="changeTimer()">
								<span><?php esc_html_e( 'Min', 'delicious-recipes-pro' ); ?></span>
							</div>

							<div class="dr-timer-counter" id="clockdiv" style="display:none">
								<span class="countdown-row countdown-amount" id="clock"></span>
							</div>
						</div>
						<button id="dr-pause-timer-btn" type="button" style="display:none" onclick="pause_clock()">
							<?php esc_html_e( 'Pause', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-resume-timer-btn" type="button" style="display:none" onclick="resume_clock()">
							<?php esc_html_e( 'Resume', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-stop-timer-btn" type="button" class="stoptimer" style="display:none" onclick="stopTimer()">
							<?php esc_html_e( 'Stop', 'delicious-recipes-pro' ); ?>
						</button>
						<button id="dr-start-timer-btn" type="button" class="starttimer" onclick="startTimer()">
							<?php echo esc_html( $timer_lbl ); ?>
						</button>
					</div>
					<# } #>
				<?php endif; ?>

				<# if ( data.id && data.likes ) { #>
				<div class="drbxitem order-4-s drlikeitem">
					<div class="post-like">
						<span class="favourite single-like like">
							{{{data.likes}}}
						</span>
					</div>
				</div>
				<# } #>

				<# if ( data.id && data.wishlist ) { #>
				<div class="drbxitem d-none-mobile dr-add-to-wishlist-single">
					<div class="dr-recipe-wishlist">
						{{{data.wishlist}}}
					</div>
				</div>
				<# } #>

				<div class="drbxitem d-none-desktop order-2-s drtoggleitem">
					<button id="togglebtn" type="button" class="togglebtn" onclick="handleToggleMoreBtn()">
						<svg xmlns="http://www.w3.org/2000/svg" width="23.519" height="23.519" viewBox="0 0 23.519 23.519">
							<g id="next" transform="translate(0 23.519) rotate(-90)">
								<g id="Group_5973" data-name="Group 5973">
									<path id="Path_30700" data-name="Path 30700" d="M11.759,0A11.759,11.759,0,1,0,23.519,11.759,11.772,11.772,0,0,0,11.759,0Zm3.633,12.452-4.9,4.9a.98.98,0,0,1-1.386-1.386l4.207-4.207L9.107,7.552a.98.98,0,0,1,1.386-1.386l4.9,4.9A.979.979,0,0,1,15.392,12.452Z" fill="#fff" />
								</g>
							</g>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
	<# if ( data.path && data.id && data.title) { #>
	<div class="dr-modal social-share-modal">
		<div class="dr-modal-container">
			<button type="button" class="dr-modal-close" onclick="closeModal()">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44" height="44" viewBox="0 0 44 44">
					<defs>
						<filter id="Ellipse_1345" x="0" y="0" width="44" height="44" filterUnits="userSpaceOnUse">
							<feOffset dy="3" input="SourceAlpha" />
							<feGaussianBlur stdDeviation="3" result="blur" />
							<feFlood flood-color="#232323" flood-opacity="0.059" />
							<feComposite operator="in" in2="blur" />
							<feComposite in="SourceGraphic" />
						</filter>
					</defs>
					<g id="Group_5958" data-name="Group 5958" transform="translate(-661.986 -41)">
						<g transform="matrix(1, 0, 0, 1, 661.99, 41)" filter="url(#Ellipse_1345)">
							<circle id="Ellipse_1345-2" data-name="Ellipse 1345" cx="13" cy="13" r="13" transform="translate(9 6)" fill="#fff" />
						</g>
						<g id="Group_5957" data-name="Group 5957" transform="translate(679.986 56)" opacity="0.3">
							<path id="Path_30698" data-name="Path 30698" d="M1277.947,66.716l8.947,8.947" transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="2" />
							<path id="Path_30699" data-name="Path 30699" d="M1286.893,66.716l-8.947,8.947" transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="2" />
						</g>
					</g>
				</svg>
			</button>
			<div class="dr-modal-header">
				<svg xmlns="http://www.w3.org/2000/svg" width="26.578" height="26.561" viewBox="0 0 26.578 26.561">
					<g id="Group_5926" data-name="Group 5926" transform="translate(0 0)">
						<path id="Path_30596" data-name="Path 30596" d="M165.607,350.056a3.431,3.431,0,0,1-.755-.084,3.34,3.34,0,0,1-2.657-3.25,1.819,1.819,0,0,0-1.265-1.92c-2.833-1.5-5.757-3.087-8.681-4.678a1.2,1.2,0,0,0-.688-.2,1.313,1.313,0,0,0-1.039.507,4.705,4.705,0,0,1-5.14.774,4.94,4.94,0,0,1-2.879-4.742,4.574,4.574,0,0,1,2.889-4.1,4.639,4.639,0,0,1,2.011-.463,4.559,4.559,0,0,1,3.2,1.3,1.245,1.245,0,0,0,.966.427,1.308,1.308,0,0,0,.78-.256c2.979-1.613,6.054-3.269,9.135-4.913a1.25,1.25,0,0,0,.7-1.482,3.408,3.408,0,0,1,3.206-3.476l.219-.008c.118,0,.235.006.351.017a3.44,3.44,0,0,1-.317,6.866l-.183-.006a3.2,3.2,0,0,1-1.891-.715,1.169,1.169,0,0,0-.809-.309,1.218,1.218,0,0,0-.712.228c-3.042,1.642-6.167,3.328-9.3,5.006a1.148,1.148,0,0,0-.648,1.316c.006.284,0,.691,0,1.1,0,.3-.008.59,0,.886a1.257,1.257,0,0,0,.441.938l.062.054,9.6,5.186a1.171,1.171,0,0,0,.566.152,1.191,1.191,0,0,0,.763-.3,3.357,3.357,0,0,1,4.3.065,3.443,3.443,0,0,1-2.219,6.075Zm.016-5.611a2.175,2.175,0,0,0-.067,4.349h0a2.21,2.21,0,0,0,2.241-2.133,2.173,2.173,0,0,0-2.174-2.216Zm-18.259-11.262a3.569,3.569,0,1,0,.009,0Zm18.246-8.421a2.349,2.349,0,1,0,.042,0Z" transform="translate(-142.496 -323.495)" fill="#374757" />
					</g>
				</svg>
				<h2 class="dr-modal-title"><?php esc_html_e( 'Share it on your social network', 'delicious-recipes-pro' ); ?></h2>

				<ul class="social-icons">

					<li>
						<a href="https://www.facebook.com/sharer.php?u={{data.path}}" rel="nofollow noopener" target="_blank">
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
					<li>
						<a href="https://twitter.com/intent/tweet?text={{data.title}}&nbsp;{{data.path}}" rel="nofollow noopener" target="_blank">
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
					<li>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url={{data.path}}&title={{data.title}}" rel="nofollow noopener" target="_blank">
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
					<# if ( data.image ) { #>
					<li>
						<a href="https://pinterest.com/pin/create/button/?url={{data.path}}&media={{data.image}}&description={{data.title}}" rel="nofollow noopener" target="_blank" data-pin-do="none" data-pin-custom="true">
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
					<# } #>
					<li>
						<a href="mailto:?Subject={{data.title}}&Body={{data.path}}" rel="nofollow noopener" target="_blank">
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
					<li>
						<a href="http://www.reddit.com/submit?url={{data.path}}&title={{data.title}}" rel="nofollow noopener" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
								<g id="reddit" transform="translate(-490 -98)">
									<rect id="Rectangle_1385" data-name="Rectangle 1385" width="40" height="40" transform="translate(490 98)" fill="#ff5722"/>
									<path id="reddit-2" data-name="reddit" d="M16.716,7.4a2.1,2.1,0,0,0-1.5.64,10.083,10.083,0,0,0-5.437-1.7l1.1-5.021,3.5.8a1.569,1.569,0,0,0,1.554,1.578,1.6,1.6,0,1,0-1.4-2.31L10.664.516A.37.37,0,0,0,10.228.8L9.022,6.338a10.208,10.208,0,0,0-5.4,1.722A2.1,2.1,0,0,0,2.1,7.4a2.122,2.122,0,0,0-.908,4.027,4.569,4.569,0,0,0-.1.994c0,3.371,3.743,6.1,8.339,6.1,4.615,0,8.358-2.732,8.358-6.1a3.908,3.908,0,0,0-.122-1.01A2.123,2.123,0,0,0,16.716,7.4ZM4.39,11.645a1.564,1.564,0,1,1,1.574,1.578A1.58,1.58,0,0,1,4.39,11.645Zm8.5,3.761c-1.443,1.464-5.515,1.464-6.959,0a.38.38,0,1,1,.524-.551c1.1,1.147,4.758,1.166,5.908,0a.381.381,0,0,1,.528.551Zm-.032-2.18a1.587,1.587,0,1,1,1.574-1.576A1.568,1.568,0,0,1,12.854,13.226Z" transform="translate(500.594 108.986)" fill="#fff"/>
								</g>
							</svg>
						</a>
					</li>
				</ul>
			</div>
			<div class="dr-modal-body">
				<div class="dr-copy-page-url">
					<input value="{{data.path}}" class="dr-copy-url" readonly>
					<button type="button" class="dr-copy-btn" onclick="copyLink()">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="10" height="9.999" viewBox="0 0 10 9.999">
								<g id="Group_5934" data-name="Group 5934" transform="translate(-0.083)">
									<path id="Path_30694" data-name="Path 30694" d="M11.617,1.346l-.74-.74a1.792,1.792,0,0,0-2.53,0L6.964,1.989a2.666,2.666,0,0,1,1.155.332l.972-.972a.739.739,0,0,1,1.042,0l.74.74a.741.741,0,0,1,0,1.042l-2.9,2.9a.739.739,0,0,1-1.043,0l-.37-.37A.526.526,0,0,0,5.82,6.4l.37.37a1.792,1.792,0,0,0,2.53,0l2.9-2.9A1.791,1.791,0,0,0,11.617,1.346Z" transform="translate(-2.057 -0.083)" fill="#2db68d" />
									<path id="Path_30695" data-name="Path 30695" d="M3.132,10.442a.738.738,0,0,1-1.042,0l-.74-.74a.738.738,0,0,1,0-1.042l2.9-2.9a.738.738,0,0,1,1.042,0l.37.37A.526.526,0,1,0,6.4,5.39l-.371-.371a1.791,1.791,0,0,0-2.529,0l-2.9,2.9a1.792,1.792,0,0,0,0,2.53l.74.74a1.793,1.793,0,0,0,2.53,0L5.26,9.8A2.68,2.68,0,0,1,4.1,9.471Z" transform="translate(0 -1.709)" fill="#2db68d" />
								</g>
							</svg>
						</i>
						<?php esc_html_e( 'Copy Link', 'delicious-recipes-pro' ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<# } #>

	<# } #>
</script>
<?php
