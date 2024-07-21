<?php
/**
 * General Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'cookery' ),
            'description' => __( 'Customize Banner, Featured, Social, Sharing, SEO, Post/Page, Newsletter & Instagram, Shop, Performance and Miscellaneous settings.', 'cookery' ),
        ) 
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_general' );