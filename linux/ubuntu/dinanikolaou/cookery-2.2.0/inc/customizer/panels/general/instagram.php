<?php
/**
 * Instagram Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_instagram( $wp_customize ) {
    
    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'cookery' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Instagram Section */
    $wp_customize->add_setting( 
        'ed_instagram', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_instagram',
            array(
                'section'     => 'instagram_settings',
                'label'	      => __( 'Instagram Section', 'cookery' ),
                'description' => __( 'Enable to show Instagram Section', 'cookery' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'instagram_shortcode', 
        array(
            'default'           => '[instagram-feed]',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    
    $wp_customize->add_control(
        'instagram_shortcode',
        array(
            'section'         => 'instagram_settings',
            'label'           => __( 'Shortcode', 'cookery' ),
            'type'            => 'text',
            'description'     => __( 'Add shortcode for your instagram profile below:', 'cookery' ),
            'active_callback' => 'cookery_instagram_ac',
        )
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_general_instagram' );