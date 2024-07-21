<?php
/**
 * Header Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_header( $wp_customize ) {
    
    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'cookery' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'	  => 'header_layout_settings',
				'label'		  => __( 'Header Layout', 'cookery' ),
				'description' => __( 'Choose the layout of the header for your site.', 'cookery' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/header/one.jpg',
					'two'   => get_template_directory_uri() . '/images/header/two.jpg',
                    'three' => get_template_directory_uri() . '/images/header/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/header/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/header/five.jpg',
                    'six'   => get_template_directory_uri() . '/images/header/six.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_header' );