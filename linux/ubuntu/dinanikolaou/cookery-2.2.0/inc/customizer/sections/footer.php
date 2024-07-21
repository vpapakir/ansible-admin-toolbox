<?php
/**
 * Footer Setting
 *
 * @package Cookery
 */

function cookery_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'cookery' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => __( 'Footer Copyright Text', 'cookery' ),
            'description' => __( 'You can change footer copyright and use your own custom text from here. Use [the-year] shortcode to display current year & [the-site-link] shortcode to display site link.', 'cookery' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-info .copyright',
        'render_callback' => 'cookery_get_footer_copyright',
    ) );
    
    /** Hide Author Link */
    $wp_customize->add_setting(
        'ed_author_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_author_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide Author Link', 'cookery' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_author_link', array(
        'selector' => '.site-info .author-link',
        'render_callback' => 'cookery_ed_author_link',
    ) );
    
    /** Hide WordPress Link */
    $wp_customize->add_setting(
        'ed_wp_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_wp_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide WordPress Link', 'cookery' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_wp_link', array(
        'selector' => '.site-info .wp-link',
        'render_callback' => 'cookery_ed_wp_link',
    ) );
        
    /** Footer Disclaimer */
    $wp_customize->add_setting(
        'footer_disclaimer',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            // 'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_disclaimer',
        array(
            'label'       => __( 'Footer Disclaimer Text', 'cookery' ),
            'description' => __( 'You can change footer disclaimer and use your own custom text from here.', 'cookery' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );

    $wp_customize->add_setting( 
        'footer_disclaimer_bg_color', 
        array(
            'default'           => '#2db68d',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_disclaimer_bg_color', 
            array(
                'label'       => __( 'Footer Disclaimer Bg Color', 'cookery' ),
                'description' => __( 'Background color of the footer disclaimer section.', 'cookery' ),
                'section'     => 'footer_settings',
            )
        )
    );

    $wp_customize->add_setting( 
        'footer_disclaimer_font_color', 
        array(
            'default'           => '#232323',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_disclaimer_font_color', 
            array(
                'label'       => __( 'Footer Disclaimer Font Color', 'cookery' ),
                'description' => __( 'Font color of the footer disclaimer section.', 'cookery' ),
                'section'     => 'footer_settings',
            )   
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_footer' );