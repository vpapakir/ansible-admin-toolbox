<?php
/**
 * Top Bar Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_topbar( $wp_customize ) {
    
    /** Top Bar Settings */
    $wp_customize->add_section(
        'top_bar_settings',
        array(
            'title'    => __( 'Top Bar Settings', 'cookery' ),
            'priority' => 5,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Top Bar */
    $wp_customize->add_setting( 
        'ed_top_bar', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_top_bar',
			array(
				'section'     => 'top_bar_settings',
				'label'	      => __( 'Enable Top Bar', 'cookery' ),
                'description' => __( 'Enable to show top bar on top of header.', 'cookery' ),
			)
		)
	);
    
    /** Top Bar Type */    
    $wp_customize->add_setting( 
        'top_bar_type', 
        array(
            'default'           => 'top_button_link',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Buttonset_Control(
            $wp_customize,
            'top_bar_type',
            array(
                'section'     => 'top_bar_settings',
                'label'       => __( 'Top Bar Type', 'cookery' ),
                'description' => __( 'You can add button link or newsletter in top bar', 'cookery' ),
                'choices'     => array(
                    'top_button_link' => __( 'Button Link', 'cookery' ),
                    'top_newsletter'  => __( 'Newsletter', 'cookery' ),
                ),
                'active_callback' => 'cookery_topbar',
            )
        )
    );

     /** Notification Text */
    $wp_customize->add_setting( 
        'notification_text', 
        array(
            'default'           => __( 'By continuing to use this site, you agree to the use of cookies.', 'cookery' ), 
            'sanitize_callback' => 'sanitize_text_field'
        ) 
    );
    
    $wp_customize->add_control(
        'notification_text',
        array(
            'section'         => 'top_bar_settings',
            'label'           => __( 'Notification Text', 'cookery' ),
            'description'     => __( 'Please add the notification text here.', 'cookery' ),
            'type'            => 'text',
            'active_callback' => 'cookery_topbar',
        )   
    );

    /** Notification Button Label */
    $wp_customize->add_setting(
        'notification_label',
        array(
            'default'           => __( 'Find out more', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'notification_label',
        array(
            'type'            => 'text',
            'section'         => 'top_bar_settings',
            'label'           => __( 'Notification Button Label', 'cookery' ),
            'active_callback' => 'cookery_topbar',
        )
    );

    /** Notification Button Link */
    $wp_customize->add_setting(
        'notification_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw' 
        )
    );
    
    $wp_customize->add_control(
        'notification_btn_url',
        array(
            'type'            => 'text',
            'section'         => 'top_bar_settings',
            'label'           => __( 'Notification Button Link', 'cookery' ),
            'active_callback' => 'cookery_topbar',
        )
    );  

    /** Enable Notification in New Tab */
    $wp_customize->add_setting( 
        'ed_open_new_target', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_open_new_target',
            array(
                'section'         => 'top_bar_settings',
                'label'           => __( 'Enable to open in new window', 'cookery' ),
                'description'     => __( 'Enable/Disable to show the url to go in next window', 'cookery' ),
                'active_callback' => 'cookery_topbar',

            )
        )
    );      

    /** Top Bar Newsletter Shortcode */
    if( is_btnw_activated() ){
        $wp_customize->add_setting(
            'top_bar_newsletter',
            array(
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field' 
            )
        );
        
        $wp_customize->add_control(
            'top_bar_newsletter',
            array(
                'type'            => 'text',
                'section'         => 'top_bar_settings',
                'label'           => __( 'Header Newsletter Shortcode', 'cookery' ),
                'description'     => __( 'Enter the shortcode here.', 'cookery' ),
                'active_callback' => 'cookery_topbar',
            )
        );
    }else{

        $wp_customize->add_setting(
            'header_newsletter_note',
            array(
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            new cookery_Plugin_Recommend_Control(
                $wp_customize,
                'header_newsletter_note',
                array(
                    'section'         => 'top_bar_settings',
                    'label'           => __('Header Newsletter Shortcode', 'cookery'),
                    'capability'      => 'install_plugins',
                    'plugin_slug'     => 'blossomthemes-email-newsletter',
                    'description'     => sprintf(__('Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s.', 'cookery'), '<strong>', '</strong>'),
                    'active_callback' => 'cookery_topbar',
                )
            )
        );

    }

    $wp_customize->add_setting( 
        'topbar_color', 
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'topbar_color', 
            array(
                'label'       => __( 'Top Bar Color', 'cookery' ),
                'description' => __( 'Color of the topbar section.', 'cookery' ),
                'section'     => 'top_bar_settings',
                'active_callback' => 'cookery_topbar',
            )
        )
    );

    $wp_customize->add_setting( 
        'topbar_font_color', 
        array(
            'default'           => '#232323',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'topbar_font_color', 
            array(
                'label'       => __( 'Top Bar Font Color', 'cookery' ),
                'description' => __( 'Font color of the top bar section.', 'cookery' ),
                'section'     => 'top_bar_settings',
                'active_callback' => 'cookery_topbar',
            )
        )
    );
    /** Top Bar Settings Ends */    
}
add_action( 'customize_register', 'cookery_customize_register_general_topbar' );