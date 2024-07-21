<?php
/**
 * General Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_general( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'general_layout_settings',
        array(
            'title'    => __( 'General Sidebar Layout', 'cookery' ),
            'priority' => 60,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Page Sidebar Layout', 'cookery' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'cookery' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
                    'centered'      => get_template_directory_uri() . '/images/1cc.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Post Sidebar Layout', 'cookery' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'cookery' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
                    'centered'      => get_template_directory_uri() . '/images/1cc.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Default Sidebar Layout', 'cookery' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'cookery' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/1c.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/images/2cl.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_general' );