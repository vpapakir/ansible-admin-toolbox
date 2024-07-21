<?php
/**
 * SEO Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_seo( $wp_customize ) {
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'cookery' ),
            'priority' => 45,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Last Update Post Date', 'cookery' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'cookery' ),
			)
		)
	);
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Breadcrumb', 'cookery' ),
                'description' => __( 'Enable to show breadcrumb in inner pages.', 'cookery' ),
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => __( 'Home', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Home Text', 'cookery' ),
        )
    );  
    /** SEO Settings Ends */
    
}
add_action( 'customize_register', 'cookery_customize_register_general_seo' );