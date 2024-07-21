<?php
/**
 * CTA Section
 *
 * @package Cookery
 */

function cookery_customize_register_frontpage_cta( $wp_customize ){

    /** CTA Section */
    $wp_customize->add_section(
        'cta',
        array(
            'title'    => __( 'Call To Action Section', 'cookery' ),
            'priority' => 55,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'cta_main_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/cta-bg.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'cta_main_bg',
            array(
                'label'           => __( 'Choose Background', 'cookery' ),
                'description'     => __( 'Choose the background image for cta section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'cta',
                'priority'        => -1
            )
        )
    );

    $wp_customize->add_setting(
        'cta_ad_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/decor-img1.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'cta_ad_bg',
            array(
                'label'           => __( 'Choose Decor Image', 'cookery' ),
                'description'     => __( 'Choose the decor image for cta section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'cta',
                'priority'        => -1
            )
        )
    );

    $wp_customize->add_setting(
        'cta_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'cta_note_text',
            array(
                'section'     => 'cta',
                'description' => __( '<hr/>Add "Blossom: Call To Action" widget for call to action section.', 'cookery' ),
                'priority'    => -1
            )
        )
    );

    $cta_section = $wp_customize->get_section( 'sidebar-widgets-cta' );
    if ( ! empty( $cta_section ) ) {

        $cta_section->panel     = 'frontpage_settings';
        $cta_section->priority  = 55;
        $wp_customize->get_control( 'cta_note_text' )->section = 'sidebar-widgets-cta';
        $wp_customize->get_control( 'cta_main_bg' )->section    = 'sidebar-widgets-cta';
        $wp_customize->get_control( 'cta_ad_bg' )->section    = 'sidebar-widgets-cta';
    }  
    
    /** Cta Section Ends */  

}
add_action( 'customize_register', 'cookery_customize_register_frontpage_cta' );