<?php
/**
 * Video Section
 *
 * @package Cookery
 */

function cookery_customize_register_general_video( $wp_customize ){

    /** Video Section */
    $wp_customize->add_section(
        'video_section',
        array(
            'title'    => __( 'Video Section', 'cookery' ),
            'priority' => 60,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'ed_video_section',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_video_section',
            array(
                'section'     => 'video_section',
                'label'       => __( 'Enable Video Section', 'cookery' ),
                'description' => __( 'Enable to show video section in homepage.', 'cookery' ),
            )
        )
    );

    /** Video Title  */
    $wp_customize->add_setting(
        'video_title',
        array(
            'default'           => __( 'Watch This', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'video_title',
        array(
            'label'           => __( 'Video Section Title', 'cookery' ),
            'description'     => __( 'Add title for Video section.', 'cookery' ),
            'section'         => 'video_section',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'video_title', array(
        'selector' => '.video-section .section-header h2.section-title',
        'render_callback' => 'cookery_get_video_title',
    ) );    

    /** Video SubTitle  */
    $wp_customize->add_setting(
        'video_subtitle',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'video_subtitle',
        array(
            'label'           => __( 'Video Block Title', 'cookery' ),
            'description'     => __( 'Add subtitle for Video section.', 'cookery' ),
            'section'         => 'video_section',
            'type'            => 'text',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'video_subtitle', array(
        'selector' => '.video-section .section-content-wrap h3.block-title',
        'render_callback' => 'cookery_get_video_subtitle',
    ) );

    /** Video Content  */
    $wp_customize->add_setting(
        'video_content',
        array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'video_content',
        array(
            'label'           => __( 'Video Block Content', 'cookery' ),
            'description'     => __( 'Add description for Video section.', 'cookery' ),
            'section'         => 'video_section',
            'type'            => 'textarea',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'video_content', array(
        'selector' => '.video-section .section-content-wrap .section-content',
        'render_callback' => 'cookery_get_video_content',
    ) );

    $wp_customize->add_setting(
        'video_readmore',
        array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'video_readmore',
        array(
            'label'           => __( 'Video Block Readmore', 'cookery' ),
            'description'     => __( 'Add title for Video section.', 'cookery' ),
            'section'         => 'video_section',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'video_readmore', array(
        'selector' => '.video-section .button-wrap a.btn-readmore',
        'render_callback' => 'cookery_get_video_readmore',
    ) );

    $wp_customize->add_setting(
        'video_readmore_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'video_readmore_url',
        array(
            'label'           => __( 'Video Block Readmore Link', 'cookery' ),
            'description'     => __( 'Add URL to link readmore button.', 'cookery' ),
            'section'         => 'video_section',
            'type'            => 'url',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->add_setting(
        'video_section_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_code',
        )
    );
    
    $wp_customize->add_control(
        'video_section_url',
        array(
            'label'           => __( 'Video Link', 'cookery' ),
            'description'     => __( 'Add YouTube Embed code to display video.', 'cookery' ),
            'section'         => 'video_section',
            'type'            => 'textarea',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->add_setting(
        'video_subscribe_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'video_subscribe_text',
        array(
            'label'           => __( 'Video Subscribe Text', 'cookery' ),
            'section'         => 'video_section',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'video_subscribe_text', array(
        'selector' => '.video-section .button-sub-wrap a.btn-sub',
        'render_callback' => 'cookery_get_video_subscribe_text',
    ) );

    $wp_customize->add_setting(
        'video_subscribe_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'video_subscribe_url',
        array(
            'label'           => __( 'Video Subscribe Link', 'cookery' ),
            'description'     => __( 'Add YouTube channel link.', 'cookery' ),
            'section'         => 'video_section',
            'type'            => 'url',
            'active_callback' => 'cookery_video_ac'
        )
    );

    $wp_customize->add_setting(
        'video_decor_one_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/decor-img2.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'video_decor_one_bg',
            array(
                'label'           => __( 'Choose Decor Image', 'cookery' ),
                'description'     => __( 'Choose the decor image for video section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'video_section',
                'active_callback' => 'cookery_video_ac'
            )
        )
    );

    $wp_customize->add_setting(
        'video_decor_two_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/decor-img3.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'video_decor_two_bg',
            array(
                'label'           => __( 'Choose Decor Image', 'cookery' ),
                'description'     => __( 'Choose the decor image for video section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'video_section',
                'active_callback' => 'cookery_video_ac'
            )
        )
    );

    /** Video Section Ends */  

}
add_action( 'customize_register', 'cookery_customize_register_general_video' );