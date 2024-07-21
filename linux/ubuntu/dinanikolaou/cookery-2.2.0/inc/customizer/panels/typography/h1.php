<?php
/**
 * Typography H1 Settings
 *
 * @package Cookery
 */

function cookery_customize_register_typography_h1( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h1_settings',
        array(
            'title'    => __( 'H1 Settings (Content)', 'cookery' ),
            'priority' => 15,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H1 Font */
    $wp_customize->add_setting( 
        'h1_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Noto Serif',
                'variant'     => 'bold',
            ),
            'sanitize_callback' => array( 'cookery_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Cookery_Typography_Control( 
            $wp_customize, 
            'h1_font', 
            array(
                'label'   => __( 'H1 Font', 'cookery' ),
                'section' => 'h1_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h1_font_size', 
        array(
            'default'           => 46,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'h1_font_size',
			array(
				'section' => 'h1_settings',
				'label'	  => __( 'H1 Font Size', 'cookery' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'cookery_customize_register_typography_h1' );