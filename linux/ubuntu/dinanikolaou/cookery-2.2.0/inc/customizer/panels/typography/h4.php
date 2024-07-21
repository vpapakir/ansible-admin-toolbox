<?php
/**
 * Typography H4 Settings
 *
 * @package Cookery
 */

function cookery_customize_register_typography_h4( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h4_settings',
        array(
            'title'    => __( 'H4 Settings (Content)', 'cookery' ),
            'priority' => 25,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H4 Font */
    $wp_customize->add_setting( 
        'h4_font', 
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
            'h4_font', 
            array(
                'label'   => __( 'H4 Font', 'cookery' ),
                'section' => 'h4_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h4_font_size', 
        array(
            'default'           => 28,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'h4_font_size',
			array(
				'section' => 'h4_settings',
				'label'	  => __( 'H4 Font Size', 'cookery' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'cookery_customize_register_typography_h4' );