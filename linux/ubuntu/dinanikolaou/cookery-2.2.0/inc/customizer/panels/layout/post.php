<?php
/**
 * Post Page Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_post_page( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'post_page_layout_settings',
        array(
            'title'    => __( 'Single Post Layout', 'cookery' ),
            'priority' => 55,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'single_post_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'single_post_layout',
			array(
				'section'	  => 'post_page_layout_settings',
				'label'		  => __( 'Single Page Layout', 'cookery' ),
				'description' => __( 'Choose the layout of the single post page.', 'cookery' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/single/one.jpg',
					'two'   => get_template_directory_uri() . '/images/single/two.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_post_page' );