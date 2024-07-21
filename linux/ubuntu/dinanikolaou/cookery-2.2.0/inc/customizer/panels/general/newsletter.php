<?php
/**
 * Newsletter Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_newsletter( $wp_customize ) {
    
    /** Newsletter Settings */
    $wp_customize->add_section(
        'newsletter_settings',
        array(
            'title'    => __( 'Newsletter Settings', 'cookery' ),
            'priority' => 60,
            'panel'    => 'general_settings',
        )
    );
    
    if( is_btnw_activated() ){
		
        /** Enable Newsletter Section */
        $wp_customize->add_setting( 
            'ed_newsletter', 
            array(
                'default'           => false,
                'sanitize_callback' => 'cookery_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Cookery_Toggle_Control( 
    			$wp_customize,
    			'ed_newsletter',
    			array(
    				'section'     => 'newsletter_settings',
    				'label'	      => __( 'Newsletter Section', 'cookery' ),
                    'description' => __( 'Enable to show Newsletter Section', 'cookery' ),
    			)
    		)
    	);
    
        /** Newsletter Shortcode */
        $wp_customize->add_setting(
            'newsletter_shortcode',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'newsletter_shortcode',
            array(
                'type'        => 'text',
                'section'     => 'newsletter_settings',
                'label'       => __( 'Newsletter Shortcode', 'cookery' ),
                'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'cookery' ),
            )
        ); 

        $wp_customize->add_setting( 
            'ed_top_newsletter', 
            array(
                'default'           => true,
                'sanitize_callback' => 'cookery_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Cookery_Toggle_Control( 
                $wp_customize,
                'ed_top_newsletter',
                array(
                    'section'     => 'newsletter_settings',
                    'label'       => __( 'Enable at Top', 'cookery' ),
                    'description' => __( 'Enable to show newsletter in the top of single recipe.', 'cookery' ),
                )
            )
        );

        $wp_customize->add_setting( 
            'ed_bottom_newsletter', 
            array(
                'default'           => true,
                'sanitize_callback' => 'cookery_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Cookery_Toggle_Control( 
                $wp_customize,
                'ed_bottom_newsletter',
                array(
                    'section'     => 'newsletter_settings',
                    'label'       => __( 'Enable at Bottom', 'cookery' ),
                    'description' => __( 'Enable to show newsletter in the bottom of single recipe.', 'cookery' ),
                )
            )
        );
	} else {
		$wp_customize->add_setting(
			'newsletter_recommend',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new cookery_Plugin_Recommend_Control(
				$wp_customize,
				'newsletter_recommend',
				array(
					'section'     => 'newsletter_settings',
					'label'       => __( 'Newsletter Shortcode', 'cookery' ),
					'capability'  => 'install_plugins',
					'plugin_slug' => 'blossomthemes-email-newsletter',//This is the slug of recommended plugin.
					'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s. After that option related with this section will be visible.', 'cookery' ), '<strong>', '</strong>' ),
				)
			)
		);
	}    
}
add_action( 'customize_register', 'cookery_customize_register_general_newsletter' );