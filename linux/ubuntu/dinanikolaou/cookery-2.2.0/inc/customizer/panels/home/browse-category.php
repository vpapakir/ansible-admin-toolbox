<?php
/**
 * Browse Category Settings
 *
 * @package Cookery
 */

function cookery_customize_register_browse_category( $wp_customize ){
    
    if( ! is_delicious_recipe_activated() ) return false;

    $wp_customize->add_section(
        'browse_category_settings',
        array(
            'title'    => __( 'Browse Category Section', 'cookery' ),
            'priority' => 70,
            'panel'    => 'frontpage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'browse_category_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'browse_category_enable',
            array(
                'section'         => 'browse_category_settings',
                'label'           => __( 'Enable Browse Category', 'cookery' ),
                'description'     => __( 'Enable to show recipes listed from category in homepage.', 'cookery' ),
            )
        )
    );

    /** Title */
    $wp_customize->add_setting(
        'browse_category_title',
        array(
            'default'           => __( 'Browse Recipes By Category', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'browse_category_title',
        array(
            'label'           => __( 'Title', 'cookery' ),
            'section'         => 'browse_category_settings',
            'type'            => 'text',
            'active_callback' => 'cookery_browse_category_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'browse_category_title', array(
        'selector' => '.browse-category-section .section-header h2.section-title',
        'render_callback' => 'cookery_get_browse_category_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'browse_category_subtitle',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'browse_category_subtitle',
        array(
            'label'           => __( 'Sub Title', 'cookery' ),
            'section'         => 'browse_category_settings',
            'type'            => 'textarea',
            'active_callback' => 'cookery_browse_category_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'browse_category_subtitle', array(
        'selector' => '.browse-category-section .section-header .section-desc',
        'render_callback' => 'cookery_get_browse_category_subtitle',
    ) );

    $wp_customize->add_setting(
        'browse_category_type',
        array(
            'default'           => 'recipe-course',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'browse_category_type',
            array(
                'label'   => __( 'Category Content Style', 'cookery' ),
                'section' => 'browse_category_settings',
                'choices' => array(  
                    'recipe-course'         => __( 'Recipe Course', 'cookery' ), 
                    'recipe-cuisine'        => __( 'Recipe Cuisine', 'cookery' ), 
                    'recipe-cooking-method' => __( 'Recipe Cooking Method', 'cookery' ) 
                ), 
                'active_callback' => 'cookery_browse_category_ac'
            )
        )
    );
    
    $wp_customize->add_setting(
        'browse_cat_course',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'browse_cat_course',
            array(
                'label'           => __( 'Select Recipe Course', 'cookery' ),
                'section'         => 'browse_category_settings',
                'choices'         => cookery_get_categories( true, 'recipe-course' ),
                'active_callback' => 'cookery_browse_category_ac', 
                'multiple'        => 20,
            )
        )
    );

    $wp_customize->add_setting(
        'browse_cat_cuisine',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'browse_cat_cuisine',
            array(
                'label'           => __( 'Select Recipe Cuisine', 'cookery' ),
                'section'         => 'browse_category_settings',
                'choices'         => cookery_get_categories( true, 'recipe-cuisine' ),
                'active_callback' => 'cookery_browse_category_ac',
                'multiple'        => 20, 
            )
        )
    );

    $wp_customize->add_setting(
        'browse_cat_cookmethod',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'browse_cat_cookmethod',
            array(
                'label'           => __( 'Select Recipe Cooking Method', 'cookery' ),
                'section'         => 'browse_category_settings',
                'choices'         => cookery_get_categories( true, 'recipe-cooking-method' ),
                'active_callback' => 'cookery_browse_category_ac',
                'multiple'        => 20, 
            )
        )
    );

    $wp_customize->add_setting(
        'show_counts',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'show_counts',
            array(
                'section'       => 'browse_category_settings',
                'label'         => __( 'Show Counts', 'cookery' ),
                'description'   => __( 'Enable to show posts count n category list.', 'cookery' ),
                'active_callback' => 'cookery_browse_category_ac'
            )
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_browse_category' );