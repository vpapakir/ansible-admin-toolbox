<?php
/**
 * Slider Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_slider( $wp_customize ) {
    
    /** Slider Layout Settings */
    $wp_customize->add_section(
        'slider_layout_settings',
        array(
            'title'    => __( 'Slider Layout', 'cookery' ),
            'priority' => 20,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'slider_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'slider_layout',
			array(
				'section'	  => 'slider_layout_settings',
				'label'		  => __( 'Slider Layout', 'cookery' ),
				'description' => __( 'Choose the layout of the slider for your site.', 'cookery' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/slider/one.jpg',
					'two'   => get_template_directory_uri() . '/images/slider/two.jpg',
                    'three' => get_template_directory_uri() . '/images/slider/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/slider/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/slider/five.jpg',
                    'six'   => get_template_directory_uri() . '/images/slider/six.jpg',
                    'seven' => get_template_directory_uri() . '/images/slider/seven.jpg',
                    'eight' => get_template_directory_uri() . '/images/slider/eight.jpg',
				)
			)
		)
	);

    $wp_customize->add_setting(
        'slider_banner_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'slider_banner_layout_text',
            array(
                'section'     => 'slider_layout_settings',
                'description' => sprintf( __( '%1$sClick here%2$s to configure slider settings.', 'cookery' ), '<span class="text-inner-link slider_banner_layout_text">', '</span>' ),
            )
        )
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_slider' );