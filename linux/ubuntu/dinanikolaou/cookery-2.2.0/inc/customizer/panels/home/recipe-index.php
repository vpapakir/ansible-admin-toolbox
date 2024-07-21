<?php
/**
 * Recipe Index Settings
 *
 * @package Cookery
 */

function cookery_customize_register_recipe_index( $wp_customize ){
    
    if( ! is_delicious_recipe_activated() ) return false;

    $wp_customize->add_section(
        'recipe_index_settings',
        array(
            'title'    => __( 'Recipe Index Section', 'cookery' ),
            'priority' => 72,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'recipe_index_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'recipe_index_enable',
            array(
                'section'         => 'recipe_index_settings',
                'label'           => __( 'Enable Recipe Index', 'cookery' ),
                'description'     => __( 'Enable to show recipes listed from index in homepage.', 'cookery' ),
            )
        )
    );

    $wp_customize->add_setting(
        'recipe_index_title',
        array(
            'default'           => __( 'Recipe Index', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'recipe_index_title',
        array(
            'label'           => __( 'Section Title', 'cookery' ),
            'description'     => __( 'Add title for this section.', 'cookery' ),
            'section'         => 'recipe_index_settings',
            'type'            => 'text',
            'active_callback' => 'cookery_recipe_index_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'recipe_index_title', array(
        'selector' => '.recipe-index-section .section-header h2.section-title',
        'render_callback' => 'cookery_get_recipe_index_title',
    ) );

    $wp_customize->add_setting(
        'recipe_index_content',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'recipe_index_content',
        array(
            'label'           => __( 'Section Subtitle', 'cookery' ),
            'description'     => __( 'Add subtitle for this section', 'cookery' ),
            'section'         => 'recipe_index_settings',
            'type'            => 'textarea',
            'active_callback' => 'cookery_recipe_index_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'recipe_index_content', array(
        'selector' => '.recipe-index-section .section-header .section-desc',
        'render_callback' => 'cookery_get_recipe_index_content',
    ) );

    $wp_customize->add_setting(
        'recipe_index_carousel_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'recipe_index_carousel_enable',
            array(
                'section'         => 'recipe_index_settings',
                'label'           => __( 'Enable Carousel when more than 4 posts', 'cookery' ),
                'description'     => __( 'Enable to show carousel for recipe index in homepage.', 'cookery' ),
                'active_callback' => 'cookery_recipe_index_ac'
            )
        )
    );
    
    $wp_customize->add_setting( 
        new Cookery_Repeater_Setting( 
            $wp_customize, 
            'recipe_indexes_list', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Cookery_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Control_Repeater(
            $wp_customize,
            'recipe_indexes_list',
            array(
                'section' => 'recipe_index_settings',                
                'label'   => __( 'Add Category for Listing', 'cookery' ),
                'fields'  => array(
                    'title'     => array(
                        'type'  => 'text',
                        'label' => __( 'Section Title', 'cookery' ),
                    ),
                    'btn_label'   => array(
                        'type'  => 'text',
                        'label' => __( 'Section Button Label', 'cookery' ),
                    ),
                    'cat_id'   => array(
                        'type'  => 'select',
                        'label' => __( 'Select Category', 'cookery' ),
                        'choices' => cookery_get_categories( true, array( 'recipe-course', 'recipe-cuisine', 'recipe-cooking-method' ) )
                    ),
                    'based_on'   => array(
                        'type'  => 'select',
                        'label' => __( 'Display Recipes Based On', 'cookery' ),
                        'choices' => array(
                            ''                  => __( 'Select Filter', 'cookery' ),
                            'views'             => __( 'Based On Views', 'cookery' ),
                            'comments_count'    => __( 'Based On Comment Count', 'cookery' ),
                            'published_date'    => __( 'Based On Published Date', 'cookery' ),
                        ),
                    ),
                    'number_posts'   => array(
                        'type'  => 'text',
                        'label' => __( 'Number of recipes posts to display', 'cookery' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'category', 'cookery' ),
                    'field' => 'title'
                ),
                'active_callback' => 'cookery_recipe_index_ac'                                              
            )
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_recipe_index' );