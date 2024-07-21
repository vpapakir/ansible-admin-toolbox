<?php
/**
 * Featured Recipe Settings
 *
 * @package Cookery
 */

function cookery_customize_register_featured_recipe( $wp_customize ){
    
    if( ! is_delicious_recipe_activated() ) return false;
    
    $wp_customize->add_section(
        'featured_recipe_settings',
        array(
            'title'    => __( 'Featured Recipe Section', 'cookery' ),
            'priority' => 65,
            'panel'    => 'frontpage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'featured_recipe_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'featured_recipe_enable',
            array(
                'section'         => 'featured_recipe_settings',
                'label'           => __( 'Enable Featured Recipe', 'cookery' ),
                'description'     => __( 'Enable to show featured recipes in homepage.', 'cookery' ),
            )
        )
    );

    /** Title */
    $wp_customize->add_setting(
        'feature_recipe_title',
        array(
            'default'           => __( 'Featured Recipes', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'feature_recipe_title',
        array(
            'label'           => __( 'Title', 'cookery' ),
            'section'         => 'featured_recipe_settings',
            'type'            => 'text',
            'active_callback' => 'cookery_featured_recipe_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'feature_recipe_title', array(
        'selector' => '.featured-recipe-section .section-header h2.section-title',
        'render_callback' => 'cookery_get_feature_recipe_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'feature_recipe_subtitle',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'feature_recipe_subtitle',
        array(
            'label'           => __( 'Subtitle', 'cookery' ),
            'section'         => 'featured_recipe_settings',
            'type'            => 'textarea',
            'active_callback' => 'cookery_featured_recipe_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'feature_recipe_subtitle', array(
        'selector' => '.featured-recipe-section .section-header .section-desc',
        'render_callback' => 'cookery_get_feature_recipe_subtitle',
    ) );
    
    /** No. of slides */
    $wp_customize->add_setting(
        'feature_recipe_post',
        array(
            'default'           => 5,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'feature_recipe_post',
			array(
				'section'     => 'featured_recipe_settings',
                'label'       => __( 'Number of Recipes', 'cookery' ),
                'description' => __( 'Choose the number of recipes you want to display', 'cookery' ),
                'choices'	  => array(
					'min' 	=> 1,
					'max' 	=> 20,
					'step'	=> 1,
				),               
                'active_callback' => 'cookery_featured_recipe_ac'
			)
		)
	);

    $wp_customize->add_setting(
        'featured_recipe_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/feat-recipe-section-decor.png',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
            'featured_recipe_bg',
            array(
                'label'           => __( 'Choose Background Image', 'cookery' ),
                'description'     => __( 'Choose the background image for featured recipe section. Recommended image format is PNG Format.', 'cookery' ),
                'section'         => 'featured_recipe_settings',
                'active_callback' => 'cookery_featured_recipe_ac'
            )
        )
    );
    
    $wp_customize->add_setting( 
        'featured_recipe_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Image_Control(
            $wp_customize,
            'featured_recipe_layout',
            array(
                'section'     => 'featured_recipe_settings',
                'label'       => __( 'Featured Recipe Layout', 'cookery' ),
                'description' => __( 'Choose the layout of the featured recipe section of homepage.', 'cookery' ),
                'choices'     => array(
                    'one'   => get_template_directory_uri() . '/images/featured_recipe/one.jpg',
                    'two'   => get_template_directory_uri() . '/images/featured_recipe/two.jpg',
                    'three' => get_template_directory_uri() . '/images/featured_recipe/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/featured_recipe/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/featured_recipe/five.jpg',
                ),
                'active_callback' => 'cookery_featured_recipe_ac'
            )
        )
    );

}
add_action( 'customize_register', 'cookery_customize_register_featured_recipe' );