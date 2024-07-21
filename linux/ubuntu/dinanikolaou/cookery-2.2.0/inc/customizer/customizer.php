<?php
/**
 * Cookery Theme Customizer
 *
 * @package Cookery
 */

/**
 * Requiring customizer panels & sections
*/
$cookery_panels       = array( 'layout', 'typography', 'home', 'general', 'ads' );
$cookery_sections     = array( 'info', 'site', 'color','child-theme-support', 'background', 'performance', 'sidebar', 'footer', 'recipe-keywords' );
$cookery_sub_sections = array(
    'layout'     => array( 'header', 'slider', 'static-cta', 'static-newsletter', 'static-search', 'home', 'recipe', 'post', 'general', 'pagination' ),
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
    'home'       => array( 'banner', 'cta', 'video', 'featured-recipe', 'browse-category', 'recipe-index', 'client', 'newsletter' ),
    'general'    => array( 'topbar', 'social', 'share', 'seo', 'post-page', 'newsletter', 'instagram', 'misc', 'analytics' ),
    'ads'        => array( 'home_ad', 'after_content_ad', 'before_content_ad' ),
);

foreach( $cookery_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $cookery_panels as $p ){
   require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $cookery_sub_sections as $k => $v ){
    foreach( $v as $w ){        
        require get_template_directory() . '/inc/customizer/panels/' . $k . '/' . $w . '.php';
    }
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cookery_customize_preview_js() {
	wp_enqueue_script( 'cookery-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), COOKERY_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'cookery_customize_preview_js' );

function cookery_customize_script(){
    $array = array(
        'home'    => get_permalink( get_option( 'page_on_front' ) ),
        'contact' => cookery_get_page_template_url( 'templates/contact.php' ),
        'flushFonts'        => wp_create_nonce( 'cookery-local-fonts-flush' ),
    );
    
    wp_enqueue_style( 'cookery-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), COOKERY_THEME_VERSION );
    wp_enqueue_script( 'cookery-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), COOKERY_THEME_VERSION, true );
    wp_localize_script( 'cookery-customize', 'cookery_cdata', $array );

    wp_localize_script( 'cookery-repeater', 'cookery_customize',
        array(
            'nonce' => wp_create_nonce( 'cookery_customize_nonce' )
        )
    );
}
add_action( 'customize_controls_enqueue_scripts', 'cookery_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';

/**
 * Reset font folder
 *
 * @access public
 * @return void
 */
function cookery_ajax_delete_fonts_folder() {
    // Check request.
    if ( ! check_ajax_referer( 'cookery-local-fonts-flush', 'nonce', false ) ) {
        wp_send_json_error( 'invalid_nonce' );
    }
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_send_json_error( 'invalid_permissions' );
    }
    if ( class_exists( '\Cookery_WebFont_Loader' ) ) {
        $font_loader = new \Cookery_WebFont_Loader( '' );
        $removed = $font_loader->delete_fonts_folder();
        if ( ! $removed ) {
            wp_send_json_error( 'failed_to_flush' );
        }
        wp_send_json_success();
    }
    wp_send_json_error( 'no_font_loader' );
}
add_action( 'wp_ajax_cookery_flush_fonts_folder', 'cookery_ajax_delete_fonts_folder' );