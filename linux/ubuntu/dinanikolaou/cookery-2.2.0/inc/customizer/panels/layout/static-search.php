<?php
/**
 * Static Search Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_static_search( $wp_customize ) {
    
    /** Static Search Layout Settings */
    $wp_customize->add_section(
        'static_search_layout_settings',
        array(
            'title'    => __( 'Static Banner Search Layout', 'cookery' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    $wp_customize->add_setting( 
        'static_search_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Image_Control(
            $wp_customize,
            'static_search_layout',
            array(
                'section'     => 'static_search_layout_settings',
                'label'       => __( 'Search Banner Layout', 'cookery' ),
                'description' => __( 'Choose the layout of the static search banner for your site.', 'cookery' ),
                'choices'     => array(
                    'one'   => get_template_directory_uri() . '/images/static_banner/search1.jpg',
                    'two'   => get_template_directory_uri() . '/images/static_banner/search2.jpg',
                )
            )
        )
    );


    $wp_customize->add_setting(
        'static_search_banner_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'static_search_banner_layout_text',
            array(
                'section'     => 'static_search_layout_settings',
                'description' => sprintf( __( '%1$sClick here%2$s to configure static search banner settings.', 'cookery' ), '<span class="text-inner-link static_search_banner_layout_text">', '</span>' ),
            )
        )
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_static_search' );