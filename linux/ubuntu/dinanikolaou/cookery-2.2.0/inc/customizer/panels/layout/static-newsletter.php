<?php
/**
 * Static Newsletter Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_static_newsletter( $wp_customize ) {
    
    /** Static Newsletter Layout Settings */
    $wp_customize->add_section(
        'static_newsletter_layout_settings',
        array(
            'title'    => __( 'Static Banner Newsletter Layout', 'cookery' ),
            'priority' => 35,
            'panel'    => 'layout_settings',
        )
    );
    
    $wp_customize->add_setting( 
        'static_newsletter_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Image_Control(
            $wp_customize,
            'static_newsletter_layout',
            array(
                'section'     => 'static_newsletter_layout_settings',
                'label'       => __( 'Newsletter Banner Layout', 'cookery' ),
                'description' => __( 'Choose the layout of the static newsletter banner for your site.', 'cookery' ),
                'choices'     => array(
                    'one'   => get_template_directory_uri() . '/images/static_banner/newsletter1.jpg',
                    'two'   => get_template_directory_uri() . '/images/static_banner/newsletter2.jpg',
                    'three' => get_template_directory_uri() . '/images/static_banner/newsletter3.jpg',
                )
            )
        )
    );

    $wp_customize->add_setting(
        'static_newsletter_banner_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'static_newsletter_banner_layout_text',
            array(
                'section'     => 'static_newsletter_layout_settings',
                'description' => sprintf( __( '%1$sClick here%2$s to configure static newsletter banner settings.', 'cookery' ), '<span class="text-inner-link static_newsletter_banner_layout_text">', '</span>' ),
            )
        )
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_static_newsletter' );