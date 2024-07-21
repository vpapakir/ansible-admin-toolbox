<?php
/**
 * Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout( $wp_customize ) {
    
    /** Layout Settings */
    $wp_customize->add_panel( 
        'layout_settings',
         array(
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'cookery' ),
            'description' => __( 'Change different page layout from here.', 'cookery' ),
        ) 
    );
}
add_action( 'customize_register', 'cookery_customize_register_layout' );