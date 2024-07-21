<?php
/**
 * Home Page Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_home( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'home_layout_settings',
        array(
            'title'    => __( 'Home Page Layout', 'cookery' ),
            'priority' => 45,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'home_layout', 
        array(
            'default'           => 'three',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'home_layout',
			array(
				'section'	  => 'home_layout_settings',
				'label'		  => __( 'Home Page Layout', 'cookery' ),
				'description' => __( 'Choose the home page layout for your site.', 'cookery' ),
				'choices'	  => array(
                    'one'        => get_template_directory_uri() . '/images/home/one.jpg',
                    'two'        => get_template_directory_uri() . '/images/home/two.jpg',
                    'three'      => get_template_directory_uri() . '/images/home/three.jpg',
                    'four'       => get_template_directory_uri() . '/images/home/four.jpg',
                    'five'       => get_template_directory_uri() . '/images/home/five.jpg',
                    'six'        => get_template_directory_uri() . '/images/home/six.jpg',
                    'seven'      => get_template_directory_uri() . '/images/home/seven.jpg',
                    'eight'      => get_template_directory_uri() . '/images/home/eight.jpg',
                    'nine'       => get_template_directory_uri() . '/images/home/nine.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_home' );