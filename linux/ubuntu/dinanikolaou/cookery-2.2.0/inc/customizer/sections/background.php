<?php
/**
 * Background Settings
 *
 * @package Cookery
 */

function cookery_customize_register_appearance( $wp_customize ) {
    
    /** Background */
    $wp_customize->get_section( 'background_image' )->title = __( 'Background', 'cookery' );
    $wp_customize->get_section( 'background_image' )->priority = 41;
    $wp_customize->get_control( 'background_image' )->active_callback = 'cookery_body_bg_choice';
    $wp_customize->get_control( 'background_preset' )->active_callback = 'cookery_body_bg_choice';
    $wp_customize->get_control( 'background_position' )->active_callback = 'cookery_body_bg_choice';
    $wp_customize->get_control( 'background_size' )->active_callback = 'cookery_body_bg_choice';
    $wp_customize->get_control( 'background_repeat' )->active_callback = 'cookery_body_bg_choice';
    $wp_customize->get_control( 'background_attachment' )->active_callback = 'cookery_body_bg_choice';
    
    /** Body Background */
    $wp_customize->add_setting( 
        'body_bg', 
        array(
            'default'           => 'image',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Buttonset_Control(
			$wp_customize,
			'body_bg',
			array(
				'section'	  => 'background_image',
				'label'       => __( 'Body Background', 'cookery' ),
                'description' => __( 'Choose body background as image or pattern.', 'cookery' ),
				'choices'	  => array(
					'image'   => __( 'Image', 'cookery' ),
                    'pattern' => __( 'Pattern', 'cookery' ),
				),
                'priority'    => 5
			)
		)
	);
    
    /** Background Pattern */
    $wp_customize->add_setting( 
        'bg_pattern', array(
            'default'           => 'nobg',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'bg_pattern',
			array(
				'section'		  => 'background_image',
				'label'			  => __( 'Background Pattern', 'cookery' ),
				'description'	  => __( 'Choose from any of 64 awesome background patterns for your site background.', 'cookery' ),
				'choices'         => cookery_get_patterns(),
                'active_callback' => 'cookery_body_bg_choice'
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_appearance' );