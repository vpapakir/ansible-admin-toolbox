<?php
/**
 * Ad Options
 *
 * @package Cookery
 */
 
function cookery_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_panel( 'ad_settings', array(
        'title'       => __( 'Advertisement Settings', 'cookery' ),
        'priority'    => 70,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Before and After Content AD settings.', 'cookery' ),
    ) );
        
}
add_action( 'customize_register', 'cookery_customize_register_ad' );