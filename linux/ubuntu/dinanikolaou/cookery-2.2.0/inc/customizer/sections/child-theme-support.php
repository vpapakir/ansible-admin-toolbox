<?php
/**
 * Child Theme Settings
 *
 *@package CoachPress
*/

function cookery_customize_register_general_child_support( $wp_customize ) {

	/** Child Support Settings */
    $wp_customize->add_section(
        'child_support_settings',
        array(
            'title'    => __( 'Child Theme Support Settings', 'cookery' ),
            'priority' => 30,
        )
    );

    /** Child Support Description */
    $wp_customize->add_setting( 
        'child_additional_support', 
        array(
            'default'           => 'default',
            'sanitize_callback' => 'cookery_sanitize_select'
        ) 
    );

    $wp_customize->add_control(
        new Cookery_Select_Control( 
            $wp_customize,
            'child_additional_support',
            array(
                'section'     => 'child_support_settings',
                'label'       => __( 'Child Theme Style', 'cookery' ),
                'description' => __( 'Select respective child theme style from the drop-down below.', 'cookery' ),
                'choices'     => array(
                    'default'      => __( 'Default','cookery' ),
                    'cook_recipe'  => __( 'Cook Recipe','cookery' ),  
                    'spicy_recipe' => __( 'Spicy Recipe','cookery' ),  
                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'cook_recipe_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'cook_recipe_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf(__( 'To achieve the exact layout of "Cook Recipe" child theme please, select the %1$ssecond header layout%2$s, %3$sfourth slider banner%4$s respectively.', 'cookery' ), '<span class="text-inner-link h-layout">', '</span>', '<span class="text-inner-link s-layout">', '</span>' ),
                'active_callback' => 'cookery_child_theme_support_callback',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'spicy_recipe_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'spicy_recipe_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf(__( 'To achieve the exact layout of "Spicy Recipe" child theme please, select the %1$sforth header layout%2$s, %3$ssecond slider banner%4$s and %3$sseventh homepage layout%4$s respectively.', 'cookery' ), '<span class="text-inner-link h-layout">', '</span>', '<span class="text-inner-link s-layout">', '</span>' ),
                'active_callback' => 'cookery_child_theme_support_callback',
            )
        )
    );

}
add_action( 'customize_register', 'cookery_customize_register_general_child_support' );

/**
 * Active Callback
*/
function cookery_child_theme_support_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'cook_recipe_text' && $child_theme_support == 'cook_recipe' ) return true;      
    if ( $control_id == 'spicy_recipe_text' && $child_theme_support == 'spicy_recipe' ) return true;      
    return false;
}