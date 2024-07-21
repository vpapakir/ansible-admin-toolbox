<?php
/**
 * Recipe Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_single_recipe( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'recipe_layout_settings',
        array(
            'title'    => __( 'Single Recipe Layout', 'cookery' ),
            'priority' => 55,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'single_recipe_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'single_recipe_layout',
			array(
				'section'	  => 'recipe_layout_settings',
				'label'		  => __( 'Single Recipe Layout', 'cookery' ),
				'description' => __( 'Choose the layout of the single recipe.', 'cookery' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/single_recipe/one.jpg',
					'two'   => get_template_directory_uri() . '/images/single_recipe/two.jpg',
                    'three' => get_template_directory_uri() . '/images/single_recipe/three.jpg',
					'four'  => get_template_directory_uri() . '/images/single_recipe/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/single_recipe/five.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_single_recipe' );