<?php
/**
 * Typography Settings
 *
 * @package Cookery
 */

function cookery_customize_register_typography( $wp_customize ) {
    
    /** Typography */
    $wp_customize->add_panel(
        'typography_settings',
        array(
            'title'       => __( 'Typography', 'cookery' ),
            'capability'  => 'edit_theme_options',
            'priority'    => 55,
            'description' => __( 'Body and Content\'s H1 to H6 Typography settings.', 'cookery' ),
        )
    );   
    
}
add_action( 'customize_register', 'cookery_customize_register_typography' );