<?php
/**
 * Color Setting
 *
 * @package Cookery
 */

function cookery_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#2db68d',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'           => __( 'Primary Color', 'cookery' ),
                'description'     => __( 'Primary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );

    $wp_customize->add_setting( 
        'secondary_color', 
        array(
            'default'           => '#e84e3b',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color', 
            array(
                'label'           => __( 'Secondary Color', 'cookery' ),
                'description'     => __( 'Secondary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );

    /** Primary Color Cook Recipe Child*/
    $wp_customize->add_setting( 
        'primary_color_ch', 
        array(
            'default'           => '#f15641',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_ch', 
            array(
                'label'           => __( 'Primary Color', 'cookery' ),
                'description'     => __( 'Primary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );

    /** Secondary Color Child*/
    $wp_customize->add_setting( 
        'secondary_color_ch', 
        array(
            'default'           => '#f1ae41',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color_ch', 
            array(
                'label'           => __( 'Secondary Color', 'cookery' ),
                'description'     => __( 'Secondary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );

    /** Primary Color Cook Recipe Child*/
    $wp_customize->add_setting( 
        'primary_color_sr', 
        array(
            'default'           => '#b05045',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_sr', 
            array(
                'label'           => __( 'Primary Color', 'cookery' ),
                'description'     => __( 'Primary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );

    /** Secondary Color Spicy Recipe Child*/
    $wp_customize->add_setting( 
        'secondary_color_sr', 
        array(
            'default'           => '#646f58',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color_sr', 
            array(
                'label'           => __( 'Secondary Color', 'cookery' ),
                'description'     => __( 'Secondary color of the theme.', 'cookery' ),
                'section'         => 'colors',
                'priority'        => 5,
                'active_callback' => 'cookery_colors_callback',
            )
        )
    );
    
    /** Background Color*/
    $wp_customize->get_control( 'background_color' )->description = __( 'Background color of the theme.', 'cookery' );
    
}
add_action( 'customize_register', 'cookery_customize_register_color' );