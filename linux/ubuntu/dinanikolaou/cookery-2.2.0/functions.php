<?php
/**
 * Cookery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cookery
 */

$cookery_theme_data = wp_get_theme();
if( ! defined( 'COOKERY_THEME_VERSION' ) ) define( 'COOKERY_THEME_VERSION', $cookery_theme_data->get( 'Version' ) );
if( ! defined( 'COOKERY_THEME_NAME' ) ) define( 'COOKERY_THEME_NAME', $cookery_theme_data->get( 'Name' ) );

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Fontawesome
 */
require get_template_directory() . '/inc/fontawesome.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox/single-metabox.php';

/**
 * User Metabox
 */
require get_template_directory() . '/inc/metabox/user-metabox.php';

/**
 * Social Sharing
 */
require get_template_directory() . '/inc/social-sharing.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography/typography.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Performance
*/
require get_template_directory() . '/inc/performance.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Dashboard
 */
require get_template_directory() . '/inc/dashboard/dashboard.php';


/**
 * Customizer Lock
*/
require get_template_directory() . '/inc/customizer-lock/customizer-lock.php';

/**
 * Import Hooks
*/
require get_template_directory() . '/inc/import-hooks.php';

/**
 * Theme Updater
*/
require get_template_directory() . '/updater/theme-updater.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( cookery_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}

/*
 * Toolkit Filters
*/
if( is_bttk_activated() ) {
	require get_template_directory() . '/inc/toolkit-functions.php';
}

/**
 * Add theme compatibility function for blossom themes newsletter if active
*/
if( is_btnw_activated() ){
    require get_template_directory() . '/inc/newsletter-functions.php';    
}

/**
 * Elementor Functions.
 */
if( cookery_is_elementor_activated() ){
	require get_template_directory() . '/inc/elementor-compatibility.php';
}

/**
 * Add theme compatibility function for blossom themes newsletter if active
*/
if( is_delicious_recipe_activated() ){
    require get_template_directory() . '/inc/recipe-functions.php';    
}