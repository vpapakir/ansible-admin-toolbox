<?php
/**
 * Front Page Settings
 *
 * @package Cookery
 */

function cookery_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 57,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Front Page Settings', 'cookery' ),
            'description' => __( 'Static Home Page settings.', 'cookery' ),
        ) 
    );    
      
}
add_action( 'customize_register', 'cookery_customize_register_frontpage' );