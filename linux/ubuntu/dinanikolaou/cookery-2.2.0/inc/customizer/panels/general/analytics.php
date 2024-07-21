<?php
/**
 * Google Analytics Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_analytic( $wp_customize ) {
    
    /** Google Analytics Settings */
    $wp_customize->add_section(
        'google_analytics_settings',
        array(
            'title'    => __( 'Google Analytics Settings', 'cookery' ),
            'priority' => 100,
            'panel'    => 'general_settings',
        )
    );
    
    /** Analytics Code */
    $wp_customize->add_setting(
        'google_analytics',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_code',
        )
    );
        
    $wp_customize->add_control( 
        new WP_Customize_Code_Editor_Control(
            $wp_customize, 
            'google_analytics',
            array(
                'section'     => 'google_analytics_settings',
                'label'       => __( 'Analytics Code', 'cookery' ),
                'description' => __( 'Paste your Google Analytics code here.', 'cookery' ),
                'code_type'   => 'javascript',
            )
        )       
    );    
    /** Google Analytics Settings Ends */
}
add_action( 'customize_register', 'cookery_customize_register_general_analytic' );