<?php
/**
 * Newsletter Settings
 *
 * @package Cookery
 */

function cookery_customize_register_newsletter( $wp_customize ) {
    
    /** Newsletter Settings */
    $wp_customize->add_section(
        'newsletter_section',
        array(
            'title'    => __( 'Footer Newsletter Section', 'cookery' ),
            'priority' => 80,
            'panel'    => 'frontpage_settings',
        )
    );
    
    if( is_btnw_activated() ){
		
        /** Enable Newsletter Section */
        $wp_customize->add_setting( 
            'ed_newsletter_section', 
            array(
                'default'           => false,
                'sanitize_callback' => 'cookery_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Cookery_Toggle_Control( 
    			$wp_customize,
    			'ed_newsletter_section',
    			array(
    				'section'     => 'newsletter_section',
    				'label'	      => __( 'Newsletter Section', 'cookery' ),
                    'description' => __( 'Enable to show Newsletter Section on footer', 'cookery' ),
    			)
    		)
    	);
    
        /** Newsletter Shortcode */
        $wp_customize->add_setting(
            'newsletter_section_shortcode',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'newsletter_section_shortcode',
            array(
                'type'        => 'text',
                'section'     => 'newsletter_section',
                'label'       => __( 'Newsletter Shortcode', 'cookery' ),
                'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'cookery' ),
            )
        ); 

        $wp_customize->add_setting(
            'newsletter_section_bg',
            array(
                'default'           => get_template_directory_uri() . '/images/newsletter-section-decor.png',
                'sanitize_callback' => 'cookery_sanitize_image',
            )
        );
        
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize,
                'newsletter_section_bg',
                array(
                    'label'           => __( 'Choose Background Image', 'cookery' ),
                    'description'     => __( 'Choose the background image for newsletter section. Recommended image format is PNG Format.', 'cookery' ),
                    'section'         => 'newsletter_section',
                )
            )
        );
	} else {
		$wp_customize->add_setting(
			'newsletter_section_recommend',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new cookery_Plugin_Recommend_Control(
				$wp_customize,
				'newsletter_section_recommend',
				array(
					'section'     => 'newsletter_section',
					'label'       => __( 'Newsletter Shortcode', 'cookery' ),
					'capability'  => 'install_plugins',
					'plugin_slug' => 'blossomthemes-email-newsletter',//This is the slug of recommended plugin.
					'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s. After that option related with this section will be visible.', 'cookery' ), '<strong>', '</strong>' ),
				)
			)
		);
	}    
}
add_action( 'customize_register', 'cookery_customize_register_newsletter' );