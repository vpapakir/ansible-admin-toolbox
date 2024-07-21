<?php
/**
 * Typography H5 Settings
 *
 * @package Cookery
 */

function cookery_customize_register_typography_h5( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h5_settings',
        array(
            'title'    => __( 'H5 Settings (Content)', 'cookery' ),
            'priority' => 30,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H5 Font */
    $wp_customize->add_setting( 
        'h5_font', 
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
            'h5_font', 
            array(
                'label'   => __( 'H5 Font', 'cookery' ),
                'section' => 'h5_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h5_font_size', 
        array(
            'default'           => 20,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'h5_font_size',
			array(
				'section' => 'h5_settings',
				'label'	  => __( 'H5 Font Size', 'cookery' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'cookery_customize_register_typography_h5' );