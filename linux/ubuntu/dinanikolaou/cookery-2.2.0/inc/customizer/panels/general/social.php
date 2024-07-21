<?php
/**
 * Social Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_social( $wp_customize ) {
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'cookery' ),
            'priority' => 35,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Enable Social Links', 'cookery' ),
                'description' => __( 'Enable to show social links at header.', 'cookery' ),
			)
		)
	);
    
    $wp_customize->add_setting( 
        new Cookery_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Cookery_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'social_media_settings',				
				'label'	  => __( 'Social Links', 'cookery' ),
				'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'cookery' ),
                        'description' => __( 'Example: fab fa-facebook-f', 'cookery' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'cookery' ),
                        'description' => __( 'Example: https://facebook.com', 'cookery' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'cookery' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    /** Social Media Settings Ends */
    
}
add_action( 'customize_register', 'cookery_customize_register_general_social' );