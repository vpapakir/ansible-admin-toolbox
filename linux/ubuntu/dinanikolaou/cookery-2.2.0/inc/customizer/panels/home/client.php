<?php
/**
 * Client Section
 *
 * @package Cookery
 */

function cookery_customize_register_frontpage_client( $wp_customize ){

    /** Client Section */
    $wp_customize->add_section(
        'client',
        array(
            'title'    => __( 'Client Section', 'cookery' ),
            'priority' => 75,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'client_section_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/client-section-decor.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'client_section_bg',
            array(
                'label'           => __( 'Choose Background', 'cookery' ),
                'description'     => __( 'Choose the background image for client section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'client',
                'priority'        => -1
            )
        )
    );

    $wp_customize->add_setting(
        'client_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'client_note_text',
            array(
                'section'     => 'client',
                'description' => __( '<hr/>Add "Blossom: Client Logo Widget" for client section. The recommended logo size is 330x190px. Please upload logo of atleast width 330px to avoid cropping..', 'cookery' ),
                'priority'    => -1
            )
        )
    );

    $client_section = $wp_customize->get_section( 'sidebar-widgets-client' );
    if ( ! empty( $client_section ) ) {

        $client_section->panel     = 'frontpage_settings';
        $client_section->priority  = 75;
        $wp_customize->get_control( 'client_note_text' )->section = 'sidebar-widgets-client';
        $wp_customize->get_control( 'client_section_bg' )->section    = 'sidebar-widgets-client';
    }  
    
    /** Client Section Ends */  

}
add_action( 'customize_register', 'cookery_customize_register_frontpage_client' );